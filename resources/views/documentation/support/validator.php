<section class="section">
    <div class="section-header">
        <h1>Validator</h1>
    </div>

    <div class="section-body">
        <h4>Validator digunakan untuk memvalidasi input user seperti form, file upload, email, password, dan lainnya.</h4>
        <b>Metode penggunaan Validator</b><br>

        Basic Validation:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$errors = Validator::make($_POST, [<br>';
        echo '    "name" => "required|min:3|max:100",<br>';
        echo '    "email" => "required|email",<br>';
        echo ']);';
        echo '</code>';
        echo '</pre>';
        ?>

        Required:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"username" => "required"';
        echo '</code>';
        echo '</pre>';
        ?>

        Min dan Max:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"username" => "min:3|max:50"';
        echo '</code>';
        echo '</pre>';
        ?>

        Numeric:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"age" => "numeric"';
        echo '</code>';
        echo '</pre>';
        ?>

        Email:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"email" => "email"';
        echo '</code>';
        echo '</pre>';
        ?>

        Confirmed:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"password" => "confirmed:password_confirmation"';
        echo '</code>';
        echo '</pre>';
        ?>

        Age:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"birthdate" => "age:18"';
        echo '</code>';
        echo '</pre>';
        ?>

        Regex:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"phone" => "regex:/^[0-9]+$/"';
        echo '</code>';
        echo '</pre>';
        ?>

        Date:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"tanggal" => "date:Y-m-d"';
        echo '</code>';
        echo '</pre>';
        ?>

        Alphanumeric:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"username" => "alphanumeric"';
        echo '</code>';
        echo '</pre>';
        ?>

        Unique:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"email" => "unique:users"';
        echo '</code>';
        echo '</pre>';
        ?>

        Password Strong:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"password" => "password"';
        echo '</code>';
        echo '</pre>';
        ?>

        In Array:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '"status" => "inArray:aktif,nonaktif,pending"';
        echo '</code>';
        echo '</pre>';
        ?>

        File Upload:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$errors = Validator::make($_FILES, [<br>';
        echo '    "document" => "file:application/pdf|max:2048"<br>';
        echo ']);';
        echo '</code>';
        echo '</pre>';
        ?>

        Image Upload:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$errors = Validator::make($_FILES, [<br>';
        echo '    "photo" => "image:image/png,image/jpeg|max:2048|minWidth:300|minHeight:300"<br>';
        echo ']);';
        echo '</code>';
        echo '</pre>';
        ?>

        Custom Message:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$errors = Validator::make($_POST,[<br>';
        echo '    "email" => "required|email"<br>';
        echo '],[<br>';
        echo '    "email.required" => "Email wajib diisi",<br>';
        echo '    "email.email" => "Format email tidak valid"<br>';
        echo ']);';
        echo '</code>';
        echo '</pre>';
        ?>

        Cek Error:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'if (!empty($errors)) {<br>';
        echo '    return response()->json($errors);<br>';
        echo '}';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>