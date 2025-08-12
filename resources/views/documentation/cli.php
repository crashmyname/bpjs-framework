<section class="section">
    <div class="section-header">
        <h1>CLI by BPJS</h1>
    </div>

    <div class="section-body">
        <b>Untuk membuat model dan controller otomatis bisa dijalankan di terminal vscode</b>
    </div>
    Contoh penggunaan:
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
    echo 'php bpjs make:model YourModel<br>';
    echo 'php bpjs make:controller YourController<br>';
    echo 'php bpjs make:import Yourimport<br>';
    echo 'php bpjs make:export Yourexport<br>';
    echo 'php bpjs make:service Yourservice<br>';
    echo 'php bpjs make:migration create_yourtable_table<br>';
    echo 'php bpjs db:migrate<br>';
    echo 'php bpjs db:rollback<br>';
    echo 'php bpjs serve<br>';
    echo 'php bpjs serve --host=yourcustomhost --port=yourcustomport';
    echo '</code>';
    echo '</pre>';
    ?>
    <br><br>
</section>
