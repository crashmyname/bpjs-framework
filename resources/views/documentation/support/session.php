<section class="section">
    <div class="section-header">
        <h1>Session</h1>
    </div>

    <div class="section-body">
        <h4>Session adalah helper untuk menyimpan data sementara di server selama user masih aktif.</h4>
        <b>Metode penggunaan Session</b><br>

        Set session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Session::set("nama", "Fervian");';
        echo '</code>';
        echo '</pre>';
        ?>

        Get session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$nama = Session::get("nama");';
        echo '</code>';
        echo '</pre>';
        ?>

        Cek session tersedia:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'if(Session::has("nama")){<br>';
        echo '&nbsp;&nbsp;echo "Session ada";<br>';
        echo '}';
        echo '</code>';
        echo '</pre>';
        ?>

        Ambil semua session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$all = Session::all();';
        echo '</code>';
        echo '</pre>';
        ?>

        Remove session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Session::remove("nama");';
        echo '</code>';
        echo '</pre>';
        ?>

        Unset session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Session::unset("nama");';
        echo '</code>';
        echo '</pre>';
        ?>

        Destroy semua session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Session::destroy();';
        echo '</code>';
        echo '</pre>';
        ?>

        User session:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$user = Session::user();<br>';
        echo 'echo $user->name;';
        echo '</code>';
        echo '</pre>';
        ?>

        Flash session set:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Session::flash("success", "Data berhasil disimpan");';
        echo '</code>';
        echo '</pre>';
        ?>

        Flash session get:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'echo Session::flash("success");<br>';
        echo '// setelah diambil otomatis terhapus';
        echo '</code>';
        echo '</pre>';
        ?>

        Cek flash tersedia:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'if(Session::hasFlash("success")){<br>';
        echo '&nbsp;&nbsp;echo Session::flash("success");<br>';
        echo '}';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>