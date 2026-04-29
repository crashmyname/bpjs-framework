<section class="section">
    <div class="section-header">
        <h1>Request</h1>
    </div>

    <div class="section-body">
        <h4>Core Request</h4>
        <b>Request digunakan untuk mengambil data input, file upload, headers, dan informasi request lainnya.</b><br>

        Import Request:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Bpjs\Framework\Core\Request;');
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Semua Data:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$data = $request->all();');
        echo '<br>Mengambil semua input dan file';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Input:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$name = $request->input("name");');
        echo '<br>Mengambil input berdasarkan key';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Input Dengan Default:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$name = $request->input("name", "guest");');
        echo '<br>Mengambil input dengan default value';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Beberapa Input:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$data = $request->only(["name","email"]);');
        echo '<br>Mengambil sebagian input';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Cek File:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('if($request->hasFile("avatar")) {');
        echo '<br>';
        echo htmlentities('   // upload file');
        echo '<br>';
        echo htmlentities('}');
        echo '<br>Mengecek apakah file ada';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Detail File:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$file = $request->file("avatar");');
        echo '<br>Mengambil detail file';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Nama File:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$name = $request->getClientOriginalName("avatar");');
        echo '<br>Mengambil nama asli file';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Extension File:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$ext = $request->getClientOriginalExtension("avatar");');
        echo '<br>Mengambil extension file';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Mime Type:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$mime = $request->getClientMimeType("avatar");');
        echo '<br>Mengambil mime type file';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Header:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$token = $request->header("Authorization");');
        echo '<br>Mengambil header tertentu';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Semua Header:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$headers = $request->headers();');
        echo '<br>Mengambil semua headers';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Method:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$method = $request->method();');
        echo '<br>Mengambil method request';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Cek JSON:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('if($request->isJson()){');
        echo '<br>';
        echo htmlentities('   // request json');
        echo '<br>';
        echo htmlentities('}');
        echo '<br>Mengecek apakah request JSON';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh AJAX:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('if(Request::isAjax()){');
        echo '<br>';
        echo htmlentities('   // ajax request');
        echo '<br>';
        echo htmlentities('}');
        echo '<br>Mengecek apakah request AJAX';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Magic Getter:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$email = $request->email;');
        echo '<br>Akses input seperti object';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>