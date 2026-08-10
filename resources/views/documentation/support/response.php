<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #059669, #34d399); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📤</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Response Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Buat HTTP response dengan mudah. JSON, success/error helpers, status codes, dan custom headers.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Import -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Response;

// Atau Core Response class
use Bpjs\Framework\Core\Response;</code></pre>
        </div>
    </div>
</div>

<!-- Response Methods -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Response Methods
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#059669;">json()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Kirim response JSON</p>
                        <div class="code-block"><pre><code>return Response::json($data);
return Response::json($data, 201);
return Response::json(['error' => '...'], 400);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#2563eb;">success()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Success response standar</p>
                        <div class="code-block"><pre><code>return Response::success('Berhasil!');
return Response::success('OK', 200);
return Response::success('Created', 201);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#dc2626;">error()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Error response standar</p>
                        <div class="code-block"><pre><code>return Response::error('Unauthorized', 401);
return Response::error('Not Found', 404);
return Response::error('Server Error', 500);</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- HTTP Status Codes -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-123 text-warning"></i> Common HTTP Status Codes
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Code</th><th>Name</th><th>Usage</th></tr></thead>
                <tbody>
                    <tr><td><span class="badge-custom badge-get">200</span></td><td>OK</td><td>Request berhasil (GET, PUT, PATCH)</td></tr>
                    <tr><td><span class="badge-custom badge-post">201</span></td><td>Created</td><td>Resource berhasil dibuat (POST)</td></tr>
                    <tr><td><span style="background:#e0e7ff;color:#3730a3;font-size:0.7rem;padding:2px 8px;border-radius:99px;">204</span></td><td>No Content</td><td>Berhasil tanpa body (DELETE)</td></tr>
                    <tr><td><span style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:2px 8px;border-radius:99px;">400</span></td><td>Bad Request</td><td>Input tidak valid</td></tr>
                    <tr><td><span style="background:#fce7f3;color:#9d174d;font-size:0.7rem;padding:2px 8px;border-radius:99px;">401</span></td><td>Unauthorized</td><td>Belum login / token invalid</td></tr>
                    <tr><td><span style="background:#fce7f3;color:#9d174d;font-size:0.7rem;padding:2px 8px;border-radius:99px;">403</span></td><td>Forbidden</td><td>Tidak punya akses</td></tr>
                    <tr><td><span class="badge-custom badge-delete">404</span></td><td>Not Found</td><td>Resource tidak ditemukan</td></tr>
                    <tr><td><span style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:2px 8px;border-radius:99px;">419</span></td><td>CSRF Mismatch</td><td>Token CSRF invalid</td></tr>
                    <tr><td><span style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:2px 8px;border-radius:99px;">422</span></td><td>Unprocessable</td><td>Validasi gagal</td></tr>
                    <tr><td><span style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:2px 8px;border-radius:99px;">429</span></td><td>Too Many Requests</td><td>Rate limit exceeded</td></tr>
                    <tr><td><span class="badge-custom badge-delete">500</span></td><td>Internal Server Error</td><td>Server error</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Core Response Class -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Core Response Class
    </div>
    <div class="card-body-custom">
        <p>Class <code>Response</code> (Core) menyediakan kontrol penuh atas HTTP response:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Core\Response;

// Basic response
$response = new Response('Hello World', 200);
$response->send();

// JSON response
$response = new Response(
    json_encode(['data' => $users]),
    200,
    ['Content-Type' => 'application/json']
);

// Redirect response
$response = new Response('', 302, ['Location' => '/dashboard']);

// Get info
$response->getStatusCode();   // 200
$response->getContent();      // 'Hello World'
$response->getHeaders();      // ['Content-Type' => 'text/html']</code></pre>
        </div>
    </div>
</div>

<!-- Controller Examples -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#059669;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Controller Examples
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Web Controller:</h6>
                <div class="code-block" style="max-height:350px;overflow-y:auto;">
                    <pre><code>use Bpjs\Framework\Helpers\Response;

class UserController
{
    public function store(Request $request)
    {
        $user = User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if ($request->expectsJson()) {
            return Response::json($user, 201);
        }

        redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return Response::error('User tidak ditemukan', 404);
        }

        $user->delete();
        return Response::success('User dihapus');
    }
}</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">API Controller:</h6>
                <div class="code-block" style="max-height:350px;overflow-y:auto;">
                    <pre><code>use Bpjs\Framework\Helpers\Api;

class UserApiController
{
    public function index()
    {
        $users = User::all();
        return Api::success($users);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return Api::error('User tidak ditemukan', 404);
        }

        return Api::success($user);
    }

    public function store(Request $request)
    {
        $user = User::create($request->only(['name', 'email']));
        return Api::success($user, 'Created', 201);
    }
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
                <thead><tr><th>Method</th><th>Parameters</th><th>Description</th></tr></thead>
                <tbody>
                    <tr><td><code>Response::json()</code></td><td>mixed $data, int $code = 200</td><td>Kirim JSON response</td></tr>
                    <tr><td><code>Response::success()</code></td><td>string $message, int $code = 200</td><td>Success response standar</td></tr>
                    <tr><td><code>Response::error()</code></td><td>string $message, int $code = 400</td><td>Error response standar</td></tr>
                    <tr><td><code>new Response()</code></td><td>string $body, int $status, array $headers</td><td>Custom response object</td></tr>
                    <tr><td><code>->send()</code></td><td>—</td><td>Kirim response ke browser</td></tr>
                    <tr><td><code>->getStatusCode()</code></td><td>—</td><td>Dapatkan HTTP status code</td></tr>
                    <tr><td><code>->getContent()</code></td><td>—</td><td>Dapatkan response body</td></tr>
                    <tr><td><code>->getHeaders()</code></td><td>—</td><td>Dapatkan response headers</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #059669, #34d399); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Master the Response</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Response dengan Request & Validator untuk API yang solid.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('request') ?>" style="background:white;color:#059669;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-arrow-down-up"></i> Request →
            </a>
            <a href="<?= route('validator') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-check-circle"></i> Validator →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
        </div>
    </div>
</div>