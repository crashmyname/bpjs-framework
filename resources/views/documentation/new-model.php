<section class="section">
    <div class="section-header">
        <h1>Model by BPJS</h1>
    </div>

    <div class="section-body">
        <b>BaseModel BPJS adalah ORM bawaan framework yang mendukung multi database engine seperti MySQL, PostgreSQL, SQLite, dan SQL Server.</b>
        <br>
        Model digunakan untuk melakukan query database seperti select, insert, update, delete, relation, pagination, transaction, dan locking.
    </div>

    <br>

    <h3>1. Membuat Model</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
    echo 'php bpjs make:model User';
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>2. Contoh Struktur Model</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
echo htmlspecialchars('
<?php

namespace App\Models;

use Bpjs\Framework\Helpers\BaseModel;

class User extends BaseModel
{
    protected string $table = "users";
    protected string $primaryKey = "users_id";

    protected array $fillable = [
        "name",
        "email",
        "password"
    ];

    protected array $hidden = [
        "password"
    ];
}
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>3. Mengambil Semua Data</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$users = User::all();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>4. Mencari Data Berdasarkan ID</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$user = User::find(1);
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>5. Query Builder</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$users = User::query()
    ->where("status", "=", "active")
    ->orderBy("name", "ASC")
    ->get();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>6. Select Column</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$users = User::query()
    ->select("name", "email")
    ->get();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>7. Where In</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$users = User::query()
    ->whereIn("id", [1,2,3])
    ->get();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>8. Insert Data</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$user = User::create([
    "name" => "Fadli",
    "email" => "fadli@mail.com",
    "password" => bcrypt("123456")
]);
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>9. Update Data</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$user = User::find(1);
$user->name = "Azka";
$user->save();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>10. Delete Data</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$user = User::find(1);
$user->delete();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>11. Pagination</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$users = User::query()->paginate(10);
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>12. Relasi hasOne</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
public function profile()
{
    return $this->hasOne(Profile::class, "user_id", "id");
}
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>13. Relasi hasMany</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
public function posts()
{
    return $this->hasMany(Post::class, "user_id", "id");
}
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>14. Relasi belongsTo</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
public function role()
{
    return $this->belongsTo(Role::class, "role_id", "id");
}
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>15. Eager Loading</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$users = User::query()->with("posts")->get();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>16. Transaction</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$user = new User();
$user->beginTransaction();

try {
    User::create(["name"=>"A"]);
    User::create(["name"=>"B"]);
    $user->commit();
} catch (\Exception $e) {
    $user->rollback();
}
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>17. Locking Data</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$data = User::query()
    ->where("id",1)
    ->lockForUpdate();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>18. Debug SQL</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$sql = User::query()
    ->where("status","active")
    ->toSql();

$raw = User::query()
    ->where("status","active")
    ->getRawSQL();
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>19. Insert Batch</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
User::insertBatch([
    ["name"=>"A"],
    ["name"=>"B"],
    ["name"=>"C"]
]);
');
    echo '</code>';
    echo '</pre>';
    ?>

    <br>

    <h3>20. Custom Table Dynamic</h3>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code>';
echo htmlspecialchars('
$data = User::setCustomTable("users_archive")->get();
');
    echo '</code>';
    echo '</pre>';
    ?>

</section>