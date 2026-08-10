<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #f97316); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🛡️</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">CSRF Protection</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Cross-Site Request Forgery protection. Amankan form dan transaksi dari serangan CSRF.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-shield-check text-danger"></i> What is CSRF?
    </div>
    <div class="card-body-custom">
        <p><strong>CSRF</strong> (Cross-Site Request Forgery) adalah serangan di mana attacker membuat user yang sudah login melakukan aksi yang tidak diinginkan. CSRF token mencegah ini dengan memverifikasi bahwa request benar-benar berasal dari form aplikasi kamu, bukan dari situs lain.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #fecaca;background:#fff5f5;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">⚠️</div>
                        <div style="font-weight:700;color:#dc2626;margin-top:0.5rem;">Without CSRF</div>
                        <div style="font-size:0.85rem;color:#64748b;">Attacker bisa submit form dari situs lain</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #bbf7d0;background:#f0fdf4;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">✅</div>
                        <div style="font-weight:700;color:#059669;margin-top:0.5rem;">With CSRF</div>
                        <div style="font-size:0.85rem;color:#64748b;">Hanya form dari aplikasi kamu yang valid</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>CSRF protection <strong>otomatis aktif</strong> untuk semua method <strong>POST, PUT, PATCH, DELETE</strong> di Route. Tidak perlu konfigurasi tambahan.</div>
        </div>
    </div>
</div>

<!-- View Implementation -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        CSRF in View (Form)
    </div>
    <div class="card-body-custom">
        <p>Tambahkan <code>&lt;?= csrf() ?&gt;</code> di dalam form untuk generate hidden input dengan CSRF token:</p>
        
        <h5 style="font-weight:700;">Basic Form:</h5>
        <div class="code-block">
            <pre><code>&lt;form action="&lt;?= url('/store') ?&gt;" method="POST"&gt;
    &lt;?= csrf() ?&gt;

    &lt;div class="mb-3"&gt;
        &lt;label&gt;Nama&lt;/label&gt;
        &lt;input type="text" name="username" class="form-control"&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;label&gt;Email&lt;/label&gt;
        &lt;input type="email" name="email" class="form-control" required&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;label&gt;Password&lt;/label&gt;
        &lt;input type="password" name="password" class="form-control" required&gt;
    &lt;/div&gt;

    &lt;button type="submit" class="btn btn-primary"&gt;Submit&lt;/button&gt;
&lt;/form&gt;</code></pre>
        </div>
        
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div><code>csrf()</code> otomatis menghasilkan: <code>&lt;input type="hidden" name="_token" value="random_token_here"&gt;</code></div>
        </div>
    </div>
</div>

<!-- AJAX Implementation -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        CSRF in AJAX Requests
    </div>
    <div class="card-body-custom">
        <p>Untuk AJAX request, kirim token via header <code>X-CSRF-TOKEN</code>:</p>
        
        <div class="row g-3">
            <div class="col-md-6">
                <h5 style="font-weight:700;">Using Fetch API:</h5>
                <div class="code-block">
                    <pre><code>fetch('/api/users', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '&lt;?= csrfToken() ?&gt;',
    },
    body: JSON.stringify({
        name: 'John',
        email: 'john@mail.com',
    }),
})
.then(res => res.json())
.then(data => console.log(data));</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h5 style="font-weight:700;">Using jQuery:</h5>
                <div class="code-block">
                    <pre><code>$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '&lt;?= csrfToken() ?&gt;'
    }
});

$.post('/api/users', {
    name: 'John',
    email: 'john@mail.com',
}, function(data) {
    console.log(data);
});</code></pre>
                </div>
            </div>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Meta Tag (untuk SPA):</h5>
        <div class="code-block">
            <pre><code>&lt;!-- Di layout head --&gt;
&lt;meta name="csrf-token" content="&lt;?= csrfToken() ?&gt;"&gt;

&lt;!-- Di JavaScript --&gt;
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

fetch('/api/data', {
    headers: {
        'X-CSRF-TOKEN': token,
    },
});</code></pre>
        </div>
    </div>
