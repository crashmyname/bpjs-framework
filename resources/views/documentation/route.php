<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #4f46e5, #7c3aed); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🧭</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Route System</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Powerful web router with method chaining, named routes, middleware grouping, CSRF protection, dan response caching.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-number">7</div>
        <div class="stat-label">HTTP Methods</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">🛡️</div>
        <div class="stat-label">CSRF Protected</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">⚡</div>
        <div class="stat-label">Rate Limiting</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">💾</div>
        <div class="stat-label">Auto Cache</div>
    </div>
</div>

<!-- Introduction -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-primary"></i> Introduction
    </div>
    <div class="card-body-custom">
        <p><strong>Route</strong> adalah sistem routing untuk web application. Semua route web didefinisikan di file <code>routes/web.php</code> dan diinisialisasi otomatis oleh Kernel.</p>
        <div class="code-block">
            <pre><code>// File: routes/web.php
// Route::init() dipanggil otomatis oleh Kernel

use Bpjs\Framework\Helpers\Route;
use Bpjs\Framework\Helpers\View;</code></pre>
        </div>
    </div>
</div>

<!-- Basic Routes with Tabs -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-signpost-2 text-success"></i> Basic Routes
        <span style="margin-left: auto; display: flex; gap: 4px;">
            <span class="badge-custom badge-get">GET</span>
            <span class="badge-custom badge-post">POST</span>
            <span class="badge-custom badge-put">PUT</span>
            <span class="badge-custom badge-delete">DELETE</span>
        </span>
    </div>
    <div class="card-body-custom">
        <div class="tabs-custom" id="routeTabs">
            <button class="tab-item active" onclick="switchTab(event, 'tab-get')">GET</button>
            <button class="tab-item" onclick="switchTab(event, 'tab-post')">POST</button>
            <button class="tab-item" onclick="switchTab(event, 'tab-put')">PUT / PATCH</button>
            <button class="tab-item" onclick="switchTab(event, 'tab-delete')">DELETE</button>
            <button class="tab-item" onclick="switchTab(event, 'tab-other')">Match / Any</button>
        </div>
        
        <div class="tab-content active" id="tab-get">
            <div class="code-block">
                <pre><code>// Closure handler
Route::get('/', function() {
    return view('home/index', ['title' => 'Home']);
});

// Controller handler
Route::get('/users', [UserController::class, 'index']);</code></pre>
            </div>
        </div>
        <div class="tab-content" id="tab-post">
            <div class="code-block">
                <pre><code>Route::post('/users', [UserController::class, 'store']);

// Method spoofing: &lt;input type="hidden" name="_method" value="PUT"&gt;</code></pre>
            </div>
        </div>
        <div class="tab-content" id="tab-put">
            <div class="code-block">
                <pre><code>Route::put('/users/{id}', [UserController::class, 'update']);
Route::patch('/users/{id}', [UserController::class, 'partialUpdate']);</code></pre>
            </div>
        </div>
        <div class="tab-content" id="tab-delete">
            <div class="code-block">
                <pre><code>Route::delete('/users/{id}', [UserController::class, 'destroy']);</code></pre>
            </div>
        </div>
        <div class="tab-content" id="tab-other">
            <div class="code-block">
                <pre><code>// Multiple methods
Route::match(['GET', 'POST'], '/contact', [ContactController::class, 'form']);

// All methods
Route::any('/webhook', [WebhookController::class, 'handle']);</code></pre>
            </div>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div><strong>Method Spoofing:</strong> HTML form hanya support GET & POST. Gunakan <code>&lt;input type="hidden" name="_method" value="PUT"&gt;</code> untuk method lainnya.</div>
        </div>
    </div>
</div>

<!-- Route Parameters -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-braces text-warning"></i> Route Parameters
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h5 style="font-weight:700;">Required Parameter</h5>
                <div class="code-block">
                    <pre><code>Route::get('/users/{id}', function($id) {
    return "User: " . $id;
});

Route::get('/posts/{slug}', [PostController::class, 'show']);</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h5 style="font-weight:700;">Optional Parameter</h5>
                <div class="code-block">
                    <pre><code>Route::get('/users/{id?}', function($id = null) {
    return $id ? "User: $id" : "All Users";
});</code></pre>
                </div>
            </div>
        </div>
        <div class="alert-custom alert-info-custom mt-2">
            <i class="bi bi-lightbulb"></i>
            <div><strong>Multiple Params:</strong> <code>Route::get('/cat/{cat}/product/{id}', fn($cat, $id) => ...)</code></div>
        </div>
    </div>
