<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #7c3aed, #a78bfa); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🔒</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Crypto Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Enkripsi dan dekripsi data dua arah dengan AES-256-CBC. Amankan data sensitif dengan mudah.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-lock text-purple" style="color:#7c3aed;"></i> What is Crypto?
    </div>
    <div class="card-body-custom">
        <p><strong>Crypto Helper</strong> menyediakan enkripsi dua arah (encrypt & decrypt) menggunakan <strong>AES-256-CBC</strong>. Berbeda dengan hashing (satu arah seperti MD5/SHA), data yang dienkripsi bisa dikembalikan ke bentuk aslinya.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">🔐</div>
                        <div style="font-weight:700;color:#7c3aed;margin-top:0.5rem;">Encrypt</div>
                        <div style="font-size:0.85rem;color:#64748b;">Plain text → Encrypted (base64)</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:2rem;">🔓</div>
                        <div style="font-weight:700;color:#059669;margin-top:0.5rem;">Decrypt</div>
                        <div style="font-size:0.85rem;color:#64748b;">Encrypted → Plain text (original)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Setup -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Setup — Configure Crypto Key
    </div>
    <div class="card-body-custom">
        <p>Sebelum menggunakan Crypto, set <strong>encryption key</strong> di file <code>.env</code>:</p>
        <div class="code-block">
            <pre><code>CRYPTO_KEY=your-unique-secret-key-here</code></pre>
        </div>
        
        <div class="alert-custom alert-warning-custom mt-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div>
                <strong>⚠️ Penting:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li>Gunakan key yang <strong>unik dan panjang</strong> (minimal 32 karakter)</li>
                    <li>Simpan key dengan aman — data <strong>tidak bisa didekripsi</strong> tanpa key ini</li>
                    <li>Jangan commit <code>.env</code> ke Git!</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Import & Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Import & Basic Usage
    </div>
    <div class="card-body-custom">
        <h5 style="font-weight:700;">Import:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Crypto;</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Encrypt:</h5>
        <div class="code-block">
            <pre><code>// Encrypt data
$encrypted = Crypto::encrypt('Hello World');
echo $encrypted;
// Output: base64_encoded_encrypted_string...

// Encrypt array/object
$data = ['user_id' => 1, 'role' => 'admin'];
$encrypted = Crypto::encrypt(json_encode($data));</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Decrypt:</h5>
        <div class="code-block">
            <pre><code>// Decrypt data
$decrypted = Crypto::decrypt($encrypted);
echo $decrypted;
// Output: Hello World

// Decrypt back to array
$data = json_decode(Crypto::decrypt($encrypted), true);
// ['user_id' => 1, 'role' => 'admin']</code></pre>
        </div>
    </div>
</div>

<!-- Real-world Examples -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Real-world Use Cases
    </div>
    <div class="card-body-custom">
        
        <!-- Secure Token -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#7c3aed;">
                    <i class="bi bi-key"></i> Secure URL Token
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Enkripsi data untuk token di URL (password reset, email verification):</p>
                <div class="code-block">
                    <pre><code>// Generate reset password token
$payload = json_encode([
    'user_id' => $user->id,
    'email'   => $user->email,
    'expires' => time() + 3600,  // 1 jam
]);
$token = Crypto::encrypt($payload);

// Kirim link: /reset-password?token={$token}

// Verifikasi token
$decoded = json_decode(Crypto::decrypt($token), true);
if ($decoded && $decoded['expires'] > time()) {
    // Token valid, proses reset password
}</code></pre>
                </div>
            </div>
        </div>
        
        <!-- Encrypt Sensitive Data -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#7c3aed;">
                    <i class="bi bi-shield-lock"></i> Encrypt Sensitive Data
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Enkripsi data sensitif sebelum disimpan ke database:</p>
                <div class="code-block">
                    <pre><code>class UserController
{
    public function store(Request $request)
    {
        $user = new User();
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        
        // Encrypt sensitive data before saving
        $user->nik       = Crypto::encrypt($request->input('nik'));
        $user->phone     = Crypto::encrypt($request->input('phone'));
        $user->bank_info = Crypto::encrypt(json_encode([
            'account_number' => $request->input('account_number'),
            'bank_name'      => $request->input('bank_name'),
        ]));
        
        $user->save();
    }
    
    public function show($id)
    {
        $user = User::find($id);
        
        // Decrypt when reading
        $user->nik       = Crypto::decrypt($user->nik);
        $user->phone     = Crypto::decrypt($user->phone);
        $user->bank_info = json_decode(Crypto::decrypt($user->bank_info), true);
        
        return view('users/show', ['user' => $user]);
    }
}</code></pre>
                </div>
            </div>
        </div>
        
        <!-- API Response Encryption -->
        <div class="card-custom" style="border:1px solid #e2e8f0;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#7c3aed;">
                    <i class="bi bi-cloud-arrow-up"></i> API Response Encryption
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Enkripsi response API untuk keamanan tambahan:</p>
                <div class="code-block">
                    <pre><code>// Encrypt API response
$response = [
    'status' => 200,
    'data'   => $sensitiveData,
];
$encryptedResponse = Crypto::encrypt(json_encode($response));

// Return encrypted response
return Api::success(['payload' => $encryptedResponse]);

// Client-side decrypt (PHP)
$payload = Crypto::decrypt($encryptedResponse);
$data = json_decode($payload, true);</code></pre>
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
                    <tr><th>Method</th><th>Parameters</th><th>Returns</th><th>Description</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>Crypto::encrypt()</code></td>
                        <td>string $data</td>
                        <td>string</td>
                        <td>Enkripsi data dengan AES-256-CBC. Output base64 encoded.</td>
                    </tr>
                    <tr>
                        <td><code>Crypto::decrypt()</code></td>
                        <td>string $encryptedData</td>
                        <td>string</td>
                        <td>Dekripsi data yang sebelumnya dienkripsi.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Tips -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-lightbulb text-warning"></i> Best Practices & Tips
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="alert-custom alert-success-custom">
                    <i class="bi bi-check-lg"></i>
                    <div>
                        <strong>DO:</strong>
                        <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                            <li>Gunakan untuk data sensitif (NIK, nomor rekening)</li>
                            <li>Rotate key secara berkala</li>
                            <li>Kombinasikan dengan HTTPS</li>
                            <li>Gunakan key yang panjang & acak</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert-custom alert-danger-custom">
                    <i class="bi bi-x-lg"></i>
                    <div>
                        <strong>DON'T:</strong>
                        <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                            <li>Jangan untuk password — gunakan hashing (bcrypt)</li>
                            <li>Jangan hardcode key di kode</li>
                            <li>Jangan commit <code>.env</code> ke Git</li>
                            <li>Jangan gunakan key yang mudah ditebak</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #7c3aed, #a78bfa); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Keep Your Data Safe</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Crypto dengan Auth & CSRF untuk keamanan maksimal.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('auth') ?>" style="background:white;color:#7c3aed;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
            </a>
            <a href="<?= route('csrf') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-check"></i> CSRF →
            </a>
            <a href="<?= route('char') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-asterisk"></i> Char →
            </a>
        </div>
    </div>
</div>