<section class="section">
    <div class="section-header">
        <h1>Instalasi</h1>
    </div>

    <div class="section-body">
        <b>Pengguna bisa menginstallnya menggunakan composer</b>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo 'composer create-project bpjs/bpjs nama_proyek_masingmasing';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
    Setup .env jangan lupa untuk copy file .env.example menjadi .env dan setup env nya sesuai kebutuhan masing masing ;
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
    echo htmlentities('.env');
    echo '<br>';
    echo '<br>';
    echo 'APP_NAME=bpjs-framework
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/bpjs-framework
APP_LOCALE=id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bpjs
DB_USERNAME=bpjs
DB_PASSWORD=

JWT_SECRET=yoursecretkey
CRYPTO_KEY=yourkey

SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=false

TIMEZONE=Asia/Jakarta

SMTP_HOST=smtp.app.com
SMTP_AUTH=true
SMTP_EMAIL=youremail@example.com
SMTP_PASSWORD=yourpassword
SMTP_SECURE=tls
SMTP_PORT=

API_DATA=
API_KEY=';
    echo '</code>';
    echo '</pre>';
    ?>
    lalu anda sudah bisa memulai membuat project yang kamu inginkan
    <br><br>
    <h4>Struktur Folder</h4>
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
    echo 'YourProject';
    echo '<br>';
    echo '|___app';
    echo '<br>';
    echo '     |___Controllers';
    echo '<br>';
    echo '     |___Exports';
    echo '<br>';
    echo '     |___handle';
    echo '<br>';
    echo '           |___errors <-- untuk menangani custom error';
    echo '<br>';
    echo '     |___helpers';
    echo '<br>';
    echo '     |___Imports';
    echo '<br>';
    echo '     |___Middleware';
    echo '<br>';
    echo '     |___Models';
    echo '<br>';
    echo '     |___Services';
    echo '<br>';
    echo '|___bootstrap';
    echo '<br>';
    echo '|___config';
    echo '<br>';
    echo '|___database';
    echo '<br>';
    echo '|___logs';
    echo '<br>';
    echo '|___public';
    echo '<br>';
    echo '|___resources';
    echo '<br>';
    echo '     |___views';
    echo '<br>';
    echo '|___routes';
    echo '<br>';
    echo '     |___web.php';
    echo '<br>';
    echo '     |___api.php';
    echo '<br>';
    echo '|___src';
    echo '<br>';
    echo '|___storage';
    echo '<br>';
    echo '|___vendor';
    echo '<br>';
    echo '.env';
    echo '<br>';
    echo '.env.example';
    echo '<br>';
    echo '.htaccess';
    echo '<br>';
    echo '.gitignore';
    echo '<br>';
    echo '.htaccess';
    echo '<br>';
    echo 'bpjs';
    echo '<br>';
    echo 'index.php';
    echo '<br>';
    echo '</code>';
    echo '</pre>';
    ?>
</section>
