<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #059669, #34d399); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">👁️</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">View</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Render templates, kirim data ke halaman, redirect, dan gunakan layout dengan mudah.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-eye text-success"></i> What is View?
    </div>
    <div class="card-body-custom">
        <p><strong>View</strong> adalah lapisan presentasi dalam arsitektur MVC. View bertanggung jawab untuk menampilkan data ke user melalui template HTML. Semua file view disimpan di folder <code>resources/views/</code>.</p>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>
                <strong>Struktur Folder:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li><code>resources/views/</code> — folder utama view</li>
                    <li><code>resources/views/welcome/</code> — halaman welcome</li>
                    <li><code>resources/views/documentation/</code> — halaman dokumentasi</li>
                    <li><code>resources/views/layouts/</code> — template layout</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Import & Basic Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import & Setup
    </div>
    <div class="card-body-custom">
        <p>Import class View di controller kamu:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\View;</code></pre>
        </div>
    </div>
</div>

<!-- View Methods -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        View Methods
    </div>
    <div class="card-body-custom">
        
        <!-- render() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#059669;">
                    <i class="bi bi-file-earmark-text"></i> View::render()
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Render halaman dengan data dan layout.</p>
                
                <h6 style="font-weight:600;margin-top:1rem;">Signature:</h6>
                <div class="code-block">
                    <pre><code>View::render(
    string $view,       // path ke file view (relatif dari resources/views/)
    array  $data = [],  // data yang dikirim ke view
    ?string $layout = null  // layout yang digunakan (opsional)
): void</code></pre>
                </div>
                
                <h6 style="font-weight:600;margin-top:1rem;">Contoh:</h6>
                <div class="code-block">
                    <pre><code>// Tanpa data, tanpa layout
View::render('user/index');

// Dengan data (array asosiatif)
View::render('user/index', [
    'users' => $users,
    'title' => 'Data Users',
]);

// Dengan data + layout
View::render('user/index', [
    'users' => $users,
    'title' => 'Data Users',
], 'layouts/app');

// Dengan data + layout dokumentasi
View::render('documentation/orm', [
    'title' => 'ORM Documentation',
], 'documentation/doc');</code></pre>
                </div>
                
                <h6 style="font-weight:600;margin-top:1rem;">Penjelasan Parameter:</h6>
                <table class="table-custom">
                    <thead>
                        <tr><th>Parameter</th><th>Tipe</th><th>Deskripsi</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>$view</code></td>
                            <td>string</td>
                            <td>Path file view tanpa ekstensi <code>.php</code>. Contoh: <code>'user/index'</code> → <code>resources/views/user/index.php</code></td>
                        </tr>
                        <tr>
                            <td><code>$data</code></td>
                            <td>array</td>
                            <td>Data yang akan diekstrak menjadi variabel di view. Key array menjadi nama variabel.</td>
                        </tr>
                        <tr>
                            <td><code>$layout</code></td>
                            <td>string/null</td>
                            <td>Path file layout. Jika <code>null</code>, view dirender tanpa layout. Layout menerima variabel <code>$content</code>.</td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="alert-custom alert-success-custom mt-3">
                    <i class="bi bi-lightbulb-fill"></i>
                    <div>
                        <strong>Cara Kerja Layout:</strong> File layout menerima variabel <code>$content</code> yang berisi hasil render view.
                        Di layout, tampilkan dengan <code>&lt;?= $content ?&gt;</code>.
                    </div>
                </div>
            </div>
        </div>
        
        <!-- view() helper -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#059669;">
                    <i class="bi bi-lightning-charge"></i> view() Helper
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Shortcut function untuk return view (biasanya di route closure).</p>
                <div class="code-block">
                    <pre><code>// Di route
Route::get('/users', function() {
    $users = User::all();
    return view('users/index', [
        'title' => 'Users',
        'users' => $users,
    ]);
});

// Equivalent dengan View::render()
// Tapi view() mengembalikan string, bukan echo langsung</code></pre>
                </div>
            </div>
        </div>
        
        <!-- View::render() vs view() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#059669;">
                    <i class="bi bi-arrow-left-right"></i> View::render() vs view()
                </h5>
                <div style="overflow-x:auto;">
                    <table class="table-custom">
                        <thead>
                            <tr><th style="width:25%;">Method</th><th style="width:30%;">Behavior</th><th style="width:45%;">Best For</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>View::render()</code></td>
                                <td>Echo langsung + exit</td>
                                <td>Controller actions yang langsung menampilkan halaman</td>
                            </tr>
                            <tr>
                                <td><code>view()</code></td>
                                <td>Return string</td>
                                <td>Route closures yang return response</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- redirectTo() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#059669;">
                    <i class="bi bi-arrow-right-circle"></i> View::redirectTo()
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Redirect user ke URL lain.</p>
                <div class="code-block">
                    <pre><code>// Redirect ke path
View::redirectTo('/users');

// Redirect ke URL lengkap
View::redirectTo('https://google.com');

