<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📦</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">ORM — BaseModel</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Multi-engine ORM dengan query builder ekspresif, dirty tracking, soft delete, observer, dan appends.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="stats-row">
    <div class="stat-card"><div class="stat-number">4</div><div class="stat-label">Database Engines</div></div>
    <div class="stat-card"><div class="stat-number">30+</div><div class="stat-label">Query Methods</div></div>
    <div class="stat-card"><div class="stat-number">🗑️</div><div class="stat-label">Soft Delete</div></div>
    <div class="stat-card"><div class="stat-number">🔄</div><div class="stat-label">Dirty Tracking</div></div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-info"></i> Overview
    </div>
    <div class="card-body-custom">
        <p><strong>BaseModel</strong> adalah ORM base class untuk framework BPJS. Extend class ini untuk membuat model yang terhubung ke tabel database, lengkap dengan query builder, relasi, event hooks, dan serialisasi.</p>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div><strong>Cara Pakai:</strong> Extend <code>BaseModel</code> dan definisikan property <code>$table</code>. Semua fitur langsung tersedia.</div>
        </div>

        <div class="code-block">
            <pre><code>namespace App\Models;
use Bpjs\Framework\Helpers\BaseModel;

class User extends BaseModel
{
    protected string $table      = 'users';
    protected string $primaryKey = 'id';
    protected array  $fillable   = ['name', 'email', 'password'];
    protected bool   $timestamps = true;
    protected bool   $softDelete = true;

    protected array $casts = [
        'is_active' => 'bool',
        'meta'      => 'array',
    ];

    protected array $appends = ['full_name'];

    public function getFullNameAttribute($value = null): string
    {
        return ($this->attributes['first_name'] ?? '') . ' ' . ($this->attributes['last_name'] ?? '');
    }
}</code></pre>
        </div>
    </div>
</div>

<!-- Properties Table -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-gear text-warning"></i> Properties
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Property</th><th>Type</th><th>Default</th><th>Keterangan</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>$table</code></td><td>string</td><td>''</td><td>Nama tabel database</td></tr>
                    <tr><td><code>$primaryKey</code></td><td>string</td><td>'id'</td><td>Nama primary key</td></tr>
                    <tr><td><code>$fillable</code></td><td>array</td><td>[]</td><td>Kolom yang boleh diisi mass assignment</td></tr>
                    <tr><td><code>$guarded</code></td><td>array</td><td>[]</td><td>Kolom yang TIDAK boleh diisi</td></tr>
                    <tr><td><code>$hidden</code></td><td>array</td><td>[]</td><td>Sembunyikan dari output toCleanArray()</td></tr>
                    <tr><td><code>$appends</code></td><td>array</td><td>[]</td><td>Computed attribute ditambahkan ke output</td></tr>
                    <tr><td><code>$casts</code></td><td>array</td><td>[]</td><td>Cast tipe: int, float, bool, array, datetime</td></tr>
                    <tr><td><code>$timestamps</code></td><td>bool</td><td>false</td><td>Auto created_at & updated_at</td></tr>
                    <tr><td><code>$softDelete</code></td><td>bool</td><td>false</td><td>Aktifkan soft delete</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Basic Usage -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-play-circle text-success"></i> Basic Usage
    </div>
    <div class="card-body-custom">
        <h5 style="font-weight:700;">SELECT & WHERE</h5>
        <div class="code-block">
            <pre><code>// All data
$users = User::all();

// With conditions
$users = User::query()
    ->select('id', 'name', 'email')
    ->where('is_active', '=', 1)
    ->orderBy('name', 'ASC')
    ->limit(10)
    ->get();

// First record
$user = User::query()->where('email', '=', 'budi@mail.com')->first();

// Find by PK
$user = User::find(1);
$user = User::findOrFail(999); // throws exception</code></pre>
        </div>

        <h5 style="font-weight:700;" class="mt-4">WHERE Clauses</h5>
        <div class="code-block">
            <pre><code>// Basic
$q->where('status', '=', 'active');
$q->orWhere('role', '=', 'admin');

// IN / NOT IN
$q->whereIn('id', [1, 2, 3]);
$q->whereNotIn('status', ['banned', 'inactive']);

// NULL
$q->whereNull('deleted_at');
$q->whereNotNull('email_verified_at');

// BETWEEN
$q->whereBetween('age', 18, 35);

// Date
$q->whereDate('created_at', '2024-01-01');
$q->whereMonth('created_at', 1);
$q->whereYear('created_at', 2024);

// Closure grouping
$q->where(function($sub) {
    $sub->where('role', '=', 'admin')
        ->orWhere('role', '=', 'super');
});
// → WHERE (role = 'admin' OR role = 'super')

// Conditional
$q->when($request->has('search'), fn($q) =>
    $q->where('name', 'LIKE', '%' . $request->search . '%')
);</code></pre>
        </div>

        <h5 style="font-weight:700;" class="mt-4">JOIN</h5>
        <div class="code-block">
            <pre><code>$q->innerJoin('roles', 'users.role_id', '=', 'roles.id');
