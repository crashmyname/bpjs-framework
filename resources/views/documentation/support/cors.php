<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #06b6d4); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🌐</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">CORS — Cross-Origin Resource Sharing</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Kontrol akses cross-origin ke API kamu. Izinkan domain tertentu, method, dan headers yang aman.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-info"></i> What is CORS?
    </div>
    <div class="card-body-custom">
        <p><strong>CORS</strong> (Cross-Origin Resource Sharing) adalah mekanisme keamanan browser yang memungkinkan server untuk mengontrol domain mana yang boleh mengakses resource-nya. Ini mencegah website jahat mengakses API kamu tanpa izin.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #fecaca;background:#fff5f5;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">❌</div>
                        <div style="font-weight:700;color:#dc2626;margin-top:0.5rem;">Without CORS</div>
                        <div style="font-size:0.85rem;color:#64748b;">Browser blocks cross-origin requests by default</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #bbf7d0;background:#f0fdf4;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">✅</div>
                        <div style="font-weight:700;color:#059669;margin-top:0.5rem;">With CORS</div>
                        <div style="font-size:0.85rem;color:#64748b;">Authorized domains can access your API securely</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Configuration -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Configuration
    </div>
    <div class="card-body-custom">
        <p>Konfigurasi CORS dilakukan di file <code>config/cors.php</code>:</p>
        <div class="code-block" style="max-height:500px;overflow-y:auto;">
            <pre><code>return [
    // Set true untuk izinkan SEMUA domain (tidak direkomendasikan di production)
    'allow_all_origins' => false,

    // Daftar domain yang diizinkan
    'allowed_origins' => [
        'http://localhost:8000',   // frontend dev server
        'http://localhost:3000',   // React dev server
        'https://myapp.com',       // production frontend
        // Gunakan '*' untuk izinkan semua (hanya jika allow_all_origins = false)
    ],

    // HTTP methods yang diizinkan
    'allowed_methods' => [
        'GET',
        'POST',
        'PUT',
        'PATCH',
        'DELETE',
        'OPTIONS',
    ],

    // Headers yang diizinkan dari client
    'allowed_headers' => [
        'Content-Type',
        'Authorization',
        'X-Requested-With',
        'X-CSRF-TOKEN',
        'X-API-Key',
    ],

    // Izinkan credentials (cookies, authorization headers)
    'allowed_credentials' => true,

    // Max age untuk preflight cache (detik)
    'max_age' => 86400,  // 24 jam
];</code></pre>
        </div>
    </div>
</div>

<!-- Configuration Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-gear text-info"></i> Configuration Reference
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Option</th><th>Type</th><th>Description</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>allow_all_origins</code></td>
                        <td>bool</td>
                        <td>Jika <code>true</code>, semua domain diizinkan. Override <code>allowed_origins</code>.</td>
                    </tr>
                    <tr>
                        <td><code>allowed_origins</code></td>
                        <td>array</td>
                        <td>Daftar domain yang diizinkan. Gunakan <code>'*'</code> untuk semua (bukan production).</td>
                    </tr>
                    <tr>
                        <td><code>allowed_methods</code></td>
                        <td>array</td>
                        <td>HTTP methods yang diizinkan: GET, POST, PUT, DELETE, OPTIONS, dll.</td>
                    </tr>
                    <tr>
                        <td><code>allowed_headers</code></td>
                        <td>array</td>
                        <td>Request headers yang diizinkan dari client.</td>
                    </tr>
                    <tr>
                        <td><code>allowed_credentials</code></td>
                        <td>bool</td>
                        <td>Izinkan cookies & authorization headers dikirim cross-origin.</td>
                    </tr>
                    <tr>
                        <td><code>max_age</code></td>
                        <td>int</td>
                        <td>Durasi cache preflight request (detik). Default 86400 (24 jam).</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Usage Scenarios -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Common Scenarios
    </div>
    <div class="card-body-custom">
        
        <!-- Development -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#059669;">
                    <i class="bi bi-code-slash"></i> Development (Local)
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Izinkan frontend dev server mengakses API:</p>
                <div class="code-block">
                    <pre><code>'allowed_origins' => [
    'http://localhost:3000',   // React
    'http://localhost:5173',   // Vite
    'http://localhost:8080',   // Vue
    'http://127.0.0.1:5500',  // Live Server
],</code></pre>
                </div>
            </div>
        </div>
        
        <!-- Production -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#dc2626;">
                    <i class="bi bi-server"></i> Production
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Hanya izinkan domain production:</p>
                <div class="code-block">
                    <pre><code>'allow_all_origins' => false,
