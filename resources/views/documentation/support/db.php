<section class="section">
    <div class="section-header">
        <h1>DB</h1>
    </div>

    <div class="section-body">

        <h4>Helper Database Query Builder</h4>
        <b>
            DB Helper adalah Query Builder utama BPJS Framework untuk mempermudah operasi database tanpa raw SQL.
            Mendukung CRUD, JOIN, Transaction, Aggregation, Pagination, Upsert, Chunk, Raw Query, Locking, dan Table Management.
        </b><br><br>

        Import DB:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Bpjs\Framework\Helpers\DB;');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Multi Database Connection</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::connection("mysql_hr")->table("users")->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h5>Contoh penggunaan multi database (HR + Main DB)</h5>

        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('// DB HR (absensi / karyawan)
        $employees = DB::connection("mysql_hr")
            ->table("employees")
            ->get();

        // DB utama (aplikasi)
        $users = DB::connection("mysql_main")
            ->table("users")
            ->where("status", "active")
            ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Transaction</h4>

        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::beginTransaction();

        try {

            DB::table("users")->insert([
                "name" => "Budi"
            ]);

            DB::table("profiles")->insert([
                "user_id" => 1,
                "bio" => "Hello"
            ]);

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Select Data</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->select("*")->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Where / OrWhere</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->where("id", "=", 1)
    ->orWhere("status", "=", "active")
    ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Join Table</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->join("profiles", "users.id", "=", "profiles.user_id")
    ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Order By</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->orderBy("created_at", "DESC")
    ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Group By & Having</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("orders")
    ->select("user_id")
    ->groupBy("user_id")
    ->having("user_id", ">", 1)
    ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Limit / Offset</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->limit(10, 20)
    ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Find Data</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->find(1);');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>First Data</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->where("email", "test@mail.com")
    ->first();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Count & Exists</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->count();

DB::table("users")
    ->where("email", "test@mail.com")
    ->exists();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Value & Pluck</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->where("id", 1)
    ->value("email");

DB::table("users")->pluck("email");');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Chunk (Big Data)</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->chunk(100, function($users) {
    foreach ($users as $user) {
        echo $user->id;
    }
});');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Insert</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->insert([
    "name" => "Budi",
    "email" => "budi@mail.com"
]);');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Update</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->where("id", 1)
    ->update([
        "name" => "Updated Name"
    ]);');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Delete</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->where("id", 1)
    ->delete();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Upsert</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->upsert([
    "id" => 1,
    "name" => "Budi",
    "email" => "budi@mail.com"
], "id");');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Raw Query</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::raw("SELECT * FROM users WHERE id = ?", [1]);');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Pagination</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->paginate(1, 10);');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Datatables</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->datatables($_GET);');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Union</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")
    ->union("SELECT * FROM admins")
    ->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Lock Query</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->lockForUpdate()->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Shared Lock</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->sharedLock()->get();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>SQL Debug</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::table("users")->toSql();');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Table Management</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::showTables();
DB::createTable("users", ["id INT", "name VARCHAR(100)"]);
DB::dropTable("users");');
        echo '</code>';
        echo '</pre>';
        ?>

        <br>

        <h4>Error Handling</h4>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code>';
        echo htmlentities('DB::renderError($exception);');
        echo '</code>';
        echo '</pre>';
        ?>

    </div>
</section>