<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BaseModel — Dokumentasi ORM</title>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&family=Syne:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0c0e14;
    --bg2: #13161f;
    --bg3: #1a1e2a;
    --border: #252a38;
    --accent: #5b8af5;
    --accent2: #a78bfa;
    --accent3: #34d399;
    --accent4: #fb923c;
    --text: #e2e8f0;
    --text2: #94a3b8;
    --text3: #64748b;
    --code-bg: #0d1117;
    --danger: #f87171;
    --warning: #fbbf24;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'Syne', sans-serif;
    background: var(--bg);
    color: var(--text);
    line-height: 1.6;
    min-height: 100vh;
  }

  /* ── SIDEBAR ── */
  .layout { display: flex; min-height: 100vh; }

  .sidebar {
    width: 280px;
    min-width: 280px;
    background: var(--bg2);
    border-right: 1px solid var(--border);
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    scrollbar-width: thin;
    scrollbar-color: var(--border) transparent;
  }

  .sidebar-header {
    padding: 28px 24px 20px;
    border-bottom: 1px solid var(--border);
  }

  .sidebar-logo {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 6px;
  }

  .sidebar-title {
    font-size: 20px;
    font-weight: 800;
    color: var(--text);
    line-height: 1.2;
  }

  .sidebar-version {
    display: inline-block;
    margin-top: 8px;
    font-size: 10px;
    font-family: 'JetBrains Mono', monospace;
    background: var(--bg3);
    border: 1px solid var(--border);
    color: var(--text3);
    padding: 2px 8px;
    border-radius: 4px;
  }

  .sidebar-nav { padding: 16px 0; flex: 1; }

  .nav-section {
    padding: 8px 24px 4px;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--text3);
    margin-top: 8px;
  }

  .nav-link {
    display: block;
    padding: 7px 24px;
    font-size: 13px;
    font-weight: 500;
    color: var(--text2);
    text-decoration: none;
    transition: all 0.15s;
    border-left: 2px solid transparent;
  }

  .nav-link:hover {
    color: var(--text);
    background: var(--bg3);
    border-left-color: var(--accent);
  }

  .nav-link.active {
    color: var(--accent);
    border-left-color: var(--accent);
    background: rgba(91, 138, 245, 0.08);
  }

  /* ── MAIN ── */
  .main {
    flex: 1;
    min-width: 0;
    padding: 0 48px 80px;
    max-width: 900px;
  }

  /* ── HERO ── */
  .hero {
    padding: 64px 0 48px;
    border-bottom: 1px solid var(--border);
    margin-bottom: 56px;
    position: relative;
    overflow: hidden;
  }

  .hero::before {
    content: 'ORM';
    position: absolute;
    right: -20px;
    top: 20px;
    font-size: 140px;
    font-weight: 800;
    color: rgba(91,138,245,0.04);
    pointer-events: none;
    line-height: 1;
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(91,138,245,0.12);
    border: 1px solid rgba(91,138,245,0.3);
    color: var(--accent);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 5px 14px;
    border-radius: 100px;
    margin-bottom: 20px;
  }

  .hero h1 {
    font-size: 52px;
    font-weight: 800;
    line-height: 1.05;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #e2e8f0 0%, #94a3b8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .hero p {
    font-size: 16px;
    color: var(--text2);
    max-width: 600px;
    line-height: 1.7;
  }

  .hero-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 24px;
  }

  .tag {
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px;
    background: var(--bg3);
    border: 1px solid var(--border);
    color: var(--text3);
    padding: 4px 10px;
    border-radius: 4px;
  }

  /* ── SECTIONS ── */
  .section {
    margin-bottom: 72px;
    scroll-margin-top: 24px;
  }

  .section-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 8px;
  }

  .section h2 {
    font-size: 30px;
    font-weight: 800;
    color: var(--text);
    margin-bottom: 12px;
    line-height: 1.2;
  }

  .section > p {
    color: var(--text2);
    font-size: 15px;
    line-height: 1.75;
    margin-bottom: 28px;
  }

  /* ── METHOD CARDS ── */
  .method-card {
    background: var(--bg2);
    border: 1px solid var(--border);
    border-radius: 10px;
    margin-bottom: 16px;
    overflow: hidden;
    transition: border-color 0.2s;
  }

  .method-card:hover { border-color: rgba(91,138,245,0.35); }

  .method-header {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px 20px;
    cursor: pointer;
    user-select: none;
  }

  .method-badge {
    flex-shrink: 0;
    font-family: 'JetBrains Mono', monospace;
    font-size: 10px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 4px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 3px;
  }

  .badge-static { background: rgba(167,139,250,0.15); color: var(--accent2); border: 1px solid rgba(167,139,250,0.25); }
  .badge-public { background: rgba(52,211,153,0.12); color: var(--accent3); border: 1px solid rgba(52,211,153,0.25); }
  .badge-protected { background: rgba(251,146,60,0.12); color: var(--accent4); border: 1px solid rgba(251,146,60,0.25); }
  .badge-new { background: rgba(91,138,245,0.12); color: var(--accent); border: 1px solid rgba(91,138,245,0.25); }

  .method-name {
    font-family: 'JetBrains Mono', monospace;
    font-size: 14px;
    font-weight: 500;
    color: var(--text);
    flex: 1;
  }

  .method-name span { color: var(--text3); }

  .method-desc {
    font-size: 13px;
    color: var(--text2);
    margin-top: 4px;
    line-height: 1.5;
  }

  .method-body {
    border-top: 1px solid var(--border);
    padding: 20px;
    display: none;
  }

  .method-body.open { display: block; }

  .method-body p {
    color: var(--text2);
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 14px;
  }

  /* ── CODE ── */
  pre {
    background: var(--code-bg);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 18px 20px;
    overflow-x: auto;
    margin: 12px 0;
    font-family: 'JetBrains Mono', monospace;
    font-size: 13px;
    line-height: 1.65;
    scrollbar-width: thin;
  }

  code {
    font-family: 'JetBrains Mono', monospace;
    font-size: 12px;
    background: var(--code-bg);
    border: 1px solid var(--border);
    padding: 2px 7px;
    border-radius: 4px;
    color: var(--accent3);
  }

  pre code {
    background: none;
    border: none;
    padding: 0;
    font-size: 13px;
  }

  /* Syntax highlight colors */
  .k { color: #c792ea; }   /* keyword */
  .f { color: #82aaff; }   /* function */
  .s { color: #c3e88d; }   /* string */
  .c { color: #546e7a; font-style: italic; } /* comment */
  .n { color: #f78c6c; }   /* number */
  .t { color: #ffcb6b; }   /* type */
  .v { color: var(--text); } /* variable */
  .p { color: var(--text3); } /* punct */

  /* ── PROPERTY TABLE ── */
  .prop-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    margin: 20px 0;
  }

  .prop-table th {
    text-align: left;
    padding: 10px 16px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--text3);
    background: var(--bg3);
    border-bottom: 1px solid var(--border);
  }

  .prop-table td {
    padding: 12px 16px;
    border-bottom: 1px solid var(--border);
    vertical-align: top;
  }

  .prop-table tr:last-child td { border-bottom: none; }
  .prop-table tr:hover td { background: rgba(255,255,255,0.02); }

  .prop-table td:first-child {
    font-family: 'JetBrains Mono', monospace;
    font-size: 12px;
    color: var(--accent3);
    white-space: nowrap;
  }

  .prop-table td:nth-child(2) {
    font-family: 'JetBrains Mono', monospace;
    font-size: 12px;
    color: var(--accent2);
  }

  .prop-table td:last-child { color: var(--text2); line-height: 1.6; }

  /* ── CALLOUT ── */
  .callout {
    border-left: 3px solid;
    padding: 14px 18px;
    border-radius: 0 8px 8px 0;
    margin: 16px 0;
    font-size: 14px;
    line-height: 1.6;
  }

  .callout-info { border-color: var(--accent); background: rgba(91,138,245,0.08); color: var(--text2); }
  .callout-warning { border-color: var(--warning); background: rgba(251,191,36,0.08); color: var(--text2); }
  .callout-danger { border-color: var(--danger); background: rgba(248,113,113,0.08); color: var(--text2); }
  .callout-success { border-color: var(--accent3); background: rgba(52,211,153,0.08); color: var(--text2); }

  .callout strong { display: block; margin-bottom: 4px; font-weight: 700; }
  .callout-info strong { color: var(--accent); }
  .callout-warning strong { color: var(--warning); }
  .callout-danger strong { color: var(--danger); }
  .callout-success strong { color: var(--accent3); }

  /* ── GRID ── */
  .grid2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin: 16px 0; }

  .feature-card {
    background: var(--bg2);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 18px;
    transition: border-color 0.2s, transform 0.2s;
  }

  .feature-card:hover {
    border-color: rgba(91,138,245,0.3);
    transform: translateY(-2px);
  }

  .feature-icon { font-size: 22px; margin-bottom: 10px; }
  .feature-card h4 { font-size: 14px; font-weight: 700; color: var(--text); margin-bottom: 6px; }
  .feature-card p { font-size: 12px; color: var(--text2); line-height: 1.6; }

  /* ── RULE SEPARATOR ── */
  .rule {
    height: 1px;
    background: var(--border);
    margin: 40px 0;
  }

  /* ── CONVENTION TABLE ── */
  .conv-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    margin: 16px 0;
    border: 1px solid var(--border);
    border-radius: 8px;
    overflow: hidden;
  }

  .conv-table th {
    text-align: left;
    padding: 10px 16px;
    background: var(--bg3);
    color: var(--text3);
    font-size: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: 700;
  }

  .conv-table td {
    padding: 12px 16px;
    border-top: 1px solid var(--border);
    color: var(--text2);
  }

  .conv-table td:first-child,
  .conv-table td:nth-child(2) {
    font-family: 'JetBrains Mono', monospace;
    font-size: 12px;
  }

  .conv-table td:first-child { color: var(--danger); }
  .conv-table td:nth-child(2) { color: var(--accent3); }

  /* ── SEARCH ── */
  .search-wrap {
    padding: 16px 24px;
    border-bottom: 1px solid var(--border);
  }

  .search-input {
    width: 100%;
    background: var(--bg3);
    border: 1px solid var(--border);
    border-radius: 6px;
    padding: 8px 12px;
    color: var(--text);
    font-size: 13px;
    font-family: 'Syne', sans-serif;
    outline: none;
    transition: border-color 0.2s;
  }

  .search-input:focus { border-color: var(--accent); }
  .search-input::placeholder { color: var(--text3); }

  /* ── CHEVRON ── */
  .chevron {
    color: var(--text3);
    font-size: 12px;
    transition: transform 0.2s;
    margin-left: auto;
    flex-shrink: 0;
    margin-top: 5px;
  }

  .method-card.open .chevron { transform: rotate(90deg); }

  /* ── SCROLLBAR ── */
  ::-webkit-scrollbar { width: 6px; height: 6px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }

  /* ── RETURN TYPE ── */
  .return-type {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-family: 'JetBrains Mono', monospace;
    font-size: 11px;
    color: var(--accent4);
    background: rgba(251,146,60,0.1);
    border: 1px solid rgba(251,146,60,0.2);
    padding: 2px 8px;
    border-radius: 4px;
    margin-left: auto;
    flex-shrink: 0;
  }

  @media (max-width: 900px) {
    .sidebar { display: none; }
    .main { padding: 0 20px 60px; }
    .grid2 { grid-template-columns: 1fr; }
    .hero h1 { font-size: 36px; }
  }
</style>
</head>
<body>

<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <div class="sidebar-logo">BPJS Framework</div>
      <div class="sidebar-title">BaseModel</div>
      <span class="sidebar-version">v2.0 Extended</span>
    </div>

    <div class="search-wrap">
      <input class="search-input" type="text" placeholder="Cari method..." id="searchInput" oninput="filterNav(this.value)">
    </div>

    <nav class="sidebar-nav" id="sidebarNav">
      <div class="nav-section">Pengenalan</div>
      <a href="#overview" class="nav-link">Overview</a>
      <a href="#properties" class="nav-link">Properties</a>

      <div class="nav-section">Query Builder</div>
      <a href="#select" class="nav-link">SELECT & DISTINCT</a>
      <a href="#where" class="nav-link">WHERE Clauses</a>
      <a href="#join" class="nav-link">JOIN</a>
      <a href="#ordergroup" class="nav-link">ORDER / GROUP / LIMIT</a>

      <div class="nav-section">Read (Baca Data)</div>
      <a href="#get" class="nav-link">get() & first()</a>
      <a href="#find" class="nav-link">find() & all()</a>
      <a href="#aggregate" class="nav-link">Aggregate</a>
      <a href="#paginate" class="nav-link">paginate()</a>
      <a href="#chunk" class="nav-link">chunk()</a>

      <div class="nav-section">Write (Tulis Data)</div>
      <a href="#create" class="nav-link">create() & save()</a>
      <a href="#update" class="nav-link">update()</a>
      <a href="#delete" class="nav-link">delete()</a>
      <a href="#batch" class="nav-link">insertBatch()</a>

      <div class="nav-section">Extended Features</div>
      <a href="#appends" class="nav-link">Appends & Accessors</a>
      <a href="#casts" class="nav-link">Attribute Casting</a>
      <a href="#dirty" class="nav-link">Dirty Tracking</a>
      <a href="#softdelete" class="nav-link">Soft Delete</a>
      <a href="#timestamps" class="nav-link">Timestamps</a>
      <a href="#observers" class="nav-link">Observers & Events</a>
      <a href="#scopes" class="nav-link">Global Scopes</a>

      <div class="nav-section">Relations</div>
      <a href="#relations" class="nav-link">Definisi Relasi</a>
      <a href="#eager" class="nav-link">Eager Loading</a>

      <div class="nav-section">Serialization</div>
      <a href="#serial" class="nav-link">toCleanArray & toJson</a>
      <a href="#hidden" class="nav-link">Hidden & Visible</a>

      <div class="nav-section">Lainnya</div>
      <a href="#debug" class="nav-link">Debug Helper</a>
      <a href="#locking" class="nav-link">Locking</a>
      <a href="#transaction" class="nav-link">Transaksi</a>
    </nav>
  </aside>

  <!-- MAIN CONTENT -->
  <main class="main">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-badge">📦 ORM Documentation</div>
      <h1>BaseModel</h1>
      <p>Multi-engine ORM base class untuk PHP. Mendukung MySQL, PostgreSQL, SQL Server, dan SQLite dengan query builder yang ekspresif, dirty tracking, soft delete, observer, dan banyak lagi.</p>
      <div class="hero-tags">
        <span class="tag">PHP 8.1+</span>
        <span class="tag">PDO</span>
        <span class="tag">MySQL</span>
        <span class="tag">PostgreSQL</span>
        <span class="tag">SQL Server</span>
        <span class="tag">SQLite</span>
        <span class="tag">Multi-driver</span>
      </div>
    </div>

    <!-- ── OVERVIEW ── -->
    <section class="section" id="overview">
      <div class="section-label">01 / Pengenalan</div>
      <h2>Overview</h2>
      <p>BaseModel adalah ORM base class yang dirancang untuk framework BPJS. Extend class ini untuk membuat model yang terhubung ke tabel database, lengkap dengan query builder, relasi, event hooks, dan serialisasi.</p>

      <div class="grid2">
        <div class="feature-card">
          <div class="feature-icon">🔍</div>
          <h4>Query Builder Ekspresif</h4>
          <p>Chainable API untuk membangun query SQL dengan where, join, orderBy, limit, dan banyak method lainnya.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">🎯</div>
          <h4>Appends & Accessors</h4>
          <p>Tambahkan computed attribute ke output model menggunakan <code>$appends</code> dan method <code>getXxxAttribute()</code>.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">🗑️</div>
          <h4>Soft Delete</h4>
          <p>Hapus data secara logis dengan <code>deleted_at</code>. Restore dan filter otomatis dengan flag <code>$softDelete = true</code>.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">📡</div>
          <h4>Observer Pattern</h4>
          <p>Hook ke lifecycle event model: creating, created, updating, updated, deleting, deleted untuk audit log dan lainnya.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">🔄</div>
          <h4>Dirty Tracking</h4>
          <p>Lacak perubahan attribute sejak model terakhir di-load atau di-save dengan <code>getDirty()</code>, <code>isDirty()</code>.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">⚡</div>
          <h4>Attribute Casting</h4>
          <p>Cast kolom database ke tipe PHP secara otomatis: int, float, bool, array (JSON), datetime, dan lainnya.</p>
        </div>
      </div>

      <div class="callout callout-info">
        <strong>💡 Cara Pakai</strong>
        Extend <code>BaseModel</code> dan definisikan property <code>$table</code>. Semua fitur langsung tersedia.
      </div>

<pre><code><span class="k">namespace</span> <span class="t">App\Models</span><span class="p">;</span>
<span class="k">use</span> <span class="t">Bpjs\Framework\Helpers\BaseModel</span><span class="p">;</span>

<span class="k">class</span> <span class="t">User</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$table</span>      <span class="p">=</span> <span class="s">'users'</span><span class="p">;</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$primaryKey</span> <span class="p">=</span> <span class="s">'id'</span><span class="p">;</span>
    <span class="k">protected</span> <span class="t">array</span>  <span class="v">$fillable</span>   <span class="p">= [</span><span class="s">'name'</span><span class="p">,</span> <span class="s">'email'</span><span class="p">,</span> <span class="s">'password'</span><span class="p">];</span>
    <span class="k">protected</span> <span class="t">bool</span>   <span class="v">$timestamps</span> <span class="p">=</span> <span class="k">true</span><span class="p">;</span>
    <span class="k">protected</span> <span class="t">bool</span>   <span class="v">$softDelete</span> <span class="p">=</span> <span class="k">true</span><span class="p">;</span>

    <span class="k">protected</span> <span class="t">array</span> <span class="v">$casts</span> <span class="p">= [</span>
        <span class="s">'is_active'</span> <span class="p">=></span> <span class="s">'bool'</span><span class="p">,</span>
        <span class="s">'meta'</span>      <span class="p">=></span> <span class="s">'array'</span><span class="p">,</span>
    <span class="p">];</span>

    <span class="k">protected</span> <span class="t">array</span> <span class="v">$appends</span> <span class="p">= [</span><span class="s">'full_name'</span><span class="p">];</span>

    <span class="k">public function</span> <span class="f">getFullNameAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">):</span> <span class="t">string</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="p">(</span><span class="v">$this</span><span class="p">->attributes[</span><span class="s">'first_name'</span><span class="p">] ??</span> <span class="s">''</span><span class="p">)</span>
             <span class="p">.</span> <span class="s">' '</span>
             <span class="p">. (</span><span class="v">$this</span><span class="p">->attributes[</span><span class="s">'last_name'</span><span class="p">] ??</span> <span class="s">''</span><span class="p">);</span>
    <span class="p">}</span>
<span class="p">}</span></code></pre>
    </section>

    <!-- ── PROPERTIES ── -->
    <section class="section" id="properties">
      <div class="section-label">02 / Properties</div>
      <h2>Properties</h2>
      <p>Property yang dapat di-override di child class untuk mengkonfigurasi perilaku model.</p>

      <table class="prop-table">
        <thead>
          <tr>
            <th>Property</th>
            <th>Type</th>
            <th>Default</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>$table</td><td>string</td><td>''</td><td>Nama tabel database</td></tr>
          <tr><td>$primaryKey</td><td>string</td><td>'id'</td><td>Nama kolom primary key</td></tr>
          <tr><td>$fillable</td><td>array</td><td>[]</td><td>Kolom yang boleh diisi via fill()/create()</td></tr>
          <tr><td>$guarded</td><td>array</td><td>[]</td><td>Kolom yang TIDAK boleh diisi (kebalikan fillable)</td></tr>
          <tr><td>$hidden</td><td>array</td><td>[]</td><td>Kolom yang disembunyikan dari output toCleanArray()</td></tr>
          <tr><td>$appends</td><td>array</td><td>[]</td><td>Key computed attribute yang ditambahkan ke output</td></tr>
          <tr><td>$casts</td><td>array</td><td>[]</td><td>Definisi cast tipe: ['kolom' => 'tipe']</td></tr>
          <tr><td>$timestamps</td><td>bool</td><td>false</td><td>Aktifkan auto created_at & updated_at</td></tr>
          <tr><td>$createdAtColumn</td><td>string</td><td>'created_at'</td><td>Override nama kolom created_at</td></tr>
          <tr><td>$updatedAtColumn</td><td>string</td><td>'updated_at'</td><td>Override nama kolom updated_at</td></tr>
          <tr><td>$softDelete</td><td>bool</td><td>false</td><td>Aktifkan soft delete</td></tr>
          <tr><td>$deletedAtColumn</td><td>string</td><td>'deleted_at'</td><td>Override nama kolom soft delete</td></tr>
        </tbody>
      </table>
    </section>

    <!-- ── APPENDS ── -->
    <section class="section" id="appends">
      <div class="section-label">Extended / Appends</div>
      <h2>Appends & Accessors</h2>
      <p>Fitur <code>$appends</code> memungkinkan Anda menambahkan attribute computed ke output model. Setiap key di <code>$appends</code> harus memiliki method accessor dengan konvensi penamaan yang tepat.</p>

      <div class="callout callout-warning">
        <strong>⚠️ Konvensi Penamaan</strong>
        Method accessor WAJIB mengikuti pola: <code>get{StudlyCase}Attribute()</code>. Ini dikonversi dari snake_case key di <code>$appends</code>.
      </div>

      <h3 style="font-size:16px;font-weight:700;margin:24px 0 12px;color:var(--text)">Tabel Konversi Nama</h3>

      <table class="conv-table">
        <thead>
          <tr>
            <th>❌ Salah</th>
            <th>✅ Benar</th>
            <th>Key di $appends</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>encryptId()</td><td>getEncryptIdAttribute()</td><td>'encrypt_id'</td></tr>
          <tr><td>fullName()</td><td>getFullNameAttribute()</td><td>'full_name'</td></tr>
          <tr><td>statusLabel()</td><td>getStatusLabelAttribute()</td><td>'status_label'</td></tr>
          <tr><td>createdHuman()</td><td>getCreatedHumanAttribute()</td><td>'created_human'</td></tr>
          <tr><td>isOwner()</td><td>getIsOwnerAttribute()</td><td>'is_owner'</td></tr>
        </tbody>
      </table>

      <div class="rule"></div>

      <h3 style="font-size:16px;font-weight:700;margin:0 0 12px;color:var(--text)">Contoh Penggunaan Lengkap</h3>