</div>

<!-- Controller Validation -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        CSRF Validation in Controller
    </div>
    <div class="card-body-custom">
        <p>CSRF token <strong>otomatis divalidasi oleh Route</strong> untuk semua POST/PUT/PATCH/DELETE request. Jika token invalid, response akan dikembalikan dengan status <strong>419</strong>.</p>
        
        <div class="code-block">
            <pre><code>// CSRF dicek otomatis — tidak perlu validasi manual
Route::post('/users', [UserController::class, 'store']);

// Jika token invalid, otomatis return 419 response
// Response: "Invalid CSRF Token" dengan status 419</code></pre>
        </div>
        
        <div class="alert-custom alert-warning-custom mt-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div>
                <strong>Token Invalid?</strong> Pastikan:
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li>Form memiliki <code>&lt;?= csrf() ?&gt;</code></li>
                    <li>AJAX mengirim header <code>X-CSRF-TOKEN</code></li>
                    <li>Session masih aktif (belum expired)</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- CSRF Helpers Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-tools text-warning"></i> CSRF Helper Functions
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Helper</th><th>Output</th><th>Use Case</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>csrf()</code></td>
                        <td>HTML hidden input</td>
                        <td>Di dalam <code>&lt;form&gt;</code> HTML</td>
                    </tr>
                    <tr>
                        <td><code>csrfToken()</code></td>
                        <td>String token</td>
                        <td>AJAX header, meta tag, atau manual</td>
                    </tr>
                    <tr>
                        <td><code>csrfHeader()</code></td>
                        <td>String token (generate jika belum ada)</td>
                        <td>Generate token untuk session</td>
                    </tr>
                    <tr>
                        <td><code>verifyCsrfToken($token)</code></td>
                        <td>bool</td>
                        <td>Validasi manual (jarang digunakan)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Complete Example
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">View (form.blade.php style):</h6>
                <div class="code-block" style="max-height:350px;overflow-y:auto;">
                    <pre><code>&lt;!-- resources/views/users/create.php --&gt;
&lt;form action="&lt;?= route('users.store') ?&gt;" method="POST"&gt;
    &lt;?= csrf() ?&gt;

    &lt;div class="mb-3"&gt;
        &lt;label for="name"&gt;Nama&lt;/label&gt;
        &lt;input type="text" name="name" id="name"
               class="form-control" required&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;label for="email"&gt;Email&lt;/label&gt;
        &lt;input type="email" name="email" id="email"
               class="form-control" required&gt;
    &lt;/div&gt;

    &lt;div class="mb-3"&gt;
        &lt;label for="password"&gt;Password&lt;/label&gt;
        &lt;input type="password" name="password" id="password"
               class="form-control" required&gt;
    &lt;/div&gt;

    &lt;button type="submit" class="btn btn-success"&gt;
        Simpan
    &lt;/button&gt;
&lt;/form&gt;</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Controller (UserController.php):</h6>
                <div class="code-block" style="max-height:350px;overflow-y:auto;">
                    <pre><code>namespace App\Controllers;

use App\Models\User;
use Bpjs\Framework\Core\Request;

class UserController
{
    public function store(Request $request)
    {
        // CSRF token DIVALIDASI OTOMATIS oleh Route
        // Tidak perlu cek manual!

        // Validasi input
        $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($request->fails()) {
            Session::setFlash('errors', $request->errors());
            redirect('/users/create');
        }

        // Simpan user
        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => password_hash(
                $request->input('password'),
                PASSWORD_BCRYPT
            ),
        ]);

        Session::setFlash('success', 'User berhasil dibuat');
        redirect('/users');
    }
}</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #f97316); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Secure All The Things</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan CSRF dengan Auth & CORS untuk keamanan maksimal.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('auth') ?>" style="background:white;color:#dc2626;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
            </a>
            <a href="<?= route('cors') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-globe"></i> CORS →
            </a>
            <a href="<?= route('crypto') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-lock"></i> Crypto →
            </a>
        </div>
    </div>
</div>