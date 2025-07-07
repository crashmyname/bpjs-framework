<section class="section">
    <div class="section-header">
        <h1>Char Helper</h1>
    </div>

    <div class="section-body">
        <h4>Fungsi: UUID</h4>
        <b>Fungsi ini digunakan untuk menghasilkan Universal Unique Identifier (UUID) versi 4 tanpa bantuan Laravel.</b><br><br>

        <p><strong>Import Helper Char:</strong></p>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Char;');
        echo '</code>';
        echo '</pre>';
        ?>

        <p><strong>Contoh Penggunaan:</strong></p>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$uuid = Char::uuid();');
        echo "\n";
        echo htmlentities('echo $uuid; // Output: 3f4a3fc0-98c7-4f25-a2cb-87de1d983092');
        echo '</code>';
        echo '</pre>';
        ?>

        <hr>

        <h4>Fungsi: random()</h4>
        <b>Digunakan untuk membuat string acak alfanumerik, cocok untuk token, kode OTP, atau ID unik lainnya.</b><br><br>

        <p><strong>Contoh Penggunaan:</strong></p>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$token = Char::random(10);');
        echo "\n";
        echo htmlentities('echo $token; // Output: Ab9dKjL2Mx');
        echo '</code>';
        echo '</pre>';
        ?>

        <hr>

        <h4>Fungsi: slug()</h4>
        <b>Mengubah string menjadi format URL-friendly (slug), seperti judul artikel.</b><br><br>

        <p><strong>Contoh Penggunaan:</strong></p>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$slug = Char::slug("Judul Artikel Laravel");');
        echo "\n";
        echo htmlentities('echo $slug; // Output: judul-artikel-laravel');
        echo '</code>';
        echo '</pre>';
        ?>

        <hr>

        <p><i>Catatan:</i> Semua fungsi helper ini bisa kamu gunakan tanpa dependency Laravel, cocok untuk project PHP native maupun framework custom.</p>
    </div>
</section>