<pre><code><span class="k">class</span> <span class="t">Workspace</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$table</span>   <span class="p">=</span> <span class="s">'workspace'</span><span class="p">;</span>
    <span class="k">protected</span> <span class="t">array</span>  <span class="v">$appends</span> <span class="p">= [</span>
        <span class="s">'encrypt_id'</span><span class="p">,</span>    <span class="c">// computed dari PK</span>
        <span class="s">'display_name'</span><span class="p">,</span>  <span class="c">// format string</span>
        <span class="s">'status_label'</span><span class="p">,</span>  <span class="c">// kondisional</span>
        <span class="s">'created_human'</span><span class="p">,</span> <span class="c">// format tanggal</span>
        <span class="s">'full_url'</span><span class="p">,</span>      <span class="c">// gabungan config + data</span>
        <span class="s">'owner'</span><span class="p">,</span>         <span class="c">// relasi manual</span>
    <span class="p">];</span>

    <span class="c">// ✅ encrypt_id → getEncryptIdAttribute</span>
    <span class="k">public function</span> <span class="f">getEncryptIdAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">):</span> <span class="t">string</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="t">Crypto</span><span class="p">::</span><span class="f">encrypt</span><span class="p">(</span><span class="v">$this</span><span class="p">->attributes[</span><span class="s">'id'</span><span class="p">] ??</span> <span class="s">''</span><span class="p">);</span>
    <span class="p">}</span>

    <span class="c">// ✅ display_name → getDisplayNameAttribute</span>
    <span class="k">public function</span> <span class="f">getDisplayNameAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">):</span> <span class="t">string</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="f">strtoupper</span><span class="p">(</span><span class="v">$this</span><span class="p">->attributes[</span><span class="s">'name'</span><span class="p">] ??</span> <span class="s">''</span><span class="p">);</span>
    <span class="p">}</span>

    <span class="c">// ✅ status_label → getStatusLabelAttribute</span>
    <span class="k">public function</span> <span class="f">getStatusLabelAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">):</span> <span class="t">string</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="p">(</span><span class="v">$this</span><span class="p">->attributes[</span><span class="s">'is_active'</span><span class="p">] ??</span> <span class="n">0</span><span class="p">)</span>
            <span class="p">?</span> <span class="s">'Aktif'</span> <span class="p">:</span> <span class="s">'Nonaktif'</span><span class="p">;</span>
    <span class="p">}</span>

    <span class="c">// ✅ created_human → getCreatedHumanAttribute</span>
    <span class="k">public function</span> <span class="f">getCreatedHumanAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">):</span> <span class="t">string</span>
    <span class="p">{</span>
        <span class="v">$raw</span> <span class="p">=</span> <span class="v">$this</span><span class="p">->attributes[</span><span class="s">'created_at'</span><span class="p">] ??</span> <span class="k">null</span><span class="p">;</span>
        <span class="k">if</span> <span class="p">(!</span><span class="v">$raw</span><span class="p">)</span> <span class="k">return</span> <span class="s">'-'</span><span class="p">;</span>
        <span class="k">return</span> <span class="p">(</span><span class="k">new</span> <span class="t">\DateTime</span><span class="p">(</span><span class="v">$raw</span><span class="p">))->format(</span><span class="s">'d F Y'</span><span class="p">);</span>
    <span class="p">}</span>

    <span class="c">// ✅ full_url → getFullUrlAttribute</span>
    <span class="k">public function</span> <span class="f">getFullUrlAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">):</span> <span class="t">string</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="f">rtrim</span><span class="p">(</span><span class="f">env</span><span class="p">(</span><span class="s">'APP_URL'</span><span class="p">),</span> <span class="s">'/'</span><span class="p">)</span>
             <span class="p">.</span> <span class="s">'/workspace/'</span>
             <span class="p">. (</span><span class="v">$this</span><span class="p">->attributes[</span><span class="s">'slug'</span><span class="p">] ??</span> <span class="s">''</span><span class="p">);</span>
    <span class="p">}</span>

    <span class="c">// ✅ owner → getOwnerAttribute (return array/object)</span>
    <span class="k">public function</span> <span class="f">getOwnerAttribute</span><span class="p">(</span><span class="v">$value</span> <span class="p">=</span> <span class="k">null</span><span class="p">): ?</span><span class="t">array</span>
    <span class="p">{</span>
        <span class="v">$ownerId</span> <span class="p">=</span> <span class="v">$this</span><span class="p">->attributes[</span><span class="s">'owner_id'</span><span class="p">] ??</span> <span class="k">null</span><span class="p">;</span>
        <span class="k">if</span> <span class="p">(!</span><span class="v">$ownerId</span><span class="p">)</span> <span class="k">return</span> <span class="k">null</span><span class="p">;</span>
        <span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="v">$ownerId</span><span class="p">);</span>
        <span class="k">return</span> <span class="v">$user</span> <span class="p">?</span> <span class="v">$user</span><span class="p">-></span><span class="f">only</span><span class="p">([</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'name'</span><span class="p">,</span> <span class="s">'email'</span><span class="p">]) :</span> <span class="k">null</span><span class="p">;</span>
    <span class="p">}</span>
