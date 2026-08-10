<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #3b5bdb, #6741d9); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📊</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">TablePlus v2.0</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Data table dinamis dengan pagination, search, sort, filter, export, dan seleksi baris — tanpa dependensi wajib.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Features Chips -->
<div class="card-custom">
    <div class="card-body-custom">
        <div style="display:flex;flex-wrap:wrap;gap:0.5rem;">
            <span style="background:#f3f0ff;color:#6741d9;padding:0.4rem 0.8rem;border-radius:99px;font-size:0.8rem;font-weight:600;">✦ Tailwind & Bootstrap</span>
            <span style="background:#e0ebff;color:#1971c2;padding:0.4rem 0.8rem;border-radius:99px;font-size:0.8rem;font-weight:600;">✦ Responsive Card Mobile</span>
            <span style="background:#d3f9d8;color:#2b8a3e;padding:0.4rem 0.8rem;border-radius:99px;font-size:0.8rem;font-weight:600;">✦ Export CSV/Excel/PDF</span>
            <span style="background:#fff3bf;color:#e67700;padding:0.4rem 0.8rem;border-radius:99px;font-size:0.8rem;font-weight:600;">✦ Zero Breaking Changes</span>
            <span style="background:#ffe3e3;color:#c92a2a;padding:0.4rem 0.8rem;border-radius:99px;font-size:0.8rem;font-weight:600;">✦ No Dependencies</span>
        </div>
    </div>
</div>

<!-- Instalasi -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Instalasi
    </div>
    <div class="card-body-custom">
        <p>Cukup load file <code>tableplus.js</code> di halaman Anda. Tidak perlu npm atau build step.</p>
        <div class="code-block">
            <pre><code>&lt;!-- Letakkan sebelum &lt;/body&gt; --&gt;
&lt;script src="tableplus.js"&gt;&lt;/script&gt;</code></pre>
        </div>
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>CDN Tailwind atau Bootstrap akan <strong>di-inject otomatis</strong> oleh TablePlus sesuai nilai <code>theme</code>. Tidak perlu menambahkannya manual.</div>
        </div>
    </div>
</div>

<!-- Quick Start -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Quick Start
    </div>
    <div class="card-body-custom">
        <p>Siapkan <code>&lt;div&gt;</code> kosong dan inisialisasi TablePlus:</p>
        <div class="code-block">
            <pre><code>&lt;div id="my-table"&gt;&lt;/div&gt;

&lt;script src="tableplus.js"&gt;&lt;/script&gt;
&lt;script&gt;
  const table = new TablePlus({
    url    : '/api/users',
    theme  : 'tailwind',   // atau 'bootstrap'
    columns: {
      id   : 'ID',
      name : 'Nama',
      email: 'Email',
    }
  });
  table.render('#my-table');
&lt;/script&gt;</code></pre>
        </div>
    </div>
</div>

