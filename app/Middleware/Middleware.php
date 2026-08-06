<?php
namespace Middlewares;

use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;
use Bpjs\Framework\Helpers\Database;

class Middleware
{
    /**
     * @var array List of public routes that don't require authentication
     */
    protected static array $publicRoutes = [
        '/api/login',
        '/api/register',
        '/api/refresh',
        '/api/health',
    ];

    /**
     * @var string Authentication type: 'jwt' or 'api_key'
     */
    protected static string $authType = 'jwt'; // or 'api_key'

    /**
     * Handle middleware - called from Route::group
     */
    public static function handle(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'] ?? '';
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        
        // Skip authentication for public routes
        if (self::isPublicRoute($requestUri)) {
            return;
        }

        $headers = self::getHeaders();

        // Validate authentication based on type
        if (self::$authType === 'jwt') {
            self::validateJWT($headers);
        } else {
            self::validateApiKey($headers);
        }
    }

    /**
     * Check if current route is public
     */
    protected static function isPublicRoute(string $uri): bool
    {
        // Remove query string
        $uri = strtok($uri, '?');
        
        foreach (self::$publicRoutes as $route) {
            if (strpos($uri, $route) === 0) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get all headers
     */
    protected static function getHeaders(): array
    {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $header = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($key, 5)))));
                $headers[$header] = $value;
            }
        }
        return $headers;
    }

    /**
     * Get authorization header
     */
    protected static function getAuthorizationHeader(array $headers): ?string
    {
        if (isset($headers['Authorization'])) {
            return $headers['Authorization'];
        }
        if (isset($headers['authorization'])) {
            return $headers['authorization'];
        }
        return null;
    }

    /**
     * Validate JWT token
     */
    protected static function validateJWT(array $headers): void
    {
        $authHeader = self::getAuthorizationHeader($headers);
        
        if (!$authHeader) {
            self::sendUnauthorized('Authorization header not found');
        }

        // Check Bearer format
        if (!preg_match('/^Bearer\s+(.+)$/', $authHeader, $matches)) {
            self::sendUnauthorized('Invalid Authorization format. Use Bearer token.');
        }

        $token = $matches[1];

        try {
            // Decode JWT
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            
            // Check if token is expired
            if (isset($decoded->exp) && $decoded->exp < time()) {
                self::sendUnauthorized('Token has expired');
            }

            // Store user info in a global variable
            $_SERVER['JWT_USER'] = (array) $decoded;
            
            // Optional: Check if user exists in database
            if (isset($decoded->user_id)) {
                self::validateUserExists($decoded->user_id);
            }

        } catch (ExpiredException $e) {
            self::sendUnauthorized('Token has expired');
        } catch (SignatureInvalidException $e) {
            self::sendUnauthorized('Invalid token signature');
        } catch (\Exception $e) {
            error_log('JWT Validation Error: ' . $e->getMessage());
            self::sendUnauthorized('Invalid token');
        }
    }

    /**
     * Validate API Key
     */
    protected static function validateApiKey(array $headers): void
    {
        // Check for X-API-Key header
        $apiKey = $headers['X-API-KEY'] ?? $headers['x-api-key'] ?? null;
        
        if (!$apiKey) {
            self::sendUnauthorized('API Key not found');
        }

        // Validate API Key from database
        try {
            $db = Database::connection();
            $stmt = $db->prepare("SELECT id, api_key, is_active, expires_at FROM users WHERE api_key = :api_key LIMIT 1");
            $stmt->execute(['api_key' => $apiKey]);
            $user = $stmt->fetch();
            
            if (!$user) {
                self::sendUnauthorized('Invalid API Key');
            }

            // Check if user is active
            if (isset($user['is_active']) && !$user['is_active']) {
                self::sendUnauthorized('Account is inactive');
            }

            // Check if API Key has expired
            if (isset($user['expires_at']) && $user['expires_at'] < date('Y-m-d H:i:s')) {
                self::sendUnauthorized('API Key has expired');
            }

            // Store user info
            $_SERVER['API_USER'] = $user;

        } catch (\Exception $e) {
            error_log('API Key Validation Error: ' . $e->getMessage());
            self::sendUnauthorized('Authentication failed');
        }
    }

    /**
     * Validate if user exists in database
     */
    protected static function validateUserExists(int|string $userId): void
    {
        try {
            $db = Database::connection();
            $stmt = $db->prepare("SELECT id, is_active FROM users WHERE id = :id LIMIT 1");
            $stmt->execute(['id' => $userId]);
            $user = $stmt->fetch();
            
            if (!$user) {
                self::sendUnauthorized('User not found');
            }

            if (isset($user['is_active']) && !$user['is_active']) {
                self::sendUnauthorized('Account is inactive');
            }

        } catch (\Exception $e) {
            error_log('User Validation Error: ' . $e->getMessage());
            // Don't block request if database fails
        }
    }

    /**
     * Send unauthorized response
     */
    protected static function sendUnauthorized(string $message = 'Unauthorized'): void
    {
        header('HTTP/1.1 401 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'code' => 401,
            'message' => $message,
            'timestamp' => date('c'),
        ]);
        exit();
    }

    /**
     * Send forbidden response
     */
    protected static function sendForbidden(string $message = 'Forbidden'): void
    {
        header('HTTP/1.1 403 Forbidden');
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'error',
            'code' => 403,
            'message' => $message,
            'timestamp' => date('c'),
        ]);
        exit();
    }

    /**
     * Get authenticated user data
     */
    public static function getUser(): ?array
    {
        return $_SERVER['JWT_USER'] ?? $_SERVER['API_USER'] ?? null;
    }

    /**
     * Get authenticated user ID
     */
    public static function getUserId(): ?int
    {
        $user = self::getUser();
        return $user['user_id'] ?? $user['id'] ?? null;
    }

    /**
     * Check if user has specific role
     */
    public static function hasRole(string $role): bool
    {
        $user = self::getUser();
        if (!$user) {
            return false;
        }
        return isset($user['role']) && $user['role'] === $role;
    }

    /**
     * Check if user has specific permission
     */
    public static function hasPermission(string $permission): bool
    {
        $user = self::getUser();
        if (!$user) {
            return false;
        }
        
        $permissions = $user['permissions'] ?? [];
        return in_array($permission, $permissions);
    }

    /**
     * Add public route
     */
    public static function addPublicRoute(string $route): void
    {
        self::$publicRoutes[] = $route;
    }

    /**
     * Set auth type
     */
    public static function setAuthType(string $type): void
    {
        if (in_array($type, ['jwt', 'api_key'])) {
            self::$authType = $type;
        }
    }
}