<span class="p">}</span>

<span class="c">// Output toCleanArray() / get() / paginate() / first() :</span>
<span class="p">{</span>
    <span class="s">"id"</span><span class="p">:</span> <span class="n">1</span><span class="p">,</span>
    <span class="s">"name"</span><span class="p">:</span> <span class="s">"my workspace"</span><span class="p">,</span>
    <span class="s">"encrypt_id"</span><span class="p">:</span> <span class="s">"abc123..."</span><span class="p">,</span>    <span class="c">// ← appended</span>
    <span class="s">"display_name"</span><span class="p">:</span> <span class="s">"MY WORKSPACE"</span><span class="p">,</span> <span class="c">// ← appended</span>
    <span class="s">"status_label"</span><span class="p">:</span> <span class="s">"Aktif"</span><span class="p">,</span>        <span class="c">// ← appended</span>
    <span class="s">"created_human"</span><span class="p">:</span> <span class="s">"15 January 2024"</span><span class="c">// ← appended</span>
<span class="p">}</span></code></pre>

      <div class="callout callout-success">
        <strong>✅ Otomatis di semua method</strong>
        Appends bekerja di <code>first()</code>, <code>get()</code>, <code>paginate()</code>, <code>toCleanArray()</code>, dan <code>toJson()</code> — tidak perlu konfigurasi tambahan.
      </div>
    </section>

    <!-- ── CASTING ── -->
    <section class="section" id="casts">
      <div class="section-label">Extended / Casting</div>
      <h2>Attribute Casting</h2>
      <p>Cast kolom database ke tipe PHP yang sesuai secara otomatis saat model di-load maupun disimpan kembali.</p>

      <table class="prop-table">
        <thead><tr><th>Tipe Cast</th><th>Input</th><th>Output PHP</th><th>Storage</th></tr></thead>
        <tbody>
          <tr><td>int / integer</td><td>'5'</td><td>5</td><td>5</td></tr>
          <tr><td>float / double</td><td>'3.14'</td><td>3.14</td><td>3.14</td></tr>
          <tr><td>bool / boolean</td><td>'1', '0'</td><td>true / false</td><td>1 / 0</td></tr>
          <tr><td>array / json</td><td>'["a","b"]'</td><td>['a','b']</td><td>'["a","b"]'</td></tr>
          <tr><td>object</td><td>'{"x":1}'</td><td>stdClass</td><td>'{"x":1}'</td></tr>
          <tr><td>string</td><td>123</td><td>'123'</td><td>'123'</td></tr>
          <tr><td>datetime</td><td>'2024-01-01'</td><td>DateTime object</td><td>'2024-01-01 00:00:00'</td></tr>
        </tbody>
      </table>

