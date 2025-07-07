<section class="section">
    <div class="section-header">
        <h1>Rate Limiter</h1>
    </div>

    <div class="section-body">
        <h4>Helper Rate Limiter</h4>
        <b>Helper Rate Limiter adalah function untuk mencegah request terus menerus dalam waktu singkat</b><br>
        Contoh Penggunaan RateLimiter:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Route;

Route::post("/postdata",[PostDataController::class],"store")->limit(5) <-- masukkan limit request permenit contoh disini 5 request permenit;');
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>
