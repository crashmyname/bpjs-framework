<section class="section">
    <div class="section-header">
        <h1>Auth</h1>
    </div>

    <div class="section-body">
        <h4>Helper Authmiddleware</h4>
        <b>Helper Authmiddleware ini adalah function untuk melakukan session seperti login</b><br>
        Import AuthMiddleware di file route.php:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\AuthMiddleware; <-- Untuk web.php');
        echo htmlentities('use Helpers\Middleware; <-- Untuk api.php');
        echo '</code>';
        echo '</pre>';
        ?>
        Contoh Penggunaan Authmiddleware Routes/Web:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\AuthMiddleware;

Route::group([AuthMiddleware::class], function(){
    Route::get("/dokumentasi/omodel", function(){
        $title = "Old Model";
        View::render("documentation/old-model",["title"=>$title],"documentation/doc");
    });
});');
        echo '</code>';
        echo '</pre>';
        ?>
        Contoh Penggunaan Authmiddleware Routes/Api:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Middleware;

Api::group([Middleware::class], function(){
    Api::get("/dokumentasi/omodel", function(){
    $data = User::all();
        return Response::json(["data"=>$data],200);
    });
});');
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>
