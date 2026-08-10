<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📦</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Asset Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Akses file di folder <code>public/</code> dengan mudah. CSS, JavaScript, images, dan file statis lainnya.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-folder2-open text-warning"></i> What is Asset?
    </div>
    <div class="card-body-custom">
        <p>Helper <code>asset()</code> memudahkan kamu mengakses file di folder <code>public/</code> tanpa harus menuliskan path lengkap. Asset secara otomatis menyesuaikan dengan subfolder project kamu.</p>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>
                <strong>Struktur Folder:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li><code>public/css/</code> — file stylesheet</li>
                    <li><code>public/js/</code> — file JavaScript</li>
                    <li><code>public/images/</code> — file gambar</li>
                    <li><code>public/fonts/</code> — file font</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- asset() -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        asset() Helper
    </div>
    <div class="card-body-custom">
        <p>Fungsi <code>asset()</code> menghasilkan URL ke file di folder <code>public/</code>.</p>
        
        <div class="code-block">
            <pre><code>// Signature
asset(string $path): string

// Output
// http://localhost/project/public/{path}</code></pre>
        </div>
    </div>
</div>

<!-- Usage Examples -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Usage Examples
    </div>
    <div class="card-body-custom">
        
        <!-- Images -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#f59e0b;">
                    <i class="bi bi-image"></i> Images
                </h5>
                <div class="code-block">
                    <pre><code>&lt;!-- Favicon --&gt;
&lt;link rel="icon" href="&lt;?= asset('bpjs.png') ?&gt;" type="image/x-icon"&gt;

&lt;!-- Logo --&gt;
&lt;img src="&lt;?= asset('logo.png') ?&gt;" alt="Logo"&gt;

&lt;!-- Gambar di folder --&gt;
&lt;img src="&lt;?= asset('images/banner.jpg') ?&gt;" alt="Banner"&gt;</code></pre>
                </div>
            </div>
        </div>
        
        <!-- CSS -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#f59e0b;">
                    <i class="bi bi-filetype-css"></i> CSS / Stylesheets
                </h5>
                <div class="code-block">
                    <pre><code>&lt;!-- Bootstrap CSS --&gt;
&lt;link rel="stylesheet" href="&lt;?= asset('css/bootstrap.min.css') ?&gt;"&gt;

&lt;!-- Template CSS (dalam subfolder) --&gt;
&lt;link rel="stylesheet" href="&lt;?= asset('adminlte/css/adminlte.min.css') ?&gt;"&gt;

&lt;!-- Custom CSS --&gt;
&lt;link rel="stylesheet" href="&lt;?= asset('css/style.css') ?&gt;"&gt;</code></pre>
                </div>
            </div>
        </div>
        
        <!-- JavaScript -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#f59e0b;">
                    <i class="bi bi-filetype-js"></i> JavaScript
                </h5>
                <div class="code-block">
                    <pre><code>&lt;!-- jQuery --&gt;
&lt;script src="&lt;?= asset('js/jquery.min.js') ?&gt;"&gt;&lt;/script&gt;

&lt;!-- Bootstrap JS --&gt;
&lt;script src="&lt;?= asset('js/bootstrap.bundle.min.js') ?&gt;"&gt;&lt;/script&gt;

&lt;!-- Template JS --&gt;
&lt;script src="&lt;?= asset('adminlte/js/adminlte.min.js') ?&gt;"&gt;&lt;/script&gt;</code></pre>
                </div>
            </div>
        </div>
        
        <!-- Fonts -->
        <div class="card-custom" style="border:1px solid #e2e8f0;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#f59e0b;">
                    <i class="bi bi-fonts"></i> Fonts
                </h5>
                <div class="code-block">
                    <pre><code>&lt;!-- Font Awesome --&gt;
&lt;link rel="stylesheet" href="&lt;?= asset('fonts/fontawesome/css/all.min.css') ?&gt;"&gt;

&lt;!-- Custom Font --&gt;
@font-face {
    src: url('&lt;?= asset("fonts/custom.woff2") ?&gt;');
}</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- asset_v() - Versioning -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        asset_v() — Cache Busting
    </div>
    <div class="card-body-custom">
        <p>Fungsi <code>asset_v()</code> menambahkan timestamp file sebagai query parameter untuk <strong>cache busting</strong>. Setiap file berubah, URL otomatis berubah — browser akan mendownload versi terbaru.</p>
        
        <div class="code-block">
            <pre><code>// Signature