<pre><code><span class="k">class</span> <span class="t">Product</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">protected</span> <span class="t">array</span> <span class="v">$casts</span> <span class="p">= [</span>
        <span class="s">'price'</span>      <span class="p">=></span> <span class="s">'float'</span><span class="p">,</span>
        <span class="s">'is_active'</span>  <span class="p">=></span> <span class="s">'bool'</span><span class="p">,</span>
        <span class="s">'tags'</span>       <span class="p">=></span> <span class="s">'array'</span><span class="p">,</span>   <span class="c">// JSON kolom → PHP array</span>
        <span class="s">'meta'</span>       <span class="p">=></span> <span class="s">'object'</span><span class="p">,</span>
        <span class="s">'expires_at'</span> <span class="p">=></span> <span class="s">'datetime'</span><span class="p">,</span>
    <span class="p">];</span>
<span class="p">}</span>

<span class="v">$p</span> <span class="p">=</span> <span class="t">Product</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="n">1</span><span class="p">);</span>
<span class="v">$p</span><span class="p">->price;      </span><span class="c">// float: 99.99 (bukan string '99.99')</span>
<span class="v">$p</span><span class="p">->is_active;  </span><span class="c">// bool: true (bukan '1')</span>
<span class="v">$p</span><span class="p">->tags;       </span><span class="c">// array: ['php', 'orm'] (bukan JSON string)</span>
<span class="v">$p</span><span class="p">->expires_at; </span><span class="c">// DateTime object</span>

<span class="c">// Menyimpan ke DB: otomatis reverse-cast</span>
<span class="v">$p</span><span class="p">->tags = [</span><span class="s">'new'</span><span class="p">,</span> <span class="s">'tag'</span><span class="p">];</span>
<span class="v">$p</span><span class="p">-></span><span class="f">save</span><span class="p">();</span> <span class="c">// tags disimpan sebagai '["new","tag"]' di DB</span></code></pre>
    </section>

    <!-- ── DIRTY TRACKING ── -->
    <section class="section" id="dirty">
      <div class="section-label">Extended / Dirty Tracking</div>
      <h2>Dirty Tracking</h2>
      <p>Lacak perubahan attribute model sejak terakhir di-load dari database atau setelah save berhasil.</p>

<pre><code><span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="n">1</span><span class="p">);</span>
<span class="c">// original: ['name' => 'Budi', 'email' => 'budi@mail.com']</span>

<span class="v">$user</span><span class="p">->name =</span> <span class="s">'Andi'</span><span class="p">;</span>

<span class="v">$user</span><span class="p">-></span><span class="f">isDirty</span><span class="p">();           </span><span class="c">// true  — ada perubahan</span>
<span class="v">$user</span><span class="p">-></span><span class="f">isDirty</span><span class="p">(</span><span class="s">'name'</span><span class="p">);     </span><span class="c">// true  — 'name' berubah</span>
<span class="v">$user</span><span class="p">-></span><span class="f">isDirty</span><span class="p">(</span><span class="s">'email'</span><span class="p">);    </span><span class="c">// false — 'email' tidak berubah</span>
<span class="v">$user</span><span class="p">-></span><span class="f">isClean</span><span class="p">(</span><span class="s">'email'</span><span class="p">);    </span><span class="c">// true</span>
<span class="v">$user</span><span class="p">-></span><span class="f">getDirty</span><span class="p">();          </span><span class="c">// ['name' => 'Andi']</span>
<span class="v">$user</span><span class="p">-></span><span class="f">getOriginal</span><span class="p">(</span><span class="s">'name'</span><span class="p">); </span><span class="c">// 'Budi'</span>

<span class="v">$user</span><span class="p">-></span><span class="f">save</span><span class="p">();</span>

<span class="v">$user</span><span class="p">-></span><span class="f">wasChanged</span><span class="p">(</span><span class="s">'name'</span><span class="p">);  </span><span class="c">// true — berubah di save() terakhir</span>
<span class="v">$user</span><span class="p">-></span><span class="f">getChanges</span><span class="p">();        </span><span class="c">// ['name' => 'Andi']</span>
<span class="v">$user</span><span class="p">-></span><span class="f">isDirty</span><span class="p">();            </span><span class="c">// false — sudah sync setelah save</span></code></pre>

      <table class="prop-table">
        <thead><tr><th>Method</th><th>Keterangan</th></tr></thead>
        <tbody>
          <tr><td>getDirty()</td><td>Array attribute yang berubah sejak original</td></tr>
          <tr><td>getOriginal($key)</td><td>Nilai original sebelum perubahan</td></tr>
          <tr><td>isDirty($attrs)</td><td>Cek apakah attribute tertentu berubah</td></tr>
          <tr><td>isClean($attrs)</td><td>Kebalikan isDirty()</td></tr>
          <tr><td>getChanges()</td><td>Perubahan yang terjadi saat save() terakhir</td></tr>
          <tr><td>wasChanged($attrs)</td><td>Cek perubahan di save() terakhir</td></tr>
          <tr><td>syncOriginal()</td><td>Reset snapshot original ke state saat ini</td></tr>
        </tbody>
      </table>
    </section>

    <!-- ── SOFT DELETE ── -->
    <section class="section" id="softdelete">
      <div class="section-label">Extended / Soft Delete</div>
      <h2>Soft Delete</h2>
      <p>Hapus data secara logis dengan mengisi kolom <code>deleted_at</code>. Query otomatis difilter, dan data bisa di-restore kapan saja.</p>

<pre><code><span class="k">class</span> <span class="t">Post</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">protected</span> <span class="t">bool</span>   <span class="v">$softDelete</span>      <span class="p">=</span> <span class="k">true</span><span class="p">;</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$deletedAtColumn</span> <span class="p">=</span> <span class="s">'deleted_at'</span><span class="p">;</span> <span class="c">// default</span>
<span class="p">}</span>

<span class="v">$post</span> <span class="p">=</span> <span class="t">Post</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="n">1</span><span class="p">);</span>
<span class="v">$post</span><span class="p">-></span><span class="f">delete</span><span class="p">();        </span><span class="c">// soft delete → set deleted_at</span>
<span class="v">$post</span><span class="p">-></span><span class="f">trashed</span><span class="p">();       </span><span class="c">// true</span>
<span class="v">$post</span><span class="p">-></span><span class="f">restore</span><span class="p">();       </span><span class="c">// pulihkan → deleted_at = null</span>
<span class="v">$post</span><span class="p">-></span><span class="f">forceDelete</span><span class="p">();   </span><span class="c">// hapus permanen dari DB</span>

