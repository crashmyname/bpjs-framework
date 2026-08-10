<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #7c3aed, #a78bfa); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">💾</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Session Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Simpan data sementara di server selama user aktif. User login, flash messages, dan data temporary.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-purple" style="color:#7c3aed;"></i> What is Session?
    </div>
    <div class="card-body-custom">
        <p><strong>Session</strong> menyimpan data user di server selama mereka aktif. Data tetap ada antar request sampai session expired atau dihapus. Cocok untuk: <strong>user login, flash messages, keranjang belanja, form wizard</strong>.</p>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-gear"></i>
            <div>Session dikonfigurasi di <code>.env</code>: <code>SESSION_LIFETIME=120</code>, <code>SESSION_DRIVER=file</code></div>
        </div>
    </div>
</div>

<!-- Basic Operations -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Basic Session Operations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-3 col-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#059669;">Set</h6>
                        <div class="code-block"><pre><code>Session::set('nama', 'Fervian');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#2563eb;">Get</h6>
                        <div class="code-block"><pre><code>$nama = Session::get('nama');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#f59e0b;">Has</h6>
                        <div class="code-block"><pre><code>if (Session::has('nama')) {
    echo 'Session ada';
}</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#0ea5e9;">All</h6>
                        <div class="code-block"><pre><code>$all = Session::all();</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Remove Operations -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Remove & Destroy
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#f59e0b;">remove()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Hapus satu key</p>
                        <div class="code-block"><pre><code>Session::remove('nama');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#dc2626;">unset()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Unset satu key (alias)</p>
                        <div class="code-block"><pre><code>Session::unset('nama');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;color:#991b1b;">destroy()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Hapus semua session</p>
                        <div class="code-block"><pre><code>Session::destroy();</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- User Session -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        User Session
    </div>
    <div class="card-body-custom">
        <p>Simpan dan ambil data user yang sedang login:</p>
        
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Set User Session:</h6>
                <div class="code-block">
                    <pre><code>// Di AuthController setelah login berhasil
$user = User::find(1);
Session::set('user', $user);</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Get User Session:</h6>
                <div class="code-block">
                    <pre><code>// Di controller atau view
$user = Session::user();
echo $user->name;     // "Fervian"
echo $user->email;    // "fervian@mail.com"</code></pre>
                </div>
            </div>
        </div>
        
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div><code>Session::user()</code> adalah shortcut untuk <code>Session::get('user')</code>. Return <code>null</code> jika user belum login.</div>
        </div>
    </div>
</div>

<!-- Flash Messages -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Flash Messages
    </div>
    <div class="card-body-custom">
        <p><strong>Flash messages</strong> adalah session yang hanya bertahan untuk <strong>satu request berikutnya</strong>, lalu otomatis terhapus. Cocok untuk notifikasi sukses/error setelah redirect.</p>
        
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Set Flash (Controller):</h6>
                <div class="code-block">
                    <pre><code>// Setelah menyimpan data
Session::flash('success', 'Data berhasil disimpan');
redirect('/users');

// Atau error
Session::flash('error', 'Gagal menyimpan data');
redirect('/users/create');</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Get Flash (View):</h6>
                <div class="code-block">
                    <pre><code>// Cek & tampilkan flash message
if (Session::hasFlash('success')) {
    echo '&lt;div class="alert alert-success"&gt;';
    echo Session::flash('success');
    echo '&lt;/div&gt;';
}

if (Session::hasFlash('error')) {
    echo '&lt;div class="alert alert-danger"&gt;';
    echo Session::flash('error');
    echo '&lt;/div&gt;';
}</code></pre>
                </div>
            </div>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>Flash message <strong>otomatis terhapus</strong> setelah diakses dengan <code>Session::flash()</code>. <code>Session::hasFlash()</code> hanya mengecek tanpa menghapus.</div>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Complete Example: Login Flow
    </div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>class AuthController
{
    public function login(Request $request)
    {
        $user = User::query()
            ->where('email', '=', $request->input('email'))
            ->first();

        if (!$user || !password_verify($request->input('password'), $user->password)) {
            Session::flash('error', 'Email atau password salah');
            redirect('/login');
        }

        // Set user session
        Session::set('user', $user);
        Session::flash('success', 'Selamat datang, ' . $user->name);
        redirect('/dashboard');
    }

    public function logout()
    {
        Session::destroy();
        redirect('/login');
    }
}

// Di view dashboard.php
$user = Session::user();
if (!$user) {
    redirect('/login');
}
echo 'Welcome, ' . $user->name;

// Tampilkan flash message
if (Session::hasFlash('success')) {
    echo '&lt;div class="alert alert-success"&gt;' . Session::flash('success') . '&lt;/div&gt;';
}</code></pre>
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
                <thead><tr><th>Method</th><th>Description</th><th>Example</th></tr></thead>
                <tbody>
                    <tr><td><code>Session::set($k, $v)</code></td><td>Simpan data ke session</td><td><code>Session::set('user', $user)</code></td></tr>
                    <tr><td><code>Session::get($k)</code></td><td>Ambil data dari session</td><td><code>Session::get('user')</code></td></tr>
                    <tr><td><code>Session::has($k)</code></td><td>Cek apakah key ada</td><td><code>Session::has('user')</code></td></tr>
                    <tr><td><code>Session::all()</code></td><td>Ambil semua session data</td><td><code>Session::all()</code></td></tr>
                    <tr><td><code>Session::remove($k)</code></td><td>Hapus satu key</td><td><code>Session::remove('temp')</code></td></tr>
                    <tr><td><code>Session::unset($k)</code></td><td>Unset satu key (alias)</td><td><code>Session::unset('temp')</code></td></tr>
                    <tr><td><code>Session::destroy()</code></td><td>Hapus semua session</td><td><code>Session::destroy()</code></td></tr>
                    <tr><td><code>Session::user()</code></td><td>Shortcut get user session</td><td><code>$user = Session::user()</code></td></tr>
                    <tr><td><code>Session::flash($k, $v)</code></td><td>Set flash message</td><td><code>Session::flash('success', 'OK')</code></td></tr>
                    <tr><td><code>Session::hasFlash($k)</code></td><td>Cek flash message ada</td><td><code>Session::hasFlash('error')</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #7c3aed, #a78bfa); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Session Ready!</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Session dengan Auth Middleware untuk autentikasi yang aman.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('auth') ?>" style="background:white;color:#7c3aed;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
            </a>
            <a href="<?= route('csrf') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-check"></i> CSRF →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
        </div>
    </div>
</div>