</div>

<!-- Shortcut Routes -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-lightning-charge text-warning"></i> Shortcut Routes
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border: 1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><i class="bi bi-arrow-left-right text-primary"></i> Redirect</h6>
                        <div class="code-block" style="max-height:100px;overflow-y:auto;">
                            <pre><code>// 301 Permanent
Route::redirect('/old', '/new', 301);

// 302 Temporary
Route::redirect('/temp', '/home');</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border: 1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><i class="bi bi-eye text-success"></i> View Route</h6>
                        <div class="code-block" style="max-height:100px;overflow-y:auto;">
                            <pre><code>// Tanpa layout
Route::view('/about', 'about/page', ['title' => 'About']);

// Dengan layout
Route::view('/profil', 'profil/index', $data, 'layouts/app');</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border: 1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><i class="bi bi-stack text-info"></i> Resource</h6>
                        <div class="code-block" style="max-height:100px;overflow-y:auto;">
                            <pre><code>Route::resource('users', UserController::class);
// index, create, store,
// show, edit, update, destroy</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Resource Table -->
        <h5 class="mt-3" style="font-weight:700;">Resource Route Mapping</h5>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Method</th><th>URI</th><th>Action</th><th>Name</th></tr>
                </thead>
                <tbody>
                    <tr><td><span class="badge-custom badge-get">GET</span></td><td><code>/users</code></td><td>index</td><td><code>users.index</code></td></tr>
                    <tr><td><span class="badge-custom badge-get">GET</span></td><td><code>/users/create</code></td><td>create</td><td><code>users.create</code></td></tr>
                    <tr><td><span class="badge-custom badge-post">POST</span></td><td><code>/users</code></td><td>store</td><td><code>users.store</code></td></tr>
                    <tr><td><span class="badge-custom badge-get">GET</span></td><td><code>/users/{id}</code></td><td>show</td><td><code>users.show</code></td></tr>
                    <tr><td><span class="badge-custom badge-get">GET</span></td><td><code>/users/{id}/edit</code></td><td>edit</td><td><code>users.edit</code></td></tr>
                    <tr><td><span class="badge-custom badge-put">PUT</span></td><td><code>/users/{id}</code></td><td>update</td><td><code>users.update</code></td></tr>
                    <tr><td><span class="badge-custom badge-delete">DELETE</span></td><td><code>/users/{id}</code></td><td>destroy</td><td><code>users.destroy</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Named Routes -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-tag text-primary"></i> Named Routes
    </div>
    <div class="card-body-custom">
        <p>Beri nama route untuk generate URL dengan mudah.</p>
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Registration</h6>
                <div class="code-block">
                    <pre><code>Route::get('/dokumentasi', fn() => view('dok/index'))
    ->name('instalasi');

Route::get('/users/{id}', [UserController::class, 'show'])
    ->name('users.show');</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Usage</h6>
                <div class="code-block">
                    <pre><code>echo route('instalasi');               // /dokumentasi
echo route('users.show', ['id' => 5]); // /users/5

// With query string
echo route('users.show', ['id' => 5], ['tab' => 'profile']);
// /users/5?tab=profile</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grouping & Middleware -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-folder text-warning"></i> Route Grouping
            </div>
            <div class="card-body-custom">
                <h6 style="font-weight:700;">Middleware Group</h6>
                <div class="code-block">
                    <pre><code>Route::group([AuthMiddleware::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Nested
    Route::group([AdminMiddleware::class], function () {
        Route::get('/admin/users', [AdminController::class, 'users']);
    });
});</code></pre>
                </div>
                <h6 style="font-weight:700;" class="mt-3">Prefix Group</h6>
                <div class="code-block">
                    <pre><code>Route::prefix('admin', function () {
    Route::get('/users', [AdminController::class, 'users']);
}, [AdminMiddleware::class]);
// → /admin/users</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-shield-check text-danger"></i> Middleware & Rate Limit
            </div>
            <div class="card-body-custom">
                <h6 style="font-weight:700;">Single & Multiple</h6>
                <div class="code-block">
                    <pre><code>// Single
Route::get('/dashboard', [DashController::class, 'index'], [AuthMiddleware::class]);