// Redirect pakai helper global
redirect('/users');
redirect('/dashboard');</code></pre>
                </div>
            </div>
        </div>
        
        <!-- error() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#dc2626;">
                    <i class="bi bi-exclamation-triangle"></i> View::error()
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Menampilkan halaman error.</p>
                <div class="code-block">
                    <pre><code>// 404 Not Found
View::error(404);

// 500 Internal Server Error
View::error(500);

// 403 Forbidden
View::error(403);

// Custom error page
View::error(419);  // CSRF Token Mismatch</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Partial Views -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Partial Views
    </div>
    <div class="card-body-custom">
        <p>Include view kecil di dalam view lain untuk komponen yang reusable (header, sidebar, footer, dll).</p>
        
        <div class="code-block">
            <pre><code>// Syntax
partial(string $view, array $data = []): void

// Contoh di view
&lt;?php partial('components/header', ['title' => $title]); ?&gt;
&lt;?php partial('components/sidebar'); ?&gt;

&lt;div class="content"&gt;
    &lt;h1&gt;&lt;?= $title ?&gt;&lt;/h1&gt;
&lt;/div&gt;

&lt;?php partial('components/footer'); ?&gt;</code></pre>
        </div>
        
        <div class="alert-custom alert-info-custom mt-2">
            <i class="bi bi-info-circle-fill"></i>
            <div>
                <strong>Best Practice:</strong> Gunakan partial untuk:
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li>Header & footer yang dipakai di banyak halaman</li>
                    <li>Sidebar navigasi</li>
                    <li>Card component yang berulang</li>
                    <li>Alert / flash message</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Complete Example
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Controller</h6>
                <div class="code-block" style="max-height:400px;overflow-y:auto;">
                    <pre><code>namespace App\Controllers;

use App\Models\User;
use Bpjs\Framework\Helpers\View;

class UserController
{
    public function index()
    {
        $users = User::all();
        
        View::render('users/index', [
            'title' => 'Data Users',
            'users' => $users,
        ], 'layouts/app');
    }

    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return View::error(404);
        }
        
        View::render('users/show', [
            'title' => 'Detail User',
            'user'  => $user,
        ], 'layouts/app');
    }

    public function store($request)
    {
        User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        
        View::redirectTo('/users');
    }
}</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">View (users/index.php)</h6>
                <div class="code-block" style="max-height:400px;overflow-y:auto;">
                    <pre><code>&lt;!-- resources/views/users/index.php --&gt;

&lt;?php partial('components/header', ['title' => $title]); ?&gt;

&lt;div class="container"&gt;
    &lt;h1&gt;&lt;?= $title ?&gt;&lt;/h1&gt;
    
    &lt;a href="/users/create" class="btn btn-primary"&gt;
        Tambah User
    &lt;/a&gt;
    
    &lt;table class="table"&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th&gt;ID&lt;/th&gt;
                &lt;th&gt;Name&lt;/th&gt;
                &lt;th&gt;Email&lt;/th&gt;
                &lt;th&gt;Action&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;?php foreach ($users as $user): ?&gt;
            &lt;tr&gt;
                &lt;td&gt;&lt;?= $user-&gt;id ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $user-&gt;name ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $user-&gt;email ?&gt;&lt;/td&gt;
                &lt;td&gt;
                    &lt;a href="/users/&lt;?= $user-&gt;id ?&gt;"&gt;
                        View
                    &lt;/a&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;?php endforeach; ?&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
&lt;/div&gt;

&lt;?php partial('components/footer'); ?&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Methods Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-book text-warning"></i> Methods Reference
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Method</th><th>Deskripsi</th><th>Contoh</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>View::render()</code></td>
                        <td>Render view dengan data & layout</td>
                        <td><code>View::render('user/index', $data, 'layouts/app')</code></td>
                    </tr>
                    <tr>
                        <td><code>view()</code></td>
                        <td>Return view sebagai string</td>
                        <td><code>return view('welcome', ['title' => 'Home'])</code></td>
                    </tr>
                    <tr>
                        <td><code>View::redirectTo()</code></td>
                        <td>Redirect ke URL</td>
                        <td><code>View::redirectTo('/users')</code></td>
                    </tr>
                    <tr>
                        <td><code>redirect()</code></td>
                        <td>Redirect helper global</td>
                        <td><code>redirect('/dashboard')</code></td>
                    </tr>
                    <tr>
                        <td><code>View::error()</code></td>
                        <td>Tampilkan halaman error</td>
                        <td><code>View::error(404)</code></td>
                    </tr>
                    <tr>
                        <td><code>partial()</code></td>
                        <td>Include partial view</td>
                        <td><code>partial('components/header', $data)</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #059669, #34d399); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Complete the MVC</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Sekarang kamu sudah paham Model, View, dan Controller. Saatnya membangun!</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('controller') ?>" style="background:white;color:#059669;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('new-model') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-box"></i> Model →
            </a>
            <a href="<?= route('route') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
        </div>
    </div>
</div>