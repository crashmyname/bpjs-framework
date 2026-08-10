<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #3b5bdb, #6741d9); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📊</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">TablePlus (Server-Side)</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Backend helper untuk DataTable API. Search, filter, pagination, sorting, join, dan manipulasi kolom.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-info-circle text-primary"></i> Overview</div>
    <div class="card-body-custom">
        <p><strong>TablePlus</strong> adalah backend helper untuk membuat API DataTable yang kompatibel dengan <strong>jQuery DataTables</strong> atau frontend table library apapun. Otomatis menangani: search, pagination, sorting, filtering, dan manipulasi data.</p>
        <div class="code-block"><pre><code>use Bpjs\Framework\Helpers\TablePlus;</code></pre></div>
    </div>
</div>

<!-- Basic Usage -->
<div class="card-custom">
    <div class="card-header-custom"><span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span> Basic Usage</div>
    <div class="card-body-custom">
        <div class="code-block"><pre><code>// Paling simpel — semua kolom, auto pagination
return TablePlus::of('users')->make();

// Return array (tidak auto-echo JSON)
$data = TablePlus::of('users')->make(false);</code></pre></div>
    </div>
</div>

<!-- Query Building -->
<div class="card-custom">
    <div class="card-header-custom"><span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span> Query Building</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">SELECT Columns</h6><div class="code-block"><pre><code>TablePlus::of('users')
    ->select('id','name','email')
    ->make();</code></pre></div></div></div></div>
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">LEFT JOIN</h6><div class="code-block"><pre><code>TablePlus::of('users')
    ->leftJoin('roles','roles.id','=','users.role_id')
    ->make();</code></pre></div></div></div></div>
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">ORDER BY</h6><div class="code-block"><pre><code>TablePlus::of('users')
    ->orderBy('id','DESC')
    ->make();</code></pre></div></div></div></div>
        </div>
    </div>
</div>

<!-- WHERE Clauses -->
<div class="card-custom">
    <div class="card-header-custom"><span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span> WHERE Clauses</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">where()</h6><div class="code-block"><pre><code>->where('status','=','active')</code></pre></div></div></div></div>
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">orWhere()</h6><div class="code-block"><pre><code>->orWhere('role','=','admin')</code></pre></div></div></div></div>
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">whereIn()</h6><div class="code-block"><pre><code>->whereIn('status',['active','pending'])</code></pre></div></div></div></div>
            <div class="col-md-6"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">whereBetween()</h6><div class="code-block"><pre><code>->whereBetween('created_at','2025-01-01','2025-12-31')</code></pre></div></div></div></div>
            <div class="col-md-6"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">searchable()</h6><div class="code-block"><pre><code>->searchable(['name','email'])</code></pre></div></div></div></div>
        </div>
    </div>
</div>

<!-- Filter & Pagination -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100"><div class="card-header-custom"><i class="bi bi-funnel text-warning"></i> Filters</div><div class="card-body-custom">
            <div class="code-block"><pre><code>// Static filter
->filters(['status' => 'active'])

// Dynamic distinct
->handleDistinct($_GET['distinct'] ?? null)

// Distinct values
->distinct('status')</code></pre></div>
        </div></div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100"><div class="card-header-custom"><i class="bi bi-file-earmark-spreadsheet text-success"></i> Pagination</div><div class="card-body-custom">
            <div class="code-block"><pre><code>// Per page, current page
->paginate(10, 1)

// Hanya 10 item per page
->paginate(10)</code></pre></div>
        </div></div>
    </div>
</div>

