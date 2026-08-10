<!-- views/welcome/welcome.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> - Lightweight PHP Framework</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?= asset('bpjs.png') ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #0f172a;
            --accent: #06b6d4;
            --light: #f8fafc;
            --gray: #64748b;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.08), 0 1px 2px rgba(0,0,0,0.06);
            --card-hover-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #ffffff;
            color: #1e293b;
            overflow-x: hidden;
        }
        
        /* ===== NAVBAR ===== */
        .navbar {
            padding: 1rem 0;
            background: rgba(255,255,255,0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.35rem;
            color: var(--secondary) !important;
        }
        
        .navbar-brand img {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            margin-right: 10px;
            object-fit: contain;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--gray) !important;
            transition: color 0.2s;
            margin: 0 0.25rem;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .btn-nav {
            background: var(--primary);
            color: white !important;
            border-radius: 8px;
            padding: 0.5rem 1.25rem !important;
            font-weight: 600;
            transition: all 0.2s;
        }
        
        .btn-nav:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        /* ===== HERO ===== */
        .hero {
            padding: 5rem 0 4rem;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 50%, #fae8ff 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(79,70,229,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(6,182,212,0.06) 0%, transparent 70%);
            border-radius: 50%;
        }
        
        .hero .container {
            position: relative;
            z-index: 1;
        }
        
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 0.4rem 1.2rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--gray);
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }
        
        .hero-badge .version {
            background: #dbeafe;
            color: #1e40af;
            padding: 0.15rem 0.6rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            color: var(--secondary);
            margin-bottom: 1.5rem;
        }
        
        .hero h1 .highlight {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 600px;
            line-height: 1.7;
            margin-bottom: 2.5rem;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .btn-primary-hero {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 0.85rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary-hero:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79,70,229,0.3);
            color: white;
        }
        
        .btn-outline-hero {
            background: white;
            color: var(--secondary);
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.85rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-outline-hero:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }
        
        .hero-illustration {
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.15;
            font-size: 20rem;
            color: var(--primary);
            pointer-events: none;
        }
        
        /* ===== STATS ===== */
        .stats-section {
            padding: 3rem 0;
            background: white;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .stat-item {
            text-align: center;
            padding: 1.5rem;
        }
        
        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .stat-item p {
            color: var(--gray);
            font-weight: 500;
            margin-top: 0.5rem;
        }
        
        /* ===== FEATURES ===== */
        .features-section {
            padding: 5rem 0;
            background: white;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary);
            margin-bottom: 1rem;
        }
        
        .section-header p {
            font-size: 1.1rem;
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .feature-card {
            background: white;
            border: 1px solid #f1f5f9;
            border-radius: 16px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card:hover {
            box-shadow: var(--card-hover-shadow);
            transform: translateY(-4px);
            border-color: #e2e8f0;
        }
        
        .feature-card .feature-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
            font-weight: 700;
        }
        
        .feature-card .icon-blue { background: #dbeafe; color: #2563eb; }
        .feature-card .icon-green { background: #d1fae5; color: #059669; }
        .feature-card .icon-purple { background: #ede9fe; color: #7c3aed; }
        .feature-card .icon-orange { background: #fff7ed; color: #ea580c; }
        .feature-card .icon-cyan { background: #ecfeff; color: #0891b2; }
        .feature-card .icon-pink { background: #fce7f3; color: #db2777; }
        
        .feature-card h4 {
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 0.75rem;
            color: var(--secondary);
        }
        
        .feature-card p {
            color: var(--gray);
            font-size: 0.9rem;
            line-height: 1.7;
            margin: 0;
        }
        
        .feature-card .feature-tag {
            display: inline-block;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.2rem 0.6rem;
            border-radius: 6px;
            margin-top: 1rem;
            background: #f1f5f9;
            color: var(--gray);
        }
        
        /* ===== CODE SHOWCASE ===== */
        .code-showcase {
            padding: 5rem 0;
            background: var(--secondary);
            color: white;
        }
        
        .code-showcase h2 {
            font-weight: 800;
            margin-bottom: 1rem;
        }
        
        .code-showcase p {
            color: #94a3b8;
            margin-bottom: 2rem;
        }
        
        .code-window {
            background: #1e293b;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
        }
        
        .code-window-header {
            background: #334155;
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .code-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        
        .code-dot.red { background: #ef4444; }
        .code-dot.yellow { background: #f59e0b; }
        .code-dot.green { background: #10b981; }
        
        .code-window-body {
            padding: 1.5rem;
            font-family: 'Fira Code', 'Consolas', 'Monaco', monospace;
            font-size: 0.85rem;
            line-height: 1.8;
            overflow-x: auto;
        }
        
        .code-window-body .c-keyword { color: #c084fc; }
        .code-window-body .c-function { color: #60a5fa; }
        .code-window-body .c-string { color: #34d399; }
        .code-window-body .c-comment { color: #64748b; font-style: italic; }
        .code-window-body .c-variable { color: #fbbf24; }
        
        /* ===== CTA ===== */
        .cta-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, var(--primary) 0%, #7c3aed 100%);
            text-align: center;
            color: white;
        }
        
        .cta-section h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        
        .cta-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto 2rem;
        }
        
        .btn-cta {
            background: white;
            color: var(--primary);
            border: none;
            border-radius: 10px;
            padding: 1rem 2.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.2s;
        }
        
        .btn-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        
        /* ===== FOOTER ===== */
        .footer {
            background: var(--secondary);
            color: #94a3b8;
            padding: 3rem 0 1.5rem;
        }
        
        .footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-bottom {
            border-top: 1px solid #334155;
            margin-top: 2rem;
            padding-top: 1.5rem;
            text-align: center;
            font-size: 0.9rem;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .hero-illustration { display: none; }
            .section-header h2 { font-size: 2rem; }
            .cta-section h2 { font-size: 2rem; }
            .stats-section .row > div { margin-bottom: 1.5rem; }
        }
        
        @media (max-width: 576px) {
            .hero h1 { font-size: 2rem; }
            .hero-buttons { flex-direction: column; }
            .hero-buttons .btn { width: 100%; justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <img src="<?= asset('bpjs.png') ?>" alt="Logo"> <?= $title ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= url('/dokumentasi') ?>">Documentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="https://github.com/crashmyname/bpjs-framework" target="_blank">GitHub</a></li>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn-nav" href="<?= url('/dokumentasi') ?>">
                            <i class="bi bi-arrow-right"></i> Get Started
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-badge">
                        <span>🚀 New Release</span>
                        <span class="version">v2.5</span>
                    </div>
                    <h1>Build Faster with <br><span class="highlight">BPJS Framework</span></h1>
                    <p>A lightweight, elegant PHP framework built on native PDO. Simple routing, powerful ORM, built-in validation, and everything you need to kickstart your next project.</p>
                    <div class="hero-buttons">
                        <a href="<?= url('/dokumentasi') ?>" class="btn btn-primary-hero">
                            <i class="bi bi-book"></i> Read the Docs
                        </a>
                        <a href="https://github.com/crashmyname/bpjs-framework" class="btn btn-outline-hero" target="_blank">
                            <i class="bi bi-github"></i> View on GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-illustration">
            <i class="bi bi-code-slash"></i>
        </div>
    </section>

    <!-- STATS -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <h3>7</h3>
                        <p>HTTP Methods</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <h3>20+</h3>
                        <p>Helper Functions</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <h3>PDO</h3>
                        <p>Database Driver</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <h3>&lt;1MB</h3>
                        <p>Lightweight</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="section-header">
                <h2>Everything You Need</h2>
                <p>Built with developer experience in mind. Simple, fast, and productive.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon icon-blue">
                            <i class="bi bi-signpost-2"></i>
                        </div>
                        <h4>Powerful Routing</h4>
                        <p>Define routes with closures or controllers. Named routes, prefix grouping, middleware support, and automatic caching.</p>
                        <span class="feature-tag">Routing</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon icon-green">
                            <i class="bi bi-database"></i>
                        </div>
                        <h4>Fluent ORM</h4>
                        <p>Intuitive query builder with method chaining. Support for joins, where clauses, pagination, and relationships.</p>
                        <span class="feature-tag">Database</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon icon-purple">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Built-in Validation</h4>
                        <p>Validate request data with simple rules. Required, email, min, max, unique, and custom validation rules.</p>
                        <span class="feature-tag">Security</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon icon-orange">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <h4>CLI Tools</h4>
                        <p>Generate controllers, models, and migrations from the command line. Speed up your development workflow.</p>
                        <span class="feature-tag">Productivity</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon icon-cyan">
                            <i class="bi bi-layers"></i>
                        </div>
                        <h4>Middleware Stack</h4>
                        <p>Add authentication, CORS, CSRF protection, rate limiting, and custom middleware to any route or group.</p>
                        <span class="feature-tag">Architecture</span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon icon-pink">
                            <i class="bi bi-gear"></i>
                        </div>
                        <h4>Easy Configuration</h4>
                        <p>Single <code>.env</code> file for all your settings. Database, mail, cache, and app config in one place.</p>
                        <span class="feature-tag">Config</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CODE SHOWCASE -->
    <section class="code-showcase">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <h2>Clean & Expressive Code</h2>
                    <p>Write less, do more. Our fluent API makes your code readable and maintainable.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <span class="badge bg-primary bg-opacity-25 text-white py-2 px-3">PDO Native</span>
                        <span class="badge bg-success bg-opacity-25 text-white py-2 px-3">MVC Pattern</span>
                        <span class="badge bg-info bg-opacity-25 text-white py-2 px-3">PHP 8.1+</span>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="code-window">
                        <div class="code-window-header">
                            <span class="code-dot red"></span>
                            <span class="code-dot yellow"></span>
                            <span class="code-dot green"></span>
                            <span style="color: #94a3b8; margin-left: 8px; font-size: 0.75rem;">routes/web.php</span>
                        </div>
                        <div class="code-window-body">
<pre><code><span class="c-keyword">use</span> Bpjs\Framework\Helpers\Route;

<span class="c-comment">// Simple route with closure</span>
Route::<span class="c-function">get</span>(<span class="c-string">'/'</span>, <span class="c-keyword">function</span>() {
    <span class="c-keyword">return</span> <span class="c-function">view</span>(<span class="c-string">'welcome'</span>, [<span class="c-string">'title'</span> => <span class="c-string">'Home'</span>]);
});

<span class="c-comment">// Controller route with middleware</span>
Route::<span class="c-function">get</span>(<span class="c-string">'/users'</span>, [<span class="c-variable">UserController</span>::<span class="c-keyword">class</span>, <span class="c-string">'index'</span>])
    -><span class="c-function">name</span>(<span class="c-string">'users.index'</span>);

<span class="c-comment">// Protected group with rate limiting</span>
Route::<span class="c-function">group</span>([<span class="c-variable">AuthMiddleware</span>::<span class="c-keyword">class</span>], <span class="c-keyword">function</span>() {
    Route::<span class="c-function">post</span>(<span class="c-string">'/login'</span>, [<span class="c-variable">AuthController</span>::<span class="c-keyword">class</span>, <span class="c-string">'login'</span>])
        -><span class="c-function">limit</span>(<span class="c-string">5</span>, <span class="c-string">60</span>);
});</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Build Something Great?</h2>
            <p>Get started in minutes with our comprehensive documentation and intuitive API.</p>
            <a href="<?= url('/dokumentasi') ?>" class="btn btn-cta">
                <i class="bi bi-rocket-takeoff"></i> Start Building Now
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><img src="<?= asset('bpjs.png') ?>" width="28" style="border-radius:6px;margin-right:8px;"><?= $title ?></h5>
                    <p style="color: #94a3b8;">A lightweight PHP framework built for developers who value simplicity and performance.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Documentation</h5>
                    <ul class="footer-links">
                        <li><a href="<?= route('instalasi') ?>">Getting Started</a></li>
                        <li><a href="<?= route('route') ?>">Routing</a></li>
                        <li><a href="<?= route('orm') ?>">ORM</a></li>
                        <li><a href="<?= route('controller') ?>">Controllers</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Helpers</h5>
                    <ul class="footer-links">
                        <li><a href="<?= route('validator') ?>">Validator</a></li>
                        <li><a href="<?= route('request') ?>">Request</a></li>
                        <li><a href="<?= route('http') ?>">HTTP Client</a></li>
                        <li><a href="<?= route('crypto') ?>">Crypto</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Community</h5>
                    <ul class="footer-links">
                        <li><a href="https://github.com/crashmyname/bpjs-framework" target="_blank">GitHub</a></li>
                        <li><a href="#">Issues</a></li>
                        <li><a href="#">Contributing</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Links</h5>
                    <ul class="footer-links">
                        <li><a href="<?= url('/dokumentasi') ?>">Docs</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; <?= date('Y') ?> <?= $title ?>. Built with ❤️ for PHP developers. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>