$q->leftJoin('profiles', 'users.id', '=', 'profiles.user_id');
$q->rightJoin('orders', 'users.id', '=', 'orders.user_id');</code></pre>
        </div>

        <h5 style="font-weight:700;" class="mt-4">Aggregate</h5>
        <div class="code-block">
            <pre><code>User::query()->count();
User::query()->max('age');
User::query()->min('age');
User::query()->sum('salary');
User::query()->avg('score');
User::query()->where('is_active', '=', 1)->count();</code></pre>
        </div>
    </div>
</div>

<!-- CRUD Operations -->
<div class="row g-3">
    <div class="col-md-4">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <span class="badge-custom badge-post">CREATE</span>
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:250px;overflow-y:auto;">
                    <pre><code>// Static create
$user = User::create([
    'name'  => 'Budi',
    'email' => 'budi@mail.com',
]);

// Instance save
$user = new User();
$user->name  = 'Budi';
$user->email = 'budi@mail.com';
$user->save();

// Batch insert
User::insertBatch([
    ['name' => 'A', 'email' => 'a@mail.com'],
    ['name' => 'B', 'email' => 'b@mail.com'],
]);</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <span class="badge-custom badge-put">UPDATE</span>
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:250px;overflow-y:auto;">
                    <pre><code>// Via update()
$user = User::find(1);
$user->update(['name' => 'Andi']);

// Set attribute + save
$user->name = 'Andi';
$user->save();

// Atomic increment
$user->increment('login_count');
$user->increment('points', 10);
$user->decrement('credits', 5);

// Update or Create
User::updateOrCreate(
    ['email' => 'budi@mail.com'],
    ['name'  => 'Budi Baru']
);</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <span class="badge-custom badge-delete">DELETE</span>
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:250px;overflow-y:auto;">
                    <pre><code>// Soft delete (jika enabled)
$user->delete();
$user->trashed();       // true
$user->restore();       // pulihkan

// Hard delete
$user->forceDelete();

// Delete with condition
User::deleteWhere(['status' => 'inactive']);

// With relations cascade
$user->deleteWithRelations(['posts', 'comments']);</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pagination & Chunk -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-file-earmark-spreadsheet text-primary"></i> Pagination
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>$result = User::query()
    ->where('is_active', '=', 1)
    ->orderBy('name')
    ->paginate(15);

// Output:
{
    "data": [...],
    "pagination": {
        "total": 150,
        "per_page": 15,
        "current_page": 1,
        "last_page": 10
    }
}</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-cursor text-success"></i> Chunk & Utility
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>// Chunk untuk large dataset
User::query()->chunk(100, function($rows) {
    foreach ($rows as $user) {
        // proses per batch 100
    }
    // return false untuk stop
});

// Pluck
$emails = User::query()->pluck('email');
$map = User::query()->pluck('name', 'id');

// Exist check
User::query()->where('email', '=', 'x@y.com')->exists();
User::query()->where('role', '=', 'ghost')->doesntExist();</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Appends & Accessors -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-puzzle text-purple" style="color:#7c3aed;"></i> Appends & Accessors
    </div>
    <div class="card-body-custom">
        <p>Tambahkan computed attribute ke output model menggunakan <code>$appends</code> dan method <code>get{StudlyCase}Attribute()</code>.</p>
        
        <div class="alert-custom alert-warning-custom mb-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div><strong>Konvensi:</strong> Key snake_case di <code>$appends</code> → Method <code>getStudlyCaseAttribute()</code></div>
        </div>

        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>class Workspace extends BaseModel
{
    protected array $appends = ['encrypt_id', 'status_label', 'created_human'];

    // encrypt_id → getEncryptIdAttribute
    public function getEncryptIdAttribute($value = null): string
    {
        return Crypto::encrypt($this->attributes['id'] ?? '');
    }

    // status_label → getStatusLabelAttribute
    public function getStatusLabelAttribute($value = null): string
    {
        return ($this->attributes['is_active'] ?? 0) ? 'Aktif' : 'Nonaktif';
    }

    // created_human → getCreatedHumanAttribute
    public function getCreatedHumanAttribute($value = null): string
    {
        $raw = $this->attributes['created_at'] ?? null;
        return $raw ? (new DateTime($raw))->format('d F Y') : '-';
    }
}</code></pre>
        </div>

        <div class="alert-custom alert-success-custom mt-2">
            <i class="bi bi-check-circle-fill"></i>
            <div>Appends otomatis bekerja di <code>first()</code>, <code>get()</code>, <code>paginate()</code>, <code>toCleanArray()</code>.</div>
        </div>
    </div>
</div>

<!-- Dirty Tracking & Soft Delete -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-arrow-repeat text-warning"></i> Dirty Tracking
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>$user = User::find(1);
// original: {name: 'Budi'}

$user->name = 'Andi';

$user->isDirty();           // true
$user->isDirty('name');     // true
$user->isDirty('email');    // false
$user->isClean('email');    // true
$user->getDirty();          // ['name' => 'Andi']
$user->getOriginal('name'); // 'Budi'

$user->save();

