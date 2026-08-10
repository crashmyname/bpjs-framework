<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🔤</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Char Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Generate UUID, random strings, dan URL-friendly slugs. Zero dependencies, pure PHP.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-purple" style="color:#6366f1;"></i> Overview
    </div>
    <div class="card-body-custom">
        <p><strong>Char Helper</strong> menyediakan fungsi-fungsi utilitas untuk manipulasi karakter dan string. Cocok untuk generate UUID, token acak, dan slug URL — tanpa dependency framework apapun.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-4">
                <div style="background:#f5f3ff;border-radius:10px;padding:1rem;text-align:center;height:100%;">
                    <div style="font-size:2rem;">🆔</div>
                    <div style="font-weight:700;color:#6366f1;margin-top:0.5rem;">UUID v4</div>
                    <div style="font-size:0.8rem;color:#64748b;">Unique identifiers</div>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background:#f0fdf4;border-radius:10px;padding:1rem;text-align:center;height:100%;">
                    <div style="font-size:2rem;">🎲</div>
                    <div style="font-weight:700;color:#059669;margin-top:0.5rem;">Random String</div>
                    <div style="font-size:0.8rem;color:#64748b;">Token, OTP, password</div>
                </div>
            </div>
            <div class="col-md-4">
                <div style="background:#fff7ed;border-radius:10px;padding:1rem;text-align:center;height:100%;">
                    <div style="font-size:2rem;">🔗</div>
                    <div style="font-weight:700;color:#f97316;margin-top:0.5rem;">Slug Generator</div>
                    <div style="font-size:0.8rem;color:#64748b;">URL-friendly strings</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Import -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#6366f1;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import
    </div>
    <div class="card-body-custom">
        <p>Import Char helper di file yang membutuhkan:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Char;</code></pre>
        </div>
    </div>
</div>

<!-- uuid() -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#6366f1;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        uuid() — Generate UUID v4
    </div>
    <div class="card-body-custom">
        <p>Generate <strong>UUID versi 4</strong> (random). Format: <code>xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx</code></p>
        
        <h6 style="font-weight:600;">Signature:</h6>
        <div class="code-block">
            <pre><code>Char::uuid(): string</code></pre>
        </div>
        
        <h6 style="font-weight:600;margin-top:1rem;">Example:</h6>
        <div class="code-block">
            <pre><code>$uuid = Char::uuid();
echo $uuid;
// Output: 3f4a3fc0-98c7-4f25-a2cb-87de1d983092</code></pre>
        </div>
        
        <div class="row g-3 mt-3">
            <div class="col-md-6">
                <div class="alert-custom alert-success-custom">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <strong>Use Cases:</strong>
                        <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                            <li>Primary key database</li>
                            <li>Unique file names</li>
                            <li>Transaction references</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert-custom alert-info-custom">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>
                        <strong>Specs:</strong>
                        <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                            <li>Version: 4 (random)</li>
                            <li>Length: 36 characters</li>
                            <li>Collision probability: near zero</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- random() -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#6366f1;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        random() — Generate Random String
    </div>
    <div class="card-body-custom">
        <p>Generate string alfanumerik acak. Cocok untuk <strong>token, kode OTP, password sementara, atau ID unik</strong>.</p>
        
        <h6 style="font-weight:600;">Signature:</h6>
        <div class="code-block">
            <pre><code>Char::random(int $length = 16): string</code></pre>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-6">
                <h6 style="font-weight:600;">Basic:</h6>
                <div class="code-block">
                    <pre><code>$token = Char::random(10);
echo $token;
// Output: Ab9dKjL2Mx</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:600;">Real-world Examples:</h6>
                <div class="code-block">
                    <pre><code>// Token reset password (64 chars)
$resetToken = Char::random(64);

// Kode OTP (6 digit) — untuk angka saja
$otp = random_int(100000, 999999);

// API key
$apiKey = 'sk_' . Char::random(32);</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- slug() -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#6366f1;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        slug() — Generate URL-friendly Slug
    </div>
    <div class="card-body-custom">
        <p>Konversi string menjadi format <strong>slug</strong> yang aman untuk URL. Menghapus karakter khusus, mengganti spasi dengan dash, dan lowercase.</p>
        
        <h6 style="font-weight:600;">Signature:</h6>
        <div class="code-block">
            <pre><code>Char::slug(string $text, string $separator = '-'): string</code></pre>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-6">
                <h6 style="font-weight:600;">Basic:</h6>
                <div class="code-block">
                    <pre><code>$slug = Char::slug('Judul Artikel Laravel');
echo $slug;
// Output: judul-artikel-laravel</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:600;">Dengan karakter khusus:</h6>
                <div class="code-block">
                    <pre><code>$slug = Char::slug('Apa itu PHP 8.1? (Update Terbaru)');
echo $slug;
// Output: apa-itu-php-8-1-update-terbaru</code></pre>
                </div>
            </div>
        </div>
        
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div>
                <strong>Use Cases:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li>URL artikel blog: <code>/blog/judul-artikel-laravel</code></li>
                    <li>Product page: <code>/product/sepatu-lari-nike</code></li>
                    <li>Username normalizer</li>
                </ul>
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
                    <tr><th>Method</th><th>Parameters</th><th>Returns</th><th>Example Output</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>Char::uuid()</code></td>
                        <td>—</td>
                        <td>string (36)</td>
                        <td><code>3f4a3fc0-98c7-4f25-a2cb-87de1d983092</code></td>
                    </tr>
                    <tr>
                        <td><code>Char::random()</code></td>
                        <td>int $length = 16</td>
                        <td>string</td>
                        <td><code>Ab9dKjL2Mx</code></td>
                    </tr>
                    <tr>
                        <td><code>Char::slug()</code></td>
                        <td>string $text, string $separator = '-'</td>
                        <td>string</td>
                        <td><code>judul-artikel-laravel</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#6366f1;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Complete Example: Blog Post Creation
    </div>
    <div class="card-body-custom">
        <p>Contoh penggunaan Char helper dalam controller untuk membuat blog post:</p>
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>use Bpjs\Framework\Helpers\Char;
use App\Models\Post;

class PostController
{
    public function store(Request $request)
    {
        $post = new Post();
        
        // Generate UUID sebagai primary key
        $post->id = Char::uuid();
        
        // Generate slug dari judul
        $post->slug = Char::slug($request->input('title'));
        
        // Generate token untuk share link
        $post->share_token = Char::random(32);
        
        $post->title   = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        
        return redirect('/posts/' . $post->slug);
    }
}</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #6366f1, #8b5cf6); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">More String Utilities</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Explore other helpers for your development needs.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('crypto') ?>" style="background:white;color:#6366f1;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-lock"></i> Crypto →
            </a>
            <a href="<?= route('date') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-calendar"></i> Date →
            </a>
            <a href="<?= route('validator') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-check-circle"></i> Validator →
            </a>
        </div>
    </div>
</div>