<section class="section">
    <div class="section-header">
        <h1>TablePlus</h1>
    </div>

    <div class="section-body">
        <h4>TablePlus digunakan untuk mempermudah membuat API Table / DataTable seperti search, filter, pagination, sorting, dan manipulasi column.</h4>
        <b>Metode penggunaan TablePlus</b><br>

        Basic Usage:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Select Column:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->select("id","name","email")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Left Join:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->leftJoin("roles","roles.id","=","users.role_id")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Searchable:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->searchable(["name","email"])<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Filters:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->filters([<br>';
        echo '        "status" => "active"<br>';
        echo '    ])<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Where:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->where("status","=","active")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        OrWhere:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->orWhere("role","=","admin")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        WhereIn:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->whereIn("status",["active","pending"])<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        WhereBetween:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->whereBetween("created_at","2025-01-01","2025-12-31")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Order By:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->orderBy("id","DESC")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Pagination:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->paginate(10,1)<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Distinct:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->distinct("status");';
        echo '</code>';
        echo '</pre>';
        ?>

        Handle Distinct:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->handleDistinct($_GET["distinct"] ?? null)<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Add Column:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->addColumn("action", fn($row) => "<button>Edit</button>")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Edit Column:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->editColumn("status", fn($value) => strtoupper($value))<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Remove Column:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->removeColumn("password")<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Transform Row:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'TablePlus::of("users")<br>';
        echo '    ->transformRow(function($row){<br>';
        echo '        $row["name"] = strtoupper($row["name"]);<br>';
        echo '        return $row;<br>';
        echo '    })<br>';
        echo '    ->make();';
        echo '</code>';
        echo '</pre>';
        ?>

        Return Array (No JSON):
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$data = TablePlus::of("users")->make(false);';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>