<!-- v1 vs v2 -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-arrow-repeat text-warning"></i> Perubahan v1 → v2
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Aspek</th><th>v1</th><th>v2</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Mount point</strong></td>
                        <td style="background:#fff5f5;color:#c92a2a;">Harus <code>&lt;table&gt;</code> di HTML</td>
                        <td style="background:#f4fce3;color:#2b6a21;"><code>&lt;div&gt;</code> kosong — DOM otomatis</td>
                    </tr>
                    <tr>
                        <td><strong>Theme</strong></td>
                        <td style="background:#fff5f5;color:#c92a2a;">Tailwind hardcoded</td>
                        <td style="background:#f4fce3;color:#2b6a21;"><code>'tailwind'</code> atau <code>'bootstrap'</code></td>
                    </tr>
                    <tr>
                        <td><strong>Scroll</strong></td>
                        <td style="background:#fff5f5;color:#c92a2a;">Seluruh halaman scroll</td>
                        <td style="background:#f4fce3;color:#2b6a21;">Hanya area tabel, kontrol tetap</td>
                    </tr>
                    <tr>
                        <td><strong>Pagination</strong></td>
                        <td style="background:#fff5f5;color:#c92a2a;">Di dalam area scroll</td>
                        <td style="background:#f4fce3;color:#2b6a21;">Di luar — selalu terlihat</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Konfigurasi -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-gear text-info"></i> Konfigurasi Lengkap
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Opsi</th><th>Tipe</th><th>Default</th><th>Keterangan</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>url</code> <span style="background:#ffe3e3;color:#c92a2a;font-size:0.7rem;padding:2px 8px;border-radius:99px;">wajib</span></td>
                        <td>string</td><td>—</td><td>URL endpoint API backend</td>
                    </tr>
                    <tr>
                        <td><code>columns</code> <span style="background:#ffe3e3;color:#c92a2a;font-size:0.7rem;padding:2px 8px;border-radius:99px;">wajib</span></td>
                        <td>object</td><td>—</td><td>Definisi kolom tabel</td>
                    </tr>
                    <tr>
                        <td><code>theme</code></td>
                        <td>string</td><td><code>'tailwind'</code></td><td><code>'tailwind'</code> atau <code>'bootstrap'</code></td>
                    </tr>
                    <tr>
                        <td><code>perPage</code></td>
                        <td>number</td><td><code>10</code></td><td>Baris per halaman</td>
                    </tr>
                    <tr>
                        <td><code>perPageOptions</code></td>
                        <td>number[]</td><td><code>[10,25,50,100,1000000]</code></td><td>Opsi dropdown; <code>1000000</code> = "Semua"</td>
                    </tr>
                    <tr>
                        <td><code>rowIdentifier</code></td>
                        <td>string</td><td><code>'id'</code></td><td>Field unik untuk checkbox & seleksi</td>
                    </tr>
                    <tr>
                        <td><code>customFilters</code></td>
                        <td>object</td><td><code>{}</code></td><td>Filter tambahan dikirim ke backend</td>
                    </tr>
                    <tr>
                        <td><code>savePreferences</code></td>
                        <td>boolean</td><td><code>true</code></td><td>Simpan sort, kolom, per-page di localStorage</td>
                    </tr>
                    <tr>
                        <td><code>onRowSelect</code></td>
                        <td>function</td><td><code>null</code></td><td>Callback saat seleksi berubah: <code>(ids) => void</code></td>
                    </tr>
                    <tr>
                        <td><code>customActions</code></td>
                        <td>array</td><td><code>[]</code></td><td>Tombol aksi di bulk-actions bar</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Definisi Kolom -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-table text-success"></i> Definisi Kolom
    </div>
    <div class="card-body-custom">
        <p>Setiap key di <code>columns</code> adalah nama field. Nilainya bisa <strong>string</strong>, <strong>object</strong>, atau <strong>function</strong>:</p>
        
        <div class="row g-3 mt-2">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">String</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Label = string, nilai = row[key]</p>
                        <div class="code-block"><pre><code>columns: {
  id  : 'ID',
  name: 'Nama',
}</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Object</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Kustomisasi penuh: label, render, exportText, isTitle</p>
                        <div class="code-block"><pre><code>name: {
  label  : 'Nama',
  isTitle: true,
  render : (row) => row.name,
  exportText: (row) => row.name,
}</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Function</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Shorthand untuk render</p>
                        <div class="code-block"><pre><code>email: (row) =>
  `&lt;a href="mailto:${row.email}"&gt;
    ${row.email}
  &lt;/a&gt;`</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
        
        <h5 style="font-weight:700;margin-top:1.5rem;">Contoh Lengkap</h5>
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>columns: {
  // String
  id: 'ID',

  // Object — judul mobile + link
  name: {
    label  : 'Nama',
    isTitle: true,
    render : (row) => {
      const a = document.createElement('a');
      a.href = `/user/${row.id}`;
      a.textContent = row.name;
      a.className = 'text-blue-600 hover:underline';
      return a;
    },
    exportText: (row) => row.name,
  },

  // Object — badge status
  status: {
    label : 'Status',
    render: (row) => {
      const map = {
        active  : 'bg-green-100 text-green-800',
        inactive: 'bg-gray-100 text-gray-600',
        banned  : 'bg-red-100 text-red-800',
      };
      return `&lt;span class="px-2 py-0.5 rounded-full text-xs ${map[row.status] || ''}"&gt;
        ${row.status}
      &lt;/span&gt;`;
    },
    exportText: (row) => row.status,
  },

  // Function shorthand
  email: (row) => `&lt;a href="mailto:${row.email}"&gt;${row.email}&lt;/a&gt;`,

  // Tombol aksi
  actions: {
    label : 'Aksi',
    render: (row) => {
      const btn = document.createElement('button');
      btn.textContent = 'Edit';
      btn.onclick = () => editUser(row.id);
      btn.className = 'text-xs px-2 py-1 bg-blue-50 text-blue-700 rounded';
      return btn;
    },
    exportText: () => '',
  },
}</code></pre>
        </div>
    </div>
