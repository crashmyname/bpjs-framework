<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📥</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Import by BPJS</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Baca & proses file Excel (.xlsx/.xls/.csv) otomatis ke database. Custom mapping, validasi, multi-sheet, dan error handling.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Features Grid -->
<div class="row g-3 mb-3">
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🗺️</div><h6 style="font-weight:700;">Custom Mapping</h6><p style="font-size:0.75rem;color:#64748b;">Map kolom sesuka hati</p></div></div></div>
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">✅</div><h6 style="font-weight:700;">Header Validation</h6><p style="font-size:0.75rem;color:#64748b;">Validasi header wajib</p></div></div></div>
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">📊</div><h6 style="font-weight:700;">Multi Sheet</h6><p style="font-size:0.75rem;color:#64748b;">Support multiple sheets</p></div></div></div>
    <div class="col-md-3 col-6"><div class="card-custom h-100"><div class="card-body-custom text-center"><div style="font-size:1.5rem;">🪝</div><h6 style="font-weight:700;">Hooks</h6><p style="font-size:0.75rem;color:#64748b;">before/after import</p></div></div></div>
</div>

<!-- CLI Command -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0ea5e9;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Generate via CLI
    </div>
    <div class="card-body-custom">
        <p>Buat file import otomatis melalui terminal:</p>
        <div class="code-block">
            <pre><code>php bpjs make:import MaterialImport</code></pre>
        </div>
        <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>app/Import/MaterialImport.php</code></p>
    </div>
</div>

<!-- Class Structure -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0ea5e9;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Complete Import Class
    </div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:500px;overflow-y:auto;">
            <pre><code>namespace App\Import;

use App\Models\Materials;
use Bpjs\Framework\Helpers\Importer;

class MaterialImport extends Importer
{
    protected function beforeImport(): void
    {
        // Dijalankan sebelum import dimulai
    }

    protected function afterImport(array &$results): void
    {
        // Dijalankan setelah import selesai
    }

    protected function onError(\Exception $e, array $row, int $index): array
    {
        return [
            'row'    => $index + 1,
            'status' => 'failed',
            'message' => $e->getMessage(),
        ];
    }

    public function handle(array $mappedRow, int $index): mixed
    {
        // Cek duplikat
        $exists = Materials::query()
            ->where('mold_number', '=', $mappedRow['mold_number'])
            ->first();

        if ($exists) {
            return [
                'row'         => $index + 1,
                'status'      => 'skipped',
                'mold_number' => $mappedRow['mold_number'] ?? null,
                'message'     => 'Mold number sudah ada.',
            ];
        }

        // Insert data
        Materials::create([
            'mold_number'  => $mappedRow['mold_number'],
            'lamp_name'    => $mappedRow['lamp_name'],
            'model_name'   => $mappedRow['model_name'],
            'type_material'=> $mappedRow['type_material'],
        ]);

        return [
            'row'         => $index + 1,
            'status'      => 'success',
            'mold_number' => $mappedRow['mold_number'] ?? null,
            'message'     => 'Berhasil import material.',
        ];
    }
}</code></pre>
        </div>
    </div>
</div>

<!-- Controller Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0ea5e9;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Controller / Service Usage
    </div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:500px;overflow-y:auto;">
            <pre><code>public function import(Request $request)
{
    // Validasi file
    if (!$request->hasFile('file')) {
        return Api::error('File tidak ada', 400);
    }

    // Validasi tipe file
    $allowedTypes = [
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.ms-excel',
    ];
    if (!in_array($request->getClientMimeType('file'), $allowedTypes)) {
        return Api::error('File harus Excel (.xlsx/.xls)', 422);
    }

    // Simpan file ke storage
    $path = storage_path('material/');
    if (!is_dir($path)) mkdir($path, 0777, true);

    $filename = uniqid('import_material_') . '.' . $request->getClientOriginalExtension('file');
    store($request->file('file')['tmp_name'], $path, $filename);
    $filePath = $path . $filename;

    // Jalankan import
    $import = new MaterialImport($filePath, [
        'hasHeader' => true,
        'sheetName' => 'Sheet1',
    ]);
    $results = $import->import();

    return Api::success($results, 'Import selesai');
}</code></pre>
        </div>
    </div>
