<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🚀</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">HTTP Client</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Laravel-style HTTP client. Fluent builder, parallel requests, fake/mock mode, macros, dan automatic retry.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Features Grid -->
<div class="row g-3 mb-3">
    <div class="col-md-4"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🔗</div><h6 style="font-weight:700;">Fluent Interface</h6><p style="font-size:0.8rem;color:#64748b;">Method chaining yang readable</p></div></div></div>
    <div class="col-md-4"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">⚡</div><h6 style="font-weight:700;">Parallel Requests</h6><p style="font-size:0.8rem;color:#64748b;">Kirim banyak request sekaligus</p></div></div></div>
    <div class="col-md-4"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🧪</div><h6 style="font-weight:700;">Fake Mode</h6><p style="font-size:0.8rem;color:#64748b;">Mock response untuk testing</p></div></div></div>
    <div class="col-md-4"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🔌</div><h6 style="font-weight:700;">Global Middleware</h6><p style="font-size:0.8rem;color:#64748b;">Logic untuk semua request</p></div></div></div>
    <div class="col-md-4"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🔮</div><h6 style="font-weight:700;">Macros</h6><p style="font-size:0.8rem;color:#64748b;">Custom method extension</p></div></div></div>
    <div class="col-md-4"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🔄</div><h6 style="font-weight:700;">Auto Retry</h6><p style="font-size:0.8rem;color:#64748b;">Retry otomatis request gagal</p></div></div></div>
</div>

<!-- Requirements & Namespace -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-check-circle text-success"></i> Requirements</div>
            <div class="card-body-custom">
                <ul style="list-style:disc;padding-left:1.5rem;font-size:0.9rem;">
                    <li>PHP 8.1+</li>
                    <li>cURL extension</li>
                    <li>JSON extension</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-code-slash text-info"></i> Namespace</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>use Bpjs\Framework\Helpers\Http\Http;
use Bpjs\Framework\Helpers\Http\HttpResponse;
use Bpjs\Framework\Helpers\Http\HttpException;
use Bpjs\Framework\Helpers\Http\HttpPool;
use Bpjs\Framework\Helpers\Http\HttpFake;</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Start -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-lightning-charge text-warning"></i> Quick Start</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">GET Request</h6>
                <div class="code-block"><pre><code>$response = Http::get('https://api.example.com/users');
$response->ok();           // true jika 2xx
$response->status();       // 200
$users = $response->json();          // seluruh response
$name  = $response->json('data.0.name'); // dot notation</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">POST with JSON</h6>
                <div class="code-block"><pre><code>$response = Http::post('https://api.example.com/users', [
    'name'  => 'John Doe',
    'email' => 'john@example.com',
]);
$userId = $response->json('id');</code></pre></div>
            </div>
        </div>
        <h6 style="font-weight:700;margin-top:1rem;">Fluent Builder</h6>
        <div class="code-block"><pre><code>$response = Http::withToken($token)
    ->withHeaders(['X-App-Version' => '1.0'])
    ->timeout(15)
    ->retry(3, 200)
    ->throw()
    ->get('https://api.example.com/data');</code></pre></div>
    </div>
</div>

<!-- Authentication -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-key text-danger"></i> Authentication</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <h6 style="font-weight:700;">Bearer Token</h6>
                <div class="code-block"><pre><code>Http::withToken($token)->get('...');
Http::withToken($key, 'ApiKey')->get('...');</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;">Basic Auth</h6>
                <div class="code-block"><pre><code>Http::withBasicAuth('user', 'pass')->get('...');</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;">Digest Auth</h6>
                <div class="code-block"><pre><code>Http::withDigestAuth('user', 'pass')->get('...');</code></pre></div>
            </div>
        </div>
        <h6 style="font-weight:700;margin-top:1rem;">BPJS Custom Headers</h6>
        <div class="code-block"><pre><code>Http::withHeaders([
    'X-API-Key'   => 'your-api-key',
    'X-Cons-ID'   => 'BPJS-Consumer-ID',
    'X-Timestamp' => $timestamp,
    'X-Signature' => $signature,
])->get('https://api.bpjs-kesehatan.go.id/vclaim-rest/');</code></pre></div>
    </div>
</div>