<span class="c">// Query otomatis difilter:</span>
<span class="t">Post</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">get</span><span class="p">();                   </span><span class="c">// WHERE deleted_at IS NULL</span>
<span class="t">Post</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">withTrashed</span><span class="p">()-></span><span class="f">get</span><span class="p">();  </span><span class="c">// semua, termasuk deleted</span>
<span class="t">Post</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">onlyTrashed</span><span class="p">()-></span><span class="f">get</span><span class="p">();  </span><span class="c">// hanya yang deleted</span></code></pre>
    </section>

    <!-- ── TIMESTAMPS ── -->
    <section class="section" id="timestamps">
      <div class="section-label">Extended / Timestamps</div>
      <h2>Timestamps</h2>
<pre><code><span class="k">class</span> <span class="t">Article</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">protected</span> <span class="t">bool</span> <span class="v">$timestamps</span> <span class="p">=</span> <span class="k">true</span><span class="p">;</span>
    <span class="c">// Opsional — override nama kolom:</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$createdAtColumn</span> <span class="p">=</span> <span class="s">'created_at'</span><span class="p">;</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$updatedAtColumn</span> <span class="p">=</span> <span class="s">'updated_at'</span><span class="p">;</span>
<span class="p">}</span>

<span class="v">$a</span> <span class="p">=</span> <span class="k">new</span> <span class="t">Article</span><span class="p">([</span><span class="s">'title'</span> <span class="p">=></span> <span class="s">'Hello'</span><span class="p">]);</span>
<span class="v">$a</span><span class="p">-></span><span class="f">save</span><span class="p">();</span>   <span class="c">// created_at & updated_at di-set otomatis</span>

<span class="v">$a</span><span class="p">-></span><span class="f">touch</span><span class="p">();</span>  <span class="c">// update hanya updated_at ke waktu sekarang</span></code></pre>
    </section>

    <!-- ── OBSERVERS ── -->
    <section class="section" id="observers">
      <div class="section-label">Extended / Observers</div>
      <h2>Observers & Events</h2>
      <p>Hook ke lifecycle event model untuk audit log, notifikasi, atau validasi tambahan.</p>

      <table class="prop-table">
        <thead><tr><th>Event</th><th>Trigger</th><th>Return false = batalkan?</th></tr></thead>
        <tbody>
          <tr><td>creating</td><td>Sebelum INSERT</td><td>Ya</td></tr>
          <tr><td>created</td><td>Setelah INSERT berhasil</td><td>Tidak</td></tr>
          <tr><td>updating</td><td>Sebelum UPDATE</td><td>Ya</td></tr>
          <tr><td>updated</td><td>Setelah UPDATE berhasil</td><td>Tidak</td></tr>
          <tr><td>deleting</td><td>Sebelum DELETE</td><td>Ya</td></tr>
          <tr><td>deleted</td><td>Setelah DELETE berhasil</td><td>Tidak</td></tr>
        </tbody>
      </table>

<pre><code><span class="k">class</span> <span class="t">UserObserver</span>
<span class="p">{</span>
    <span class="k">public function</span> <span class="f">creating</span><span class="p">(</span><span class="t">BaseModel</span> <span class="v">$model</span><span class="p">):</span> <span class="t">void</span>
    <span class="p">{</span>
        <span class="c">// Validasi sebelum INSERT</span>
    <span class="p">}</span>

    <span class="k">public function</span> <span class="f">created</span><span class="p">(</span><span class="t">BaseModel</span> <span class="v">$model</span><span class="p">):</span> <span class="t">void</span>
    <span class="p">{</span>
        <span class="t">AuditLog</span><span class="p">::</span><span class="f">record</span><span class="p">(</span><span class="s">'created'</span><span class="p">,</span> <span class="v">$model</span><span class="p">-></span><span class="f">getKey</span><span class="p">());</span>
    <span class="p">}</span>

    <span class="k">public function</span> <span class="f">updating</span><span class="p">(</span><span class="t">BaseModel</span> <span class="v">$model</span><span class="p">):</span> <span class="p">?</span><span class="t">bool</span>
    <span class="p">{</span>
        <span class="c">// return false untuk batalkan update</span>
        <span class="k">if</span> <span class="p">(!</span><span class="v">$model</span><span class="p">->is_active)</span> <span class="k">return false</span><span class="p">;</span>
    <span class="p">}</span>

    <span class="k">public function</span> <span class="f">updated</span><span class="p">(</span><span class="t">BaseModel</span> <span class="v">$model</span><span class="p">):</span> <span class="t">void</span>
    <span class="p">{</span>
        <span class="t">AuditLog</span><span class="p">::</span><span class="f">record</span><span class="p">(</span><span class="s">'updated'</span><span class="p">,</span> <span class="v">$model</span><span class="p">-></span><span class="f">getKey</span><span class="p">(), [</span>
            <span class="s">'before'</span>  <span class="p">=></span> <span class="v">$model</span><span class="p">-></span><span class="f">getOriginal</span><span class="p">(),</span>
            <span class="s">'changes'</span> <span class="p">=></span> <span class="v">$model</span><span class="p">-></span><span class="f">getChanges</span><span class="p">(),</span>
        <span class="p">]);</span>
    <span class="p">}</span>
<span class="p">}</span>

<span class="c">// Daftarkan observer ke model:</span>
<span class="t">User</span><span class="p">::</span><span class="f">observe</span><span class="p">(</span><span class="t">UserObserver</span><span class="p">::</span><span class="k">class</span><span class="p">);</span></code></pre>
    </section>

    <!-- ── GLOBAL SCOPES ── -->
    <section class="section" id="scopes">
      <div class="section-label">Extended / Scopes</div>
      <h2>Global Scopes</h2>
<pre><code><span class="k">class</span> <span class="t">ActiveUser</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">protected</span> <span class="t">string</span> <span class="v">$table</span> <span class="p">=</span> <span class="s">'users'</span><span class="p">;</span>

    <span class="k">protected function</span> <span class="f">bootGlobalScopes</span><span class="p">():</span> <span class="t">void</span>
    <span class="p">{</span>
        <span class="k">parent</span><span class="p">::</span><span class="f">bootGlobalScopes</span><span class="p">();</span>
        <span class="v">$this</span><span class="p">-></span><span class="f">addGlobalScope</span><span class="p">(</span><span class="s">'active'</span><span class="p">,</span>
            <span class="k">fn</span><span class="p">(</span><span class="v">$q</span><span class="p">) =></span> <span class="v">$q</span><span class="p">-></span><span class="f">where</span><span class="p">(</span><span class="s">'is_active'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)</span>
        <span class="p">);</span>
    <span class="p">}</span>
<span class="p">}</span>

<span class="t">ActiveUser</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">get</span><span class="p">();</span>
<span class="c">// → WHERE is_active = 1 (otomatis)</span>

<span class="t">ActiveUser</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">withoutScope</span><span class="p">(</span><span class="s">'active'</span><span class="p">)-></span><span class="f">get</span><span class="p">();</span>
<span class="c">// → tanpa filter scope</span>

<span class="t">ActiveUser</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">withoutGlobalScopes</span><span class="p">()-></span><span class="f">get</span><span class="p">();</span>
<span class="c">// → hapus semua scope</span></code></pre>
    </section>

    <!-- ── QUERY BUILDER ── -->
    <section class="section" id="select">
      <div class="section-label">Query Builder</div>
      <h2>SELECT & DISTINCT</h2>
<pre><code><span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">select</span><span class="p">(</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'name'</span><span class="p">,</span> <span class="s">'email'</span><span class="p">)-></span><span class="f">get</span><span class="p">();</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">selectRaw</span><span class="p">(</span><span class="s">'COUNT(*) as total, status'</span><span class="p">)-></span><span class="f">get</span><span class="p">();</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">distinct</span><span class="p">()-></span><span class="f">select</span><span class="p">(</span><span class="s">'city'</span><span class="p">)-></span><span class="f">get</span><span class="p">();</span></code></pre>
    </section>

    <section class="section" id="where">
      <div class="section-label">Query Builder</div>
      <h2>WHERE Clauses</h2>
