<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #7c3aed, #a78bfa); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🧩</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Model</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    BaseModel ORM bawaan framework. Mendukung MySQL, PostgreSQL, SQLite, SQL Server dengan query builder yang ekspresif.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-purple" style="color:#7c3aed;"></i> Overview
    </div>
    <div class="card-body-custom">
        <p><strong>BaseModel</strong> adalah ORM bawaan BPJS Framework yang mendukung multi database engine. Digunakan untuk melakukan query database seperti <strong>select, insert, update, delete, relation, pagination, transaction, dan locking</strong>.</p>
        
        <div class="row g-3 mt-3">
            <div class="col-md-3 col-6">
                <div style="background:#f5f3ff;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#7c3aed;font-size:0.85rem;">MySQL</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#f0fdf4;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#166534;font-size:0.85rem;">PostgreSQL</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#fffbeb;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#92400e;font-size:0.85rem;">SQLite</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#eff6ff;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#1e40af;font-size:0.85rem;">SQL Server</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Membuat Model -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Membuat Model
    </div>
    <div class="card-body-custom">
        <p>Gunakan CLI untuk membuat model baru:</p>
        <div class="code-block">
            <pre><code>php bpjs make:model User</code></pre>
        </div>
        <p class="mt-2">Model akan dibuat di folder <code>app/Models/</code>.</p>
    </div>
</div>

<!-- Struktur Model -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#7c3aed;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Struktur Model
    </div>
    <div class="card-body-custom">
        <p>Contoh struktur model lengkap:</p>
        <div class="code-block">
            <pre><code>namespace App\Models;

use Bpjs\Framework\Helpers\BaseModel;

class User extends BaseModel
{
    protected string $table      = 'users';
    protected string $primaryKey = 'users_id';

    protected array $fillable = [
        'name',
        'email',
        'password',
    ];

    protected array $hidden = [
        'password',
    ];
}</code></pre>
        </div>
    </div>
</div>

<!-- Basic Operations -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-database text-success"></i> Basic Operations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#7c3aed;">📥 Read Data</h6>
                        <div class="code-block" style="max-height:250px;overflow-y:auto;">
                            <pre><code>// Semua data
$users = User::all();

// By ID
$user = User::find(1);

// Query builder
$users = User::query()
    ->select('name', 'email')
    ->where('status', '=', 'active')
    ->orderBy('name', 'ASC')
    ->get();

// Where IN
$users = User::query()
    ->whereIn('id', [1, 2, 3])
    ->get();

// First
$user = User::query()
    ->where('email', '=', 'john@mail.com')
    ->first();</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;color:#7c3aed;">✍️ Write Data</h6>
                        <div class="code-block" style="max-height:250px;overflow-y:auto;">
                            <pre><code>// Insert
$user = User::create([
    'name'  => 'Fadli',
    'email' => 'fadli@mail.com',
    'password' => password_hash('123456', PASSWORD_BCRYPT),
]);

// Update
$user = User::find(1);
$user->name = 'Azka';
$user->save();

// Delete
$user = User::find(1);
$user->delete();

// Batch Insert
User::insertBatch([
    ['name' => 'A', 'email' => 'a@mail.com'],
    ['name' => 'B', 'email' => 'b@mail.com'],
]);</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pagination & Relations -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-file-earmark-spreadsheet text-info"></i> Pagination
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>$users = User::query()->paginate(10);

// Output:
{
    "data": [...],
    "pagination": {
        "total": 150,
        "per_page": 10,
        "current_page": 1,
        "last_page": 15
    }
}</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-table text-warning"></i> Custom Table (Dynamic)
            </div>
            <div class="card-body-custom">
                <p>Gunakan tabel berbeda secara dinamis tanpa mengubah property <code>$table</code>:</p>
                <div class="code-block">
                    <pre><code>$data = User::setCustomTable('users_archive')->get();</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Relations -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-diagram-3 text-danger"></i> Relations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">hasOne</h6>
                        <p style="font-size:0.85rem;color:#64748b;">One-to-one relationship</p>
                        <div class="code-block">
                            <pre><code>// Di model User
public function profile()
{
    return $this->hasOne(
        Profile::class,
        'user_id',  // FK di table profile
        'id'        // PK di table user
    );
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">hasMany</h6>
                        <p style="font-size:0.85rem;color:#64748b;">One-to-many relationship</p>
                        <div class="code-block">
                            <pre><code>// Di model User
public function posts()
{
    return $this->hasMany(
        Post::class,
        'user_id',  // FK di table posts
        'id'        // PK di table users
    );
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">belongsTo</h6>
                        <p style="font-size:0.85rem;color:#64748b;">Inverse relationship</p>
                        <div class="code-block">
                            <pre><code>// Di model Post
public function user()
{
    return $this->belongsTo(
        User::class,
        'user_id',  // FK di table posts
        'id'        // PK di table users
    );
}

// Di model User
public function role()
{
    return $this->belongsTo(
        Role::class,
        'role_id', 'id'
    );
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <h6 style="font-weight:700;margin-top:1.5rem;">Eager Loading</h6>
        <div class="code-block">
            <pre><code>// Load relasi sekaligus (hindari N+1 problem)
$users = User::query()->with('posts')->get();

// Multiple relations
$users = User::query()->with(['posts', 'profile', 'role'])->get();</code></pre>
        </div>
    </div>
</div>

<!-- Transaction & Locking -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-arrow-repeat text-warning"></i> Transaction
            </div>
            <div class="card-body-custom">
                <p>Pastikan semua operasi database berhasil sebelum commit:</p>
                <div class="code-block">
                    <pre><code>$model = new User();
$model->beginTransaction();

try {
    User::create(['name' => 'A']);
    User::create(['name' => 'B']);
    Order::create(['user_id' => 1]);
    
    $model->commit();
} catch (\Exception $e) {
    $model->rollback();
    throw $e;
}</code></pre>
                </div>
                <div class="alert-custom alert-info-custom mt-2">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>Jika salah satu query gagal, <strong>semua perubahan dibatalkan</strong> (rollback).</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-lock text-danger"></i> Locking
            </div>
            <div class="card-body-custom">
                <p>Kunci baris untuk mencegah race condition:</p>
                <div class="code-block">
                    <pre><code>// Pessimistic lock (FOR UPDATE)
$data = User::query()
    ->where('id', '=', 1)
    ->lockForUpdate();

// Shared lock
$data = User::query()
    ->where('id', '=', 1)
    ->sharedLock();</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Debugging -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-bug text-info"></i> Debug SQL
    </div>
    <div class="card-body-custom">
        <p>Lihat query SQL yang dihasilkan sebelum eksekusi:</p>
        <div class="code-block">
            <pre><code>// Lihat SQL dengan placeholder
$sql = User::query()
    ->where('status', '=', 'active')
    ->orderBy('name')
    ->toSql();
// Output: SELECT * FROM `users` WHERE (status = :where_0) ORDER BY name ASC

// Lihat SQL dengan nilai asli (untuk debug)
$raw = User::query()
    ->where('status', '=', 'active')
    ->getRawSQL();
// Output: SELECT * FROM `users` WHERE (status = 'active')

// Dump & die
User::query()->where('id', '=', 1)->dd();

// Dump tanpa stop (chainable)
User::query()->where('id', '=', 1)->dump()->get();</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #7c3aed, #a78bfa); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Explore More Features</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Pelajari ORM lebih dalam, Controller, dan View untuk aplikasi yang lengkap.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#7c3aed;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM Deep Dive →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('view') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-eye"></i> View →
            </a>
        </div>
    </div>
</div>