<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📥</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Request Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Ambil input data, file upload, headers, dan informasi request lainnya dengan aman.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Import -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0ea5e9;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Core\Request;</code></pre>
        </div>
        <p style="font-size:0.8rem;color:#64748b;">Request otomatis di-inject ke controller method. Tidak perlu instantiate manual.</p>
    </div>
</div>

<!-- Input Data -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-keyboard text-primary"></i> Input Data
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">all()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Semua input + file</p>
                        <div class="code-block"><pre><code>$data = $request->all();</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">input()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Satu input dengan default</p>
                        <div class="code-block"><pre><code>$name = $request->input('name');
$name = $request->input('name', 'guest');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">only()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Ambil input tertentu</p>
                        <div class="code-block"><pre><code>$data = $request->only(['name', 'email']);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Dot Notation</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Akses nested array/object</p>
                        <div class="code-block"><pre><code>$city = $request->input('address.city');
$zip  = $request->input('profile.address.zip');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Magic Getter</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Akses input seperti property</p>
                        <div class="code-block"><pre><code>$email = $request->email;
$name  = $request->name;</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- File Upload -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-file-earmark-arrow-up text-success"></i> File Upload
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-3">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">hasFile()</h6>
                        <div class="code-block"><pre><code>if ($request->hasFile('avatar')) {
    // upload file
}</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">file()</h6>
                        <div class="code-block"><pre><code>$file = $request->file('avatar');
// ['name','tmp_name','size','type','error']</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">File Name</h6>
                        <div class="code-block"><pre><code>$name = $request->getClientOriginalName('avatar');
$ext  = $request->getClientOriginalExtension('avatar');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">Mime Type</h6>
                        <div class="code-block"><pre><code>$mime = $request->getClientMimeType('avatar');
// image/png, application/pdf, dll</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
        
        <h6 style="font-weight:700;margin-top:1rem;">Complete Upload Example:</h6>
        <div class="code-block">
            <pre><code>public function uploadAvatar(Request $request)
{
    if (!$request->hasFile('avatar')) {
        return Api::error('File tidak ditemukan', 400);
    }

    $allowed = ['image/jpeg', 'image/png', 'image/gif'];
    $mime = $request->getClientMimeType('avatar');

    if (!in_array($mime, $allowed)) {
        return Api::error('Format file tidak diizinkan', 422);
    }

    $filename = uniqid() . '.' . $request->getClientOriginalExtension('avatar');
    $path = storage_path('avatars/');
    
    if (!is_dir($path)) mkdir($path, 0777, true);
    
    store($request->file('avatar')['tmp_name'], $path, $filename);

    return Api::success(['filename' => $filename], 'Upload berhasil');
}</code></pre>
        </div>
    </div>
</div>

<!-- Headers & Request Info -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-cloud-arrow-down text-info"></i> Headers & Request Info
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>// Single header
$token = $request->header('Authorization');

// All headers
$headers = $request->headers();

// Request method
$method = $request->method();   // GET, POST, PUT, DELETE

// URI & URL
$uri = $request->uri();         // /users/1
$url = $request->fullUrl();     // http://localhost/users/1

// Client info
$ip        = $request->ip();
$userAgent = $request->userAgent();
$isSecure  = $request->isSecure();   // HTTPS?</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-check-circle text-success"></i> Content Type Detection
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>// Cek JSON request
if ($request->isJson()) {
    // handle JSON request
}

// Cek AJAX request
if (Request::isAjax()) {
    // handle AJAX request
}

// Cek expects JSON response
if ($request->expectsJson()) {
    // return JSON response
}

// Cek specific method
if ($request->isMethod('POST')) {
    // handle POST
}</code></pre>
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
                <thead><tr><th>Category</th><th>Methods</th></tr></thead>
                <tbody>
                    <tr><td><strong>Input</strong></td><td><code>all()</code>, <code>input($key, $default?)</code>, <code>only($keys)</code>, <code>except($keys)</code>, <code>get($key)</code></td></tr>
                    <tr><td><strong>File</strong></td><td><code>hasFile($key)</code>, <code>file($key)</code>, <code>getClientOriginalName($key)</code>, <code>getClientOriginalExtension($key)</code>, <code>getClientMimeType($key)</code>, <code>getSize($key)</code></td></tr>
                    <tr><td><strong>Header</strong></td><td><code>header($key, $default?)</code>, <code>headers()</code>, <code>hasHeader($key)</code>, <code>bearerToken()</code></td></tr>
                    <tr><td><strong>Info</strong></td><td><code>method()</code>, <code>isMethod($m)</code>, <code>uri()</code>, <code>fullUrl()</code>, <code>baseUrl()</code>, <code>path()</code>, <code>ip()</code>, <code>userAgent()</code>, <code>isSecure()</code></td></tr>
                    <tr><td><strong>Detection</strong></td><td><code>isJson()</code>, <code>isAjax()</code>, <code>expectsJson()</code>, <code>isPjax()</code>, <code>isPreflight()</code>, <code>contentType()</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Handle Requests Like a Pro</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Request dengan Validator untuk input yang aman.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('validator') ?>" style="background:white;color:#0ea5e9;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-check-circle"></i> Validator →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('response') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-reply"></i> Response →
            </a>
        </div>
    </div>
</div>