<pre><code><span class="c">// Dasar</span>
<span class="v">$q</span><span class="p">-></span><span class="f">where</span><span class="p">(</span><span class="s">'status'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'active'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">where</span><span class="p">(</span><span class="s">'name'</span><span class="p">,</span> <span class="s">'LIKE'</span><span class="p">,</span> <span class="s">'%budi%'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">orWhere</span><span class="p">(</span><span class="s">'role'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'admin'</span><span class="p">);</span>

<span class="c">// IN / NOT IN</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereIn</span><span class="p">(</span><span class="s">'id'</span><span class="p">, [</span><span class="n">1</span><span class="p">,</span> <span class="n">2</span><span class="p">,</span> <span class="n">3</span><span class="p">]);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereNotIn</span><span class="p">(</span><span class="s">'status'</span><span class="p">, [</span><span class="s">'banned'</span><span class="p">,</span> <span class="s">'inactive'</span><span class="p">]);</span>

<span class="c">// NULL</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereNull</span><span class="p">(</span><span class="s">'deleted_at'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereNotNull</span><span class="p">(</span><span class="s">'email_verified_at'</span><span class="p">);</span>

<span class="c">// BETWEEN & tanggal</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereBetween</span><span class="p">(</span><span class="s">'age'</span><span class="p">,</span> <span class="n">18</span><span class="p">,</span> <span class="n">35</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereDate</span><span class="p">(</span><span class="s">'created_at'</span><span class="p">,</span> <span class="s">'2024-01-01'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereMonth</span><span class="p">(</span><span class="s">'created_at'</span><span class="p">,</span> <span class="n">1</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereYear</span><span class="p">(</span><span class="s">'created_at'</span><span class="p">,</span> <span class="n">2024</span><span class="p">);</span>

<span class="c">// RAW</span>
<span class="v">$q</span><span class="p">-></span><span class="f">whereRaw</span><span class="p">(</span><span class="s">'YEAR(created_at) = :y'</span><span class="p">, [</span><span class="s">':y'</span> <span class="p">=></span> <span class="n">2024</span><span class="p">]);</span>

<span class="c">// Closure grouping</span>
<span class="v">$q</span><span class="p">-></span><span class="f">where</span><span class="p">(</span><span class="k">function</span><span class="p">(</span><span class="v">$sub</span><span class="p">) {</span>
    <span class="v">$sub</span><span class="p">-></span><span class="f">where</span><span class="p">(</span><span class="s">'role'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'admin'</span><span class="p">)</span>
        <span class="p">-></span><span class="f">orWhere</span><span class="p">(</span><span class="s">'role'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'super'</span><span class="p">);</span>
<span class="p">});</span>
<span class="c">// → WHERE (role = 'admin' OR role = 'super')</span>

<span class="c">// Conditional</span>
<span class="v">$q</span><span class="p">-></span><span class="f">when</span><span class="p">(</span><span class="v">$request</span><span class="p">->has(</span><span class="s">'search'</span><span class="p">),</span>
    <span class="k">fn</span><span class="p">(</span><span class="v">$q</span><span class="p">) =></span> <span class="v">$q</span><span class="p">-></span><span class="f">where</span><span class="p">(</span><span class="s">'name'</span><span class="p">,</span> <span class="s">'LIKE'</span><span class="p">,</span> <span class="s">'%'</span><span class="p">.</span><span class="v">$request</span><span class="p">->search.</span><span class="s">'%'</span><span class="p">)</span>
<span class="p">);</span></code></pre>
    </section>

    <section class="section" id="join">
      <div class="section-label">Query Builder</div>
      <h2>JOIN</h2>
<pre><code><span class="v">$q</span><span class="p">-></span><span class="f">innerJoin</span><span class="p">(</span><span class="s">'roles'</span><span class="p">,</span> <span class="s">'users.role_id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'roles.id'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">leftJoin</span><span class="p">(</span><span class="s">'profiles'</span><span class="p">,</span> <span class="s">'users.id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'profiles.user_id'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">rightJoin</span><span class="p">(</span><span class="s">'orders'</span><span class="p">,</span> <span class="s">'users.id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'orders.user_id'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">crossJoin</span><span class="p">(</span><span class="s">'categories'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">joinRaw</span><span class="p">(</span><span class="s">'INNER JOIN logs l ON l.user_id = users.id AND l.type = "login"'</span><span class="p">);</span></code></pre>
    </section>

    <section class="section" id="ordergroup">
      <div class="section-label">Query Builder</div>
      <h2>ORDER / GROUP / LIMIT</h2>
<pre><code><span class="v">$q</span><span class="p">-></span><span class="f">orderBy</span><span class="p">(</span><span class="s">'name'</span><span class="p">,</span> <span class="s">'ASC'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">orderByRaw</span><span class="p">(</span><span class="s">'FIELD(status, "active", "pending", "inactive")'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">latest</span><span class="p">();</span>         <span class="c">// ORDER BY id DESC</span>
<span class="v">$q</span><span class="p">-></span><span class="f">latest</span><span class="p">(</span><span class="s">'created_at'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">oldest</span><span class="p">();</span>         <span class="c">// ORDER BY id ASC</span>

<span class="v">$q</span><span class="p">-></span><span class="f">groupBy</span><span class="p">(</span><span class="s">'status'</span><span class="p">);</span>
<span class="v">$q</span><span class="p">-></span><span class="f">groupBy</span><span class="p">([</span><span class="s">'status'</span><span class="p">,</span> <span class="s">'role'</span><span class="p">]);</span>

<span class="v">$q</span><span class="p">-></span><span class="f">limit</span><span class="p">(</span><span class="n">10</span><span class="p">)-></span><span class="f">offset</span><span class="p">(</span><span class="n">20</span><span class="p">);</span></code></pre>
    </section>

    <!-- ── READ ── -->
    <section class="section" id="get">
      <div class="section-label">Read</div>
      <h2>get() & first()</h2>
<pre><code><span class="c">// get() — semua baris</span>
<span class="v">$users</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'is_active'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">get</span><span class="p">();</span>

<span class="c">// get() sebagai model (support appends, relations, withCount)</span>
<span class="v">$users</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">get</span><span class="p">(</span><span class="t">PDO</span><span class="p">::</span><span class="t">FETCH_ASSOC</span><span class="p">,</span> <span class="k">true</span><span class="p">);</span>

<span class="c">// first() — satu baris (model instance)</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'email'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'budi@mail.com'</span><span class="p">)-></span><span class="f">first</span><span class="p">();</span>

<span class="c">// pluck — ambil satu kolom saja</span>
<span class="v">$emails</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">pluck</span><span class="p">(</span><span class="s">'email'</span><span class="p">);</span>
<span class="c">// ['a@mail.com', 'b@mail.com']</span>

<span class="v">$map</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">pluck</span><span class="p">(</span><span class="s">'name'</span><span class="p">,</span> <span class="s">'id'</span><span class="p">);</span>
<span class="c">// [1 => 'Budi', 2 => 'Andi']</span>

<span class="c">// exists / doesntExist</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'email'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'x@y.com'</span><span class="p">)-></span><span class="f">exists</span><span class="p">();</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'role'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="s">'ghost'</span><span class="p">)-></span><span class="f">doesntExist</span><span class="p">();</span></code></pre>
    </section>

    <section class="section" id="find">
      <div class="section-label">Read</div>
      <h2>find() & all()</h2>
<pre><code><span class="c">// Cari by primary key</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="n">1</span><span class="p">);</span>           <span class="c">// null jika tidak ada</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">findOrFail</span><span class="p">(</span><span class="n">999</span><span class="p">);</span>   <span class="c">// throw RuntimeException</span>

<span class="c">// Semua data</span>
<span class="v">$users</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">all</span><span class="p">();</span>

<span class="c">// Reload dari database</span>
<span class="v">$fresh</span> <span class="p">=</span> <span class="v">$user</span><span class="p">-></span><span class="f">fresh</span><span class="p">();</span>    <span class="c">// instance baru</span>
<span class="v">$user</span><span class="p">-></span><span class="f">refresh</span><span class="p">();</span>          <span class="c">// reload in-place</span>

<span class="c">// firstOrCreate / firstOrNew / updateOrCreate</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">firstOrCreate</span><span class="p">(</span>
    <span class="p">[</span><span class="s">'email'</span> <span class="p">=></span> <span class="s">'budi@mail.com'</span><span class="p">],</span>
    <span class="p">[</span><span class="s">'name'</span>  <span class="p">=></span> <span class="s">'Budi'</span><span class="p">]</span>
<span class="p">);</span>

<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">firstOrNew</span><span class="p">(</span>
    <span class="p">[</span><span class="s">'email'</span> <span class="p">=></span> <span class="s">'new@mail.com'</span><span class="p">]</span>
<span class="p">);</span> <span class="c">// tidak disimpan ke DB</span>

<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">updateOrCreate</span><span class="p">(</span>
    <span class="p">[</span><span class="s">'email'</span> <span class="p">=></span> <span class="s">'budi@mail.com'</span><span class="p">],</span>
    <span class="p">[</span><span class="s">'name'</span>  <span class="p">=></span> <span class="s">'Budi Baru'</span><span class="p">]</span>
<span class="p">);</span></code></pre>
    </section>

    <section class="section" id="aggregate">
      <div class="section-label">Read</div>
      <h2>Aggregate</h2>
<pre><code><span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">count</span><span class="p">();</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">max</span><span class="p">(</span><span class="s">'age'</span><span class="p">);</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">min</span><span class="p">(</span><span class="s">'age'</span><span class="p">);</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">sum</span><span class="p">(</span><span class="s">'salary'</span><span class="p">);</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">avg</span><span class="p">(</span><span class="s">'score'</span><span class="p">);</span>

<span class="c">// Filter sebelum aggregate</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'is_active'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">avg</span><span class="p">(</span><span class="s">'score'</span><span class="p">);</span></code></pre>
    </section>

    <section class="section" id="paginate">
      <div class="section-label">Read</div>
      <h2>paginate()</h2>
<pre><code><span class="v">$result</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()
    -></span><span class="f">where</span><span class="p">(</span><span class="s">'is_active'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)
    -></span><span class="f">orderBy</span><span class="p">(</span><span class="s">'name'</span><span class="p">)
    -></span><span class="f">paginate</span><span class="p">(</span><span class="n">15</span><span class="p">);</span>

<span class="c">// Struktur hasil:</span>
<span class="p">{</span>
    <span class="s">"data"</span><span class="p">: [...],</span>           <span class="c">// baris hasil query</span>
    <span class="s">"pagination"</span><span class="p">: {</span>
        <span class="s">"total"</span><span class="p">:</span> <span class="n">150</span><span class="p">,</span>
        <span class="s">"per_page"</span><span class="p">:</span> <span class="n">15</span><span class="p">,</span>
        <span class="s">"current_page"</span><span class="p">:</span> <span class="n">1</span><span class="p">,</span>
        <span class="s">"last_page"</span><span class="p">:</span> <span class="n">10</span><span class="p">,</span>
        <span class="s">"from"</span><span class="p">:</span> <span class="n">1</span><span class="p">,</span>
        <span class="s">"to"</span><span class="p">:</span> <span class="n">15</span>
    <span class="p">}</span>
<span class="p">}</span>
<span class="c">// Halaman diambil dari $_GET['page']</span></code></pre>
    </section>

    <section class="section" id="chunk">
      <div class="section-label">Read</div>
      <h2>chunk()</h2>
      <p>Iterasi dataset besar tanpa memuat semua baris ke memori sekaligus.</p>
<pre><code><span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'is_active'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">chunk</span><span class="p">(</span><span class="n">100</span><span class="p">,</span> <span class="k">function</span><span class="p">(</span><span class="v">$rows</span><span class="p">) {</span>
    <span class="k">foreach</span> <span class="p">(</span><span class="v">$rows</span> <span class="k">as</span> <span class="v">$user</span><span class="p">) {</span>
        <span class="c">// proses tiap batch 100 user</span>
    <span class="p">}</span>
    <span class="c">// return false untuk stop iterasi</span>
<span class="p">});</span></code></pre>
    </section>

    <!-- ── WRITE ── -->
    <section class="section" id="create">
      <div class="section-label">Write</div>
      <h2>create() & save()</h2>
