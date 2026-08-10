<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #6366f1); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📋</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">DataTables Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Generate JSON response compatible with jQuery DataTables. Support client-side array dan server-side SQL query.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-info"></i> Overview
    </div>
    <div class="card-body-custom">
        <p><strong>DataTables Helper</strong> memudahkan kamu membuat response JSON yang kompatibel dengan <strong>jQuery DataTables</strong>. Support client-side processing (array) dan server-side processing (SQL query via PDO).</p>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>
                <strong>Response Format:</strong> DataTables expect JSON dengan struktur:
                <code>{"draw": 1, "recordsTotal": 100, "recordsFiltered": 100, "data": [...]}</code>
            </div>
        </div>
    </div>
</div>

<!-- Import -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\DataTables;</code></pre>
        </div>
    </div>
</div>

<!-- Method 1: Array/Collection -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Client-side: Using Array / Collection
    </div>
    <div class="card-body-custom">
        <p>Kirim data array langsung untuk diproses di client-side oleh DataTables:</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\DataTables;

$users = [
    ['id' => 1, 'name' => 'Fervian', 'email' => 'fervian@mail.com'],
    ['id' => 2, 'name' => 'Dwi',     'email' => 'dwi@mail.com'],
    ['id' => 3, 'name' => 'Azka',    'email' => 'azka@mail.com'],
];

return DataTables::of($users)->make(true);</code></pre>
        </div>
        <p style="font-size:0.8rem;color:#64748b;"><code>make(true)</code> → otomatis echo JSON + exit. <code>make(false)</code> → return JSON string.</p>
    </div>
</div>

<!-- Method 2: SQL Query -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Server-side: Using SQL Query
    </div>
    <div class="card-body-custom">
        <p>Untuk data besar, gunakan server-side processing dengan SQL query. DataTables akan mengirim parameter pagination, search, dan sorting.</p>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\DataTables;

// Ambil PDO connection
$pdo = new PDO(
    'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_DATABASE'),
    env('DB_USERNAME'),
    env('DB_PASSWORD')
);

$sql = "SELECT id, name, email FROM users";

return DataTables::query($pdo, $sql, ['id', 'name', 'email'])->make(true);</code></pre>
        </div>
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div>Server-side processing <strong>otomatis</strong> menangani: search, pagination, sorting, dan filtering dari request DataTables.</div>
        </div>
    </div>
</div>

<!-- Additional Features -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-plus-circle text-success"></i> Additional Features
    </div>
    <div class="card-body-custom">
        
        <!-- with() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#0891b2;">
                    <i class="bi bi-database-add"></i> with() — Add Extra Data
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Tambahkan data tambahan ke response JSON:</p>
                <div class="code-block">
                    <pre><code>return DataTables::of($users)
    ->with([
        'message' => 'Success',
        'status'  => 200,
        'server_time' => date('Y-m-d H:i:s'),
    ])
    ->make(true);

// Response:
{
    "draw": 1,
    "recordsTotal": 3,
    "recordsFiltered": 3,
    "data": [...],
    "message": "Success",
    "status": 200,
    "server_time": "2024-01-15 10:30:00"
}</code></pre>
                </div>
            </div>
        </div>
        
        <!-- addColumn() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#0891b2;">
                    <i class="bi bi-plus-square"></i> addColumn() — Add New Column
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Tambahkan kolom baru berdasarkan data yang ada:</p>
                <div class="code-block">
                    <pre><code>return DataTables::of($users)
    ->addColumn('action', function($row) {
        return '
            &lt;a href="/edit/' . $row['id'] . '" class="btn btn-sm btn-warning"&gt;
                Edit
            &lt;/a&gt;
            &lt;button onclick="deleteUser(' . $row['id'] . ')" class="btn btn-sm btn-danger"&gt;
                Delete
            &lt;/button&gt;
        ';
    })
    ->addColumn('full_info', function($row) {
        return $row['name'] . ' (' . $row['email'] . ')';
    })
    ->make(true);</code></pre>
                </div>
            </div>
        </div>
        
        <!-- editColumn() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#0891b2;">
                    <i class="bi bi-pencil-square"></i> editColumn() — Modify Column Value
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Ubah isi kolom yang sudah ada:</p>
                <div class="code-block">
                    <pre><code>return DataTables::of($users)
    ->editColumn('name', function($value, $row) {
        return strtoupper($value);   // Uppercase nama
    })
    ->editColumn('email', function($value, $row) {
        return '&lt;a href="mailto:' . $value . '"&gt;' . $value . '&lt;/a&gt;';
    })
    ->editColumn('created_at', function($value) {
        return date('d M Y', strtotime($value));  // Format tanggal
    })
    ->make(true);</code></pre>
                </div>
            </div>
        </div>
        
        <!-- rawColumns() -->
        <div class="card-custom" style="border:1px solid #e2e8f0;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;color:#0891b2;">
                    <i class="bi bi-code-slash"></i> rawColumns() — Allow HTML
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Tandai kolom yang berisi HTML agar tidak di-escape:</p>
                <div class="code-block">
                    <pre><code>return DataTables::of($users)
    ->addColumn('action', function($row) {
        return '&lt;button class="btn btn-sm btn-primary"&gt;Edit&lt;/button&gt;';
    })
    ->addColumn('status', function($row) {
        $color = $row['is_active'] ? 'green' : 'red';
        return '&lt;span style="color:' . $color . '"&gt;●&lt;/span&gt;';
    })
    ->rawColumns(['action', 'status'])  // Kolom ini mengandung HTML
    ->make(true);</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Complete Example: User DataTable API
    </div>
    <div class="card-body-custom">
        <p>Contoh lengkap endpoint API untuk DataTables users:</p>
        <div class="code-block" style="max-height:450px;overflow-y:auto;">
            <pre><code>use Bpjs\Framework\Helpers\DataTables;

