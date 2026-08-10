<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #ef4444); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🔐</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Auth Middleware</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Proteksi route dengan session-based authentication. Dukung Web dan API routes.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-shield-lock text-danger"></i> What is Auth Middleware?
    </div>
    <div class="card-body-custom">
        <p><strong>Auth Middleware</strong> adalah lapisan keamanan yang memproteksi route dari akses user yang belum login. Middleware memeriksa session user sebelum mengizinkan akses ke route tertentu.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="alert-custom alert-info-custom">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>
                        <strong>Web Routes:</strong> Gunakan <code>AuthMiddleware</code> — redirect ke halaman login jika belum autentikasi.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert-custom alert-warning-custom">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>
                        <strong>API Routes:</strong> Gunakan <code>Middleware</code> — return JSON 401 jika token tidak valid.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import
    </div>
    <div class="card-body-custom">
        <p>Import middleware di file route kamu:</p>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#dc2626;">Web Routes (routes/web.php)</h6>
                        <div class="code-block">
                            <pre><code>use Bpjs\Framework\Helpers\AuthMiddleware;</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#f59e0b;">API Routes (routes/api.php)</h6>
                        <div class="code-block">
                            <pre><code>use Bpjs\Framework\Helpers\Middleware;</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Web Routes Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Web Routes — AuthMiddleware
    </div>
    <div class="card-body-custom">
        <p>Proteksi route web dengan <code>AuthMiddleware</code>. User yang belum login akan <strong>diredirect ke halaman login</strong>.</p>
        
        <h5 style="font-weight:700;">Single Route:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\AuthMiddleware;

// Proteksi satu route
Route::get('/dashboard', [DashboardController::class, 'index'], [AuthMiddleware::class]);</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Route Group:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\AuthMiddleware;

Route::group([AuthMiddleware::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::post('/profile', [ProfileController::class, 'update']);
    Route::get('/settings', [SettingsController::class, 'index']);
});</code></pre>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div>Semua route di dalam <code>AuthMiddleware</code> group otomatis diproteksi. User harus login untuk mengaksesnya.</div>
        </div>
    </div>
</div>

<!-- API Routes Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        API Routes — Middleware
    </div>
    <div class="card-body-custom">
        <p>Proteksi API route dengan <code>Middleware</code>. Request tanpa token valid akan mendapat <strong>response JSON 401 Unauthorized</strong>.</p>
        
        <h5 style="font-weight:700;">Single Route:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Middleware;

// Proteksi satu API route
Api::get('/users', [UserController::class, 'index'], [Middleware::class]);</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Route Group:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Middleware;

Api::group([Middleware::class], function () {
    Api::get('/users', [UserController::class, 'index']);
    Api::post('/users', [UserController::class, 'store']);
    Api::put('/users/{id}', [UserController::class, 'update']);
    Api::delete('/users/{id}', [UserController::class, 'destroy']);
});</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Dengan Response JSON:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Middleware;

Api::group([Middleware::class], function () {
    Api::get('/profile', function () {
        $user = auth()->user();
        return Api::success($user);
    });
});</code></pre>
        </div>
        
        <div class="alert-custom alert-warning-custom mt-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div>
                <strong>Perbedaan Utama:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li><code>AuthMiddleware</code> → redirect ke login page (untuk web)</li>
                    <li><code>Middleware</code> → return JSON 401 (untuk API)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Multiple Middleware -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Combining Multiple Middlewares
    </div>
    <div class="card-body-custom">
        <p>Kamu bisa mengkombinasikan AuthMiddleware dengan middleware lain seperti AdminMiddleware atau Rate Limiter:</p>
        
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\AuthMiddleware;

// Web — Auth + Admin
Route::group([AuthMiddleware::class, AdminMiddleware::class], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::get('/admin/settings', [AdminController::class, 'settings']);
});

// Web — Auth + Rate Limit
Route::group([AuthMiddleware::class], function () {
    Route::post('/checkout', [OrderController::class, 'checkout'])
        ->limit(5, 60);  // max 5x per menit
});</code></pre>
        </div>
    </div>
</div>

<!-- Comparison Table -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-arrow-left-right text-info"></i> Web vs API Middleware
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th style="width:20%;">Aspek</th><th style="width:40%;">AuthMiddleware (Web)</th><th style="width:40%;">Middleware (API)</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Import</strong></td>
                        <td><code>use Helpers\AuthMiddleware;</code></td>
                        <td><code>use Helpers\Middleware;</code></td>
                    </tr>
                    <tr>
                        <td><strong>File</strong></td>
                        <td><code>routes/web.php</code></td>
                        <td><code>routes/api.php</code></td>
                    </tr>
                    <tr>
                        <td><strong>Unauthenticated</strong></td>
                        <td>Redirect ke <code>/login</code></td>
                        <td>JSON <code>{"statusCode": 401, "error": "Unauthorized"}</code></td>
                    </tr>
                    <tr>
                        <td><strong>Session</strong></td>
                        <td>PHP Session</td>
                        <td>Token-based (Bearer / X-API-Key)</td>
                    </tr>
                    <tr>
                        <td><strong>Group Syntax</strong></td>
                        <td><code>Route::group([AuthMiddleware::class], fn() => ...)</code></td>
                        <td><code>Api::group([Middleware::class], fn() => ...)</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom Middleware -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Creating Custom Auth Middleware
    </div>
    <div class="card-body-custom">
        <p>Kamu bisa membuat middleware kustom untuk logic autentikasi yang lebih spesifik:</p>
        
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>namespace App\Middleware;

use Bpjs\Framework\Core\Request;
use Bpjs\Framework\Helpers\Session;

class AuthMiddleware
{
    public function handle(Request $request): void
    {
        // Cek apakah user sudah login
        if (!Session::has('user')) {
            header('Location: ' . base_url() . '/login');
            exit;
        }
    }
}

class AdminMiddleware
{
    public function handle(Request $request): void
    {
        $user = Session::get('user');
        
        // Cek role admin
        if (!$user || $user->role !== 'admin') {
            header('Location: ' . base_url() . '/dashboard');
            exit;
        }
    }
}

// Penggunaan di routes:
Route::group([AuthMiddleware::class, AdminMiddleware::class], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #ef4444); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Secure Your Routes</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Proteksi route-mu sekarang dengan Auth Middleware.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('route') ?>" style="background:white;color:#dc2626;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
            <a href="<?= route('csrf') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-check"></i> CSRF →
            </a>
            <a href="<?= route('ratelimiter') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-speedometer2"></i> Rate Limiter →
            </a>
        </div>
    </div>
</div>