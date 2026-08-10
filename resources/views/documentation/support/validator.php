<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #059669, #34d399); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">✅</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Validator</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Validasi input user dengan aturan yang ekspresif. Form, file upload, email, password, dan custom rules.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Basic Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Basic Usage
    </div>
    <div class="card-body-custom">
        <p>Gunakan <code>Validator::make()</code> dengan data dan aturan validasi:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Validator;

$errors = Validator::make($_POST, [
    'name'  => 'required|min:3|max:100',
    'email' => 'required|email',
]);

if (!empty($errors)) {
    return Api::error('Validasi gagal', 422, $errors);
}</code></pre>
        </div>
    </div>
</div>

<!-- Validation Rules -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Available Validation Rules
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">required</h6>
                        <div class="code-block"><pre><code>'username' => 'required'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">min / max</h6>
                        <div class="code-block"><pre><code>'username' => 'min:3|max:50'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">numeric</h6>
                        <div class="code-block"><pre><code>'age' => 'numeric'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">email</h6>
                        <div class="code-block"><pre><code>'email' => 'email'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">confirmed</h6>
                        <div class="code-block"><pre><code>'password' => 'confirmed:password_confirmation'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">age</h6>
                        <div class="code-block"><pre><code>'birthdate' => 'age:18'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">regex</h6>
                        <div class="code-block"><pre><code>'phone' => 'regex:/^[0-9]+$/'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">date</h6>
                        <div class="code-block"><pre><code>'tanggal' => 'date:Y-m-d'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">alphanumeric</h6>
                        <div class="code-block"><pre><code>'username' => 'alphanumeric'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">unique</h6>
                        <div class="code-block"><pre><code>'email' => 'unique:users'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">password</h6>
                        <div class="code-block"><pre><code>'password' => 'password'</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">inArray</h6>
                        <div class="code-block"><pre><code>'status' => 'inArray:aktif,nonaktif,pending'</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- File Validation -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        File & Image Validation
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">File Upload:</h6>
                <div class="code-block">
                    <pre><code>$errors = Validator::make($_FILES, [
    'document' => 'file:application/pdf|max:2048',
]);

// Rules:
// file:{mime_type}  — validasi tipe file
// max:{size}        — max size dalam KB</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Image Upload:</h6>
                <div class="code-block">
                    <pre><code>$errors = Validator::make($_FILES, [
    'photo' => 'image:image/png,image/jpeg|max:2048|minWidth:300|minHeight:300',
]);

// Image-specific rules:
// image:{types}     — validasi tipe gambar
// minWidth:{px}     — lebar minimal
// minHeight:{px}    — tinggi minimal</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Messages -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Custom Error Messages
    </div>
    <div class="card-body-custom">
        <p>Override pesan error default dengan parameter ketiga:</p>
        <div class="code-block">
            <pre><code>$errors = Validator::make($_POST, [
    'email' => 'required|email',
], [
    'email.required' => 'Email wajib diisi',
    'email.email'    => 'Format email tidak valid',
]);

// Format key: {field}.{rule}
// Contoh: 'name.required', 'password.min', 'photo.max'</code></pre>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Complete Validation Example
    </div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:450px;overflow-y:auto;">
            <pre><code>use Bpjs\Framework\Helpers\Validator;

class UserController
{
    public function store(Request $request)
    {
        // Validasi input
        $errors = Validator::make($request->all(), [
            'name'     => 'required|min:3|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed:password_confirmation',
            'age'      => 'numeric|min:1|max:120',
            'phone'    => 'regex:/^[0-9]{10,13}$/',
            'status'   => 'inArray:active,inactive,pending',
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.unique'  => 'Email sudah terdaftar',
        ]);

        // Jika ada error
        if (!empty($errors)) {
            Session::flash('errors', $errors);
            Session::flash('old', $request->all());
            redirect('/users/create');
        }

        // Simpan data
        User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_BCRYPT),
        ]);

        Session::flash('success', 'User berhasil dibuat');
        redirect('/users');
    }

    public function uploadAvatar(Request $request)
    {
        $errors = Validator::make($_FILES, [
            'avatar' => 'image:image/png,image/jpeg|max:2048|minWidth:200|minHeight:200',
        ], [
            'avatar.image' => 'File harus berupa gambar (PNG/JPEG)',
            'avatar.max'   => 'Ukuran maksimal 2MB',
        ]);

        if (!empty($errors)) {
            return Api::error('Validasi gagal', 422, $errors);
        }

        // Proses upload...
    }
}</code></pre>
        </div>
    </div>
</div>

<!-- Rules Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-book text-warning"></i> Rules Reference
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Rule</th><th>Example</th><th>Description</th></tr></thead>
                <tbody>
                    <tr><td><code>required</code></td><td><code>'name' => 'required'</code></td><td>Field wajib diisi</td></tr>
                    <tr><td><code>min:{n}</code></td><td><code>'name' => 'min:3'</code></td><td>Panjang/ukuran minimal</td></tr>
                    <tr><td><code>max:{n}</code></td><td><code>'name' => 'max:100'</code></td><td>Panjang/ukuran maksimal</td></tr>
                    <tr><td><code>numeric</code></td><td><code>'age' => 'numeric'</code></td><td>Harus angka</td></tr>
                    <tr><td><code>email</code></td><td><code>'email' => 'email'</code></td><td>Format email valid</td></tr>
                    <tr><td><code>confirmed:{field}</code></td><td><code>'pass' => 'confirmed:pass_conf'</code></td><td>Cocok dengan field konfirmasi</td></tr>
                    <tr><td><code>age:{n}</code></td><td><code>'birth' => 'age:18'</code></td><td>Minimal umur (tahun)</td></tr>
                    <tr><td><code>regex:{pattern}</code></td><td><code>'phone' => 'regex:/^[0-9]+$/'</code></td><td>Validasi dengan regex</td></tr>
                    <tr><td><code>date:{format}</code></td><td><code>'date' => 'date:Y-m-d'</code></td><td>Format tanggal</td></tr>
                    <tr><td><code>alphanumeric</code></td><td><code>'user' => 'alphanumeric'</code></td><td>Hanya huruf & angka</td></tr>
                    <tr><td><code>unique:{table}</code></td><td><code>'email' => 'unique:users'</code></td><td>Unik di tabel database</td></tr>
                    <tr><td><code>password</code></td><td><code>'pass' => 'password'</code></td><td>Password kuat (upper, lower, digit, special)</td></tr>
                    <tr><td><code>inArray:{values}</code></td><td><code>'status' => 'inArray:a,b,c'</code></td><td>Nilai harus dalam daftar</td></tr>
                    <tr><td><code>file:{mime}</code></td><td><code>'doc' => 'file:application/pdf'</code></td><td>Validasi tipe file</td></tr>
                    <tr><td><code>image:{types}</code></td><td><code>'img' => 'image:png,jpeg'</code></td><td>Validasi gambar + dimensi</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #059669, #34d399); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Validate Everything</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Validator dengan Request & Response untuk API yang solid.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('request') ?>" style="background:white;color:#059669;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-arrow-down-up"></i> Request →
            </a>
            <a href="<?= route('response') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-reply"></i> Response →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
        </div>
    </div>
</div>