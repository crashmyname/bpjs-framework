<section class="section">
    <div class="section-header">
        <h1>Queue</h1>
    </div>

    <div class="section-body">
        <h4>Queue adalah sistem antrian job/background process untuk menjalankan task secara asynchronous.</h4>
        <b>Metode penggunaan Queue</b><br>

        Push Job ke Queue:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Queue::push(SendEmailJob::class, [<br>';
        echo '    "email" => "user@mail.com",<br>';
        echo '    "name" => "Fervian"<br>';
        echo '], "default");';
        echo '</code>';
        echo '</pre>';
        ?>

        Ambil Job dari Queue:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo '$job = Queue::pop("default");';
        echo '</code>';
        echo '</pre>';
        ?>

        Tandai Job Selesai:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Queue::done($job->id);';
        echo '</code>';
        echo '</pre>';
        ?>

        Tandai Job Gagal:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Queue::fail($job->id);';
        echo '</code>';
        echo '</pre>';
        ?>

        Release / Kembalikan ke Pending:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'Queue::release($job->id);';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Worker:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'while(true){<br>';
        echo '    $job = Queue::pop("default");<br><br>';
        echo '    if($job){<br>';
        echo '        try {<br>';
        echo '            $payload = json_decode($job->payload);<br>';
        echo '            $class = $payload->job;<br>';
        echo '            $data = $payload->data;<br><br>';
        echo '            (new $class)->handle($data);<br>';
        echo '            Queue::done($job->id);<br>';
        echo '        } catch(Exception $e){<br>';
        echo '            Queue::fail($job->id);<br>';
        echo '        }<br>';
        echo '    }<br><br>';
        echo '    sleep(1);<br>';
        echo '}';
        echo '</code>';
        echo '</pre>';
        ?>

        Struktur Table Jobs:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'CREATE TABLE jobs (<br>';
        echo '    id BIGINT AUTO_INCREMENT PRIMARY KEY,<br>';
        echo '    queue VARCHAR(100) DEFAULT "default",<br>';
        echo '    payload LONGTEXT NOT NULL,<br>';
        echo '    status ENUM("pending","processing","done","failed") DEFAULT "pending",<br>';
        echo '    attempts INT DEFAULT 0,<br>';
        echo '    created_at TIMESTAMP NULL,<br>';
        echo '    updated_at TIMESTAMP NULL<br>';
        echo ');';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>