<pre><code><span class="c">// Static create</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">create</span><span class="p">([</span>
    <span class="s">'name'</span>  <span class="p">=></span> <span class="s">'Budi'</span><span class="p">,</span>
    <span class="s">'email'</span> <span class="p">=></span> <span class="s">'budi@mail.com'</span><span class="p">,</span>
<span class="p">]);</span>

<span class="c">// Instance lalu save</span>
<span class="v">$user</span> <span class="p">=</span> <span class="k">new</span> <span class="t">User</span><span class="p">();</span>
<span class="v">$user</span><span class="p">->name  =</span> <span class="s">'Budi'</span><span class="p">;</span>
<span class="v">$user</span><span class="p">->email =</span> <span class="s">'budi@mail.com'</span><span class="p">;</span>
<span class="v">$user</span><span class="p">-></span><span class="f">save</span><span class="p">();</span>

<span class="c">// Replicate (duplikat tanpa PK)</span>
<span class="v">$copy</span> <span class="p">=</span> <span class="v">$user</span><span class="p">-></span><span class="f">replicate</span><span class="p">();</span>
<span class="v">$copy</span><span class="p">->name =</span> <span class="s">'Budi Copy'</span><span class="p">;</span>
<span class="v">$copy</span><span class="p">-></span><span class="f">save</span><span class="p">();</span></code></pre>
    </section>

    <section class="section" id="update">
      <div class="section-label">Write</div>
      <h2>update() & increment()</h2>
<pre><code><span class="c">// Update via instance</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="n">1</span><span class="p">);</span>
<span class="v">$user</span><span class="p">-></span><span class="f">update</span><span class="p">([</span><span class="s">'name'</span> <span class="p">=></span> <span class="s">'Andi'</span><span class="p">]);</span>

<span class="c">// Atau set attribute lalu save</span>
<span class="v">$user</span><span class="p">->name =</span> <span class="s">'Andi'</span><span class="p">;</span>
<span class="v">$user</span><span class="p">-></span><span class="f">save</span><span class="p">();</span> <span class="c">// skip jika tidak ada perubahan</span>

<span class="c">// Atomic increment / decrement</span>
<span class="v">$user</span><span class="p">-></span><span class="f">increment</span><span class="p">(</span><span class="s">'login_count'</span><span class="p">);</span>     <span class="c">// +1</span>
<span class="v">$user</span><span class="p">-></span><span class="f">increment</span><span class="p">(</span><span class="s">'points'</span><span class="p">,</span> <span class="n">10</span><span class="p">);</span>      <span class="c">// +10</span>
<span class="v">$user</span><span class="p">-></span><span class="f">decrement</span><span class="p">(</span><span class="s">'credits'</span><span class="p">,</span> <span class="n">5</span><span class="p">);</span>     <span class="c">// -5</span>

<span class="c">// Touch (update updated_at saja)</span>
<span class="v">$user</span><span class="p">-></span><span class="f">touch</span><span class="p">();</span></code></pre>
    </section>

    <section class="section" id="delete">
      <div class="section-label">Write</div>
      <h2>delete()</h2>
<pre><code><span class="c">// Hapus satu record</span>
<span class="v">$user</span><span class="p">-></span><span class="f">delete</span><span class="p">();</span>           <span class="c">// soft delete jika $softDelete = true</span>
<span class="v">$user</span><span class="p">-></span><span class="f">forceDelete</span><span class="p">();</span>      <span class="c">// hapus permanen</span>

<span class="c">// Hapus berdasarkan kondisi</span>
<span class="t">User</span><span class="p">::</span><span class="f">deleteWhere</span><span class="p">([</span><span class="s">'status'</span> <span class="p">=></span> <span class="s">'inactive'</span><span class="p">]);</span>

<span class="c">// Hapus dengan relasi (CASCADE manual)</span>
<span class="v">$user</span><span class="p">-></span><span class="f">deleteWithRelations</span><span class="p">([</span><span class="s">'posts'</span><span class="p">,</span> <span class="s">'comments'</span><span class="p">]);</span></code></pre>
    </section>

    <section class="section" id="batch">
      <div class="section-label">Write</div>
      <h2>insertBatch()</h2>
<pre><code><span class="v">$result</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">insertBatch</span><span class="p">([</span>
    <span class="p">[</span><span class="s">'name'</span> <span class="p">=></span> <span class="s">'User A'</span><span class="p">,</span> <span class="s">'email'</span> <span class="p">=></span> <span class="s">'a@mail.com'</span><span class="p">],</span>
    <span class="p">[</span><span class="s">'name'</span> <span class="p">=></span> <span class="s">'User B'</span><span class="p">,</span> <span class="s">'email'</span> <span class="p">=></span> <span class="s">'b@mail.com'</span><span class="p">],</span>
    <span class="p">[</span><span class="s">'name'</span> <span class="p">=></span> <span class="s">'User C'</span><span class="p">,</span> <span class="s">'email'</span> <span class="p">=></span> <span class="s">'c@mail.com'</span><span class="p">],</span>
<span class="p">]);</span>

<span class="c">// ['first_id' => 1, 'total_inserted' => 3]</span></code></pre>
    </section>

    <!-- ── RELATIONS ── -->
    <section class="section" id="relations">
      <div class="section-label">Relations</div>
      <h2>Definisi Relasi</h2>
<pre><code><span class="k">class</span> <span class="t">User</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">public function</span> <span class="f">posts</span><span class="p">():</span> <span class="t">array</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="v">$this</span><span class="p">-></span><span class="f">hasMany</span><span class="p">(</span><span class="t">Post</span><span class="p">::</span><span class="k">class</span><span class="p">,</span> <span class="s">'user_id'</span><span class="p">,</span> <span class="s">'id'</span><span class="p">);</span>
    <span class="p">}</span>

    <span class="k">public function</span> <span class="f">profile</span><span class="p">():</span> <span class="t">array</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="v">$this</span><span class="p">-></span><span class="f">hasOne</span><span class="p">(</span><span class="t">Profile</span><span class="p">::</span><span class="k">class</span><span class="p">,</span> <span class="s">'user_id'</span><span class="p">,</span> <span class="s">'id'</span><span class="p">);</span>
    <span class="p">}</span>

    <span class="k">public function</span> <span class="f">roles</span><span class="p">():</span> <span class="t">array</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="v">$this</span><span class="p">-></span><span class="f">belongsToMany</span><span class="p">(</span>
            <span class="t">Role</span><span class="p">::</span><span class="k">class</span><span class="p">,</span>
            <span class="s">'user_roles'</span><span class="p">,</span>   <span class="c">// pivot table</span>
            <span class="s">'user_id'</span><span class="p">,</span>      <span class="c">// foreign key di pivot</span>
            <span class="s">'role_id'</span>       <span class="c">// related key di pivot</span>
        <span class="p">);</span>
    <span class="p">}</span>
<span class="p">}</span>

