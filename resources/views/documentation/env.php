<section class="section">
    <div class="section-header">
        <h1>ENV</h1>
    </div>

    <div class="section-body">
        <b>Untuk mengatur database pengguna bisa melakukan setup pada file .env</b>
    </div>
    Contoh :
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
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
    <br><br>
</section>