</div>

<!-- Constructor Options -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-gear text-info"></i> Constructor Options
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Opsi</th><th>Tipe</th><th>Default</th><th>Deskripsi</th></tr></thead>
                <tbody>
                    <tr><td><code>hasHeader</code></td><td>bool</td><td><code>true</code></td><td>Apakah file memiliki header row</td></tr>
                    <tr><td><code>startRow</code></td><td>int</td><td><code>1</code></td><td>Mulai membaca dari baris ke</td></tr>
                    <tr><td><code>customMap</code></td><td>callable|null</td><td><code>null</code></td><td>Custom mapping function per row</td></tr>
                    <tr><td><code>requiredHeaders</code></td><td>array</td><td><code>[]</code></td><td>Header yang wajib ada di file</td></tr>
                    <tr><td><code>limitRows</code></td><td>int|null</td><td><code>null</code></td><td>Batas jumlah baris yang diproses</td></tr>
                    <tr><td><code>skipEmptyRows</code></td><td>bool</td><td><code>true</code></td><td>Lewati baris kosong</td></tr>
                    <tr><td><code>sheetIndex</code></td><td>int</td><td><code>0</code></td><td>Ambil sheet berdasarkan index</td></tr>
                    <tr><td><code>sheetName</code></td><td>string|null</td><td><code>null</code></td><td>Ambil sheet berdasarkan nama</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom Mapping -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-map text-success"></i> Custom Mapping
    </div>
    <div class="card-body-custom">
        <p>Gunakan <code>customMap</code> untuk mapping kolom yang tidak standar:</p>
        <div class="code-block">
            <pre><code>$import = new MaterialImport($filePath, [
    'customMap' => function($row) {
        return [
            'mold_number'  => $row['A'],   // kolom A
            'lamp_name'    => $row['B'],   // kolom B
            'model_name'   => $row['C'],   // kolom C
            'type_material'=> $row['D'],   // kolom D
        ];
    },
]);</code></pre>
        </div>
    </div>
</div>

<!-- Response Format & Methods -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-code-slash text-warning"></i> Response Format</div>
            <div class="card-body-custom">
                <div class="code-block"><pre><code>{
  "status": 200,
  "message": "Import selesai",
  "results": {
    "summary": {
      "success": 10,
      "failed": 1,
      "skipped": 2
    },
    "results": [
      {
        "row": 1,
        "status": "success",
        "message": "Berhasil import."
      }
    ]
  }
}</code></pre></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom"><i class="bi bi-tools text-info"></i> Available Methods</div>
            <div class="card-body-custom p-0">
                <div style="overflow-x:auto;">
                    <table class="table-custom">
                        <thead><tr><th>Method</th><th>Deskripsi</th></tr></thead>
                        <tbody>
                            <tr><td><code>beforeImport()</code></td><td>Hook sebelum import</td></tr>
                            <tr><td><code>afterImport()</code></td><td>Hook setelah import</td></tr>
                            <tr><td><code>handle()</code></td><td>Logic utama per row (wajib)</td></tr>
                            <tr><td><code>onError()</code></td><td>Custom error handling</td></tr>
                            <tr><td><code>import()</code></td><td>Jalankan import</td></tr>
                            <tr><td><code>mapRow()</code></td><td>Mapping row ke header</td></tr>
                            <tr><td><code>getHeader()</code></td><td>Ambil header Excel</td></tr>
                            <tr><td><code>getDataRows()</code></td><td>Ambil semua data row</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Ready to Import?</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Importer dengan Export untuk manajemen data yang lengkap.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#0ea5e9;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('cli') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-terminal"></i> CLI →
            </a>
        </div>
    </div>
</div>