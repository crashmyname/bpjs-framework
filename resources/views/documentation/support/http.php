<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPJS HTTP Client - Documentation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f7fa;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #1e293b;
            color: #e2e8f0;
            padding: 2rem 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar-header {
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid #334155;
            margin-bottom: 1.5rem;
        }

        .sidebar-header h1 {
            font-size: 1.25rem;
            color: #fff;
            font-weight: 700;
        }

        .sidebar-header .version {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 0.25rem;
        }

        .nav-section {
            margin-bottom: 1rem;
        }

        .nav-title {
            padding: 0.5rem 1.5rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #64748b;
            font-weight: 600;
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.875rem;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .nav-link:hover {
            background: #334155;
            color: #fff;
            border-left-color: #3b82f6;
        }

        .nav-link.active {
            background: #334155;
            color: #fff;
            border-left-color: #3b82f6;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 2rem 3rem;
            max-width: 1200px;
        }

        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem;
            border-radius: 12px;
            margin-bottom: 3rem;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.3);
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 800;
        }

        .hero p {
            font-size: 1.1rem;
            opacity: 0.95;
            line-height: 1.8;
        }

        .hero code {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.9em;
        }

        /* Sections */
        section {
            margin-bottom: 3rem;
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
            color: #1e293b;
            font-weight: 700;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        section h3 {
            font-size: 1.25rem;
            margin: 1.5rem 0 0.75rem;
            color: #334155;
        }

        section p {
            margin-bottom: 1rem;
            color: #475569;
        }

        /* Code blocks */
        .code-block {
            background: #1e293b;
            color: #e2e8f0;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
            overflow-x: auto;
            font-family: 'Fira Code', 'Consolas', 'Monaco', monospace;
            font-size: 0.875rem;
            line-height: 1.7;
            position: relative;
        }

        .code-block .lang-tag {
            position: absolute;
            top: 0.5rem;
            right: 1rem;
            font-size: 0.7rem;
            text-transform: uppercase;
            color: #94a3b8;
            background: #334155;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
        }

        .code-block .keyword { color: #c084fc; }
        .code-block .function { color: #60a5fa; }
        .code-block .string { color: #34d399; }
        .code-block .comment { color: #64748b; font-style: italic; }
        .code-block .variable { color: #fbbf24; }
        .code-block .class { color: #f472b6; }
        .code-block .number { color: #fb923c; }

        pre {
            margin: 0;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        th {
            background: #f1f5f9;
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            color: #475569;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e2e8f0;
            font-size: 0.875rem;
        }

        td code {
            background: #f1f5f9;
            padding: 0.15rem 0.4rem;
            border-radius: 4px;
            color: #6366f1;
            font-size: 0.85em;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .badge-get { background: #dbeafe; color: #1e40af; }
        .badge-post { background: #d1fae5; color: #065f46; }
        .badge-put { background: #fef3c7; color: #92400e; }
        .badge-patch { background: #fce7f3; color: #9d174d; }
        .badge-delete { background: #fee2e2; color: #991b1b; }

        /* Alert */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            font-size: 0.875rem;
        }

        .alert-info {
            background: #dbeafe;
            color: #1e40af;
            border-left: 4px solid #3b82f6;
        }

        .alert-warning {
            background: #fef3c7;
            color: #92400e;
            border-left: 4px solid #f59e0b;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        /* Method list */
        .method-list {
            list-style: none;
            padding: 0;
        }

        .method-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .method-list li:last-child {
            border-bottom: none;
        }

        /* Back to top */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: #3b82f6;
            color: white;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 1.5rem;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
            transition: transform 0.2s;
        }

        .back-to-top:hover {
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .hero {
                padding: 2rem 1.5rem;
            }
            
            .hero h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h1>BPJS HTTP Client</h1>
                <div class="version">Version 1.0.0</div>
            </div>

            <div class="nav-section">
                <div class="nav-title">Getting Started</div>
                <a href="#introduction" class="nav-link active">Introduction</a>
                <a href="#installation" class="nav-link">Installation</a>
                <a href="#quick-start" class="nav-link">Quick Start</a>
            </div>

            <div class="nav-section">
                <div class="nav-title">Core Concepts</div>
                <a href="#fluent-builder" class="nav-link">Fluent Builder</a>
                <a href="#authentication" class="nav-link">Authentication</a>
                <a href="#request-config" class="nav-link">Request Configuration</a>
                <a href="#response-handling" class="nav-link">Response Handling</a>
                <a href="#error-handling" class="nav-link">Error Handling</a>
            </div>

            <div class="nav-section">
                <div class="nav-title">Advanced</div>
                <a href="#pool-requests" class="nav-link">Pool (Parallel) Requests</a>
                <a href="#middleware" class="nav-link">Global Middleware</a>
                <a href="#macros" class="nav-link">Macros</a>
                <a href="#hooks" class="nav-link">Before/After Hooks</a>
                <a href="#file-upload" class="nav-link">File Upload</a>
            </div>

            <div class="nav-section">
                <div class="nav-title">Testing</div>
                <a href="#fake-mode" class="nav-link">Fake / Mock Mode</a>
                <a href="#assertions" class="nav-link">Assertions</a>
            </div>

            <div class="nav-section">
                <div class="nav-title">Reference</div>
                <a href="#api-reference" class="nav-link">API Reference</a>
                <a href="#exceptions" class="nav-link">Exceptions</a>
                <a href="#examples" class="nav-link">Complete Examples</a>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Hero Section -->
            <div class="hero">
                <h1>🚀 BPJS HTTP Client</h1>
                <p>
                    Laravel-style HTTP client helper untuk aplikasi BPJS Kesehatan.
                    Mendukung <code>fluent builder</code>, <code>parallel requests</code>, 
                    <code>fake/mock mode</code>, dan <code>macros</code> untuk pengalaman 
                    development yang lebih produktif.
                </p>
            </div>

            <!-- Introduction -->
            <section id="introduction">
                <h2>📖 Introduction</h2>
                <p>
                    <strong>BPJS HTTP Client</strong> adalah wrapper cURL yang powerful dengan API 
                    yang ekspresif dan mudah digunakan. Terinspirasi dari Laravel HTTP Client, 
                    library ini menyediakan:
                </p>
                <ul style="list-style: disc; padding-left: 2rem; margin: 1rem 0;">
                    <li><strong>Fluent Interface</strong> — Method chaining yang readable</li>
                    <li><strong>Parallel Requests</strong> — Kirim banyak request sekaligus</li>
                    <li><strong>Fake Mode</strong> — Mock HTTP response untuk testing</li>
                    <li><strong>Global Middleware</strong> — Tambahkan logic ke semua request</li>
                    <li><strong>Macros</strong> — Extend dengan method custom</li>
                    <li><strong>Automatic Retry</strong> — Retry otomatis untuk request gagal</li>
                    <li><strong>PSR-compatible</strong> — Response object yang familiar</li>
                </ul>
            </section>

            <!-- Installation -->
            <section id="installation">
                <h2>💿 Installation</h2>
                
                <h3>Requirements</h3>
                <ul style="list-style: disc; padding-left: 2rem;">
                    <li>PHP 8.1+</li>
                    <li>cURL extension</li>
                    <li>JSON extension</li>
                </ul>

                <h3>Namespace</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="keyword">namespace</span> <span class="class">Bpjs\Framework\Helpers\Http</span>;

<span class="keyword">use</span> <span class="class">Bpjs\Framework\Helpers\Http\Http</span>;
<span class="keyword">use</span> <span class="class">Bpjs\Framework\Helpers\Http\HttpResponse</span>;
<span class="keyword">use</span> <span class="class">Bpjs\Framework\Helpers\Http\HttpException</span>;
<span class="keyword">use</span> <span class="class">Bpjs\Framework\Helpers\Http\HttpPool</span>;
<span class="keyword">use</span> <span class="class">Bpjs\Framework\Helpers\Http\HttpFake</span>;</code></pre>
                </div>
            </section>

            <!-- Quick Start -->
            <section id="quick-start">
                <h2>⚡ Quick Start</h2>

                <h3>Basic GET Request</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>);

<span class="comment">// Cek status</span>
<span class="variable">$response</span>-><span class="function">ok</span>();           <span class="comment">// true jika 2xx</span>
<span class="variable">$response</span>-><span class="function">status</span>();       <span class="comment">// 200</span>

<span class="comment">// Ambil data</span>
<span class="variable">$users</span> = <span class="variable">$response</span>-><span class="function">json</span>();          <span class="comment">// seluruh response</span>
<span class="variable">$name</span>  = <span class="variable">$response</span>-><span class="function">json</span>(<span class="string">'data.0.name'</span>); <span class="comment">// dot notation</span></code></pre>
                </div>

                <h3>POST with JSON</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">post</span>(<span class="string">'https://api.example.com/users'</span>, [
    <span class="string">'name'</span>  => <span class="string">'John Doe'</span>,
    <span class="string">'email'</span> => <span class="string">'john@example.com'</span>,
]);

<span class="variable">$userId</span> = <span class="variable">$response</span>-><span class="function">json</span>(<span class="string">'id'</span>);</code></pre>
                </div>

                <h3>Fluent Builder</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">withToken</span>(<span class="variable">$token</span>)
    -><span class="function">withHeaders</span>([<span class="string">'X-App-Version'</span> => <span class="string">'1.0'</span>])
    -><span class="function">timeout</span>(<span class="number">15</span>)
    -><span class="function">retry</span>(<span class="number">3</span>, <span class="number">200</span>)
    -><span class="function">throw</span>()
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);</code></pre>
                </div>
            </section>

            <!-- Authentication -->
            <section id="authentication">
                <h2>🔐 Authentication</h2>

                <h3>Bearer Token</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="class">Http</span>::<span class="function">withToken</span>(<span class="variable">$accessToken</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/profile'</span>);

<span class="comment">// Custom token type</span>
<span class="class">Http</span>::<span class="function">withToken</span>(<span class="variable">$apiKey</span>, <span class="string">'ApiKey'</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);</code></pre>
                </div>

                <h3>Basic Authentication</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="class">Http</span>::<span class="function">withBasicAuth</span>(<span class="string">'username'</span>, <span class="string">'password'</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/secure'</span>);</code></pre>
                </div>

                <h3>Digest Authentication</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="class">Http</span>::<span class="function">withDigestAuth</span>(<span class="string">'username'</span>, <span class="string">'password'</span>)
    -><span class="function">get</span>(<span class="string">'https://api.example.com/digest'</span>);</code></pre>
                </div>

                <h3>Custom Headers</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="class">Http</span>::<span class="function">withHeaders</span>([
    <span class="string">'X-API-Key'</span>      => <span class="string">'your-api-key'</span>,
    <span class="string">'X-Cons-ID'</span>      => <span class="string">'BPJS-Consumer-ID'</span>,
    <span class="string">'X-Timestamp'</span>    => <span class="variable">$timestamp</span>,
    <span class="string">'X-Signature'</span>    => <span class="variable">$signature</span>,
])-><span class="function">get</span>(<span class="string">'https://api.bpjs-kesehatan.go.id/vclaim-rest/'</span>);</code></pre>
                </div>
            </section>

            <!-- Fluent Builder -->
            <section id="fluent-builder">
                <h2>🔧 Fluent Builder Configuration</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>Description</th>
                            <th>Example</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>baseUrl()</code></td>
                            <td>Set base URL untuk semua request</td>
                            <td><code>->baseUrl('https://api.example.com/v1')</code></td>
                        </tr>
                        <tr>
                            <td><code>withHeaders()</code></td>
                            <td>Tambah HTTP headers</td>
                            <td><code>->withHeaders(['X-Key' => 'val'])</code></td>
                        </tr>
                        <tr>
                            <td><code>withQueryParameters()</code></td>
                            <td>Tambah query string params</td>
                            <td><code>->withQueryParameters(['page' => 1])</code></td>
                        </tr>
                        <tr>
                            <td><code>withCookies()</code></td>
                            <td>Set cookies</td>
                            <td><code>->withCookies(['session' => 'abc123'])</code></td>
                        </tr>
                        <tr>
                            <td><code>timeout()</code></td>
                            <td>Set timeout (detik)</td>
                            <td><code>->timeout(30)</code></td>
                        </tr>
                        <tr>
                            <td><code>retry()</code></td>
                            <td>Auto retry pada failure</td>
                            <td><code>->retry(3, 200)</code></td>
                        </tr>
                        <tr>
                            <td><code>withoutVerifying()</code></td>
                            <td>Skip SSL verification</td>
                            <td><code>->withoutVerifying()</code></td>
                        </tr>
                        <tr>
                            <td><code>throw()</code></td>
                            <td>Throw exception on 4xx/5xx</td>
                            <td><code>->throw()</code></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Response Handling -->
            <section id="response-handling">
                <h2>📥 Response Handling</h2>

                <h3>HttpResponse Methods</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>Return</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>status()</code></td>
                            <td>int</td>
                            <td>HTTP status code</td>
                        </tr>
                        <tr>
                            <td><code>ok()</code></td>
                            <td>bool</td>
                            <td>True jika 2xx</td>
                        </tr>
                        <tr>
                            <td><code>successful()</code></td>
                            <td>bool</td>
                            <td>2xx</td>
                        </tr>
                        <tr>
                            <td><code>failed()</code></td>
                            <td>bool</td>
                            <td>4xx atau 5xx</td>
                        </tr>
                        <tr>
                            <td><code>clientError()</code></td>
                            <td>bool</td>
                            <td>4xx</td>
                        </tr>
                        <tr>
                            <td><code>serverError()</code></td>
                            <td>bool</td>
                            <td>5xx</td>
                        </tr>
                        <tr>
                            <td><code>json()</code></td>
                            <td>mixed</td>
                            <td>Parse JSON body (support dot notation)</td>
                        </tr>
                        <tr>
                            <td><code>body()</code></td>
                            <td>string</td>
                            <td>Raw response body</td>
                        </tr>
                        <tr>
                            <td><code>headers()</code></td>
                            <td>array</td>
                            <td>Response headers</td>
                        </tr>
                        <tr>
                            <td><code>throw()</code></td>
                            <td>void</td>
                            <td>Throw exception jika failed</td>
                        </tr>
                        <tr>
                            <td><code>collect()</code></td>
                            <td>array</td>
                            <td>JSON sebagai array (alias json())</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Dot Notation Access</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>);

<span class="comment">// Response JSON:</span>
<span class="comment">// {</span>
<span class="comment">//   "data": [</span>
<span class="comment">//     {"id": 1, "name": "John", "profile": {"age": 30}},</span>
<span class="comment">//     {"id": 2, "name": "Jane", "profile": {"age": 25}}</span>
<span class="comment">//   ]</span>
<span class="comment">// }</span>

<span class="variable">$firstName</span> = <span class="variable">$response</span>-><span class="function">json</span>(<span class="string">'data.0.name'</span>);        <span class="comment">// "John"</span>
<span class="variable">$age</span>       = <span class="variable">$response</span>-><span class="function">json</span>(<span class="string">'data.1.profile.age'</span>);  <span class="comment">// 25</span></code></pre>
                </div>
            </section>

            <!-- Error Handling -->
            <section id="error-handling">
                <h2>⚠️ Error Handling</h2>

                <h3>Automatic Exception Throwing</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="keyword">try</span> {
    <span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">withToken</span>(<span class="variable">$token</span>)
        -><span class="function">throw</span>()  <span class="comment">// auto throw untuk 4xx & 5xx</span>
        -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);
        
} <span class="keyword">catch</span> (<span class="class">HttpException</span> <span class="variable">$e</span>) {
    <span class="variable">$statusCode</span> = <span class="variable">$e</span>-><span class="function">getStatusCode</span>();     <span class="comment">// 404, 500, dll</span>
    <span class="variable">$response</span>   = <span class="variable">$e</span>-><span class="function">getResponseBody</span>();    <span class="comment">// response body (jika ada)</span>
    
    <span class="keyword">if</span> (<span class="variable">$e</span>-><span class="function">isClientError</span>()) {
        <span class="comment">// Handle 4xx errors</span>
    }
    
    <span class="keyword">if</span> (<span class="variable">$e</span>-><span class="function">isServerError</span>()) {
        <span class="comment">// Handle 5xx errors</span>
    }
}</code></pre>
                </div>

                <h3>Manual Error Checking</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);

<span class="keyword">if</span> (<span class="variable">$response</span>-><span class="function">ok</span>()) {
    <span class="comment">// Success</span>
    <span class="variable">$data</span> = <span class="variable">$response</span>-><span class="function">json</span>();
} <span class="keyword">elseif</span> (<span class="variable">$response</span>-><span class="function">clientError</span>()) {
    <span class="comment">// Client error (4xx)</span>
} <span class="keyword">else</span> {
    <span class="comment">// Server error (5xx)</span>
}</code></pre>
                </div>
            </section>

            <!-- Pool Requests -->
            <section id="pool-requests">
                <h2>🚀 Pool (Concurrent) Requests</h2>
                <p>Kirim multiple request secara paralel untuk performa yang lebih baik:</p>

                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$responses</span> = <span class="class">Http</span>::<span class="function">pool</span>(<span class="keyword">function</span> (<span class="class">HttpPool</span> <span class="variable">$pool</span>) {
    <span class="variable">$pool</span>-><span class="function">as</span>(<span class="string">'users'</span>)
        -><span class="function">withToken</span>(<span class="variable">$token</span>)
        -><span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>);
        
    <span class="variable">$pool</span>-><span class="function">as</span>(<span class="string">'posts'</span>)
        -><span class="function">withToken</span>(<span class="variable">$token</span>)
        -><span class="function">get</span>(<span class="string">'https://api.example.com/posts'</span>);
        
    <span class="variable">$pool</span>-><span class="function">as</span>(<span class="string">'createLog'</span>)
        -><span class="function">post</span>(<span class="string">'https://api.example.com/logs'</span>, [
            <span class="string">'action'</span> => <span class="string">'fetch_all'</span>
        ]);
});

<span class="comment">// Akses hasil</span>
<span class="variable">$users</span> = <span class="variable">$responses</span>[<span class="string">'users'</span>]-><span class="function">json</span>();
<span class="variable">$posts</span> = <span class="variable">$responses</span>[<span class="string">'posts'</span>]-><span class="function">json</span>();

<span class="comment">// Semua request berjalan bersamaan, menunggu yang paling lambat</span></code></pre>
                </div>

                <div class="alert alert-info">
                    <strong>💡 Tip:</strong> Gunakan pool untuk BPJS VClaim bridging di mana kamu perlu mengambil 
                    data dari beberapa endpoint sekaligus (peserta + rujukan + poli, dll).
                </div>
            </section>

            <!-- Middleware -->
            <section id="middleware">
                <h2>🔌 Global Middleware</h2>
                <p>Tambahkan logic yang dijalankan untuk SEMUA request instance:</p>

                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="comment">// Daftarkan global middleware</span>
<span class="class">Http</span>::<span class="function">withMiddleware</span>(<span class="keyword">function</span> (<span class="class">Http</span> <span class="variable">$http</span>) {
    <span class="variable">$http</span>-><span class="function">withHeaders</span>([
        <span class="string">'X-Cons-ID'</span>   => <span class="function">env</span>(<span class="string">'BPJS_CONS_ID'</span>),
        <span class="string">'X-Timestamp'</span> => <span class="function">time</span>(),
    ]);
    <span class="variable">$http</span>-><span class="function">baseUrl</span>(<span class="function">env</span>(<span class="string">'BPJS_BASE_URL'</span>));
    <span class="variable">$http</span>-><span class="function">timeout</span>(<span class="number">30</span>);
    <span class="variable">$http</span>-><span class="function">retry</span>(<span class="number">2</span>, <span class="number">500</span>);
});

<span class="comment">// Semua instance baru akan memiliki config di atas</span>
<span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'/peserta/0001234567890'</span>);
<span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">post</span>(<span class="string">'/sep/create'</span>, <span class="variable">$data</span>);

<span class="comment">// Reset middleware</span>
<span class="class">Http</span>::<span class="function">resetMiddleware</span>();</code></pre>
                </div>
            </section>

            <!-- Macros -->
            <section id="macros">
                <h2>🔮 Macros</h2>
                <p>Extend Http class dengan method custom untuk use-case spesifik:</p>

                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="comment">// 1. Daftarkan macro</span>
<span class="class">Http</span>::<span class="function">macro</span>(<span class="string">'bpjsVClaim'</span>, <span class="keyword">fn</span>() => 
    <span class="class">Http</span>::<span class="function">withHeaders</span>([
        <span class="string">'X-Cons-ID'</span>   => <span class="function">env</span>(<span class="string">'BPJS_CONS_ID'</span>),
        <span class="string">'X-Timestamp'</span> => <span class="function">time</span>(),
        <span class="string">'X-Signature'</span> => <span class="variable">$signature</span>,
    ])
    -><span class="function">baseUrl</span>(<span class="string">'https://api.bpjs-kesehatan.go.id/vclaim-rest'</span>)
    -><span class="function">timeout</span>(<span class="number">20</span>)
    -><span class="function">throw</span>()
);

<span class="comment">// 2. Gunakan macro</span>
<span class="variable">$peserta</span> = <span class="class">Http</span>::<span class="function">bpjsVClaim</span>()-><span class="function">get</span>(<span class="string">'/peserta/nokartu/0001234567890/tglSEP/2024-01-01'</span>);

<span class="comment">// Macro untuk Antrean</span>
<span class="class">Http</span>::<span class="function">macro</span>(<span class="string">'bpjsAntrean'</span>, <span class="keyword">fn</span>() => 
    <span class="class">Http</span>::<span class="function">bpjsVClaim</span>()  <span class="comment">// reuse macro lain</span>
        -><span class="function">baseUrl</span>(<span class="string">'https://api.bpjs-kesehatan.go.id/antreanrs'</span>)
);</code></pre>
                </div>

                <div class="alert alert-success">
                    <strong>✨ Best Practice:</strong> Buat macro untuk setiap service BPJS (VClaim, Antrean, 
                    Apotek, dll) di satu file config supaya konsisten di seluruh aplikasi.
                </div>
            </section>

            <!-- Hooks -->
            <section id="hooks">
                <h2>🪝 Before/After Hooks</h2>

                <h3>Before Sending Hook</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="class">Http</span>::<span class="function">new</span>()
    -><span class="function">beforeSending</span>(<span class="keyword">function</span> (<span class="variable">$method</span>, <span class="variable">$url</span>, &<span class="variable">$headers</span>, &<span class="variable">$body</span>) {
        <span class="comment">// Add timestamp ke semua request</span>
        <span class="variable">$headers</span>[<span class="string">'X-Request-Time'</span>] = <span class="function">time</span>();
        
        <span class="comment">// Log request</span>
        <span class="function">Log</span>::<span class="function">info</span>(<span class="string">"Sending {$method} to {$url}"</span>);
    })
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);</code></pre>
                </div>

                <h3>After Receiving Hook</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="class">Http</span>::<span class="function">new</span>()
    -><span class="function">afterReceiving</span>(<span class="keyword">function</span> (<span class="class">HttpResponse</span> <span class="variable">$response</span>) {
        <span class="comment">// Log response time? (butuh tambahan implementasi)</span>
        <span class="keyword">if</span> (<span class="variable">$response</span>-><span class="function">failed</span>()) {
            <span class="function">Log</span>::<span class="function">error</span>(<span class="string">'Request failed'</span>, [
                <span class="string">'status'</span> => <span class="variable">$response</span>-><span class="function">status</span>(),
                <span class="string">'body'</span>   => <span class="variable">$response</span>-><span class="function">body</span>(),
            ]);
        }
    })
    -><span class="function">get</span>(<span class="string">'https://api.example.com/data'</span>);</code></pre>
                </div>
            </section>

            <!-- File Upload -->
            <section id="file-upload">
                <h2>📎 File Upload (Multipart)</h2>

                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">withToken</span>(<span class="variable">$token</span>)
    -><span class="function">attach</span>(
        <span class="string">'https://api.example.com/upload'</span>,
        [<span class="string">'description'</span> => <span class="string">'My document'</span>],  <span class="comment">// fields</span>
        [<span class="string">'file'</span> => <span class="string">'/path/to/document.pdf'</span>]  <span class="comment">// files</span>
    );

<span class="comment">// Upload multiple files</span>
<span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">attach</span>(
    <span class="string">'https://api.example.com/upload'</span>,
    [<span class="string">'category'</span> => <span class="string">'medical_records'</span>],
    [
        <span class="string">'ktp'</span>    => <span class="string">'/path/to/ktp.jpg'</span>,
        <span class="string">'bpjs_card'</span> => <span class="string">'/path/to/bpjs.pdf'</span>,
        <span class="string">'rujukan'</span> => <span class="string">'/path/to/rujukan.pdf'</span>,
    ]
);

<span class="keyword">if</span> (<span class="variable">$response</span>-><span class="function">ok</span>()) {
    <span class="variable">$uploadId</span> = <span class="variable">$response</span>-><span class="function">json</span>(<span class="string">'data.id'</span>);
}</code></pre>
                </div>
            </section>

            <!-- Fake Mode -->
            <section id="fake-mode">
                <h2>🧪 Testing: Fake / Mock Mode</h2>

                <h3>Basic Fake (All Requests Return 200)</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="comment">// Aktifkan fake mode - semua request return 200 {}</span>
<span class="class">Http</span>::<span class="function">fake</span>();

<span class="comment">// Semua request akan sukses tanpa koneksi internet</span>
<span class="variable">$response</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'https://api.example.com/users'</span>);
<span class="variable">$response</span>-><span class="function">status</span>(); <span class="comment">// 200</span>

<span class="comment">// Jangan lupa reset</span>
<span class="class">Http</span>::<span class="function">resetFake</span>();</code></pre>
                </div>

                <h3>Custom Stub Responses</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="comment">// Stub spesifik per URL pattern</span>
<span class="class">Http</span>::<span class="function">fake</span>([
    <span class="string">'https://api.example.com/users/*'</span> => [
        <span class="string">'status'</span> => <span class="number">200</span>,
        <span class="string">'body'</span>   => [<span class="string">'users'</span> => [[<span class="string">'id'</span> => <span class="number">1</span>, <span class="string">'name'</span> => <span class="string">'John'</span>]]],
    ],
    <span class="string">'https://api.example.com/posts/*'</span> => [
        <span class="string">'status'</span> => <span class="number">404</span>,
        <span class="string">'body'</span>   => [<span class="string">'error'</span> => <span class="string">'Not Found'</span>],
    ],
]);

<span class="comment">// Request ke /users/123 akan return data John</span>
<span class="variable">$users</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'https://api.example.com/users/123'</span>)
    -><span class="function">json</span>(<span class="string">'users.0.name'</span>); <span class="comment">// "John"</span>

<span class="comment">// Request ke /posts/456 akan return 404</span>
<span class="variable">$posts</span> = <span class="class">Http</span>::<span class="function">get</span>(<span class="string">'https://api.example.com/posts/456'</span>);
<span class="variable">$posts</span>-><span class="function">status</span>(); <span class="comment">// 404</span></code></pre>
                </div>
            </section>

            <!-- Assertions -->
            <section id="assertions">
                <h2>✅ Assertions</h2>

                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="keyword">public</span> <span class="keyword">function</span> <span class="function">test_bpjs_claim_creation</span>()
{
    <span class="comment">// Setup fake</span>
    <span class="variable">$fake</span> = <span class="class">Http</span>::<span class="function">fake</span>([
        <span class="string">'*/sep/create'</span> => [
            <span class="string">'status'</span> => <span class="number">201</span>,
            <span class="string">'body'</span>   => [<span class="string">'sep'</span> => [<span class="string">'noSep'</span> => <span class="string">'1234567890'</span>]],
        ],
    ]);
    
    <span class="comment">// Execute code yang akan di-test</span>
    <span class="variable">$service</span> = <span class="keyword">new</span> <span class="class">BpjsClaimService</span>();
    <span class="variable">$result</span>  = <span class="variable">$service</span>-><span class="function">createSep</span>(<span class="variable">$patientData</span>);
    
    <span class="comment">// Assertions</span>
    <span class="variable">$fake</span>-><span class="function">assertSent</span>(<span class="string">'*/sep/create'</span>);
    <span class="variable">$fake</span>-><span class="function">assertSentCount</span>(<span class="number">1</span>);
    
    <span class="comment">// Assert request body</span>
    <span class="variable">$fake</span>-><span class="function">assertSent</span>(<span class="keyword">function</span> (<span class="variable">$request</span>) {
        <span class="keyword">return</span> <span class="variable">$request</span>[<span class="string">'method'</span>] === <span class="string">'POST'</span> 
            && <span class="variable">$request</span>[<span class="string">'url'</span>] === <span class="string">'https://api.bpjs.go.id/sep/create'</span>
            && <span class="variable">$request</span>[<span class="string">'body'</span>][<span class="string">'peserta'</span>][<span class="string">'noKartu'</span>] === <span class="string">'0001234567890'</span>;
    });
    
    <span class="comment">// Assert tidak ada request yang tidak di-stub</span>
    <span class="variable">$fake</span>-><span class="function">assertNothingSent</span>();
    
    <span class="class">Http</span>::<span class="function">resetFake</span>();
}</code></pre>
                </div>
            </section>

            <!-- API Reference -->
            <section id="api-reference">
                <h2>📚 API Reference</h2>

                <h3>HTTP Methods</h3>
                <ul class="method-list">
                    <li><span class="badge badge-get">GET</span> <code>Http::get(string $url, array $query = [])</code></li>
                    <li><span class="badge badge-post">POST</span> <code>Http::post(string $url, mixed $data = [])</code></li>
                    <li><span class="badge badge-put">PUT</span> <code>Http::put(string $url, mixed $data = [])</code></li>
                    <li><span class="badge badge-patch">PATCH</span> <code>Http::patch(string $url, mixed $data = [])</code></li>
                    <li><span class="badge badge-delete">DELETE</span> <code>Http::delete(string $url, mixed $data = [])</code></li>
                </ul>

                <h3>Static Methods</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>Http::new()</code></td>
                            <td>Buat instance baru dengan global middleware</td>
                        </tr>
                        <tr>
                            <td><code>Http::fake(?array $stubs)</code></td>
                            <td>Aktifkan fake mode untuk testing</td>
                        </tr>
                        <tr>
                            <td><code>Http::resetFake()</code></td>
                            <td>Nonaktifkan fake mode</td>
                        </tr>
                        <tr>
                            <td><code>Http::pool(callable $callback)</code></td>
                            <td>Jalankan parallel requests</td>
                        </tr>
                        <tr>
                            <td><code>Http::macro(string $name, callable $fn)</code></td>
                            <td>Register custom method</td>
                        </tr>
                        <tr>
                            <td><code>Http::withMiddleware(callable $mw)</code></td>
                            <td>Register global middleware</td>
                        </tr>
                        <tr>
                            <td><code>Http::resetMiddleware()</code></td>
                            <td>Reset semua global middleware</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Exceptions -->
            <section id="exceptions">
                <h2>💥 Exceptions</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Exception</th>
                            <th>When</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>HttpException</code></td>
                            <td>Response 4xx/5xx saat <code>throw()</code> diaktifkan</td>
                        </tr>
                        <tr>
                            <td><code>\RuntimeException</code></td>
                            <td>cURL error atau semua retry gagal</td>
                        </tr>
                        <tr>
                            <td><code>\InvalidArgumentException</code></td>
                            <td>File tidak ditemukan saat upload</td>
                        </tr>
                        <tr>
                            <td><code>\BadMethodCallException</code></td>
                            <td>Macro/static method tidak ditemukan</td>
                        </tr>
                    </tbody>
                </table>

                <h3>HttpException Methods</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Method</th>
                            <th>Return</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>getStatusCode()</code></td>
                            <td>int</td>
                            <td>HTTP status code</td>
                        </tr>
                        <tr>
                            <td><code>getResponseBody()</code></td>
                            <td>mixed</td>
                            <td>Response body saat error</td>
                        </tr>
                        <tr>
                            <td><code>isClientError()</code></td>
                            <td>bool</td>
                            <td>True jika 4xx</td>
                        </tr>
                        <tr>
                            <td><code>isServerError()</code></td>
                            <td>bool</td>
                            <td>True jika 5xx</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Examples -->
            <section id="examples">
                <h2>🎯 Complete Examples</h2>

                <h3>BPJS VClaim Service Integration</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="keyword">class</span> <span class="class">BpjsVClaimService</span>
{
    <span class="keyword">private</span> <span class="class">Http</span> <span class="variable">$http</span>;
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">__construct</span>()
    {
        <span class="comment">// Setup base configuration</span>
        <span class="variable">$this</span>-><span class="variable">http</span> = <span class="class">Http</span>::<span class="function">new</span>()
            -><span class="function">baseUrl</span>(<span class="function">env</span>(<span class="string">'BPJS_VCLAIM_URL'</span>))
            -><span class="function">withHeaders</span>([
                <span class="string">'X-Cons-ID'</span>   => <span class="function">env</span>(<span class="string">'BPJS_CONS_ID'</span>),
                <span class="string">'X-Timestamp'</span> => <span class="function">time</span>(),
                <span class="string">'X-Signature'</span> => <span class="variable">$this</span>-><span class="function">generateSignature</span>(),
            ])
            -><span class="function">timeout</span>(<span class="number">30</span>)
            -><span class="function">retry</span>(<span class="number">2</span>, <span class="number">500</span>)
            -><span class="function">throw</span>();
    }
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">getPeserta</span>(<span class="variable">$noKartu</span>): <span class="keyword">array</span>
    {
        <span class="keyword">return</span> <span class="variable">$this</span>-><span class="variable">http</span>
            -><span class="function">get</span>(<span class="string">"/peserta/nokartu/{$noKartu}/tglSEP/"</span> . <span class="function">date</span>(<span class="string">'Y-m-d'</span>))
            -><span class="function">json</span>(<span class="string">'response.peserta'</span>);
    }
    
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">createSep</span>(<span class="keyword">array</span> <span class="variable">$data</span>): <span class="keyword">string</span>
    {
        <span class="variable">$response</span> = <span class="variable">$this</span>-><span class="variable">http</span>
            -><span class="function">post</span>(<span class="string">'/sep/insert'</span>, [<span class="string">'request'</span> => [<span class="string">'t_sep'</span> => <span class="variable">$data</span>]]);
            
        <span class="keyword">return</span> <span class="variable">$response</span>-><span class="function">json</span>(<span class="string">'response.sep.noSep'</span>);
    }
    
    <span class="keyword">private</span> <span class="keyword">function</span> <span class="function">generateSignature</span>(): <span class="keyword">string</span>
    {
        <span class="variable">$data</span> = <span class="function">env</span>(<span class="string">'BPJS_CONS_ID'</span>) . <span class="string">'&'</span> . <span class="function">time</span>();
        <span class="keyword">return</span> <span class="function">base64_encode</span>(
            <span class="function">hash_hmac</span>(<span class="string">'sha256'</span>, <span class="variable">$data</span>, <span class="function">env</span>(<span class="string">'BPJS_SECRET_KEY'</span>), <span class="keyword">true</span>)
        );
    }
}</code></pre>
                </div>

                <h3>Real-world BPJS Flow</h3>
                <div class="code-block">
                    <span class="lang-tag">PHP</span>
                    <pre><code><span class="keyword">class</span> <span class="class">BpjsController</span>
{
    <span class="keyword">public</span> <span class="keyword">function</span> <span class="function">bridgingFlow</span>(<span class="variable">$noKartu</span>)
    {
        <span class="keyword">try</span> {
            <span class="comment">// Parallel requests untuk data yang dibutuhkan</span>
            <span class="variable">$responses</span> = <span class="class">Http</span>::<span class="function">pool</span>(<span class="keyword">function</span> (<span class="class">HttpPool</span> <span class="variable">$pool</span>) <span class="keyword">use</span> (<span class="variable">$noKartu</span>) {
                <span class="comment">// Get peserta info</span>
                <span class="variable">$pool</span>-><span class="function">as</span>(<span class="string">'peserta'</span>)
                    -><span class="function">withHeaders</span>([<span class="string">'X-Cons-ID'</span> => <span class="variable">$consId</span>])
                    -><span class="function">get</span>(<span class="string">"/vclaim-rest/peserta/{$noKartu}"</span>);
                
                <span class="comment">// Get rujukan list</span>
                <span class="variable">$pool</span>-><span class="function">as</span>(<span class="string">'rujukan'</span>)
                    -><span class="function">withHeaders</span>([<span class="string">'X-Cons-ID'</span> => <span class="variable">$consId</span>])
                    -><span class="function">get</span>(<span class="string">"/vclaim-rest/rujukan/peserta/{$noKartu}"</span>);
                
                <span class="comment">// Get poli list</span>
                <span class="variable">$pool</span>-><span class="function">as</span>(<span class="string">'poli'</span>)
                    -><span class="function">withHeaders</span>([<span class="string">'X-Cons-ID'</span> => <span class="variable">$consId</span>])
                    -><span class="function">get</span>(<span class="string">"/vclaim-rest/referensi/poli"</span>);
            });
            
            <span class="comment">// Process responses</span>
            <span class="variable">$peserta</span> = <span class="variable">$responses</span>[<span class="string">'peserta'</span>]-><span class="function">json</span>(<span class="string">'response.peserta'</span>);
            <span class="variable">$rujukan</span> = <span class="variable">$responses</span>[<span class="string">'rujukan'</span>]-><span class="function">json</span>(<span class="string">'response.rujukan'</span>);
            <span class="variable">$poli</span>    = <span class="variable">$responses</span>[<span class="string">'poli'</span>]-><span class="function">json</span>(<span class="string">'response.list'</span>);
            
            <span class="comment">// Return combined data</span>
            <span class="keyword">return</span> [
                <span class="string">'peserta'</span> => <span class="variable">$peserta</span>,
                <span class="string">'rujukan'</span> => <span class="variable">$rujukan</span>,
                <span class="string">'poli'</span>    => <span class="variable">$poli</span>,
            ];
            
        } <span class="keyword">catch</span> (<span class="class">HttpException</span> <span class="variable">$e</span>) {
            <span class="keyword">return</span> [
                <span class="string">'error'</span>  => <span class="keyword">true</span>,
                <span class="string">'code'</span>   => <span class="variable">$e</span>-><span class="function">getStatusCode</span>(),
                <span class="string">'detail'</span> => <span class="variable">$e</span>-><span class="function">getResponseBody</span>(),
            ];
        }
    }
}</code></pre>
                </div>
            </section>
        </main>

        <!-- Back to Top -->
        <a href="#" class="back-to-top" title="Back to top">↑</a>
    </div>

    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
                
                // Update active state
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Back to top
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Highlight active section on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (window.pageYOffset >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>