'allowed_origins' => [
    'https://myapp.com',
    'https://www.myapp.com',
    'https://admin.myapp.com',
],
'allowed_credentials' => true,
'max_age' => 86400,</code></pre>
                </div>
            </div>
        </div>
        
        <!-- Public API -->
        <div class="card-custom" style="border:1px solid #e2e8f0;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#6366f1;">
                    <i class="bi bi-globe2"></i> Public API (Open Access)
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Izinkan akses dari mana saja (untuk public API):</p>
                <div class="code-block">
                    <pre><code>'allow_all_origins' => true,
// atau
'allowed_origins' => ['*'],</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How It Works -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        How CORS Works
    </div>
    <div class="card-body-custom">
        <p>Browser mengirim <strong>preflight request</strong> (OPTIONS) sebelum request sebenarnya untuk memeriksa izin:</p>
        
        <div style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;justify-content:center;padding:1rem 0;">
            <div style="text-align:center;background:#eff6ff;border-radius:12px;padding:1.25rem;min-width:120px;">
                <div style="font-weight:700;color:#1e40af;">1. Browser</div>
                <div style="font-size:0.8rem;color:#64748b;margin-top:0.25rem;">Sends OPTIONS</div>
            </div>
            <div style="font-size:1.5rem;color:#94a3b8;">→</div>
            <div style="text-align:center;background:#f0fdf4;border-radius:12px;padding:1.25rem;min-width:120px;">
                <div style="font-weight:700;color:#166534;">2. Server</div>
                <div style="font-size:0.8rem;color:#64748b;margin-top:0.25rem;">Checks CORS config</div>
            </div>
            <div style="font-size:1.5rem;color:#94a3b8;">→</div>
            <div style="text-align:center;background:#fef3c7;border-radius:12px;padding:1.25rem;min-width:120px;">
                <div style="font-weight:700;color:#92400e;">3. Response</div>
                <div style="font-size:0.8rem;color:#64748b;margin-top:0.25rem;">Allow / Deny</div>
            </div>
            <div style="font-size:1.5rem;color:#94a3b8;">→</div>
            <div style="text-align:center;background:#f5f3ff;border-radius:12px;padding:1.25rem;min-width:120px;">
                <div style="font-weight:700;color:#7c3aed;">4. Browser</div>
                <div style="font-size:0.8rem;color:#64748b;margin-top:0.25rem;">Sends actual request</div>
            </div>
        </div>
        
        <div class="alert-custom alert-info-custom mt-2">
            <i class="bi bi-info-circle-fill"></i>
            <div><strong>Preflight cache:</strong> Browser menyimpan hasil preflight selama <code>max_age</code> detik. Request berikutnya tidak perlu preflight lagi.</div>
        </div>
    </div>
</div>

<!-- Troubleshooting -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-bug text-danger"></i> Common Errors & Solutions
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Error</th><th>Cause</th><th>Solution</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>No 'Access-Control-Allow-Origin' header</code></td>
                        <td>Origin tidak diizinkan</td>
                        <td>Tambahkan domain ke <code>allowed_origins</code></td>
                    </tr>
                    <tr>
                        <td><code>Method not allowed</code></td>
                        <td>HTTP method tidak diizinkan</td>
                        <td>Tambahkan method ke <code>allowed_methods</code></td>
                    </tr>
                    <tr>
                        <td><code>Request header field not allowed</code></td>
                        <td>Custom header tidak diizinkan</td>
                        <td>Tambahkan header ke <code>allowed_headers</code></td>
                    </tr>
                    <tr>
                        <td><code>Credentials flag is 'true' but wildcard</code></td>
                        <td><code>allowed_credentials: true</code> + <code>*</code> origin</td>
                        <td>Gunakan domain spesifik, bukan wildcard</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #06b6d4); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Secure Your API</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan CORS dengan Auth Middleware untuk API yang aman.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('auth') ?>" style="background:white;color:#0891b2;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
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