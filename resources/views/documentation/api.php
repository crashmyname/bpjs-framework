<!-- views/dokumentasi/api.php -->

<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #6366f1); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🔌</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">API Router</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    RESTful API routing dengan JSON response otomatis, versioning, rate limiting, token auth, dan CORS.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Features -->
<div class="row g-3 mb-3">
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">📡</div><h6 style="font-weight:700;">JSON-First</h6><p style="font-size:0.75rem;color:#64748b;">Auto JSON response</p></div></div></div>
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🔄</div><h6 style="font-weight:700;">Versioning</h6><p style="font-size:0.75rem;color:#64748b;">v1, v2, scoped</p></div></div></div>
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">⏱️</div><h6 style="font-weight:700;">Rate Limit</h6><p style="font-size:0.75rem;color:#64748b;">Built-in throttle</p></div></div></div>
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🔐</div><h6 style="font-weight:700;">Token Auth</h6><p style="font-size:0.75rem;color:#64748b;">API key / Bearer</p></div></div></div>
</div>

<!-- Inisialisasi -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Inisialisasi
    </div>
    <div class="card-body-custom">
        <p>API router diinisialisasi di <code>routes/api.php</code>:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Api;

// Prefix default "/api"
Api::init('/api');

// Dengan versioning
Api::init('/api', 'v1');</code></pre>
        </div>
    </div>
</div>

<!-- Basic Routes -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Basic Routes
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <h6 style="font-weight:700;">GET</h6>
                <div class="code-block"><pre><code>Api::get('/users', [UserController::class, 'index']);
Api::get('/ping', fn() => Api::success(['time' => time()]));</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;">POST / PUT / DELETE</h6>
                <div class="code-block"><pre><code>Api::post('/users', [UserController::class, 'store']);
Api::put('/users/{id}', [UserController::class, 'update']);
Api::delete('/users/{id}', [UserController::class, 'destroy']);</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;">Match / Any</h6>
                <div class="code-block"><pre><code>Api::match(['GET','POST'], '/users', [UserController::class, 'indexOrStore']);
Api::any('/webhook', [WebhookController::class, 'handle']);</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Resource Routes -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Resource Routes (CRUD Otomatis)
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Usage:</h6>
                <div class="code-block"><pre><code>// Semua routes
Api::resource('users', UserController::class);

// Hanya tertentu
Api::resource('posts', PostController::class, only: ['index', 'show']);

// Dengan middlewares
Api::resource('admin/users', AdminUserController::class, middlewares: [AuthMiddleware::class]);</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Route Mapping:</h6>
                <div style="overflow-x:auto;">
                    <table class="table-custom">
                        <thead><tr><th>Method</th><th>URI</th><th>Action</th><th>Name</th></tr></thead>
                        <tbody>
                            <tr><td><span class="badge-custom badge-get">GET</span></td><td>/users</td><td>index</td><td>users.index</td></tr>
                            <tr><td><span class="badge-custom badge-post">POST</span></td><td>/users</td><td>store</td><td>users.store</td></tr>
                            <tr><td><span class="badge-custom badge-get">GET</span></td><td>/users/{id}</td><td>show</td><td>users.show</td></tr>
                            <tr><td><span class="badge-custom badge-put">PUT</span></td><td>/users/{id}</td><td>update</td><td>users.update</td></tr>
                            <tr><td><span class="badge-custom badge-delete">DELETE</span></td><td>/users/{id}</td><td>destroy</td><td>users.destroy</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Named Routes & where() -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-tag text-info"></i> Named Routes</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>// Register
Api::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');

// Generate URL
Api::route('users.show', ['id' => 5]);
// → /api/users/5

// With query
Api::route('users.show', ['id' => 5], ['include' => 'posts']);
// → /api/users/5?include=posts</code></pre></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-braces text-success"></i> Parameter Validation (where)</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>Api::get('/users/{id}', [UserController::class, 'show'])
    ->where(['id' => '[0-9]+']);

Api::get('/posts/{slug}', [PostController::class, 'show'])
    ->where(['slug' => '[a-z0-9\-]+']);

Api::get('/cat/{cat}/item/{id}', [ItemController::class, 'show'])
    ->where(['cat' => '[a-z]+', 'id' => '[0-9]+']);</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Grouping & Versioning -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-folder text-warning"></i> Grouping & Prefix</div>
            <div class="card-body-custom">
                <h6 style="font-weight:700;">Middleware Group:</h6>
                <div class="code-block"><pre><code>Api::group([AuthMiddleware::class], function () {
    Api::get('/profile', [UserController::class, 'profile']);
});</code></pre></div>
                <h6 style="font-weight:700;margin-top:0.5rem;">Prefix Group:</h6>
                <div class="code-block"><pre><code>Api::prefix('admin', function () {
    Api::get('/users', [AdminController::class, 'users']);
}, middlewares: [AdminMiddleware::class]);
// → /api/admin/users</code></pre></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-git-branch text-info"></i> API Versioning</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>// Global
Api::init('/api', 'v2');

