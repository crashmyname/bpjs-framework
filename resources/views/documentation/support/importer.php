<section class="section">
    <div class="section-header">
        <h1>Import by BPJS</h1>
    </div>

    <div class="section-body">
        <b>
            Fitur Import by BPJS digunakan untuk membaca file Excel (.xlsx / .xls / .csv)
            lalu memproses data secara otomatis ke database atau logic lainnya.
        </b>
        <br><br>
        Importer mendukung:
        <ul>
            <li>Custom mapping column</li>
            <li>Validasi header wajib</li>
            <li>Limit jumlah row</li>
            <li>Skip row kosong</li>
            <li>Multi sheet support</li>
            <li>Summary hasil import</li>
            <li>Custom error handling per row</li>
            <li>Hook beforeImport & afterImport</li>
        </ul>
    </div>

    <br>

    <h3>CLI Command</h3>
    Untuk membuat file import otomatis melalui terminal VSCode / CMD:
    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code>';
    echo 'php bpjs make:import MaterialImport';
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Struktur Importer</h3>
    File import biasanya disimpan di folder:
    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code>';
    echo 'app/Import/MaterialImport.php';
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Contoh Class Import Lengkap</h3>

    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code style="font-family: Consolas;">';
echo htmlspecialchars('<?php

namespace App\Import;

use App\Models\Materials;
use Bpjs\Framework\Helpers\Importer;

class MaterialImport extends Importer
{
    protected function beforeImport(): void
    {
        // dijalankan sebelum import
    }

    protected function afterImport(array &$results): void
    {
        // dijalankan setelah import
    }

    protected function onError(Exception $e, array $row, int $index): array
    {
        return [
            "row" => $index + 1,
            "status" => "failed",
            "message" => $e->getMessage()
        ];
    }

    public function handle(array $mappedRow, int $index): mixed
    {
        $material = Materials::query()
            ->where("mold_number","=",$mappedRow["mold_number"])
            ->first();

        if ($material) {
            return [
                "row" => $index + 1,
                "status" => "skipped",
                "mold_number" => $mappedRow["mold_number"] ?? null,
                "message" => "Mold number sudah ada."
            ];
        }

        Materials::create([
            "mold_number" => $mappedRow["mold_number"],
            "lamp_name" => $mappedRow["lamp_name"],
            "model_name" => $mappedRow["model_name"],
            "type_material" => $mappedRow["type_material"],
        ]);

        return [
            "row" => $index + 1,
            "status" => "success",
            "mold_number" => $mappedRow["mold_number"] ?? null,
            "message" => "Berhasil import material."
        ];
    }
}');
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Contoh Penggunaan di Controller / Service</h3>

    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code style="font-family: Consolas;">';
echo htmlspecialchars('public function import(Request $request)
{
    if (!$request->file("file")) {
        return Response::json([
            "status" => 500,
            "message" => "File tidak ada"
        ],500);
    }

    $validateType = $request->getClientMimeType("file");

    $allowedTypes = [
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        "application/vnd.ms-excel"
    ];

    if ($request->file("file") && !in_array($validateType,$allowedTypes)) {
        $errors = [
            "file" => ["File must be a valid excel file"]
        ];
    }

    if (!empty($errors)) {
        return Response::json([
            "status" => 500,
            "message" => $errors
        ],500);
    }

    $path = storage_path("material/");

    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }

    $file = $request->file("file");

    $filename = uniqid("import_material_") . "." .
        $request->getClientOriginalExtension("file");

    $filePath = $path . $filename;

    store($file["tmp_name"], $path, $filename);

    $import = new MaterialImport($filePath, [
        "hasHeader" => true,
        "sheetName" => "Sheet1"
    ]);

    $results = $import->import();

    return Response::json([
        "status" => 200,
        "message" => "Import selesai",
        "results" => $results
    ],200);
}');
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Constructor Importer</h3>

    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code>';
echo htmlspecialchars('$import = new MaterialImport($filePath, [
    "hasHeader" => true,
    "startRow" => 1,
    "customMap" => null,
    "requiredHeaders" => ["mold_number", "lamp_name"],
    "limitRows" => 100,
    "skipEmptyRows" => true,
    "sheetIndex" => 0,
    "sheetName" => "Sheet1"
]);');
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Penjelasan Opsi Constructor</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Opsi</th>
                <th>Tipe</th>
                <th>Default</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>hasHeader</td>
                <td>bool</td>
                <td>true</td>
                <td>Apakah file memiliki header</td>
            </tr>
            <tr>
                <td>startRow</td>
                <td>int</td>
                <td>1</td>
                <td>Mulai membaca dari row ke berapa</td>
            </tr>
            <tr>
                <td>customMap</td>
                <td>callable|null</td>
                <td>null</td>
                <td>Custom mapping row</td>
            </tr>
            <tr>
                <td>requiredHeaders</td>
                <td>array</td>
                <td>[]</td>
                <td>Header wajib yang harus ada</td>
            </tr>
            <tr>
                <td>limitRows</td>
                <td>int|null</td>
                <td>null</td>
                <td>Batas jumlah row yang dibaca</td>
            </tr>
            <tr>
                <td>skipEmptyRows</td>
                <td>bool</td>
                <td>true</td>
                <td>Skip row kosong</td>
            </tr>
            <tr>
                <td>sheetIndex</td>
                <td>int</td>
                <td>0</td>
                <td>Ambil sheet berdasarkan index</td>
            </tr>
            <tr>
                <td>sheetName</td>
                <td>string|null</td>
                <td>null</td>
                <td>Ambil sheet berdasarkan nama</td>
            </tr>
        </tbody>
    </table>

    <br>

    <h3>Contoh Custom Mapping</h3>

    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code>';
echo htmlspecialchars('$import = new MaterialImport($filePath, [
    "customMap" => function($row){
        return [
            "mold_number" => $row["A"],
            "lamp_name"   => $row["B"],
            "model_name"  => $row["C"],
        ];
    }
]);');
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Response Import</h3>

    <?php echo '<pre style="background-color:#2d2d2d;color:#f8f8f2;padding:10px;border-radius:5px;overflow:auto;">';
    echo '<code>';
echo htmlspecialchars('{
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
                "message": "Berhasil import material."
            },
            {
                "row": 2,
                "status": "skipped",
                "message": "Mold number sudah ada."
            }
        ]
    }
}');
    echo '</code>';
    echo '</pre>'; ?>

    <br>

    <h3>Method yang tersedia di Importer</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Method</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>beforeImport()</td>
                <td>Dijalankan sebelum import dimulai</td>
            </tr>
            <tr>
                <td>afterImport()</td>
                <td>Dijalankan setelah import selesai</td>
            </tr>
            <tr>
                <td>handle()</td>
                <td>Logic utama setiap row (wajib dibuat)</td>
            </tr>
            <tr>
                <td>onError()</td>
                <td>Custom error handling per row</td>
            </tr>
            <tr>
                <td>import()</td>
                <td>Menjalankan seluruh proses import</td>
            </tr>
            <tr>
                <td>mapRow()</td>
                <td>Mapping row berdasarkan header/customMap</td>
            </tr>
            <tr>
                <td>getHeader()</td>
                <td>Mengambil header excel</td>
            </tr>
            <tr>
                <td>getDataRows()</td>
                <td>Mengambil semua data row</td>
            </tr>
        </tbody>
    </table>

    <br><br>
</section>