<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🗄️</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">DB — Query Builder</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Query Builder utama BPJS Framework. CRUD, JOIN, Transaction, Pagination, Upsert, Locking, dan Multi-Database.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Import & Multi DB -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-code-slash text-info"></i> Import
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>use Bpjs\Framework\Helpers\DB;</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-diagram-3 text-success"></i> Multi Database
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>// HR Database
$employees = DB::connection('mysql_hr')
    ->table('employees')->get();

// Main Database
$users = DB::connection('mysql_main')
    ->table('users')->where('status', 'active')->get();</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Transaction -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-arrow-repeat text-warning"></i> Transaction
    </div>
    <div class="card-body-custom">
        <p>Pastikan semua operasi database berhasil sebelum commit:</p>
        <div class="code-block">
            <pre><code>DB::beginTransaction();

try {
    DB::table('users')->insert([
        'name' => 'Budi'
    ]);

    DB::table('profiles')->insert([
        'user_id' => 1,
        'bio'     => 'Hello'
    ]);

    DB::commit();
} catch (\Exception $e) {
    DB::rollback();
    throw $e;
}</code></pre>
        </div>
    </div>
</div>

<!-- Read Operations -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-eye text-primary"></i> Read Operations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">SELECT</h6>
                <div class="code-block"><pre><code>DB::table('users')->select('*')->get();
DB::table('users')->find(1);
DB::table('users')->where('email', '=', 'test@mail.com')->first();</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">WHERE / OR WHERE</h6>
                <div class="code-block"><pre><code>DB::table('users')
    ->where('id', '=', 1)
    ->orWhere('status', '=', 'active')
    ->get();</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">JOIN</h6>
                <div class="code-block"><pre><code>DB::table('users')
    ->join('profiles', 'users.id', '=', 'profiles.user_id')
    ->get();</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">ORDER / GROUP / LIMIT</h6>
                <div class="code-block"><pre><code>DB::table('users')->orderBy('created_at', 'DESC')->get();
DB::table('orders')->groupBy('user_id')->having('user_id', '>', 1)->get();
DB::table('users')->limit(10, 20)->get();</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Aggregate & Utility -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-calculator text-success"></i> Aggregate & Utility
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Count & Exists</h6>
                        <div class="code-block"><pre><code>DB::table('users')->count();
DB::table('users')->where('email', '=', 'x@y.com')->exists();</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Value & Pluck</h6>
                        <div class="code-block"><pre><code>DB::table('users')->where('id', 1)->value('email');
DB::table('users')->pluck('email');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Chunk (Big Data)</h6>
                        <div class="code-block"><pre><code>DB::table('users')->chunk(100, function($users) {
    foreach ($users as $user) {
        echo $user->id;
    }
});</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Write Operations -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-pencil text-danger"></i> Write Operations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#059669;">INSERT</h6>
                        <div class="code-block"><pre><code>DB::table('users')->insert([
    'name'  => 'Budi',
    'email' => 'budi@mail.com'
]);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#f59e0b;">UPDATE</h6>
                        <div class="code-block"><pre><code>DB::table('users')
    ->where('id', 1)
    ->update([
        'name' => 'Updated Name'
    ]);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#dc2626;">DELETE</h6>
                        <div class="code-block"><pre><code>DB::table('users')
    ->where('id', 1)
    ->delete();</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Advanced Features -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-stars text-warning"></i> Advanced Features
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">UPSERT</h6>
                        <div class="code-block"><pre><code>DB::table('users')->upsert([
    'id'    => 1,
    'name'  => 'Budi',
    'email' => 'budi@mail.com'
], 'id');</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">RAW QUERY</h6>
                        <div class="code-block"><pre><code>DB::raw('SELECT * FROM users WHERE id = ?', [1]);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">PAGINATION</h6>
                        <div class="code-block"><pre><code>DB::table('users')->paginate(1, 10);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">DATATABLES</h6>
                        <div class="code-block"><pre><code>DB::table('users')->datatables($_GET);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">UNION</h6>
                        <div class="code-block"><pre><code>DB::table('users')
    ->union('SELECT * FROM admins')
    ->get();</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">SQL DEBUG</h6>
                        <div class="code-block"><pre><code>DB::table('users')->toSql();</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Locking -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-lock text-danger"></i> Locking
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">lockForUpdate()</h6>
                <p style="font-size:0.85rem;color:#64748b;">Kunci baris untuk update (pessimistic lock):</p>
                <div class="code-block"><pre><code>DB::table('users')->lockForUpdate()->get();</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">sharedLock()</h6>
                <p style="font-size:0.85rem;color:#64748b;">Shared lock — izinkan read, cegah write:</p>
                <div class="code-block"><pre><code>DB::table('users')->sharedLock()->get();</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Table Management -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-gear text-info"></i> Table Management
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">Show Tables</h6>
                        <div class="code-block"><pre><code>DB::showTables();</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">Create Table</h6>
                        <div class="code-block"><pre><code>DB::createTable('users', [
    'id INT',
    'name VARCHAR(100)'
]);</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">Drop Table</h6>
                        <div class="code-block"><pre><code>DB::dropTable('users');</code></pre></div>
                    </div>
                </div>
            </div>
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
                    <tr><th>Category</th><th>Methods</th></tr>
                </thead>
                <tbody>
                    <tr><td><strong>Connection</strong></td><td><code>connection()</code></td></tr>
                    <tr><td><strong>Read</strong></td><td><code>get()</code>, <code>find()</code>, <code>first()</code>, <code>value()</code>, <code>pluck()</code>, <code>count()</code>, <code>exists()</code>, <code>chunk()</code></td></tr>
                    <tr><td><strong>Write</strong></td><td><code>insert()</code>, <code>update()</code>, <code>delete()</code>, <code>upsert()</code></td></tr>
                    <tr><td><strong>Clauses</strong></td><td><code>where()</code>, <code>orWhere()</code>, <code>join()</code>, <code>orderBy()</code>, <code>groupBy()</code>, <code>having()</code>, <code>limit()</code></td></tr>
                    <tr><td><strong>Transaction</strong></td><td><code>beginTransaction()</code>, <code>commit()</code>, <code>rollback()</code></td></tr>
                    <tr><td><strong>Advanced</strong></td><td><code>paginate()</code>, <code>datatables()</code>, <code>union()</code>, <code>raw()</code>, <code>toSql()</code></td></tr>
                    <tr><td><strong>Locking</strong></td><td><code>lockForUpdate()</code>, <code>sharedLock()</code></td></tr>
                    <tr><td><strong>Table</strong></td><td><code>showTables()</code>, <code>createTable()</code>, <code>dropTable()</code></td></tr>
                    <tr><td><strong>Error</strong></td><td><code>renderError()</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Master the Database</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan DB Query Builder dengan ORM untuk fleksibilitas maksimal.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#0ea5e9;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('datatable') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-table"></i> DataTables →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
        </div>
    </div>
</div>