<!-- Fluent Builder Table -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-gear text-info"></i> Fluent Builder Configuration</div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Method</th><th>Description</th><th>Example</th></tr></thead>
                <tbody>
                    <tr><td><code>baseUrl()</code></td><td>Set base URL</td><td><code>->baseUrl('https://api.example.com/v1')</code></td></tr>
                    <tr><td><code>withHeaders()</code></td><td>Tambah HTTP headers</td><td><code>->withHeaders(['X-Key' => 'val'])</code></td></tr>
                    <tr><td><code>withQueryParameters()</code></td><td>Tambah query params</td><td><code>->withQueryParameters(['page' => 1])</code></td></tr>
                    <tr><td><code>withCookies()</code></td><td>Set cookies</td><td><code>->withCookies(['session' => 'abc'])</code></td></tr>
                    <tr><td><code>timeout()</code></td><td>Set timeout (detik)</td><td><code>->timeout(30)</code></td></tr>
                    <tr><td><code>retry()</code></td><td>Auto retry</td><td><code>->retry(3, 200)</code></td></tr>
                    <tr><td><code>withoutVerifying()</code></td><td>Skip SSL verification</td><td><code>->withoutVerifying()</code></td></tr>
                    <tr><td><code>throw()</code></td><td>Throw exception on 4xx/5xx</td><td><code>->throw()</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Response & Error Handling -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-inbox text-info"></i> Response Methods</div>
            <div class="card-body-custom p-0">
                <div style="overflow-x:auto;">
                    <table class="table-custom">
                        <thead><tr><th>Method</th><th>Return</th><th>Description</th></tr></thead>
                        <tbody>
                            <tr><td><code>status()</code></td><td>int</td><td>HTTP status code</td></tr>
                            <tr><td><code>ok()</code></td><td>bool</td><td>True jika 2xx</td></tr>
                            <tr><td><code>successful()</code></td><td>bool</td><td>2xx</td></tr>
                            <tr><td><code>failed()</code></td><td>bool</td><td>4xx atau 5xx</td></tr>
                            <tr><td><code>json($key?)</code></td><td>mixed</td><td>Parse JSON (dot notation)</td></tr>
                            <tr><td><code>body()</code></td><td>string</td><td>Raw response body</td></tr>
                            <tr><td><code>headers()</code></td><td>array</td><td>Response headers</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-exclamation-triangle text-danger"></i> Error Handling</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>try {
    $response = Http::withToken($token)
        ->throw()
        ->get('https://api.example.com/data');
} catch (HttpException $e) {
    $e->getStatusCode();     // 404, 500
    $e->getResponseBody();   // response body
    $e->isClientError();     // 4xx
    $e->isServerError();     // 5xx
}</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Pool Requests -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-stack text-success"></i> Pool (Parallel) Requests</div>
    <div class="card-body-custom">
        <div class="code-block"><pre><code>$responses = Http::pool(function (HttpPool $pool) {
    $pool->as('users')->withToken($token)->get('https://api.example.com/users');
    $pool->as('posts')->withToken($token)->get('https://api.example.com/posts');
    $pool->as('log')->post('https://api.example.com/logs', ['action' => 'fetch']);
});

$users = $responses['users']->json();
$posts = $responses['posts']->json();</code></pre></div>
        <div class="alert-custom alert-info-custom mt-2">
            <i class="bi bi-lightbulb-fill"></i>
            <div>Gunakan pool untuk BPJS VClaim bridging: peserta + rujukan + poli dalam satu waktu.</div>
        </div>
    </div>
</div>

<!-- Middleware & Macros -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-plug text-info"></i> Global Middleware</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>Http::withMiddleware(function (Http $http) {
    $http->withHeaders([
        'X-Cons-ID'   => env('BPJS_CONS_ID'),
        'X-Timestamp' => time(),
    ]);
    $http->baseUrl(env('BPJS_BASE_URL'));
    $http->timeout(30);
    $http->retry(2, 500);
});
// Semua instance baru auto-config
Http::resetMiddleware();</code></pre></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-magic text-warning"></i> Macros</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>Http::macro('bpjsVClaim', fn() =>
    Http::withHeaders([...])
        ->baseUrl('https://api.bpjs.go.id/vclaim-rest')
        ->timeout(20)->throw()
);
$peserta = Http::bpjsVClaim()->get('/peserta/...');

Http::macro('bpjsAntrean', fn() =>
    Http::bpjsVClaim()->baseUrl('...antreanrs')
);</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Fake Mode -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-eyedropper text-info"></i> Testing: Fake / Mock Mode</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Basic Fake</h6>
                <div class="code-block"><pre><code>Http::fake(); // semua return 200
$response = Http::get('https://api.example.com/users');
$response->status(); // 200
Http::resetFake();</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Custom Stubs</h6>
                <div class="code-block"><pre><code>Http::fake([
    'api.example.com/users/*' => [
        'status' => 200,
        'body'   => ['users' => [...]],
    ],
    'api.example.com/posts/*' => [
        'status' => 404,
    ],
]);</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- API Reference -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-book text-warning"></i> API Reference</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">HTTP Methods</h6>
                <div style="font-size:0.9rem;">
                    <div style="padding:0.4rem 0;"><span class="badge-custom badge-get">GET</span> <code>Http::get($url, $query = [])</code></div>
                    <div style="padding:0.4rem 0;"><span class="badge-custom badge-post">POST</span> <code>Http::post($url, $data = [])</code></div>
                    <div style="padding:0.4rem 0;"><span class="badge-custom badge-put">PUT</span> <code>Http::put($url, $data = [])</code></div>
                    <div style="padding:0.4rem 0;"><span style="background:#fce7f3;color:#9d174d;font-size:0.7rem;padding:2px 8px;border-radius:99px;">PATCH</span> <code>Http::patch($url, $data = [])</code></div>
                    <div style="padding:0.4rem 0;"><span class="badge-custom badge-delete">DELETE</span> <code>Http::delete($url, $data = [])</code></div>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Static Methods</h6>
                <div style="font-size:0.85rem;">
                    <div style="padding:0.3rem 0;"><code>Http::new()</code> — instance baru</div>
                    <div style="padding:0.3rem 0;"><code>Http::fake($stubs?)</code> — fake mode</div>
                    <div style="padding:0.3rem 0;"><code>Http::resetFake()</code> — matikan fake</div>
                    <div style="padding:0.3rem 0;"><code>Http::pool($callback)</code> — parallel</div>
                    <div style="padding:0.3rem 0;"><code>Http::macro($name, $fn)</code> — custom method</div>
                    <div style="padding:0.3rem 0;"><code>Http::withMiddleware($fn)</code> — global middleware</div>
                    <div style="padding:0.3rem 0;"><code>Http::attach($url, $fields, $files)</code> — upload</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Connect to External APIs</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">HTTP Client siap untuk integrasi BPJS atau API eksternal lainnya.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('crypto') ?>" style="background:white;color:#667eea;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-lock"></i> Crypto →
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