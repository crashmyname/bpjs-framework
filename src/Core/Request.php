<?php
// Request.php
namespace Bpjs\Core;
class Request {
    private $data;
    private $files;
    private ?int $rateLimit = null;

    public function __construct() {
        $this->data = array_merge($this->sanitize($_GET), $this->sanitize($_POST));
        $this->files = $this->sanitizeFiles($_FILES);
    }

    public static function capture(): static {
        return new static();
    }

    public function setRateLimit(int $limit): void {
        $this->rateLimit = $limit;
    }

    public function getRateLimit(): ?int {
        return $this->rateLimit;
    }

    private function sanitize(array $data): array {
        $sanitized = [];
        foreach ($data as $key => $value) {
            $sanitized[$key] = is_array($value)
                ? $this->sanitize($value)
                : htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $sanitized;
    }

    private function sanitizeFiles(array $files): array {
        $sanitized = [];
        foreach ($files as $key => $file) {
            if (is_array($file['name'])) {
                foreach ($file['name'] as $i => $name) {
                    $sanitized[$key][] = [
                        'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
                        'type' => htmlspecialchars($file['type'][$i], ENT_QUOTES, 'UTF-8'),
                        'tmp_name' => $file['tmp_name'][$i],
                        'error' => $file['error'][$i],
                        'size' => $file['size'][$i]
                    ];
                }
            } else {
                $sanitized[$key] = [
                    'name' => htmlspecialchars($file['name'], ENT_QUOTES, 'UTF-8'),
                    'type' => htmlspecialchars($file['type'], ENT_QUOTES, 'UTF-8'),
                    'tmp_name' => $file['tmp_name'],
                    'error' => $file['error'],
                    'size' => $file['size']
                ];
            }
        }
        return $sanitized;
    }

    public function all(): array {
        return $this->data + $this->files;
    }

    public function get($key) {
        return $this->data[$key] ?? $this->files[$key] ?? null;
    }

    public function only(array $keys): array {
        $filtered = [];
        foreach ($keys as $key) {
            if (isset($this->data[$key])) {
                $filtered[$key] = $this->data[$key];
            }
        }
        return $filtered;
    }

    public function file($key) {
        return $this->files[$key] ?? null;
    }

    public function getClientOriginalExtension($key) {
        $file = $this->files[$key] ?? null;
        return $file ? pathinfo($file['name'], PATHINFO_EXTENSION) : '';
    }

    public function getClientOriginalName($key) {
        return $this->files[$key]['name'] ?? '';
    }

    public function getClientMimeType($key) {
        return $this->files[$key]['type'] ?? '';
    }

    public function getSize($key) {
        return $this->files[$key]['size'] ?? 0;
    }

    public function getPath($key) {
        return $this->files[$key]['tmp_name'] ?? '';
    }

    public static function isAjax(): bool {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    public function __get($key) {
        return $this->get($key);
    }
}