// Scoped
Api::version('v1', function () {
    Api::get('/users', [UserController::class, 'indexV1']);
});

Api::version('v2', function () {
    Api::get('/users', [UserController::class, 'indexV2']);
});</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Rate Limiting & Middlewares -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-speedometer2 text-danger"></i> Rate Limiting & Middlewares</div>
            <div class="card-body-custom">
                <h6 style="font-weight:700;">Rate Limit:</h6>
                <div class="code-block"><pre><code>Api::post('/login', [AuthController::class, 'login'])
    ->limit(3, 60);</code></pre></div>
                <h6 style="font-weight:700;margin-top:0.5rem;">Multiple Middlewares:</h6>
                <div class="code-block"><pre><code>Api::get('/admin/stats', [AdminController::class, 'stats'], [
    AuthMiddleware::class, AdminMiddleware::class
]);</code></pre></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-key text-danger"></i> Token Auth & CORS</div>
            <div class="card-body-custom">
                <h6 style="font-weight:700;">Token Auth (config/api.php):</h6>
                <div class="code-block"><pre><code>'require_token' => true,
'tokens' => ['your-secret-key'],</code></pre></div>
                <h6 style="font-weight:700;margin-top:0.5rem;">CORS:</h6>
                <div class="code-block"><pre><code>'cors' => [
    'allow_origin' => '*',
    'allow_methods' => 'GET, POST, PUT, DELETE',
    'allow_headers' => 'Content-Type, Authorization',
],</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Response Helpers -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-reply text-success"></i> Response Helpers</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom">
                    <h6 style="font-weight:700;color:#059669;">Api::success()</h6>
                    <div class="code-block"><pre><code>return Api::success($user, 'User ditemukan');
// {"statusCode":200,"message":"User ditemukan","data":{...}}</code></pre></div>
                </div></div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom">
                    <h6 style="font-weight:700;color:#dc2626;">Api::error()</h6>
                    <div class="code-block"><pre><code>return Api::error('Unauthorized', 401);
// {"statusCode":401,"error":"Unauthorized"}

return Api::error('Validasi gagal', 422, [
    'name' => ['Name wajib diisi'],
]);</code></pre></div>
                </div></div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom">
                    <h6 style="font-weight:700;color:#2563eb;">Api::paginated()</h6>
                    <div class="code-block"><pre><code>return Api::paginated($data, $total, $page, $perPage);
// {"statusCode":200,"data":[...],"meta":{...}}</code></pre></div>
                </div></div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Error Handlers & Docs -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-exclamation-triangle text-warning"></i> Custom Error Handlers</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>Api::fallback(function (Request $request) {
    return Api::error("Endpoint tidak ditemukan", 404);
});

Api::onError(function (Throwable $e, Request $request) {
    logger('API Error: ' . $e->getMessage());
    return Api::error('Terjadi kesalahan server', 500);
});</code></pre></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-journal-code text-info"></i> Auto Documentation</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>// Route dokumentasi otomatis
Api::get('/docs', function () {
    return Api::success(Api::docs());
});
// Output: semua routes, methods, names, where, middlewares</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Controller Example -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-laptop text-info"></i> Complete Controller Example</div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:450px;overflow-y:auto;">
            <pre><code>namespace App\Controllers\Api;

use App\Models\User;
use Bpjs\Framework\Core\Request;
use Bpjs\Framework\Helpers\Api;

class UserController
{
    public function index()
    {
        return Api::success(User::all(), 'Data users berhasil diambil');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|min:3', 'email' => 'required|email']);
        if ($request->fails()) return Api::error('Validasi gagal', 422, $request->errors());

        $user = User::create($request->only(['name', 'email']));
        return Api::success($user, 'User berhasil dibuat', 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return Api::error('User tidak ditemukan', 404);
        return Api::success($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) return Api::error('User tidak ditemukan', 404);
        $user->name = $request->input('name', $user->name);
        $user->save();
        return Api::success($user, 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return Api::error('User tidak ditemukan', 404);
        $user->delete();
        return Api::success(null, 'User berhasil dihapus');
    }
}</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #6366f1); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Build Your REST API</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan API Router dengan Auth, CORS, dan Rate Limiter.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('route') ?>" style="background:white;color:#0891b2;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Web Route →
            </a>
            <a href="<?= route('cors') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-globe"></i> CORS →
            </a>
            <a href="<?= route('auth') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-shield-lock"></i> Auth Middleware →
            </a>
        </div>
    </div>
</div>