<!-- Column Manipulation -->
<div class="card-custom">
    <div class="card-header-custom"><span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span> Column Manipulation</div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">addColumn()</h6><p style="font-size:0.8rem;color:#64748b;">Tambah kolom baru</p><div class="code-block"><pre><code>->addColumn('action', fn($row) =>
    '&lt;button&gt;Edit&lt;/button&gt;'
)</code></pre></div></div></div></div>
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">editColumn()</h6><p style="font-size:0.8rem;color:#64748b;">Ubah isi kolom</p><div class="code-block"><pre><code>->editColumn('status',
    fn($value) => strtoupper($value)
)</code></pre></div></div></div></div>
            <div class="col-md-4"><div class="card-custom" style="border:1px solid #e2e8f0;height:100%;"><div class="card-body-custom"><h6 style="font-weight:700;">removeColumn()</h6><p style="font-size:0.8rem;color:#64748b;">Hapus kolom dari output</p><div class="code-block"><pre><code>->removeColumn('password')</code></pre></div></div></div></div>
        </div>
        <h6 style="font-weight:700;margin-top:1rem;">transformRow()</h6>
        <p style="font-size:0.85rem;color:#64748b;">Transformasi setiap baris sebelum output:</p>
        <div class="code-block"><pre><code>->transformRow(function($row) {
    $row['name'] = strtoupper($row['name']);
    $row['full_address'] = $row['city'] . ', ' . $row['country'];
    return $row;
})</code></pre></div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom"><span style="background:#3b5bdb;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span> Complete Example</div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:450px;overflow-y:auto;"><pre><code>use Bpjs\Framework\Helpers\TablePlus;

class UserApiController
{
    public function datatable()
    {
        return TablePlus::of('users')
            ->select('id', 'name', 'email', 'status', 'role_id', 'created_at')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->searchable(['name', 'email'])
            ->filters(['status' => 'active'])
            ->handleDistinct($_GET['distinct'] ?? null)
            ->orderBy('id', 'DESC')
            ->addColumn('role_name', fn($row) => $row['role_name'] ?? '-')
            ->addColumn('action', fn($row) =>
                '&lt;a href="/users/' . $row['id'] . '/edit" class="btn btn-sm btn-warning"&gt;Edit&lt;/a&gt;'
            )
            ->editColumn('status', fn($value) => $value === 'active'
                ? '&lt;span class="badge bg-success"&gt;Active&lt;/span&gt;'
                : '&lt;span class="badge bg-danger"&gt;Inactive&lt;/span&gt;'
            )
            ->removeColumn('role_id')
            ->transformRow(function($row) {
                $row['name'] = strtoupper($row['name']);
                return $row;
            })
            ->make();
    }
}</code></pre></div>
    </div>
</div>

<!-- Methods Reference -->
<div class="card-custom">
    <div class="card-header-custom"><i class="bi bi-book text-warning"></i> Methods Reference</div>
    <div class="card-body-custom p-0"><div style="overflow-x:auto;">
        <table class="table-custom">
            <thead><tr><th>Category</th><th>Methods</th></tr></thead>
            <tbody>
                <tr><td><strong>Init</strong></td><td><code>TablePlus::of($table)</code>, <code>->make($send = true)</code></td></tr>
                <tr><td><strong>Select</strong></td><td><code>select(...$cols)</code>, <code>distinct($col)</code></td></tr>
                <tr><td><strong>Join</strong></td><td><code>leftJoin($t, $fk, $op, $pk)</code>, <code>join()</code>, <code>rightJoin()</code></td></tr>
                <tr><td><strong>Where</strong></td><td><code>where($c, $op, $v)</code>, <code>orWhere()</code>, <code>whereIn()</code>, <code>whereBetween()</code></td></tr>
                <tr><td><strong>Search</strong></td><td><code>searchable($cols)</code></td></tr>
                <tr><td><strong>Filter</strong></td><td><code>filters($arr)</code>, <code>handleDistinct($col)</code></td></tr>
                <tr><td><strong>Sort</strong></td><td><code>orderBy($col, $dir)</code></td></tr>
                <tr><td><strong>Pagination</strong></td><td><code>paginate($perPage, $page?)</code></td></tr>
                <tr><td><strong>Columns</strong></td><td><code>addColumn($name, $fn)</code>, <code>editColumn($name, $fn)</code>, <code>removeColumn($name)</code>, <code>transformRow($fn)</code></td></tr>
            </tbody>
        </table>
    </div></div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #3b5bdb, #6741d9); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Powerful DataTables Backend</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan TablePlus dengan jQuery DataTables atau frontend library apapun.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('datatable') ?>" style="background:white;color:#3b5bdb;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-table"></i> DataTables JS →
            </a>
            <a href="<?= route('orm') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
        </div>
    </div>
</div>