class UserApiController
{
    public function datatable()
    {
        $users = User::query()
            ->select('id', 'name', 'email', 'is_active', 'created_at')
            ->get();

        return DataTables::of($users)
            // Tambah kolom aksi
            ->addColumn('action', function($row) {
                return '
                    &lt;a href="/users/' . $row['id'] . '/edit" class="btn btn-sm btn-warning"&gt;
                        &lt;i class="fas fa-edit"&gt;&lt;/i&gt; Edit
                    &lt;/a&gt;
                    &lt;button onclick="deleteUser(' . $row['id'] . ')" class="btn btn-sm btn-danger"&gt;
                        &lt;i class="fas fa-trash"&gt;&lt;/i&gt; Delete
                    &lt;/button&gt;
                ';
            })
            // Tambah kolom status badge
            ->addColumn('status_badge', function($row) {
                return $row['is_active']
                    ? '&lt;span class="badge bg-success"&gt;Active&lt;/span&gt;'
                    : '&lt;span class="badge bg-danger"&gt;Inactive&lt;/span&gt;';
            })
            // Format tanggal
            ->editColumn('created_at', function($value) {
                return date('d M Y H:i', strtotime($value));
            })
            // Tandai kolom HTML
            ->rawColumns(['action', 'status_badge'])
            // Tambah data extra
            ->with([
                'message' => 'Data loaded successfully',
                'server_time' => date('Y-m-d H:i:s'),
            ])
            ->make(true);
    }
}</code></pre>
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
                <thead>
                    <tr><th>Method</th><th>Parameters</th><th>Description</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>DataTables::of()</code></td>
                        <td>array $data</td>
                        <td>Initialize dengan array data (client-side)</td>
                    </tr>
                    <tr>
                        <td><code>DataTables::query()</code></td>
                        <td>PDO $pdo, string $sql, array $columns</td>
                        <td>Initialize dengan SQL query (server-side)</td>
                    </tr>
                    <tr>
                        <td><code>addColumn()</code></td>
                        <td>string $name, callable $callback</td>
                        <td>Tambah kolom baru. Callback terima <code>$row</code>.</td>
                    </tr>
                    <tr>
                        <td><code>editColumn()</code></td>
                        <td>string $name, callable $callback</td>
                        <td>Edit nilai kolom. Callback terima <code>($value, $row)</code>.</td>
                    </tr>
                    <tr>
                        <td><code>rawColumns()</code></td>
                        <td>array $columns</td>
                        <td>Tandai kolom yang mengandung HTML (jangan di-escape).</td>
                    </tr>
                    <tr>
                        <td><code>with()</code></td>
                        <td>array $data</td>
                        <td>Tambah data tambahan ke response JSON.</td>
                    </tr>
                    <tr>
                        <td><code>make()</code></td>
                        <td>bool $send = true</td>
                        <td>Generate JSON. <code>true</code> = echo & exit, <code>false</code> = return string.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #6366f1); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Powerful Data Tables</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan DataTables helper dengan jQuery DataTables di frontend.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#0891b2;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('request') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-arrow-down-up"></i> Request →
            </a>
        </div>
    </div>
</div>