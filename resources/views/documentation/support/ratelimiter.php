<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">⏱️</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Rate Limiter</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Cegah request berlebihan dalam waktu singkat. Proteksi API & form dari abuse dan brute force.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-warning"></i> What is Rate Limiter?
    </div>
    <div class="card-body-custom">
        <p><strong>Rate Limiter</strong> membatasi jumlah request yang bisa dilakukan user dalam periode waktu tertentu. Mencegah <strong>brute force, spam, DDoS, dan API abuse</strong>.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #fecaca;background:#fff5f5;text-align:center;">
                    <div class="card-body-custom">
                        <div style="font-size:2rem;">🔐</div>
                        <div style="font-weight:700;color:#dc2626;">Login Protection</div>
                        <div style="font-size:0.8rem;color:#64748b;">5 attempts per minute</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #fef3c7;background:#fffdf5;text-align:center;">
                    <div class="card-body-custom">
                        <div style="font-size:2rem;">📧</div>
                        <div style="font-weight:700;color:#f59e0b;">Form Spam</div>
                        <div style="font-size:0.8rem;color:#64748b;">3 contact form per minute</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #bbf7d0;background:#f0fdf4;text-align:center;">
                    <div class="card-body-custom">
                        <div style="font-size:2rem;">🔌</div>
                        <div style="font-weight:700;color:#059669;">API Protection</div>
                        <div style="font-size:0.8rem;color:#64748b;">100 requests per 15 min</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Basic Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Basic Usage — Route Level
    </div>
    <div class="card-body-custom">
        <p>Rate Limiter bisa langsung diterapkan di route menggunakan method <code>->limit()</code>:</p>
        
        <h5 style="font-weight:700;">Web Routes:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Route;

// Maksimal 5 request per 60 detik (default)
Route::post('/postdata', [PostDataController::class, 'store'])
    ->limit(5);

// Maksimal 5 request per 60 detik (explicit)
Route::post('/postdata', [PostDataController::class, 'store'])
    ->limit(5, 60);

// Maksimal 3 request per menit untuk login
Route::post('/login', [AuthController::class, 'login'])
    ->limit(3, 60);

// Maksimal 100 request per 15 menit untuk search
Route::get('/search', [SearchController::class, 'index'])
    ->limit(100, 900);</code></pre>
        </div>

        <h5 style="font-weight:700;margin-top:1rem;">API Routes:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Api;

Api::post('/users', [UserController::class, 'store'])
    ->limit(10, 60);

Api::post('/login', [AuthController::class, 'login'])
    ->limit(5, 60);</code></pre>
        </div>
    </div>
</div>

<!-- Signature -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Method Signature
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code>->limit(int $maxRequests, int $decaySeconds = 60): static</code></pre>
        </div>
        
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Parameter</th><th>Tipe</th><th>Default</th><th>Description</th></tr></thead>
                <tbody>
                    <tr>
                        <td><code>$maxRequests</code></td>
                        <td>int</td>
                        <td>— (required)</td>
                        <td>Maksimal jumlah request yang diizinkan</td>
                    </tr>
                    <tr>
                        <td><code>$decaySeconds</code></td>
                        <td>int</td>
                        <td><code>60</code></td>
                        <td>Jendela waktu dalam detik. Setelah periode ini, counter reset.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Common Configurations -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Common Configurations
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Use Case</th><th>Limit</th><th>Window</th><th>Code</th></tr></thead>
                <tbody>
                    <tr>
                        <td>Login</td>
                        <td>5</td>
                        <td>60 detik</td>
                        <td><code>->limit(5, 60)</code></td>
                    </tr>
                    <tr>
                        <td>Register</td>
                        <td>3</td>
                        <td>60 detik</td>
                        <td><code>->limit(3, 60)</code></td>
                    </tr>
                    <tr>
                        <td>Contact Form</td>
                        <td>3</td>
                        <td>60 detik</td>
                        <td><code>->limit(3, 60)</code></td>
                    </tr>
                    <tr>
                        <td>Search</td>
                        <td>100</td>
                        <td>15 menit (900)</td>
                        <td><code>->limit(100, 900)</code></td>
                    </tr>
                    <tr>
                        <td>API Public</td>
                        <td>60</td>
                        <td>60 detik</td>
                        <td><code>->limit(60, 60)</code></td>
                    </tr>
                    <tr>
                        <td>File Upload</td>
                        <td>10</td>
                        <td>60 detik</td>
                        <td><code>->limit(10, 60)</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- How It Works -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        How It Works
    </div>
    <div class="card-body-custom">
        <p>Rate Limiter melacak jumlah request per IP (atau key kustom) dalam jendela waktu:</p>
        
        <div style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;justify-content:center;padding:1rem 0;">
            <div style="text-align:center;background:#eff6ff;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">📥</div>
                <div style="font-weight:700;font-size:0.85rem;">Request #1-4</div>
                <div style="font-size:0.75rem;color:#059669;">✅ Allowed</div>
            </div>
            <span style="font-size:1.2rem;">→</span>
            <div style="text-align:center;background:#fff5f5;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">🚫</div>
                <div style="font-weight:700;font-size:0.85rem;">Request #5</div>
                <div style="font-size:0.75rem;color:#dc2626;">❌ Blocked</div>
            </div>
            <span style="font-size:1.2rem;">→</span>
            <div style="text-align:center;background:#f0fdf4;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">⏰</div>
                <div style="font-weight:700;font-size:0.85rem;">After 60 sec</div>
                <div style="font-size:0.75rem;color:#059669;">✅ Reset</div>
            </div>
        </div>
        
        <p style="font-size:0.85rem;color:#64748b;">Rate limiter menggunakan file-based counter di <code>sys_get_temp_dir()/rate_limits/</code>. Saat limit tercapai, request berikutnya akan ditolak sampai jendela waktu berakhir.</p>
    </div>
</div>

<!-- With Middleware Group -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Combining with Middleware
    </div>
    <div class="card-body-custom">
        <p>Kombinasikan Rate Limiter dengan Auth Middleware untuk proteksi maksimal:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Route;

// Protected + Rate Limited
Route::group([AuthMiddleware::class], function () {
    Route::post('/checkout', [OrderController::class, 'checkout'])
        ->limit(5, 60);

    Route::post('/transfer', [TransactionController::class, 'transfer'])
        ->limit(3, 60);
});

// Admin + Rate Limited
Route::group([AuthMiddleware::class, AdminMiddleware::class], function () {
    Route::post('/admin/bulk-delete', [AdminController::class, 'bulkDelete'])
        ->limit(2, 120);  // 2x per 2 menit
});</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Protect Your Routes</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Rate Limiter dengan CSRF & Auth untuk pertahanan berlapis.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('csrf') ?>" style="background:white;color:#f59e0b;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-check"></i> CSRF →
            </a>
            <a href="<?= route('auth') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
            </a>
            <a href="<?= route('route') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
        </div>
    </div>
</div>