$user->wasChanged('name');  // true
$user->getChanges();        // ['name' => 'Andi']
$user->isDirty();            // false</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-trash text-danger"></i> Soft Delete
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>class Post extends BaseModel
{
    protected bool $softDelete = true;
}

$post = Post::find(1);
$post->delete();        // set deleted_at
$post->trashed();       // true
$post->restore();       // pulihkan
$post->forceDelete();   // hapus permanen

// Query filtering otomatis:
Post::query()->get();           // WHERE deleted_at IS NULL
Post::query()->withTrashed()->get();  // semua
Post::query()->onlyTrashed()->get();  // hanya deleted</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Relations -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-diagram-3 text-info"></i> Relations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Definisi Relasi</h6>
                <div class="code-block">
                    <pre><code>class User extends BaseModel
{
    public function posts(): array
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function profile(): array
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function roles(): array
    {
        return $this->belongsToMany(
            Role::class, 'user_roles', 'user_id', 'role_id'
        );
    }
}

class Post extends BaseModel
{
    public function user(): array
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Eager Loading</h6>
                <div class="code-block">
                    <pre><code>// Eager load
$users = User::query()
    ->with(['posts', 'profile'])
    ->get(PDO::FETCH_ASSOC, true);

// With count
$users = User::query()
    ->withCount(['posts'])
    ->get(PDO::FETCH_ASSOC, true);
// $user->posts_count → integer

// Lazy load
$user = User::find(1);
$user->load(['posts', 'profile']);
$user->posts; // otomatis load jika belum ada</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Attribute Casting & Serialization -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-cpu text-info"></i> Attribute Casting
            </div>
            <div class="card-body-custom p-0">
                <div style="overflow-x:auto;">
                    <table class="table-custom">
                        <thead><tr><th>Tipe</th><th>Input</th><th>Output</th></tr></thead>
                        <tbody>
                            <tr><td>int</td><td>'5'</td><td>5 (int)</td></tr>
                            <tr><td>float</td><td>'3.14'</td><td>3.14 (float)</td></tr>
                            <tr><td>bool</td><td>'1'</td><td>true</td></tr>
                            <tr><td>array</td><td>JSON</td><td>['a','b']</td></tr>
                            <tr><td>object</td><td>JSON</td><td>stdClass</td></tr>
                            <tr><td>datetime</td><td>'2024-01-01'</td><td>DateTime</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-code-slash text-success"></i> Serialization & Debug
            </div>
            <div class="card-body-custom">
                <div class="code-block">
                    <pre><code>// Clean output
$arr  = $user->toCleanArray();
$json = $user->toJson();

// Subset
$user->only(['name', 'email']);
$user->except(['password']);

// Hidden
protected array $hidden = ['password'];
$user->makeHidden(['secret'])->toCleanArray();
$user->makeVisible('email')->toCleanArray();

// Debug SQL
User::query()->where('id', '=', 1)->toSql();
User::query()->where('id', '=', 1)->getRawSQL();
User::query()->where('id', '=', 1)->dd();   // dump & die
User::query()->where('id', '=', 1)->dump()->get();</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Observers & Scopes -->
<div class="row g-3">
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-eye text-warning"></i> Observers & Events
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:350px;overflow-y:auto;">
                    <pre><code>class UserObserver
{
    public function creating(BaseModel $model): void {}
    public function created(BaseModel $model): void
    {
        AuditLog::record('created', $model->getKey());
    }
    public function updating(BaseModel $model): ?bool
    {
        // return false untuk batalkan
    }
    public function updated(BaseModel $model): void
    {
        AuditLog::record('updated', $model->getKey(), [
            'changes' => $model->getChanges()
        ]);
    }
    public function deleting(BaseModel $model): ?bool {}
    public function deleted(BaseModel $model): void {}
}

// Register observer
User::observe(UserObserver::class);</code></pre>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-custom h-100">
            <div class="card-header-custom">
                <i class="bi bi-funnel text-info"></i> Global Scopes & Transactions
            </div>
            <div class="card-body-custom">
                <div class="code-block" style="max-height:350px;overflow-y:auto;">
                    <pre><code>// Global Scope
class ActiveUser extends BaseModel
{
    protected function bootGlobalScopes(): void
    {
        $this->addGlobalScope('active',
            fn($q) => $q->where('is_active', '=', 1)
        );
    }
}
// → semua query auto-filter WHERE is_active = 1

// Transaction
$model = new User();
$model->beginTransaction();
try {
    User::create(['name' => 'A']);
    Order::create(['user_id' => 1]);
    $model->commit();
} catch (\Exception $e) {
    $model->rollback();
    throw $e;
}

// Locking
User::query()->lockForUpdate();  // SELECT ... FOR UPDATE
User::query()->sharedLock();     // LOCK IN SHARE MODE</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0ea5e9, #6366f1); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Ready to Build?</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan ORM dengan Controller dan Route untuk aplikasi yang powerful.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('controller') ?>" style="background:white;color:#6366f1;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('route') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
            <a href="<?= route('new-model') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-box"></i> Model →
            </a>
        </div>
    </div>
</div>