// Multiple
Route::get('/admin', [AdminController::class, 'index'], [
    AuthMiddleware::class, AdminMiddleware::class
]);</code></pre>
                </div>
                <h6 style="font-weight:700;" class="mt-3">Rate Limiting</h6>
                <div class="code-block">
                    <pre><code>Route::post('/login', [AuthController::class, 'login'])
    ->limit(10, 60);   // 10 req / 60 sec

Route::post('/contact', [ContactController::class, 'send'])
    ->limit(3, 60);    // 3 req / min</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSRF + Error Handlers -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-shield-lock text-success"></i> CSRF Protection
            </div>
            <div class="card-body-custom">
                <p>Otomatis untuk <strong>POST, PUT, PATCH, DELETE</strong>.</p>
                <div class="code-block">
                    <pre><code>&lt;form method="POST" action="&lt;?= route('users.store') ?&gt;"&gt;
    &lt;?= csrf() ?&gt;
    &lt;input type="text" name="name"&gt;
    &lt;button&gt;Save&lt;/button&gt;
&lt;/form&gt;

// AJAX: header 'X-CSRF-TOKEN': csrfToken()</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-exclamation-triangle text-warning"></i> Error Handlers
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>// Custom 404
Route::fallback(function (Request $request) {
    return view('errors/404', ['url' => $request->uri()]);
});

// Custom 500
Route::onError(function (Throwable $e, Request $request) {
    logger('Error: ' . $e->getMessage());
    return view('errors/500');
});</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- URL Helpers -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-link-45deg text-info"></i> URL Helpers
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Helper</th><th>Contoh</th><th>Output</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>base_url()</code></td><td><code>base_url()</code></td><td><code>http://localhost/project/</code></td></tr>
                    <tr><td><code>url()</code></td><td><code>url('/users')</code></td><td><code>http://localhost/project/users</code></td></tr>
                    <tr><td><code>route()</code></td><td><code>route('instalasi')</code></td><td><code>http://localhost/project/dokumentasi</code></td></tr>
                    <tr><td><code>asset()</code></td><td><code>asset('css/app.css')</code></td><td><code>http://localhost/project/public/css/app.css</code></td></tr>
                    <tr><td><code>redirect()</code></td><td><code>redirect('/dashboard')</code></td><td>Header redirect</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Controller + Routes File Examples -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-file-earmark-code text-primary"></i> Controller Example
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:400px;overflow-y:auto;">
                    <pre><code>class UserController
{
    public function index()
    {
        return view('users/index', [
            'users' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->save();
        redirect('/users');
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return View::error(404);
        return view('users/show', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->save();
        redirect('/users');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        redirect('/users');
    }
}</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-file-earmark-text text-success"></i> Complete routes/web.php
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:400px;overflow-y:auto;">
                    <pre><code>use Bpjs\Framework\Helpers\Route;

// Public
Route::get('/', fn() => view('welcome'));
Route::view('/about', 'about/index');

// Documentation
Route::prefix('dokumentasi', function() {
    Route::get('/', fn() => View::render('doc/install', [], 'doc/layout'))
        ->name('instalasi');
});

// Auth
Route::post('/login', [AuthController::class, 'login'])
    ->limit(5, 60);

// Protected
Route::group([AuthMiddleware::class], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
});

// Admin
Route::group([AuthMiddleware::class, AdminMiddleware::class], function () {
    Route::prefix('admin', function () {
        Route::get('/', [AdminController::class, 'dashboard']);
    });
});

// 404
Route::fallback(fn($req) => View::error(404));</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Middleware -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-puzzle text-purple" style="color:#7c3aed;"></i> Custom Middleware
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #fee2e2;background:#fff5f5;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#991b1b;">Auth Middleware</h6>
                        <div class="code-block">
                            <pre><code>class AuthMiddleware
{
    public function handle(Request $request)
    {
        if (!Session::has('user')) {
            header('Location: ' . base_url() . '/login');
            exit;
        }
    }
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #fef3c7;background:#fffdf5;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#92400e;">Admin Middleware</h6>
                        <div class="code-block">
                            <pre><code>class AdminMiddleware
{
    public function handle(Request $request)
    {
        $user = Session::get('user');
        if (!$user || $user->role !== 'admin') {
            header('Location: ' . base_url() . '/dashboard');
            exit;
        }
    }
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tab Script -->
<script>
function switchTab(event, tabId) {
    // Update active tab button
    event.target.parentElement.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
    event.target.classList.add('active');
    
    // Show selected tab content
    const parent = event.target.closest('.card-body-custom');
    parent.querySelectorAll('.tab-content').forEach(t => t.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
}
</script>