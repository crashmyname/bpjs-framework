<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🗄️</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Store & Secure Storage</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Simpan file dengan mudah dan akses file secara aman dengan token terenkripsi yang expired.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-warning"></i> Overview
    </div>
    <div class="card-body-custom">
        <p><strong>Store</strong> memudahkan penyimpanan file tanpa perlu menggunakan <code>move_uploaded_file()</code> secara manual. <strong>Secure Storage</strong> memungkinkan akses file dengan token terenkripsi yang memiliki batas waktu.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">📁</div>
                        <div style="font-weight:700;color:#f59e0b;">store()</div>
                        <div style="font-size:0.85rem;color:#64748b;">Simpan file ke storage</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">🔒</div>
                        <div style="font-weight:700;color:#dc2626;">storage_secure()</div>
                        <div style="font-size:0.85rem;color:#64748b;">URL file dengan token expired</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- store() -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        store() — Save File
    </div>
    <div class="card-body-custom">
        <p>Fungsi <code>store()</code> menyimpan file ke folder storage. Lebih simpel dari <code>move_uploaded_file()</code>.</p>
        
        <h5 style="font-weight:700;">Signature:</h5>
        <div class="code-block">
            <pre><code>store(string $filePath, string $targetDirectory, string $filename): bool</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Basic Usage:</h5>
        <div class="code-block">
            <pre><code>$file = $request->file('file');

// Simpan ke storage/public (default)
store($file['tmp_name'], storage_path(''), $file['name']);

// Simpan ke folder spesifik
$destination = storage_path('avatars');
if (!is_dir($destination)) {
    mkdir($destination, 0777, true);
}
store($file['tmp_name'], $destination, $file['name']);</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Complete Upload Example:</h5>
        <div class="code-block">
            <pre><code>public function upload(Request $request)
{
    if (!$request->hasFile('file')) {
        return Api::error('File tidak ditemukan', 400);
    }

    $file = $request->file('file');
    $destination = storage_path('documents');

    if (!is_dir($destination)) {
        mkdir($destination, 0777, true);
    }

    $filename = uniqid() . '_' . $file['name'];
    store($file['tmp_name'], $destination, $filename);

    return Api::success([
        'filename' => $filename,
        'url'      => storage($filename),
    ], 'Upload berhasil');
}</code></pre>
        </div>
    </div>
</div>

<!-- Secure Storage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Secure Storage — Protected File Access
    </div>
    <div class="card-body-custom">
        <p><strong>Secure Storage</strong> menghasilkan URL file yang diproteksi dengan token terenkripsi. Token memiliki <strong>masa berlaku</strong> — setelah expired, URL tidak bisa diakses lagi.</p>
        
        <h5 style="font-weight:700;">Step 1: Setup Route</h5>
        <p>Tambahkan route untuk menangani secure file di <code>routes/web.php</code>:</p>
        <div class="code-block">
            <pre><code>Route::get('/file/secure', function () {
    serve_secure_file();
});</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Step 2: Generate Secure URL (View)</h5>
        <p>Gunakan helper <code>storage_secure()</code> di view:</p>
        <div class="code-block">
            <pre><code>&lt;!-- Token expired dalam 5 detik --&gt;
&lt;img src="&lt;?= storage_secure('photo.jpg', 5) ?&gt;" alt="Photo"&gt;

&lt;!-- Token expired dalam 1 jam (3600 detik) --&gt;
&lt;a href="&lt;?= storage_secure('document.pdf', 3600) ?&gt;"&gt;
    Download Document
&lt;/a&gt;

&lt;!-- Token expired dalam 24 jam --&gt;
&lt;img src="&lt;?= storage_secure('private/image.png', 86400) ?&gt;"&gt;</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Signature:</h5>
        <div class="code-block">
            <pre><code>storage_secure(string $filename, int $ttlSeconds = 3600): string</code></pre>
        </div>
        
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Parameter</th><th>Tipe</th><th>Default</th><th>Description</th></tr></thead>
                <tbody>
                    <tr>
                        <td><code>$filename</code></td>
                        <td>string</td>
                        <td>— (required)</td>
                        <td>Nama file di folder storage</td>
                    </tr>
                    <tr>
                        <td><code>$ttlSeconds</code></td>
                        <td>int</td>
                        <td><code>3600</code> (1 jam)</td>
                        <td>Durasi token berlaku dalam detik</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- How Secure Storage Works -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        How Secure Storage Works
    </div>
    <div class="card-body-custom">
        <div style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;justify-content:center;padding:1rem 0;">
            <div style="text-align:center;background:#eff6ff;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">🔐</div>
                <div style="font-weight:700;font-size:0.85rem;">Encrypt</div>
                <div style="font-size:0.75rem;color:#64748b;">filename + expiry</div>
            </div>
            <span style="font-size:1.2rem;">→</span>
            <div style="text-align:center;background:#fef3c7;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">🔗</div>
                <div style="font-weight:700;font-size:0.85rem;">Token URL</div>
                <div style="font-size:0.75rem;color:#64748b;">?token=encrypted...</div>
            </div>
            <span style="font-size:1.2rem;">→</span>
            <div style="text-align:center;background:#f0fdf4;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">✅</div>
                <div style="font-weight:700;font-size:0.85rem;">Valid?</div>
                <div style="font-size:0.75rem;color:#059669;">Serve file</div>
            </div>
            <span style="font-size:1.2rem;">→</span>
            <div style="text-align:center;background:#fff5f5;border-radius:12px;padding:1rem;min-width:100px;">
                <div style="font-size:1.5rem;">⏰</div>
                <div style="font-weight:700;font-size:0.85rem;">Expired?</div>
                <div style="font-size:0.75rem;color:#dc2626;">403 Forbidden</div>
            </div>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div>
                <strong>Use Cases:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li>Foto profil yang hanya bisa diakses user tertentu</li>
                    <li>Dokumen rahasia dengan link temporary</li>
                    <li>File download yang expired setelah waktu tertentu</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Helper Functions -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-tools text-info"></i> Related Helper Functions
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Helper</th><th>Returns</th><th>Description</th></tr></thead>
                <tbody>
                    <tr><td><code>store($file, $dir, $name)</code></td><td>bool</td><td>Simpan file ke storage</td></tr>
                    <tr><td><code>storage($path)</code></td><td>string (URL)</td><td>URL publik ke file storage</td></tr>
                    <tr><td><code>storage_path($path)</code></td><td>string (path)</td><td>Absolute path ke folder storage</td></tr>
                    <tr><td><code>storage_secure($file, $ttl)</code></td><td>string (URL)</td><td>URL aman dengan token expired</td></tr>
                    <tr><td><code>serve_secure_file()</code></td><td>void</td><td>Serve file dari token secure (di route)</td></tr>
                    <tr><td><code>asset($path)</code></td><td>string (URL)</td><td>URL ke file di folder public</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Secure Your Files</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Secure Storage dengan Auth Middleware untuk proteksi maksimal.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('auth') ?>" style="background:white;color:#f59e0b;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
            </a>
            <a href="<?= route('crypto') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-lock"></i> Crypto →
            </a>
            <a href="<?= route('request') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-arrow-down-up"></i> Request →
            </a>
        </div>
    </div>
</div>