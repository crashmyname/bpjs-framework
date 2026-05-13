<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TablePlus v2.0 — Dokumentasi</title>
<style>
  :root {
    --bg: #ffffff;
    --bg2: #f8f9fa;
    --bg3: #f1f3f5;
    --border: #dee2e6;
    --text: #212529;
    --text2: #495057;
    --text3: #868e96;
    --blue: #3b5bdb;
    --blue-light: #edf2ff;
    --green: #2f9e44;
    --green-light: #ebfbee;
    --orange: #e67700;
    --orange-light: #fff3e0;
    --red: #c92a2a;
    --red-light: #fff5f5;
    --purple: #6741d9;
    --purple-light: #f3f0ff;
    --code-bg: #1e1e2e;
    --code-text: #cdd6f4;
    --radius: 8px;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    font-size: 15px;
    color: var(--text);
    background: var(--bg);
    line-height: 1.6;
  }

  /* ─── LAYOUT ─── */
  .layout { display: flex; min-height: 100vh; }

  nav {
    width: 260px;
    flex-shrink: 0;
    background: var(--bg2);
    border-right: 1px solid var(--border);
    padding: 24px 0;
    position: sticky;
    top: 0;
    height: 100vh;
    overflow-y: auto;
  }

  nav .logo {
    padding: 0 20px 20px;
    border-bottom: 1px solid var(--border);
    margin-bottom: 16px;
  }
  nav .logo h1 { font-size: 18px; font-weight: 700; color: var(--blue); }
  nav .logo span { font-size: 12px; color: var(--text3); }

  nav a {
    display: block;
    padding: 6px 20px;
    font-size: 13.5px;
    color: var(--text2);
    text-decoration: none;
    border-left: 3px solid transparent;
    transition: all .15s;
  }
  nav a:hover { color: var(--blue); background: var(--blue-light); }
  nav a.active { color: var(--blue); border-left-color: var(--blue); background: var(--blue-light); font-weight: 500; }
  nav .nav-group { font-size: 11px; font-weight: 600; color: var(--text3); text-transform: uppercase; letter-spacing: .08em; padding: 14px 20px 4px; }

  main {
    flex: 1;
    padding: 48px 56px;
    max-width: 920px;
  }

  /* ─── TYPOGRAPHY ─── */
  h1 { font-size: 32px; font-weight: 700; margin-bottom: 8px; }
  h2 { font-size: 22px; font-weight: 700; margin: 48px 0 16px; padding-bottom: 8px; border-bottom: 2px solid var(--border); }
  h3 { font-size: 16px; font-weight: 600; margin: 28px 0 10px; }
  h4 { font-size: 14px; font-weight: 600; margin: 20px 0 8px; color: var(--text2); }
  p { margin-bottom: 12px; color: var(--text2); }
  code { font-family: 'Fira Code', 'Consolas', monospace; font-size: 13px; background: var(--bg3); padding: 2px 6px; border-radius: 4px; color: var(--red); }
  a { color: var(--blue); }

  /* ─── CODE BLOCK ─── */
  pre {
    background: var(--code-bg);
    color: var(--code-text);
    border-radius: var(--radius);
    padding: 20px 24px;
    overflow-x: auto;
    font-size: 13px;
    line-height: 1.7;
    font-family: 'Fira Code', 'Consolas', monospace;
    margin: 12px 0 20px;
    position: relative;
  }
  pre .c  { color: #6c7086; font-style: italic; }   /* comment */
  pre .k  { color: #cba6f7; }                         /* keyword */
  pre .s  { color: #a6e3a1; }                         /* string */
  pre .n  { color: #89b4fa; }                         /* name/prop */
  pre .v  { color: #fab387; }                         /* value/number */
  pre .f  { color: #89dceb; }                         /* function */

  /* ─── BADGES ─── */
  .badge {
    display: inline-block;
    font-size: 11px;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 99px;
    margin-left: 6px;
    vertical-align: middle;
  }
  .badge-required { background: #ffe3e3; color: #c92a2a; }
  .badge-optional { background: #e0ebff; color: #1971c2; }
  .badge-new      { background: #d3f9d8; color: #2b8a3e; }
  .badge-changed  { background: #fff3bf; color: #e67700; }
  .badge-compat   { background: #f3f0ff; color: #6741d9; }

  /* ─── CALLOUT ─── */
  .callout {
    border-radius: var(--radius);
    padding: 14px 16px;
    margin: 16px 0;
    font-size: 14px;
    display: flex;
    gap: 10px;
    align-items: flex-start;
  }
  .callout-icon { flex-shrink: 0; font-size: 16px; }
  .callout.info    { background: var(--blue-light);   border-left: 4px solid var(--blue);   color: #1864ab; }
  .callout.success { background: var(--green-light);  border-left: 4px solid var(--green);  color: #1a6b2f; }
  .callout.warning { background: var(--orange-light); border-left: 4px solid var(--orange); color: #7d4e00; }
  .callout.danger  { background: var(--red-light);    border-left: 4px solid var(--red);    color: #862e2e; }

  /* ─── TABLE ─── */
  .doc-table { width: 100%; border-collapse: collapse; font-size: 13.5px; margin: 12px 0 24px; }
  .doc-table th { background: var(--bg3); padding: 10px 14px; text-align: left; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: .06em; color: var(--text3); border: 1px solid var(--border); }
  .doc-table td { padding: 10px 14px; border: 1px solid var(--border); vertical-align: top; color: var(--text2); }
  .doc-table tr:hover td { background: var(--bg2); }
  .doc-table td:first-child code { color: var(--blue); }
  .doc-table .desc { color: var(--text3); font-size: 13px; }

  /* ─── DIFF TABLE (v1 vs v2) ─── */
  .diff-table { width: 100%; border-collapse: collapse; font-size: 13px; margin: 12px 0 24px; }
  .diff-table th { padding: 8px 14px; text-align: left; border: 1px solid var(--border); background: var(--bg3); font-size: 12px; }
  .diff-table td { padding: 10px 14px; border: 1px solid var(--border); vertical-align: top; }
  .diff-old { background: #fff5f5; color: #862e2e; }
  .diff-new { background: #f4fce3; color: #2b6a21; }
  .diff-same { background: var(--bg2); color: var(--text2); }

  /* ─── METHOD CARD ─── */
  .method-card {
    border: 1px solid var(--border);
    border-radius: var(--radius);
    margin: 16px 0;
    overflow: hidden;
  }
  .method-card-head {
    background: var(--bg3);
    padding: 12px 16px;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .method-card-head code { font-size: 14px; color: var(--blue); background: none; padding: 0; }
  .method-card-body { padding: 14px 16px; font-size: 13.5px; color: var(--text2); }
  .method-card-body p { margin-bottom: 8px; }
  .method-card-body pre { margin: 8px 0 0; }

  /* ─── SECTION DIVIDER ─── */
  .section-anchor { display: block; height: 1px; margin-top: -72px; padding-top: 72px; }

  /* ─── HERO ─── */
  .hero { margin-bottom: 40px; }
  .hero p { font-size: 16px; color: var(--text3); margin-top: 4px; }
  .version-chips { display: flex; gap: 8px; margin-top: 12px; flex-wrap: wrap; }
  .chip { font-size: 12px; padding: 4px 12px; border-radius: 99px; border: 1px solid var(--border); color: var(--text2); }

  @media (max-width: 768px) {
    nav { display: none; }
    main { padding: 24px 20px; }
  }
</style>
</head>
<body>

<div class="layout">

<!-- ══════════════════════════════════ NAV ══════════════════════════════════ -->
<nav>
  <div class="logo">
    <h1>TablePlus</h1>
    <span>Dokumentasi v2.0</span>
  </div>

  <div class="nav-group">Mulai</div>
  <a href="#overview">Overview</a>
  <a href="#install">Instalasi</a>
  <a href="#quickstart">Quick Start</a>
  <a href="#perubahan">Perubahan v1 → v2</a>

  <div class="nav-group">Konfigurasi</div>
  <a href="#config-all">Semua Opsi</a>
  <a href="#config-columns">Definisi Kolom</a>
  <a href="#config-theme">Theme</a>

  <div class="nav-group">API</div>
  <a href="#api-public">Method Publik</a>
  <a href="#api-compat">Backward Compat</a>

  <div class="nav-group">Fitur</div>
  <a href="#fitur-export">Export</a>
  <a href="#fitur-seleksi">Seleksi Baris</a>
  <a href="#fitur-filter">Filter Kolom</a>
  <a href="#fitur-preferences">Preferences</a>
  <a href="#fitur-responsive">Responsive</a>

  <div class="nav-group">Integrasi</div>
  <a href="#backend">Format Backend</a>
  <a href="#laravel">Contoh Laravel</a>
  <a href="#spa">SPA / Vue / React</a>
</nav>

<!-- ══════════════════════════════════ MAIN ══════════════════════════════════ -->
<main>

<!-- ─── OVERVIEW ─── -->
<span class="section-anchor" id="overview"></span>
<div class="hero">
  <h1>TablePlus v2.0</h1>
  <p>Library JavaScript untuk membuat data table dinamis dengan pagination, search, sort, filter, export, dan seleksi baris — tanpa dependensi wajib.</p>
  <div class="version-chips">
    <span class="chip">✦ Tailwind & Bootstrap</span>
    <span class="chip">✦ Responsive (card mobile)</span>
    <span class="chip">✦ Pagination di luar scroll</span>
    <span class="chip">✦ Export CSV / Excel / PDF / Copy</span>
    <span class="chip">✦ Zero breaking changes dari v1</span>
  </div>
</div>

<!-- ─── INSTALL ─── -->
<span class="section-anchor" id="install"></span>
<h2>Instalasi</h2>
<p>Cukup load file <code>tableplus.js</code> di halaman Anda. Tidak ada npm, tidak ada build step.</p>
<pre><span class="c">&lt;!-- Letakkan sebelum &lt;/body&gt; --&gt;</span>
&lt;<span class="n">script</span> <span class="k">src</span>=<span class="s">"tableplus.js"</span>&gt;&lt;/<span class="n">script</span>&gt;</pre>

<p>CDN Tailwind atau Bootstrap akan di-inject <strong>otomatis</strong> oleh TablePlus sesuai nilai <code>theme</code> yang dikonfigurasi. Tidak perlu menambahkannya secara manual.</p>

<div class="callout info">
  <span class="callout-icon">ℹ</span>
  <div>Jika Anda sudah punya Tailwind atau Bootstrap di halaman, TablePlus cukup pintar untuk tidak menduplikatnya (cek berdasarkan ID elemen <code>&lt;link&gt;</code>).</div>
</div>

<!-- ─── QUICKSTART ─── -->
<span class="section-anchor" id="quickstart"></span>
<h2>Quick Start</h2>

<h3>HTML Minimal</h3>
<p>Siapkan sebuah <code>&lt;div&gt;</code> kosong sebagai titik mount. TablePlus akan membangun semua struktur DOM di dalamnya.</p>

<pre><span class="c">&lt;!-- Hanya perlu div kosong --&gt;</span>
&lt;<span class="n">div</span> <span class="k">id</span>=<span class="s">"my-table"</span>&gt;&lt;/<span class="n">div</span>&gt;

&lt;<span class="n">script</span> <span class="k">src</span>=<span class="s">"tableplus.js"</span>&gt;&lt;/<span class="n">script</span>&gt;
&lt;<span class="n">script</span>&gt;
  <span class="k">const</span> <span class="f">table</span> = <span class="k">new</span> <span class="f">TablePlus</span>({
    <span class="n">url</span>   : <span class="s">'/api/users'</span>,
    <span class="n">theme</span> : <span class="s">'tailwind'</span>,   <span class="c">// atau 'bootstrap'</span>
    <span class="n">columns</span>: {
      <span class="n">id</span>   : <span class="s">'ID'</span>,
      <span class="n">name</span> : <span class="s">'Nama'</span>,
      <span class="n">email</span>: <span class="s">'Email'</span>,
    }
  });

  <span class="n">table</span>.<span class="f">render</span>(<span class="s">'#my-table'</span>);
&lt;/<span class="n">script</span>&gt;</pre>

<!-- ─── PERUBAHAN v1 → v2 ─── -->
<span class="section-anchor" id="perubahan"></span>
<h2>Perubahan v1 → v2</h2>

<div class="callout success">
  <span class="callout-icon">✓</span>
  <div><strong>Penggunaan dasar tidak berubah.</strong> Semua 40 method dari v1 masih ada. Kode lama berjalan tanpa modifikasi.</div>
</div>

<p>Ada <strong>satu perbedaan penting</strong> di cara penggunaan HTML:</p>

<table class="diff-table">
  <thead><tr><th style="width:50%">v1 — Lama</th><th>v2 — Baru</th></tr></thead>
  <tbody>
    <tr>
      <td class="diff-old">
        Selector harus menunjuk ke elemen <code>&lt;table&gt;</code> yang sudah ada di HTML:<br><br>
        <code>&lt;table id="my-table"&gt;&lt;/table&gt;</code><br>
        <code>table.render('#my-table')</code>
      </td>
      <td class="diff-new">
        Selector menunjuk ke <code>&lt;div&gt;</code> kosong. TablePlus membangun seluruh DOM sendiri (termasuk <code>&lt;table&gt;</code>):<br><br>
        <code>&lt;div id="my-table"&gt;&lt;/div&gt;</code><br>
        <code>table.render('#my-table')</code>
      </td>
    </tr>
  </tbody>
</table>

<h3>Ringkasan semua perubahan</h3>
<table class="diff-table">
  <thead><tr><th>Aspek</th><th>v1</th><th>v2</th></tr></thead>
  <tbody>
    <tr>
      <td><strong>Mount point</strong></td>
      <td class="diff-old">Harus <code>&lt;table&gt;</code> sudah ada di HTML</td>
      <td class="diff-new"><code>&lt;div&gt;</code> kosong — DOM dibangun otomatis</td>
    </tr>
    <tr>
      <td><strong>Theme</strong></td>
      <td class="diff-old">Tidak ada opsi tema, Tailwind hardcoded</td>
      <td class="diff-new"><code>theme: 'tailwind'</code> atau <code>'bootstrap'</code></td>
    </tr>
    <tr>
      <td><strong>Horizontal scroll</strong></td>
      <td class="diff-old">Seluruh halaman scroll ke samping</td>
      <td class="diff-new">Hanya area tabel yang scroll, kontrol & pagination tetap</td>
    </tr>
    <tr>
      <td><strong>Pagination</strong></td>
      <td class="diff-old">Di dalam area scroll — harus scroll dulu untuk ganti halaman</td>
      <td class="diff-new">Di luar area scroll — selalu terlihat</td>
    </tr>
    <tr>
      <td><strong>Resize listener</strong></td>
      <td class="diff-old"><code>window.addEventListener</code> — tidak pernah di-remove</td>
      <td class="diff-new"><code>ResizeObserver</code> — di-disconnect saat <code>destroy()</code></td>
    </tr>
    <tr>
      <td><strong>sortData()</strong></td>
      <td class="diff-old">Mutasi array asli (<code>.sort()</code>)</td>
      <td class="diff-new">Immutable (<code>[...data].sort()</code>)</td>
    </tr>
    <tr>
      <td><strong>getClass(type)</strong></td>
      <td class="diff-old">Method utama untuk class</td>
      <td class="diff-new">Masih ada sebagai alias. Digantikan <code>cls(slot)</code> secara internal</td>
    </tr>
    <tr>
      <td><strong>Semua method v1</strong></td>
      <td class="diff-old">—</td>
      <td class="diff-new">Semua tetap ada, method yang diganti nama tersedia sebagai alias backward-compat</td>
    </tr>
  </tbody>
</table>

<h3>Fitur yang ditambahkan (tidak diperintahkan, bonus)</h3>
<table class="doc-table">
  <thead><tr><th>Fitur</th><th>Keterangan</th></tr></thead>
  <tbody>
    <tr><td><code>_loadCSS(href, id)</code> <span class="badge badge-new">baru</span></td><td class="desc">Helper inject CSS sekali saja (idempotent berdasarkan ID)</td></tr>
    <tr><td><code>_loadScript(src, id)</code> <span class="badge badge-new">baru</span></td><td class="desc">Helper load script async sekali saja — dipakai di exportXLSX & exportPDF</td></tr>
    <tr><td><code>_downloadCSV(rows, filename)</code> <span class="badge badge-new">baru</span></td><td class="desc">Internal helper download CSV — dipakai oleh <code>exportCSV()</code> dan <code>exportSelected()</code></td></tr>
    <tr><td><code>_registerDocClick(fn)</code> <span class="badge badge-new">baru</span></td><td class="desc">Track semua document click listener agar bisa di-remove saat <code>destroy()</code></td></tr>
    <tr><td>perPageOptions: 1000000 → "Semua" <span class="badge badge-new">baru</span></td><td class="desc">Tampilan label "Semua" di dropdown per-page untuk nilai 1000000</td></tr>
    <tr><td>Toast notifikasi Copy <span class="badge badge-changed">diperbarui</span></td><td class="desc">Notifikasi berhasil copy kini muncul di pojok kanan atas dengan animasi</td></tr>
    <tr><td>Search debounce <span class="badge badge-changed">diperbarui</span></td><td class="desc">Delay dipersingkat dari 500ms menjadi 400ms</td></tr>
  </tbody>
</table>

<!-- ─── CONFIG ALL ─── -->
<span class="section-anchor" id="config-all"></span>
<h2>Semua Opsi Konfigurasi</h2>

<table class="doc-table">
  <thead><tr><th>Opsi</th><th>Tipe</th><th>Default</th><th>Keterangan</th></tr></thead>
  <tbody>
    <tr>
      <td><code>url</code> <span class="badge badge-required">wajib</span></td>
      <td>string</td><td>—</td>
      <td class="desc">URL endpoint API backend yang mengembalikan data JSON</td>
    </tr>
    <tr>
      <td><code>columns</code> <span class="badge badge-required">wajib</span></td>
      <td>object</td><td>—</td>
      <td class="desc">Definisi kolom. Lihat bagian <a href="#config-columns">Definisi Kolom</a></td>
    </tr>
    <tr>
      <td><code>theme</code> <span class="badge badge-new">baru</span></td>
      <td>string</td><td><code>'tailwind'</code></td>
      <td class="desc">Tema UI: <code>'tailwind'</code> atau <code>'bootstrap'</code>. CDN di-inject otomatis</td>
    </tr>
    <tr>
      <td><code>perPage</code></td>
      <td>number</td><td><code>10</code></td>
      <td class="desc">Jumlah baris yang ditampilkan per halaman</td>
    </tr>
    <tr>
      <td><code>perPageOptions</code></td>
      <td>number[]</td><td><code>[10,25,50,100,1000000]</code></td>
      <td class="desc">Pilihan di dropdown "Tampilkan". Nilai <code>1000000</code> ditampilkan sebagai "Semua"</td>
    </tr>
    <tr>
      <td><code>rowIdentifier</code></td>
      <td>string</td><td><code>'id'</code></td>
      <td class="desc">Nama field yang digunakan sebagai key unik per baris untuk checkbox & seleksi</td>
    </tr>
    <tr>
      <td><code>customFilters</code></td>
      <td>object</td><td><code>{}</code></td>
      <td class="desc">Filter tambahan yang dikirim sebagai query param ke backend. Contoh: <code>{status:'active'}</code></td>
    </tr>
    <tr>
      <td><code>savePreferences</code></td>
      <td>boolean</td><td><code>true</code></td>
      <td class="desc">Simpan dan muat kembali sortir, kolom visible, dan per-page dari localStorage</td>
    </tr>
    <tr>
      <td><code>storageKey</code></td>
      <td>string</td><td>auto</td>
      <td class="desc">Key localStorage kustom. Default: <code>tableplus_{pathname}_{url}</code></td>
    </tr>
    <tr>
      <td><code>onRowSelect</code></td>
      <td>function</td><td><code>null</code></td>
      <td class="desc">Callback dipanggil setiap ada perubahan seleksi: <code>(selectedIds: string[]) =&gt; void</code></td>
    </tr>
    <tr>
      <td><code>customActions</code></td>
      <td>array</td><td><code>[]</code></td>
      <td class="desc">Tombol aksi tambahan di bulk-actions bar. Lihat contoh di bagian <a href="#fitur-seleksi">Seleksi Baris</a></td>
    </tr>
  </tbody>
</table>

<h3>Contoh konfigurasi lengkap</h3>
<pre><span class="k">const</span> <span class="n">table</span> = <span class="k">new</span> <span class="f">TablePlus</span>({
  <span class="n">url</span>  : <span class="s">'/api/products'</span>,
  <span class="n">theme</span>: <span class="s">'tailwind'</span>,   <span class="c">// atau 'bootstrap'</span>

  <span class="n">columns</span>: { <span class="c">/* lihat bagian Definisi Kolom */</span> },

  <span class="n">perPage</span>       : <span class="v">25</span>,
  <span class="n">perPageOptions</span>: [<span class="v">10</span>, <span class="v">25</span>, <span class="v">100</span>, <span class="v">1000000</span>],
  <span class="n">rowIdentifier</span> : <span class="s">'product_id'</span>,

  <span class="n">customFilters</span>: {
    <span class="n">category</span>: <span class="s">'electronics'</span>,
    <span class="n">active</span>  : <span class="v">1</span>,
  },

  <span class="n">savePreferences</span>: <span class="k">true</span>,
  <span class="n">storageKey</span>     : <span class="s">'products-table-v1'</span>,

  <span class="n">onRowSelect</span>: <span class="k">(ids)</span> =&gt; {
    document.<span class="f">querySelector</span>(<span class="s">'#hapus-btn'</span>).disabled = ids.length === <span class="v">0</span>;
  },

  <span class="n">customActions</span>: [
    {
      <span class="n">label</span>    : <span class="s">'🗑 Hapus'</span>,
      <span class="n">className</span>: <span class="s">'bg-red-600 text-white px-3 py-1 rounded text-sm'</span>,
      <span class="n">onClick</span>  : <span class="k">(ids)</span> =&gt; <span class="f">deleteItems</span>(ids),
    },
  ],
});

<span class="n">table</span>.<span class="f">render</span>(<span class="s">'#products-table'</span>);</pre>

<!-- ─── CONFIG COLUMNS ─── -->
<span class="section-anchor" id="config-columns"></span>
<h2>Definisi Kolom</h2>
<p>Setiap key di objek <code>columns</code> adalah nama field dari data JSON backend. Nilainya bisa berupa tiga bentuk:</p>

<h3>1. String — paling sederhana</h3>
<p>Nilai diambil langsung dari field dengan key yang sama. Cocok untuk kolom plaintext.</p>
<pre><span class="n">columns</span>: {
  <span class="n">id</span>  : <span class="s">'ID'</span>,       <span class="c">// label = 'ID', nilai = row.id</span>
  <span class="n">name</span>: <span class="s">'Nama'</span>,     <span class="c">// label = 'Nama', nilai = row.name</span>
}</pre>

<h3>2. Object — untuk kustomisasi penuh</h3>
<table class="doc-table">
  <thead><tr><th>Property</th><th>Tipe</th><th>Keterangan</th></tr></thead>
  <tbody>
    <tr><td><code>label</code></td><td>string</td><td class="desc">Teks header kolom</td></tr>
    <tr><td><code>render</code></td><td>function(row)</td><td class="desc">Kembalikan string HTML atau HTMLElement untuk cell. Dipakai saat render di browser</td></tr>
    <tr><td><code>exportText</code></td><td>function(row)</td><td class="desc">Kembalikan teks bersih (tanpa HTML) untuk CSV/Excel/PDF. Jika tidak ada, <code>render</code> dipakai dengan strip tag otomatis</td></tr>
    <tr><td><code>isTitle</code></td><td>boolean</td><td class="desc">Tandai kolom ini sebagai judul kartu di tampilan mobile</td></tr>
  </tbody>
</table>

<h3>3. Function — shorthand render</h3>
<p>Ekuivalen dengan <code>{ render: fn }</code>. Menerima <code>row</code>, mengembalikan string HTML atau HTMLElement.</p>

<h3>Contoh lengkap semua bentuk</h3>
<pre><span class="n">columns</span>: {
  <span class="c">// 1. String</span>
  <span class="n">id</span>: <span class="s">'ID'</span>,

  <span class="c">// 2. Object — judul mobile + link</span>
  <span class="n">name</span>: {
    <span class="n">label</span>  : <span class="s">'Nama'</span>,
    <span class="n">isTitle</span>: <span class="k">true</span>,   <span class="c">// tampil sebagai judul kartu di mobile</span>
    <span class="n">render</span> : <span class="k">(row)</span> =&gt; {
      <span class="k">const</span> <span class="n">a</span> = document.<span class="f">createElement</span>(<span class="s">'a'</span>);
      a.href      = <span class="s">`/user/${row.id}`</span>;
      a.textContent = row.name;
      a.className   = <span class="s">'text-blue-600 hover:underline'</span>;
      <span class="k">return</span> a;   <span class="c">// HTMLElement atau string HTML sama-sama oke</span>
    },
    <span class="n">exportText</span>: <span class="k">(row)</span> =&gt; row.name,  <span class="c">// teks bersih untuk export</span>
  },

  <span class="c">// 3. Object — badge status</span>
  <span class="n">status</span>: {
    <span class="n">label</span> : <span class="s">'Status'</span>,
    <span class="n">render</span>: <span class="k">(row)</span> =&gt; {
      <span class="k">const</span> <span class="n">map</span> = {
        active  : <span class="s">'bg-green-100 text-green-800'</span>,
        inactive: <span class="s">'bg-gray-100 text-gray-600'</span>,
        banned  : <span class="s">'bg-red-100 text-red-800'</span>,
      };
      <span class="k">return</span> <span class="s">`&lt;span class="px-2 py-0.5 rounded-full text-xs font-medium ${map[row.status] || ''}"&gt;${row.status}&lt;/span&gt;`</span>;
    },
    <span class="n">exportText</span>: <span class="k">(row)</span> =&gt; row.status,
  },

  <span class="c">// 4. Function shorthand</span>
  <span class="n">email</span>: <span class="k">(row)</span> =&gt; <span class="s">`&lt;a href="mailto:${row.email}"&gt;${row.email}&lt;/a&gt;`</span>,

  <span class="c">// 5. Tombol aksi per baris</span>
  <span class="n">actions</span>: {
    <span class="n">label</span> : <span class="s">'Aksi'</span>,
    <span class="n">render</span>: <span class="k">(row)</span> =&gt; {
      <span class="k">const</span> <span class="n">wrap</span> = document.<span class="f">createElement</span>(<span class="s">'div'</span>);
      wrap.className = <span class="s">'flex gap-1'</span>;
      <span class="k">const</span> <span class="n">btn</span> = document.<span class="f">createElement</span>(<span class="s">'button'</span>);
      btn.textContent = <span class="s">'Edit'</span>;
      btn.onclick     = () =&gt; <span class="f">editUser</span>(row.id);
      btn.className   = <span class="s">'text-xs px-2 py-1 bg-blue-50 text-blue-700 rounded'</span>;
      wrap.<span class="f">appendChild</span>(btn);
      <span class="k">return</span> wrap;
    },
    <span class="n">exportText</span>: () =&gt; <span class="s">''</span>,   <span class="c">// kolom aksi kosong saat export</span>
  },
},</pre>

<!-- ─── CONFIG THEME ─── -->
<span class="section-anchor" id="config-theme"></span>
<h2>Theme</h2>
<p>Ganti nilai <code>theme</code> di konfigurasi — tidak ada perubahan HTML atau import manual yang dibutuhkan.</p>
<pre><span class="c">// Tailwind (default)</span>
<span class="k">new</span> <span class="f">TablePlus</span>({ <span class="n">theme</span>: <span class="s">'tailwind'</span>, ... });

<span class="c">// Bootstrap 5</span>
<span class="k">new</span> <span class="f">TablePlus</span>({ <span class="n">theme</span>: <span class="s">'bootstrap'</span>, ... });</pre>

<div class="callout info">
  <span class="callout-icon">ℹ</span>
  <div>Jika Anda ingin menggunakan versi Tailwind atau Bootstrap yang berbeda dari yang di-inject TablePlus, load CSS Anda <em>sebelum</em> memanggil <code>render()</code> dan TablePlus tidak akan menduplikat.</div>
</div>

<!-- ─── API PUBLIC ─── -->
<span class="section-anchor" id="api-public"></span>
<h2>Method Publik</h2>

<div class="method-card">
  <div class="method-card-head"><code>render(selector)</code> <span class="badge badge-required">async</span></div>
  <div class="method-card-body">
    <p>Inisialisasi dan tampilkan tabel ke dalam elemen yang dipilih. <code>selector</code> harus berupa <code>&lt;div&gt;</code> kosong.</p>
    <pre><span class="k">await</span> table.<span class="f">render</span>(<span class="s">'#container'</span>);</pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>refresh()</code></div>
  <div class="method-card-body"><p>Fetch ulang data dengan semua parameter saat ini (halaman, search, filter, sort tetap). Ekuivalen dengan <code>update()</code>.</p></div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>setPage(n)</code></div>
  <div class="method-card-body">
    <p>Pindah ke halaman tertentu lalu fetch.</p>
    <pre>table.<span class="f">setPage</span>(<span class="v">3</span>);</pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>setPerPage(n)</code></div>
  <div class="method-card-body"><p>Ubah jumlah baris per halaman. Otomatis reset ke halaman 1 dan simpan ke localStorage.</p></div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>setSearch(term)</code></div>
  <div class="method-card-body">
    <p>Set kata kunci pencarian secara programatik (bypass debounce). Reset ke halaman 1.</p>
    <pre>table.<span class="f">setSearch</span>(<span class="s">'john doe'</span>);</pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>setFilter(key, value)</code></div>
  <div class="method-card-body">
    <p>Tambah atau update satu <code>customFilter</code> lalu fetch. Nilai <code>null</code> atau <code>''</code> tidak dikirim ke backend.</p>
    <pre>table.<span class="f">setFilter</span>(<span class="s">'status'</span>, <span class="s">'active'</span>);
table.<span class="f">setFilter</span>(<span class="s">'status'</span>, <span class="s">''</span>);   <span class="c">// hapus filter status</span></pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>setFilters(obj)</code></div>
  <div class="method-card-body">
    <p>Merge banyak <code>columnFilters</code> sekaligus (filter dropdown per kolom dari dalam tabel).</p>
    <pre>table.<span class="f">setFilters</span>({ <span class="n">status</span>: [<span class="s">'active'</span>], <span class="n">role</span>: [<span class="s">'admin'</span>] });</pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>resetFilters()</code></div>
  <div class="method-card-body"><p>Kosongkan semua <code>customFilters</code> lalu fetch. <em>Catatan: tidak mereset <code>columnFilters</code> (filter dropdown kolom).</em></p></div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>getSelectedRows()</code></div>
  <div class="method-card-body">
    <p>Kembalikan array ID baris yang sedang dicentang (sebagai string).</p>
    <pre><span class="k">const</span> <span class="n">ids</span> = table.<span class="f">getSelectedRows</span>();  <span class="c">// ['1','2','5']</span></pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>getSelectedData()</code></div>
  <div class="method-card-body">
    <p>Kembalikan array objek data baris yang sedang dicentang.</p>
    <pre><span class="k">const</span> <span class="n">rows</span> = table.<span class="f">getSelectedData</span>();  <span class="c">// [{id:1, name:'...', ...}, ...]</span></pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>destroy()</code></div>
  <div class="method-card-body">
    <p>Bersihkan semua DOM, event listener, dan ResizeObserver yang dibuat oleh TablePlus. Wajib dipanggil saat komponen unmount di SPA.</p>
    <pre>table.<span class="f">destroy</span>();</pre>
  </div>
</div>

<div class="method-card">
  <div class="method-card-head"><code>selectAllRows()</code> / <code>deselectAllRows()</code></div>
  <div class="method-card-body"><p>Pilih atau batalkan pilihan semua baris di halaman saat ini secara programatik.</p></div>
</div>

<!-- ─── API COMPAT ─── -->
<span class="section-anchor" id="api-compat"></span>
<h2>Backward Compatibility — Method Lama</h2>
<p>Semua method berikut masih ada dan bisa dipanggil. Secara internal mereka memanggil versi baru (dengan prefix <code>_</code>).</p>

<table class="doc-table">
  <thead><tr><th>Method v1</th><th>Diteruskan ke</th><th>Catatan</th></tr></thead>
  <tbody>
    <tr><td><code>getClass(type)</code></td><td><code>cls(slot)</code></td><td class="desc">Map tipe lama ('button', 'input', dll.) ke slot baru</td></tr>
    <tr><td><code>sortData(data)</code></td><td><code>_sortData(data)</code></td><td class="desc">Tetap publik untuk subclass / override</td></tr>
    <tr><td><code>renderBulkActionsBar()</code></td><td><code>_renderBulkBar()</code></td><td class="desc">—</td></tr>
    <tr><td><code>renderControls()</code></td><td><code>_buildControls()</code></td><td class="desc">—</td></tr>
    <tr><td><code>createExportDropdown()</code></td><td><code>_buildExportDropdown()</code></td><td class="desc">—</td></tr>
    <tr><td><code>createColumnVisibilityDropdown()</code></td><td><code>_buildColVisDropdown()</code></td><td class="desc">—</td></tr>
    <tr><td><code>createColumnFilterDropdown(key)</code></td><td><code>_buildColFilterBtn(key)</code></td><td class="desc">—</td></tr>
    <tr><td><code>showLoadingState()</code></td><td><code>_showSkeleton()</code></td><td class="desc">—</td></tr>
    <tr><td><code>hideLoadingState()</code></td><td>no-op</td><td class="desc">Tidak diperlukan lagi — loading dihandle otomatis oleh renderTable()</td></tr>
    <tr><td><code>showError(msg)</code></td><td><code>_showError(msg)</code></td><td class="desc">—</td></tr>
  </tbody>
</table>

<!-- ─── FITUR EXPORT ─── -->
<span class="section-anchor" id="fitur-export"></span>
<h2>Export</h2>
<p>Tersedia via dropdown "Export" di toolbar, atau dapat dipanggil secara programatik.</p>

<table class="doc-table">
  <thead><tr><th>Method</th><th>Format</th><th>Library</th></tr></thead>
  <tbody>
    <tr><td><code>exportCSV()</code></td><td>CSV</td><td class="desc">Built-in, tidak ada dependensi</td></tr>
    <tr><td><code>exportXLSX()</code></td><td>Excel .xlsx</td><td class="desc">Load <code>xlsx</code> dari CDN saat pertama kali dipanggil</td></tr>
    <tr><td><code>exportPDF()</code></td><td>PDF</td><td class="desc">Load <code>jspdf</code> + <code>jspdf-autotable</code> dari CDN saat pertama kali dipanggil</td></tr>
    <tr><td><code>exportCopy()</code></td><td>Tab-separated ke clipboard</td><td class="desc">Built-in menggunakan Clipboard API</td></tr>
    <tr><td><code>exportSelected()</code></td><td>CSV (baris terpilih saja)</td><td class="desc">Muncul otomatis di bulk-bar saat ada baris tercentang</td></tr>
  </tbody>
</table>

<div class="callout info">
  <span class="callout-icon">ℹ</span>
  <div>Semua export menggunakan <code>exportText</code> (jika ada) atau <code>render</code> dengan strip tag otomatis. Selalu definisikan <code>exportText</code> untuk kolom yang mengandung HTML kompleks atau tombol aksi.</div>
</div>

<!-- ─── FITUR SELEKSI ─── -->
<span class="section-anchor" id="fitur-seleksi"></span>
<h2>Seleksi Baris</h2>
<p>Checkbox muncul otomatis di setiap baris. Saat ada baris tercentang, bulk-actions bar muncul di atas tabel.</p>

<pre><span class="k">new</span> <span class="f">TablePlus</span>({
  <span class="n">rowIdentifier</span>: <span class="s">'id'</span>,   <span class="c">// field unik per baris</span>

  <span class="n">onRowSelect</span>: <span class="k">(ids)</span> =&gt; {
    <span class="c">// dipanggil setiap kali ada perubahan seleksi</span>
    console.<span class="f">log</span>(<span class="s">'Terpilih:'</span>, ids);
    document.<span class="f">querySelector</span>(<span class="s">'#hapus-btn'</span>).disabled = ids.length === <span class="v">0</span>;
  },

  <span class="n">customActions</span>: [
    {
      <span class="n">label</span>    : <span class="s">'🗑 Hapus'</span>,
      <span class="n">className</span>: <span class="s">'bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700'</span>,
      <span class="n">onClick</span>  : <span class="k">(ids)</span> =&gt; {
        <span class="k">if</span> (<span class="f">confirm</span>(<span class="s">`Hapus ${ids.length} item?`</span>)) <span class="f">deleteItems</span>(ids);
      },
    },
    {
      <span class="n">label</span>  : <span class="s">'✉ Email'</span>,
      <span class="n">onClick</span>: <span class="k">(ids)</span> =&gt; <span class="f">sendBulkEmail</span>(ids),
    },
  ],
});</pre>

<!-- ─── FITUR FILTER ─── -->
<span class="section-anchor" id="fitur-filter"></span>
<h2>Filter Kolom</h2>
<p>Setiap header kolom punya tombol <code>⋮</code>. Klik untuk membuka dropdown daftar nilai unik kolom tersebut — bisa dicari dan di-scroll infinite. Filter akan dikirim ke backend sebagai <code>filters={"status":["active","banned"]}</code>.</p>

<p>Backend harus mendukung endpoint distinct untuk mengisi dropdown ini:</p>
<pre><span class="c">// Request yang dikirim TablePlus:</span>
GET /api/users?distinct=status&page=1&limit=25&search=

<span class="c">// Response yang diharapkan:</span>
{ <span class="s">"status"</span>: <span class="v">200</span>, <span class="s">"data"</span>: [<span class="s">"active"</span>, <span class="s">"inactive"</span>, <span class="s">"banned"</span>] }</pre>

<!-- ─── FITUR PREFERENCES ─── -->
<span class="section-anchor" id="fitur-preferences"></span>
<h2>Preferences (localStorage)</h2>
<p>Secara default TablePlus menyimpan preferensi user ke localStorage: kolom yang visible, per-page, sort key, dan sort order. Saat halaman dibuka kembali, preferensi dimuat otomatis.</p>

<pre><span class="c">// Nonaktifkan penyimpanan preferensi</span>
<span class="k">new</span> <span class="f">TablePlus</span>({ <span class="n">savePreferences</span>: <span class="k">false</span>, ... });

<span class="c">// Gunakan storage key kustom (berguna jika ada 2 tabel di satu halaman)</span>
<span class="k">new</span> <span class="f">TablePlus</span>({ <span class="n">storageKey</span>: <span class="s">'tabel-produk-v1'</span>, ... });

<span class="c">// Reset preferensi manual (tombol "↺ Reset" di toolbar melakukan ini)</span>
localStorage.<span class="f">removeItem</span>(<span class="s">'tableplus_/halaman/saya_/api/data'</span>);</pre>

<!-- ─── FITUR RESPONSIVE ─── -->
<span class="section-anchor" id="fitur-responsive"></span>
<h2>Responsive</h2>
<p>Pada layar &lt; 640px, tabel otomatis beralih ke tampilan kartu (card). Tentukan kolom mana yang menjadi judul kartu dengan <code>isTitle: true</code>.</p>

<pre><span class="n">columns</span>: {
  <span class="n">name</span>: {
    <span class="n">label</span>  : <span class="s">'Nama'</span>,
    <span class="n">isTitle</span>: <span class="k">true</span>,   <span class="c">// ← judul kartu di mobile</span>
    <span class="n">render</span> : <span class="k">(row)</span> =&gt; row.name,
  },
  <span class="n">email</span> : <span class="s">'Email'</span>,
  <span class="n">status</span>: <span class="s">'Status'</span>,
}</pre>

<p>Scroll horizontal terbatas di area tabel — toolbar, search, dan pagination <strong>tidak ikut scroll</strong>.</p>

<!-- ─── BACKEND ─── -->
<span class="section-anchor" id="backend"></span>
<h2>Format Backend</h2>

<h3>Query params yang dikirim TablePlus</h3>
<table class="doc-table">
  <thead><tr><th>Param</th><th>Contoh</th><th>Kapan dikirim</th></tr></thead>
  <tbody>
    <tr><td><code>page</code></td><td><code>1</code></td><td class="desc">Selalu</td></tr>
    <tr><td><code>per_page</code></td><td><code>25</code></td><td class="desc">Selalu</td></tr>
    <tr><td><code>search</code></td><td><code>john</code></td><td class="desc">Selalu (string kosong jika tidak ada)</td></tr>
    <tr><td><code>sort_by</code></td><td><code>name</code></td><td class="desc">Jika user klik header kolom</td></tr>
    <tr><td><code>sort_order</code></td><td><code>asc</code> / <code>desc</code></td><td class="desc">Bersama <code>sort_by</code></td></tr>
    <tr><td><code>filters</code></td><td><code>{"status":["active"]}</code></td><td class="desc">Jika ada filter dropdown kolom aktif (JSON string)</td></tr>
    <tr><td><code>distinct</code></td><td><code>status</code></td><td class="desc">Saat dropdown filter kolom dibuka</td></tr>
    <tr><td><em>custom params</em></td><td><code>category=elec</code></td><td class="desc">Dari <code>customFilters</code> — dikirim flat, diabaikan jika nilai <code>null</code> atau <code>''</code></td></tr>
  </tbody>
</table>

<h3>Format JSON response (data biasa)</h3>
<pre>{
  <span class="s">"status"</span>: <span class="v">200</span>,
  <span class="s">"data"</span>: {
    <span class="s">"data"</span>: [
      { <span class="s">"id"</span>: <span class="v">1</span>, <span class="s">"name"</span>: <span class="s">"Budi"</span>, <span class="s">"email"</span>: <span class="s">"budi@mail.com"</span> },
      { <span class="s">"id"</span>: <span class="v">2</span>, <span class="s">"name"</span>: <span class="s">"Sari"</span>, <span class="s">"email"</span>: <span class="s">"sari@mail.com"</span> }
    ],
    <span class="s">"pagination"</span>: {
      <span class="s">"total"</span>       : <span class="v">128</span>,
      <span class="s">"last_page"</span>   : <span class="v">6</span>,
      <span class="s">"per_page"</span>    : <span class="v">25</span>,
      <span class="s">"current_page"</span>: <span class="v">1</span>
    }
  }
}</pre>

<h3>Format JSON response (distinct — untuk filter dropdown)</h3>
<pre>{
  <span class="s">"status"</span>: <span class="v">200</span>,
  <span class="s">"data"</span>: [<span class="s">"active"</span>, <span class="s">"inactive"</span>, <span class="s">"banned"</span>]
}</pre>

<!-- ─── LARAVEL ─── -->
<span class="section-anchor" id="laravel"></span>
<h2>Contoh Controller Laravel</h2>

<pre><span class="k">public function</span> <span class="f">index</span>(Request <span class="n">$request</span>)
{
    <span class="n">$query</span> = User::query();

    <span class="c">// Search global</span>
    <span class="k">if</span> (<span class="n">$search</span> = <span class="n">$request</span>->search) {
        <span class="n">$query</span>-><span class="f">where</span>(<span class="k">function</span> (<span class="n">$q</span>) <span class="k">use</span> (<span class="n">$search</span>) {
            <span class="n">$q</span>-><span class="f">where</span>(<span class="s">'name'</span>, <span class="s">'like'</span>, <span class="s">"%{$search}%"</span>)
              -><span class="f">orWhere</span>(<span class="s">'email'</span>, <span class="s">'like'</span>, <span class="s">"%{$search}%"</span>);
        });
    }

    <span class="c">// Filter kolom dari dropdown (JSON)</span>
    <span class="k">if</span> (<span class="n">$filters</span> = <span class="n">$request</span>->filters) {
        <span class="n">$filters</span> = <span class="f">json_decode</span>(<span class="n">$filters</span>, <span class="k">true</span>);
        <span class="k">foreach</span> (<span class="n">$filters</span> <span class="k">as</span> <span class="n">$col</span> => <span class="n">$values</span>) {
            <span class="k">if</span> (!<span class="f">empty</span>(<span class="n">$values</span>)) {
                <span class="n">$query</span>-><span class="f">whereIn</span>(<span class="n">$col</span>, <span class="n">$values</span>);
            }
        }
    }

    <span class="c">// Custom filter (dari customFilters config)</span>
    <span class="k">if</span> (<span class="n">$request</span>-><span class="f">filled</span>(<span class="s">'status'</span>)) {
        <span class="n">$query</span>-><span class="f">where</span>(<span class="s">'status'</span>, <span class="n">$request</span>->status);
    }

    <span class="c">// Distinct — untuk dropdown filter kolom</span>
    <span class="k">if</span> (<span class="n">$col</span> = <span class="n">$request</span>->distinct) {
        <span class="n">$values</span> = <span class="n">$query</span>-><span class="f">distinct</span>()-><span class="f">pluck</span>(<span class="n">$col</span>)-><span class="f">filter</span>()-><span class="f">values</span>();
        <span class="k">return</span> response()-><span class="f">json</span>([<span class="s">'status'</span> => <span class="v">200</span>, <span class="s">'data'</span> => <span class="n">$values</span>]);
    }

    <span class="c">// Sort</span>
    <span class="k">if</span> (<span class="n">$request</span>->sort_by) {
        <span class="n">$query</span>-><span class="f">orderBy</span>(<span class="n">$request</span>->sort_by, <span class="n">$request</span>->sort_order ?? <span class="s">'asc'</span>);
    }

    <span class="n">$data</span> = <span class="n">$query</span>-><span class="f">paginate</span>(<span class="n">$request</span>->per_page ?? <span class="v">10</span>);

    <span class="k">return</span> response()-><span class="f">json</span>([
        <span class="s">'status'</span> => <span class="v">200</span>,
        <span class="s">'data'</span>   => [
            <span class="s">'data'</span>       => <span class="n">$data</span>-><span class="f">items</span>(),
            <span class="s">'pagination'</span> => [
                <span class="s">'total'</span>        => <span class="n">$data</span>-><span class="f">total</span>(),
                <span class="s">'last_page'</span>    => <span class="n">$data</span>-><span class="f">lastPage</span>(),
                <span class="s">'per_page'</span>     => <span class="n">$data</span>-><span class="f">perPage</span>(),
                <span class="s">'current_page'</span> => <span class="n">$data</span>-><span class="f">currentPage</span>(),
            ],
        ],
    ]);
}</pre>

<!-- ─── SPA ─── -->
<span class="section-anchor" id="spa"></span>
<h2>Integrasi SPA (Vue / React)</h2>

<div class="callout warning">
  <span class="callout-icon">⚠</span>
  <div>Selalu panggil <code>table.destroy()</code> saat komponen di-unmount untuk mencegah memory leak dari event listener dan ResizeObserver.</div>
</div>

<h3>Vue 3 (Composition API)</h3>
<pre><span class="k">import</span> { onMounted, onUnmounted, ref } <span class="k">from</span> <span class="s">'vue'</span>

<span class="k">const</span> <span class="n">tableInstance</span> = ref(<span class="k">null</span>)

<span class="f">onMounted</span>(() =&gt; {
  <span class="n">tableInstance</span>.value = <span class="k">new</span> <span class="f">TablePlus</span>({
    <span class="n">url</span>    : <span class="s">'/api/data'</span>,
    <span class="n">theme</span>  : <span class="s">'tailwind'</span>,
    <span class="n">columns</span>: { <span class="c">/* ... */</span> },
  });
  <span class="n">tableInstance</span>.value.<span class="f">render</span>(<span class="s">'#table-container'</span>);
})

<span class="f">onUnmounted</span>(() =&gt; {
  <span class="n">tableInstance</span>.value?.<span class="f">destroy</span>();
})</pre>

<h3>React</h3>
<pre><span class="k">import</span> { useEffect, useRef } <span class="k">from</span> <span class="s">'react'</span>

<span class="k">function</span> <span class="f">MyTable</span>() {
  <span class="k">const</span> <span class="n">tableRef</span> = <span class="f">useRef</span>(<span class="k">null</span>);

  <span class="f">useEffect</span>(() =&gt; {
    <span class="n">tableRef</span>.current = <span class="k">new</span> <span class="f">TablePlus</span>({
      <span class="n">url</span>    : <span class="s">'/api/data'</span>,
      <span class="n">theme</span>  : <span class="s">'tailwind'</span>,
      <span class="n">columns</span>: { <span class="c">/* ... */</span> },
    });
    <span class="n">tableRef</span>.current.<span class="f">render</span>(<span class="s">'#table-container'</span>);

    <span class="k">return</span> () =&gt; <span class="n">tableRef</span>.current?.<span class="f">destroy</span>();   <span class="c">// cleanup saat unmount</span>
  }, []);

  <span class="k">return</span> &lt;<span class="n">div</span> <span class="k">id</span>=<span class="s">"table-container"</span>&gt;&lt;/<span class="n">div</span>&gt;;
}</pre>

<h3>Filter dari luar tabel</h3>
<pre><span class="c">&lt;!-- Di HTML --&gt;</span>
&lt;<span class="n">select</span> <span class="k">id</span>=<span class="s">"status-filter"</span>&gt;
  &lt;<span class="n">option</span> <span class="k">value</span>=<span class="s">""</span>&gt;Semua Status&lt;/<span class="n">option</span>&gt;
  &lt;<span class="n">option</span> <span class="k">value</span>=<span class="s">"active"</span>&gt;Aktif&lt;/<span class="n">option</span>&gt;
  &lt;<span class="n">option</span> <span class="k">value</span>=<span class="s">"inactive"</span>&gt;Nonaktif&lt;/<span class="n">option</span>&gt;
&lt;/<span class="n">select</span>&gt;

&lt;<span class="n">div</span> <span class="k">id</span>=<span class="s">"users-table"</span>&gt;&lt;/<span class="n">div</span>&gt;

<span class="c">&lt;!-- Di JS --&gt;</span>
<span class="k">const</span> <span class="n">table</span> = <span class="k">new</span> <span class="f">TablePlus</span>({ <span class="n">url</span>: <span class="s">'/api/users'</span>, <span class="n">theme</span>: <span class="s">'tailwind'</span>, <span class="n">columns</span>: {<span class="c">/*...*/</span>} });
table.<span class="f">render</span>(<span class="s">'#users-table'</span>);

document.<span class="f">querySelector</span>(<span class="s">'#status-filter'</span>).onchange = <span class="k">(e)</span> =&gt; {
  table.<span class="f">setFilter</span>(<span class="s">'status'</span>, e.target.value);
};</pre>

</main>
</div>

<script>
// Highlight active nav link on scroll
const anchors = document.querySelectorAll('.section-anchor');
const navLinks = document.querySelectorAll('nav a');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      navLinks.forEach(a => a.classList.remove('active'));
      const target = document.querySelector(`nav a[href="#${entry.target.id}"]`);
      if (target) target.classList.add('active');
    }
  });
}, { rootMargin: '-20% 0px -70% 0px' });

anchors.forEach(a => observer.observe(a));
</script>
</body>
</html>