</div>

<!-- API Methods -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-code-slash text-warning"></i> API Methods
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>render(selector)</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Inisialisasi & tampilkan tabel ke <code>&lt;div&gt;</code> kosong.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>refresh()</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Fetch ulang data dengan parameter saat ini.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>setPage(n)</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Pindah ke halaman tertentu.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>setSearch(term)</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Set kata kunci pencarian, reset ke halaman 1.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>setFilter(key, value)</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Tambah/update customFilter lalu fetch.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>getSelectedRows()</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Array ID baris yang dicentang.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>getSelectedData()</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Array objek data baris yang dicentang.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;"><code>destroy()</code></h6>
                        <p style="font-size:0.85rem;color:#64748b;">Bersihkan DOM & event listener. Wajib di SPA!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Export -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-download text-success"></i> Export
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Method</th><th>Format</th><th>Dependensi</th></tr></thead>
                <tbody>
                    <tr><td><code>exportCSV()</code></td><td>CSV</td><td>Built-in</td></tr>
                    <tr><td><code>exportXLSX()</code></td><td>Excel .xlsx</td><td>xlsx CDN (auto-load)</td></tr>
                    <tr><td><code>exportPDF()</code></td><td>PDF</td><td>jspdf + autotable CDN</td></tr>
                    <tr><td><code>exportCopy()</code></td><td>Clipboard (tab-separated)</td><td>Built-in</td></tr>
                    <tr><td><code>exportSelected()</code></td><td>CSV (baris terpilih)</td><td>Built-in</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Backend Format -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-server text-info"></i> Format Backend Response
    </div>
    <div class="card-body-custom">
        <h5 style="font-weight:700;">Query Params yang Dikirim TablePlus:</h5>
        <div class="code-block">
            <pre><code>?page=1&per_page=25&search=&sort_by=name&sort_order=asc&filters={"status":["active"]}</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Response JSON yang Diharapkan:</h5>
        <div class="code-block">
            <pre><code>{
  "status": 200,
  "data": {
    "data": [
      { "id": 1, "name": "Budi", "email": "budi@mail.com" }
    ],
    "pagination": {
      "total": 128,
      "last_page": 6,
      "per_page": 25,
      "current_page": 1
    }
  }
}</code></pre>
        </div>
    </div>
</div>

<!-- Custom Actions -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-mouse text-danger"></i> Seleksi Baris & Custom Actions
    </div>
    <div class="card-body-custom">
        <p>Checkbox muncul otomatis. Gunakan <code>customActions</code> untuk tombol aksi di bulk-bar:</p>
        <div class="code-block">
            <pre><code>new TablePlus({
  rowIdentifier: 'id',
  onRowSelect: (ids) => {
    console.log('Terpilih:', ids);
  },
  customActions: [
    {
      label    : '🗑 Hapus',
      className: 'bg-red-600 text-white px-3 py-1 rounded text-sm',
      onClick  : (ids) => {
        if (confirm(`Hapus ${ids.length} item?`)) deleteItems(ids);
      },
    },
    {
      label  : '✉ Email',
      onClick: (ids) => sendBulkEmail(ids),
    },
  ],
});</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #3b5bdb, #6741d9); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Powerful Data Tables</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">TablePlus siap digunakan di project kamu. Lihat dokumentasi lainnya.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#3b5bdb;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('route') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
        </div>
    </div>
</div>