<span class="k">class</span> <span class="t">Post</span> <span class="k">extends</span> <span class="t">BaseModel</span>
<span class="p">{</span>
    <span class="k">public function</span> <span class="f">user</span><span class="p">():</span> <span class="t">array</span>
    <span class="p">{</span>
        <span class="k">return</span> <span class="v">$this</span><span class="p">-></span><span class="f">belongsTo</span><span class="p">(</span><span class="t">User</span><span class="p">::</span><span class="k">class</span><span class="p">,</span> <span class="s">'user_id'</span><span class="p">,</span> <span class="s">'id'</span><span class="p">);</span>
    <span class="p">}</span>
<span class="p">}</span></code></pre>
    </section>

    <section class="section" id="eager">
      <div class="section-label">Relations</div>
      <h2>Eager Loading</h2>
<pre><code><span class="c">// with() — eager load relasi</span>
<span class="v">$users</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">with</span><span class="p">([</span><span class="s">'posts'</span><span class="p">,</span> <span class="s">'profile'</span><span class="p">])-></span><span class="f">get</span><span class="p">(</span><span class="t">PDO</span><span class="p">::</span><span class="t">FETCH_ASSOC</span><span class="p">,</span> <span class="k">true</span><span class="p">);</span>

<span class="c">// withCount() — eager load count relasi</span>
<span class="v">$users</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">withCount</span><span class="p">([</span><span class="s">'posts'</span><span class="p">])-></span><span class="f">get</span><span class="p">(</span><span class="t">PDO</span><span class="p">::</span><span class="t">FETCH_ASSOC</span><span class="p">,</span> <span class="k">true</span><span class="p">);</span>
<span class="c">// $user->posts_count → integer</span>

<span class="c">// load() — load relasi pada instance yang sudah ada</span>
<span class="v">$user</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">find</span><span class="p">(</span><span class="n">1</span><span class="p">);</span>
<span class="v">$user</span><span class="p">-></span><span class="f">load</span><span class="p">([</span><span class="s">'posts'</span><span class="p">,</span> <span class="s">'profile'</span><span class="p">]);</span>

<span class="c">// Lazy load via magic __get</span>
<span class="v">$user</span><span class="p">->posts;</span>   <span class="c">// otomatis load jika belum ada</span></code></pre>
    </section>

    <!-- ── SERIALIZATION ── -->
    <section class="section" id="serial">
      <div class="section-label">Serialization</div>
      <h2>toCleanArray & toJson</h2>
<pre><code><span class="c">// toCleanArray() — array bersih (+ appends, + relasi, - hidden)</span>
<span class="v">$arr</span> <span class="p">=</span> <span class="v">$user</span><span class="p">-></span><span class="f">toCleanArray</span><span class="p">();</span>

<span class="c">// toJson() — JSON string</span>
<span class="v">$json</span> <span class="p">=</span> <span class="v">$user</span><span class="p">-></span><span class="f">toJson</span><span class="p">();</span>

<span class="c">// Collection</span>
<span class="v">$arr</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">toCleanArrayCollection</span><span class="p">(</span><span class="v">$users</span><span class="p">);</span>

<span class="c">// Subset attributes</span>
<span class="v">$user</span><span class="p">-></span><span class="f">only</span><span class="p">([</span><span class="s">'name'</span><span class="p">,</span> <span class="s">'email'</span><span class="p">]);</span>
<span class="v">$user</span><span class="p">-></span><span class="f">except</span><span class="p">([</span><span class="s">'password'</span><span class="p">,</span> <span class="s">'token'</span><span class="p">]);</span></code></pre>
    </section>

    <section class="section" id="hidden">
      <div class="section-label">Serialization</div>
      <h2>Hidden & Visible</h2>
<pre><code><span class="c">// Di class — selalu tersembunyi</span>
<span class="k">protected</span> <span class="t">array</span> <span class="v">$hidden</span> <span class="p">= [</span><span class="s">'password'</span><span class="p">,</span> <span class="s">'token'</span><span class="p">];</span>

<span class="c">// Per instance — hanya untuk request ini</span>
<span class="v">$user</span><span class="p">-></span><span class="f">makeHidden</span><span class="p">([</span><span class="s">'secret'</span><span class="p">,</span> <span class="s">'internal_id'</span><span class="p">])-></span><span class="f">toCleanArray</span><span class="p">();</span>
<span class="v">$user</span><span class="p">-></span><span class="f">makeVisible</span><span class="p">(</span><span class="s">'email'</span><span class="p">)-></span><span class="f">toCleanArray</span><span class="p">();</span>

<span class="c">// Compare model</span>
<span class="v">$user</span><span class="p">-></span><span class="f">is</span><span class="p">(</span><span class="v">$otherUser</span><span class="p">);</span>    <span class="c">// true jika PK sama</span>
<span class="v">$user</span><span class="p">-></span><span class="f">isNot</span><span class="p">(</span><span class="v">$otherUser</span><span class="p">);</span></code></pre>
    </section>

    <!-- ── DEBUG ── -->
    <section class="section" id="debug">
      <div class="section-label">Lainnya</div>
      <h2>Debug Helper</h2>
<pre><code><span class="c">// Lihat SQL yang akan dijalankan</span>
<span class="v">$sql</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'is_active'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">toSql</span><span class="p">();</span>

<span class="c">// SQL dengan binding di-inline (untuk debug)</span>
<span class="v">$raw</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">getRawSQL</span><span class="p">();</span>
<span class="c">// "SELECT * FROM `users` WHERE (id = 1)"</span>

<span class="c">// Dump SQL dan stop (seperti Laravel's dd())</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">dd</span><span class="p">();</span>

<span class="c">// Dump tanpa stop (chainable)</span>
<span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()-></span><span class="f">where</span><span class="p">(</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)-></span><span class="f">dump</span><span class="p">()-></span><span class="f">get</span><span class="p">();</span></code></pre>
    </section>

    <!-- ── LOCKING ── -->
    <section class="section" id="locking">
      <div class="section-label">Lainnya</div>
      <h2>Locking</h2>
<pre><code><span class="c">// Pessimistic locking</span>
<span class="v">$rows</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()
    -></span><span class="f">where</span><span class="p">(</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)
    -></span><span class="f">lockForUpdate</span><span class="p">();</span>  <span class="c">// SELECT ... FOR UPDATE</span>

<span class="v">$rows</span> <span class="p">=</span> <span class="t">User</span><span class="p">::</span><span class="f">query</span><span class="p">()
    -></span><span class="f">where</span><span class="p">(</span><span class="s">'id'</span><span class="p">,</span> <span class="s">'='</span><span class="p">,</span> <span class="n">1</span><span class="p">)
    -></span><span class="f">sharedLock</span><span class="p">();</span>     <span class="c">// SELECT ... LOCK IN SHARE MODE</span></code></pre>
    </section>

    <!-- ── TRANSACTION ── -->
    <section class="section" id="transaction">
      <div class="section-label">Lainnya</div>
      <h2>Transaksi</h2>
<pre><code><span class="v">$model</span> <span class="p">=</span> <span class="k">new</span> <span class="t">User</span><span class="p">();</span>
<span class="v">$model</span><span class="p">-></span><span class="f">beginTransaction</span><span class="p">();</span>

<span class="k">try</span> <span class="p">{</span>
    <span class="t">User</span><span class="p">::</span><span class="f">create</span><span class="p">([</span><span class="s">'name'</span> <span class="p">=></span> <span class="s">'A'</span><span class="p">]);</span>
    <span class="t">Order</span><span class="p">::</span><span class="f">create</span><span class="p">([</span><span class="s">'user_id'</span> <span class="p">=></span> <span class="n">1</span><span class="p">]);</span>

    <span class="v">$model</span><span class="p">-></span><span class="f">commit</span><span class="p">();</span>
<span class="p">} </span><span class="k">catch</span> <span class="p">(</span><span class="t">\Exception</span> <span class="v">$e</span><span class="p">) {</span>
    <span class="v">$model</span><span class="p">-></span><span class="f">rollback</span><span class="p">();</span>
    <span class="k">throw</span> <span class="v">$e</span><span class="p">;</span>
<span class="p">}</span></code></pre>
    </section>

  </main>
</div>

<script>
  // ── Active nav highlight ──
  const links = document.querySelectorAll('.nav-link');
  const sections = document.querySelectorAll('.section');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        links.forEach(l => l.classList.remove('active'));
        const active = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  }, { rootMargin: '-30% 0px -65% 0px' });

  sections.forEach(s => observer.observe(s));

  // ── Method card toggle ──
  document.querySelectorAll('.method-header').forEach(header => {
    header.addEventListener('click', () => {
      const card = header.closest('.method-card');
      const body = card.querySelector('.method-body');
      card.classList.toggle('open');
      if (body) body.classList.toggle('open');
    });
  });

  // ── Search nav ──
  function filterNav(q) {
    const lower = q.toLowerCase();
    links.forEach(link => {
      const match = link.textContent.toLowerCase().includes(lower);
      link.style.display = match ? 'block' : 'none';
    });
    document.querySelectorAll('.nav-section').forEach(sec => {
      sec.style.display = q ? 'none' : 'block';
    });
  }
</script>
</body>
</html>