asset_v(string $path): string

// Output dengan versioning
// http://localhost/project/public/css/app.css?v=1704067200</code></pre>
        </div>
        
        <h6 style="font-weight:600;margin-top:1rem;">Contoh:</h6>
        <div class="code-block">
            <pre><code>&lt;link rel="stylesheet" href="&lt;?= asset_v('css/app.css') ?&gt;"&gt;
&lt;script src="&lt;?= asset_v('js/app.js') ?&gt;"&gt;&lt;/script&gt;</code></pre>
        </div>
        
        <div class="alert-custom alert-success-custom mt-2">
            <i class="bi bi-lightbulb-fill"></i>
            <div><strong>Best Practice:</strong> Gunakan <code>asset_v()</code> untuk file yang sering berubah (CSS/JS custom). Untuk library eksternal seperti Bootstrap, gunakan <code>asset()</code> biasa.</div>
        </div>
    </div>
</div>

<!-- Comparison -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-arrow-left-right text-info"></i> asset() vs asset_v() vs public_path()
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Helper</th><th>Returns</th><th>Use Case</th><th>Example Output</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>asset()</code></td>
                        <td>URL</td>
                        <td>File statis yang jarang berubah</td>
                        <td><code>http://localhost/project/public/css/bootstrap.css</code></td>
                    </tr>
                    <tr>
                        <td><code>asset_v()</code></td>
                        <td>URL + ?v=</td>
                        <td>File yang sering diupdate (cache busting)</td>
                        <td><code>http://localhost/project/public/css/app.css?v=1704067200</code></td>
                    </tr>
                    <tr>
                        <td><code>public_path()</code></td>
                        <td>Absolute Path</td>
                        <td>File operations (read, write, delete)</td>
                        <td><code>/var/www/project/public/uploads/</code></td>
                    </tr>
                    <tr>
                        <td><code>storage()</code></td>
                        <td>URL</td>
                        <td>File di storage folder</td>
                        <td><code>http://localhost/project/storage/public/avatar.jpg</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Complete Layout Example
    </div>
    <div class="card-body-custom">
        <p>Contoh penggunaan asset di file layout:</p>
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;My App&lt;/title&gt;

    &lt;!-- Favicon --&gt;
    &lt;link rel="icon" href="&lt;?= asset('favicon.ico') ?&gt;"&gt;

    &lt;!-- CSS Libraries (jarang berubah) --&gt;
    &lt;link rel="stylesheet" href="&lt;?= asset('css/bootstrap.min.css') ?&gt;"&gt;
    &lt;link rel="stylesheet" href="&lt;?= asset('css/fontawesome.min.css') ?&gt;"&gt;

    &lt;!-- Custom CSS (sering berubah — cache busting) --&gt;
    &lt;link rel="stylesheet" href="&lt;?= asset_v('css/app.css') ?&gt;"&gt;
&lt;/head&gt;
&lt;body&gt;

    &lt;!-- Logo --&gt;
    &lt;img src="&lt;?= asset('images/logo.png') ?&gt;" alt="Logo" width="120"&gt;

    &lt;!-- Content --&gt;
    &lt;div id="app"&gt;
        &lt;?= $content ?&gt;
    &lt;/div&gt;

    &lt;!-- JS Libraries --&gt;
    &lt;script src="&lt;?= asset('js/jquery.min.js') ?&gt;"&gt;&lt;/script&gt;
    &lt;script src="&lt;?= asset('js/bootstrap.bundle.min.js') ?&gt;"&gt;&lt;/script&gt;

    &lt;!-- Custom JS (cache busting) --&gt;
    &lt;script src="&lt;?= asset_v('js/app.js') ?&gt;"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Explore More Helpers</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Pelajari helper lainnya untuk mempercepat development.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('view') ?>" style="background:white;color:#f59e0b;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-eye"></i> View →
            </a>
            <a href="<?= route('http') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-globe"></i> HTTP Client →
            </a>
            <a href="<?= route('validator') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-check-circle"></i> Validator →
            </a>
        </div>
    </div>
</div>