<section class="section">
    <div class="section-header">
        <h1>Store & secure Asset</h1>
    </div>

    <div class="section-body">
        <h4>Helper Store</h4>
        <b>Helper Store ini adalah function untuk memudahkan user dalam melalukan move file yang biasanya menggunakan move_upload_file</b><br>
        Contoh Penggunaan store:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$file = $request->file("file");
        $destination = storage_path("test"); <-- jika tidak diisi akan mengarah ke storage/public
        store($request->file("file"),$destination,$request->file("file")["name"]);');
        echo '</code>';
        echo '</pre>';
        ?>
        <h4>Secore Storage</h4>
        Contoh membuat url asset storage secure masuk ke file web.php:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('Route::get("/file/secure", function () {
    serve_secure_file();
});');
        echo '</code>';
        echo '</pre>';
        ?>
        Dibagian view kamu bisa akses seperti ini :
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('<img src="<?= storage_secure("iPhone-13-PRO-fadli-dev.my.id (6).png",5)?>" alt=""> <-- disitu ada angka 5 yang berarti 5 detik, dimana setiap 5 detik token encrypt akan reset');
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>
