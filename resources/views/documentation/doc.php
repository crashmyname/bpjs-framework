<!-- views/documentation/doc.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'BPJS Framework' ?> — Documentation</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?= asset('bpjs.png') ?>" type="image/x-icon">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #3730a3;
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #4f46e5;
            --text-muted: #94a3b8;
            --text-light: #cbd5e1;
            --bg-page: #f1f5f9;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --radius: 12px;
            --shadow: 0 1px 3px rgba(0,0,0,0.06);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.08);
            --transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--bg-page);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
        }
        
        .sidebar {
            width: 270px; min-width: 270px;
            background: var(--sidebar-bg); color: white;
            height: 100vh; position: sticky; top: 0;
            overflow-y: auto; display: flex; flex-direction: column;
            z-index: 100; transition: var(--transition);
        }
        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 4px; }
        
        .sidebar-brand { padding: 1.5rem 1.25rem; border-bottom: 1px solid rgba(255,255,255,0.06); flex-shrink: 0; }
        .sidebar-brand a { color: white; text-decoration: none; font-weight: 800; font-size: 1.15rem; display: flex; align-items: center; gap: 10px; letter-spacing: -0.3px; }
        .sidebar-brand img { width: 34px; height: 34px; border-radius: 8px; object-fit: contain; }
        
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .nav-section { margin-bottom: 0.5rem; }
        .nav-section-title { padding: 0.75rem 1.25rem 0.4rem; font-size: 0.68rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: #64748b; }
        .nav-item { list-style: none; }
        
        .nav-link-sidebar {
            display: flex; align-items: center; gap: 10px;
            padding: 0.55rem 1.25rem; margin: 2px 0.75rem; border-radius: 8px;
            color: var(--text-light); text-decoration: none;
            font-size: 0.875rem; font-weight: 500;
            transition: var(--transition); cursor: pointer;
            border: none; background: none; width: 100%; text-align: left;
        }
        .nav-link-sidebar:hover { background: var(--sidebar-hover); color: white; }
        .nav-link-sidebar.active { background: var(--sidebar-active) !important; color: white !important; font-weight: 600; box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4); }
        .nav-link-sidebar i { width: 18px; text-align: center; font-size: 0.9rem; opacity: 0.8; }
        
        .nav-dropdown > .nav-link-sidebar::after { content: '\F282'; font-family: 'bootstrap-icons'; margin-left: auto; font-size: 0.7rem; transition: transform 0.2s; }
        .nav-dropdown.open > .nav-link-sidebar::after { transform: rotate(180deg); }
        .nav-submenu { list-style: none; padding: 0; margin: 0; max-height: 0; overflow: hidden; transition: max-height 0.35s ease; }
        .nav-dropdown.open .nav-submenu { max-height: 1200px; }
        .nav-submenu .nav-link-sidebar { padding-left: 3rem; font-size: 0.8rem; }
        
        .sidebar-footer { padding: 1rem 1.25rem; border-top: 1px solid rgba(255,255,255,0.06); flex-shrink: 0; }
        .sidebar-footer .version { font-size: 0.7rem; color: #64748b; font-weight: 500; }
        .sidebar-footer .github-link { color: var(--text-muted); font-size: 0.8rem; text-decoration: none; display: flex; align-items: center; gap: 6px; margin-top: 6px; }
        .sidebar-footer .github-link:hover { color: white; }
        
        .main-content { flex: 1; min-width: 0; display: flex; flex-direction: column; min-height: 100vh; }
        
        .topbar {
            background: white; border-bottom: 1px solid var(--border);
            padding: 0.75rem 1.5rem; display: flex; align-items: center;
            justify-content: space-between; position: sticky; top: 0; z-index: 50; gap: 1rem;
        }
        .topbar .menu-toggle { background: none; border: none; font-size: 1.3rem; color: #64748b; cursor: pointer; padding: 0.25rem; display: none; border-radius: 6px; }
        .topbar .menu-toggle:hover { color: var(--primary); background: #f1f5f9; }
        .topbar .breadcrumb-custom { font-size: 0.85rem; color: #64748b; display: flex; align-items: center; gap: 6px; }
        .topbar .breadcrumb-custom a { color: var(--primary); text-decoration: none; font-weight: 500; }
        .topbar .breadcrumb-custom a:hover { text-decoration: underline; }
        .topbar-actions { display: flex; align-items: center; gap: 0.75rem; }
        .topbar-actions .btn-icon { width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #64748b; text-decoration: none; transition: var(--transition); font-size: 1.1rem; }
        .topbar-actions .btn-icon:hover { background: #f1f5f9; color: var(--primary); }
        
        .content-area { padding: 1.5rem; flex: 1; }
        
        .card-custom { background: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); box-shadow: var(--shadow); margin-bottom: 1.5rem; transition: var(--transition); }
        .card-custom:hover { box-shadow: var(--shadow-lg); }
        .card-custom .card-header-custom { padding: 1rem 1.25rem; border-bottom: 1px solid var(--border); font-weight: 700; font-size: 1rem; color: #1e293b; display: flex; align-items: center; gap: 8px; }
        .card-custom .card-body-custom { padding: 1.25rem; }
        
        .code-block { background: #1e293b; border-radius: 10px; overflow: hidden; margin: 0.75rem 0; }
        .code-block pre { padding: 1.25rem; margin: 0; overflow-x: auto; font-family: 'JetBrains Mono', 'Fira Code', 'Consolas', monospace; font-size: 0.8rem; line-height: 1.7; color: #e2e8f0; }
        
        .badge-custom { font-size: 0.7rem; font-weight: 600; padding: 0.25em 0.7em; border-radius: 6px; }
        .badge-get { background: #dbeafe; color: #1e40af; }
        .badge-post { background: #d1fae5; color: #065f46; }
        .badge-put { background: #fef3c7; color: #92400e; }
        .badge-delete { background: #fee2e2; color: #991b1b; }
        
        .table-custom { width: 100%; border-collapse: collapse; }
        .table-custom th { font-size: 0.72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: #64748b; padding: 0.75rem 1rem; border-bottom: 2px solid var(--border); text-align: left; }
        .table-custom td { padding: 0.75rem 1rem; border-bottom: 1px solid #f1f5f9; font-size: 0.85rem; }
        
        .alert-custom { padding: 1rem 1.25rem; border-radius: 10px; margin: 1rem 0; font-size: 0.85rem; border: none; display: flex; align-items: flex-start; gap: 10px; }
        .alert-info-custom { background: #eff6ff; color: #1e40af; }
        .alert-success-custom { background: #f0fdf4; color: #166534; }
        .alert-warning-custom { background: #fffbeb; color: #92400e; }
        .alert-danger-custom { background: #fef2f2; color: #991b1b; }
        
        .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1.5rem; }
        .stat-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); padding: 1.25rem; text-align: center; }
        .stat-card .stat-number { font-size: 1.75rem; font-weight: 800; color: var(--primary); }
        .stat-card .stat-label { font-size: 0.8rem; color: #64748b; font-weight: 500; margin-top: 0.25rem; }
        
        .tabs-custom { display: flex; gap: 0; border-bottom: 2px solid var(--border); margin-bottom: 1rem; }
        .tabs-custom .tab-item { padding: 0.6rem 1.25rem; font-size: 0.85rem; font-weight: 600; color: #64748b; cursor: pointer; border-bottom: 2px solid transparent; margin-bottom: -2px; transition: var(--transition); background: none; border-top: none; border-left: none; border-right: none; }
        .tabs-custom .tab-item:hover { color: var(--primary); }
        .tabs-custom .tab-item.active { color: var(--primary); border-bottom-color: var(--primary); }
        .tab-content { display: none; }
        .tab-content.active { display: block; }
        
        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 99; }
        .sidebar-overlay.show { display: block; }
        
        @media (max-width: 992px) {
            .sidebar { position: fixed; left: -280px; top: 0; bottom: 0; z-index: 100; transition: left 0.3s ease; }
            .sidebar.open { left: 0; }
            .sidebar-overlay.show { display: block; }
            .topbar .menu-toggle { display: block; }
            .stats-row { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 576px) {
            .stats-row { grid-template-columns: 1fr; }
            .content-area { padding: 1rem; }
        }
    </style>
</head>
<body>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <a href="<?= base_url() ?>">
                <img src="<?= asset('bpjs.png') ?>" alt="Logo"> BPJS Framework
            </a>
        </div>
        
        <nav class="sidebar-nav">
            <!-- Getting Started -->
            <div class="nav-section">
                <div class="nav-section-title">Getting Started</div>
                <ul class="nav-item">
                    <li><a href="<?= url('/dokumentasi') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Get Started' ? 'active' : '' ?>">
                        <i class="bi bi-rocket-takeoff"></i> Installation
                    </a></li>
                </ul>
            </div>
            
            <!-- Core -->
            <div class="nav-section">
                <div class="nav-section-title">Core</div>
                <ul class="nav-item">
                    <li><a href="<?= route('route') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Route' ? 'active' : '' ?>">
                        <i class="bi bi-signpost-2"></i> Route
                    </a></li>
                    <li><a href="<?= route('api') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'API' ? 'active' : '' ?>">
                        <i class="bi bi-hdd-rack"></i> API Router
                    </a></li>
                    <li><a href="<?= route('controller') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Controller' ? 'active' : '' ?>">
                        <i class="bi bi-cpu"></i> Controller
                    </a></li>
                    <li><a href="<?= route('orm') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'ORM' ? 'active' : '' ?>">
                        <i class="bi bi-database"></i> ORM
                    </a></li>
                    <li><a href="<?= route('new-model') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'New Model' ? 'active' : '' ?>">
                        <i class="bi bi-box"></i> Model
                    </a></li>
                    <li><a href="<?= route('view') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'View' ? 'active' : '' ?>">
                        <i class="bi bi-eye"></i> View
                    </a></li>
                    <li><a href="<?= route('db') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'DB' ? 'active' : '' ?>">
                        <i class="bi bi-server"></i> DB Query Builder
                    </a></li>
                    <li><a href="<?= route('tableplus') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'TablePlus' ? 'active' : '' ?>">
                        <i class="bi bi-grid-3x3-gap"></i> TablePlus (Backend)
                    </a></li>
                </ul>
            </div>
            
            <!-- CLI & Config -->
            <div class="nav-section">
                <div class="nav-section-title">CLI & Config</div>
                <ul class="nav-item">
                    <li><a href="<?= route('cli') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'CLI' ? 'active' : '' ?>">
                        <i class="bi bi-terminal"></i> CLI
                    </a></li>
                    <li><a href="<?= route('env') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Env' ? 'active' : '' ?>">
                        <i class="bi bi-gear"></i> ENV
                    </a></li>
                </ul>
            </div>
            
            <!-- Helpers -->
            <div class="nav-section">
                <div class="nav-section-title">Helpers</div>
                <ul class="nav-item">
                    <li class="nav-dropdown <?= in_array($title ?? '', ['Auth', 'Cors', 'Crypto', 'CSRF', 'DataTable', 'Date', 'Http', 'Mailer', 'Rate Limiter', 'Request', 'Response', 'Store', 'Validator', 'Asset', 'Char', 'Importer', 'Session', 'Queue', 'TablePlus JS','API']) ? 'open' : '' ?>" id="helpersDropdown">
                        <button class="nav-link-sidebar" onclick="toggleDropdown('helpersDropdown')">
                            <i class="bi bi-tools"></i> All Helpers
                        </button>
                        <ul class="nav-submenu">
                            <li><a href="<?= route('asset') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Asset' ? 'active' : '' ?>">Asset</a></li>
                            <li><a href="<?= route('auth') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Auth' ? 'active' : '' ?>">Auth Middleware</a></li>
                            <li><a href="<?= route('char') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Char' ? 'active' : '' ?>">Char</a></li>
                            <li><a href="<?= route('cors') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Cors' ? 'active' : '' ?>">CORS</a></li>
                            <li><a href="<?= route('crypto') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Crypto' ? 'active' : '' ?>">Crypto</a></li>
                            <li><a href="<?= route('csrf') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'CSRF' ? 'active' : '' ?>">CSRF</a></li>
                            <li><a href="<?= route('datatable') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'DataTable' ? 'active' : '' ?>">DataTable</a></li>
                            <li><a href="<?= route('date') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Date' ? 'active' : '' ?>">Date</a></li>
                            <li><a href="<?= route('http') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Http' ? 'active' : '' ?>">HTTP Client</a></li>
                            <li><a href="<?= route('importer') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Importer' ? 'active' : '' ?>">Importer</a></li>
                            <li><a href="<?= route('mailer') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Mailer' ? 'active' : '' ?>">Mailer</a></li>
                            <li><a href="<?= route('queue') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Queue' ? 'active' : '' ?>">Queue</a></li>
                            <li><a href="<?= route('ratelimiter') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Rate Limiter' ? 'active' : '' ?>">Rate Limiter</a></li>
                            <li><a href="<?= route('request') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Request' ? 'active' : '' ?>">Request</a></li>
                            <li><a href="<?= route('response') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Response' ? 'active' : '' ?>">Response</a></li>
                            <li><a href="<?= route('session') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Session' ? 'active' : '' ?>">Session</a></li>
                            <li><a href="<?= route('store') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Store' ? 'active' : '' ?>">Store</a></li>
                            <li><a href="<?= route('validator') ?>" class="nav-link-sidebar <?= ($title ?? '') == 'Validator' ? 'active' : '' ?>">Validator</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="sidebar-footer">
            <div class="version">v2.5.1</div>
            <a href="https://github.com/crashmyname/bpjs-framework" target="_blank" class="github-link">
                <i class="bi bi-github"></i> GitHub
            </a>
        </div>
    </aside>

    <div class="main-content">
        <header class="topbar">
            <button class="menu-toggle" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
            <div class="breadcrumb-custom">
                <a href="<?= base_url() ?>">Home</a>
                <i class="bi bi-chevron-right" style="font-size:0.7rem;"></i>
                <span><?= $title ?? 'Documentation' ?></span>
            </div>
            <div class="topbar-actions">
                <a href="<?= base_url() ?>" class="btn-icon" title="Home"><i class="bi bi-house"></i></a>
                <a href="https://github.com/crashmyname/bpjs-framework" target="_blank" class="btn-icon" title="GitHub"><i class="bi bi-github"></i></a>
            </div>
        </header>
        
        <div class="content-area">
            <?= $content ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });
        
        function toggleDropdown(id) {
            document.getElementById(id).classList.toggle('open');
        }
        
        document.querySelectorAll('.nav-link-sidebar[href]').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 992) {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>