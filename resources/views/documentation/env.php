<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #f97316); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">⚙️</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">ENV — Environment Configuration</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Kelola semua konfigurasi aplikasi dalam satu file <code>.env</code>. Database, queue, session, security, dan lainnya.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-danger"></i> Overview
    </div>
    <div class="card-body-custom">
        <p>File <code>.env</code> menyimpan semua konfigurasi environment aplikasi. Setiap environment (local, staging, production) bisa memiliki konfigurasi berbeda tanpa mengubah kode.</p>
        
        <div class="alert-custom alert-warning-custom mt-3">
            <i class="bi bi-shield-lock-fill"></i>
            <div>
                <strong>⚠️ Jangan commit <code>.env</code> ke Git!</strong> File ini berisi kredensial sensitif. Gunakan <code>.env.example</code> sebagai template.
            </div>
        </div>
    </div>
</div>

<!-- Full Configuration -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-file-earmark-code text-warning"></i> Full Configuration
    </div>
    <div class="card-body-custom">
        <p>Berikut contoh file <code>.env</code> lengkap dengan semua opsi:</p>
        <div class="code-block" style="max-height: 600px; overflow-y: auto;">
            <pre><code># ==========================================
# APP Configuration
# ==========================================
APP_NAME=bpjs-framework
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/
APP_LOCALE=id

# ==========================================
# Database Configuration
# ==========================================
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bpjs
DB_USERNAME=root
DB_PASSWORD=

# ==========================================
# Database Pool
# ==========================================
DB_POOL_SIZE=10
DB_POOL_TIMEOUT=30
DB_POOL_IDLE_TIMEOUT=60

# ==========================================
# Query Logging
# ==========================================
DB_QUERY_LOG=false
DB_SLOW_QUERY=1000

# ==========================================
# Replica Database (read-only)
# ==========================================
DB_REPLICA_HOST=127.0.0.1
DB_REPLICA_PORT=3306
DB_REPLICA_USERNAME=root
DB_REPLICA_PASSWORD=

# ==========================================
# Queue Configuration
# ==========================================
QUEUE_ENGINE=database
QUEUE_MAX_ATTEMPTS=3
QUEUE_RETRY_AFTER=90
QUEUE_SLEEP=2
QUEUE_TRIES=3
QUEUE_MEMORY=256
QUEUE_KEEPALIVE=300

# ==========================================
# Security
# ==========================================
JWT_SECRET=yoursecretkey
CRYPTO_KEY=yourkey

# ==========================================
# Session
# ==========================================
SESSION_LIFETIME=120
SESSION_SECURE_COOKIE=false
SESSION_DRIVER=file

# ==========================================
# Timezone
# ==========================================
TIMEZONE=Asia/Jakarta

# ==========================================
# SMTP Configuration
# ==========================================
SMTP_HOST=smtp.app.com
SMTP_AUTH=true
SMTP_EMAIL=youremail@example.com
SMTP_PASSWORD=yourpassword
SMTP_SECURE=tls
SMTP_PORT=

# ==========================================
# API Configuration
# ==========================================
API_DATA=
API_KEY=</code></pre>
        </div>
    </div>
</div>

<!-- Configuration Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-book text-info"></i> Configuration Reference
    </div>
    <div class="card-body-custom">
        
        <!-- App Settings -->
        <h4 style="font-weight:700;color:#dc2626;margin-bottom:1rem;">
            <i class="bi bi-gear"></i> Application Settings
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>APP_NAME</code></td>
                        <td>Nama aplikasi yang ditampilkan</td>
                        <td><code>bpjs-framework</code></td>
                    </tr>
                    <tr>
                        <td><code>APP_ENV</code></td>
                        <td>Environment: <code>local</code>, <code>staging</code>, <code>production</code></td>
                        <td><code>local</code></td>
                    </tr>
                    <tr>
                        <td><code>APP_DEBUG</code></td>
                        <td>Debug mode: <code>true</code> / <code>false</code>. Jangan aktif di production!</td>
                        <td><code>true</code></td>
                    </tr>
                    <tr>
                        <td><code>APP_URL</code></td>
                        <td>Base URL aplikasi (include subfolder jika ada)</td>
                        <td><code>http://localhost/project</code></td>
                    </tr>
                    <tr>
                        <td><code>APP_LOCALE</code></td>
                        <td>Bahasa aplikasi</td>
                        <td><code>id</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Database Settings -->
        <h4 style="font-weight:700;color:#0ea5e9;margin:1.5rem 0 1rem;">
            <i class="bi bi-database"></i> Database Settings
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>DB_CONNECTION</code></td>
                        <td>Database driver</td>
                        <td><code>mysql</code>, <code>pgsql</code>, <code>sqlite</code>, <code>sqlsrv</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_HOST</code></td>
                        <td>Database host</td>
                        <td><code>127.0.0.1</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_PORT</code></td>
                        <td>Database port</td>
                        <td><code>3306</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_DATABASE</code></td>
                        <td>Nama database</td>
                        <td><code>bpjs</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_USERNAME</code></td>
                        <td>Username database</td>
                        <td><code>root</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_PASSWORD</code></td>
                        <td>Password database</td>
                        <td><code></code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Database Pool -->
        <h4 style="font-weight:700;color:#6366f1;margin:1.5rem 0 1rem;">
            <i class="bi bi-stack"></i> Database Pool
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>DB_POOL_SIZE</code></td>
                        <td>Jumlah koneksi dalam pool</td>
                        <td><code>10</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_POOL_TIMEOUT</code></td>
                        <td>Timeout koneksi pool (detik)</td>
                        <td><code>30</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_POOL_IDLE_TIMEOUT</code></td>
                        <td>Timeout koneksi idle (detik)</td>
                        <td><code>60</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Query Logging -->
        <h4 style="font-weight:700;color:#f59e0b;margin:1.5rem 0 1rem;">
            <i class="bi bi-journal-text"></i> Query Logging
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>DB_QUERY_LOG</code></td>
                        <td>Log semua query SQL</td>
                        <td><code>false</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_SLOW_QUERY</code></td>
                        <td>Threshold slow query (ms)</td>
                        <td><code>1000</code> (1 detik)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Replica Database -->
        <h4 style="font-weight:700;color:#8b5cf6;margin:1.5rem 0 1rem;">
            <i class="bi bi-database-down"></i> Replica Database (Read-Only)
        </h4>
        <p style="font-size:0.85rem;color:#64748b;">Konfigurasi database replica untuk operasi read (SELECT). Meningkatkan performa dengan memisahkan operasi baca dan tulis.</p>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>DB_REPLICA_HOST</code></td>
                        <td>Host database replica</td>
                        <td><code>127.0.0.1</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_REPLICA_PORT</code></td>
                        <td>Port database replica</td>
                        <td><code>3306</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_REPLICA_USERNAME</code></td>
                        <td>Username database replica</td>
                        <td><code>root</code></td>
                    </tr>
                    <tr>
                        <td><code>DB_REPLICA_PASSWORD</code></td>
                        <td>Password database replica</td>
                        <td><code></code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Queue Settings -->
        <h4 style="font-weight:700;color:#0891b2;margin:1.5rem 0 1rem;">
            <i class="bi bi-inbox"></i> Queue Configuration
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>QUEUE_ENGINE</code></td>
                        <td>Queue driver</td>
                        <td><code>database</code></td>
                    </tr>
                    <tr>
                        <td><code>QUEUE_MAX_ATTEMPTS</code></td>
                        <td>Maksimal percobaan retry</td>
                        <td><code>3</code></td>
                    </tr>
                    <tr>
                        <td><code>QUEUE_RETRY_AFTER</code></td>
                        <td>Delay retry (detik)</td>
                        <td><code>90</code></td>
                    </tr>
                    <tr>
                        <td><code>QUEUE_SLEEP</code></td>
                        <td>Jeda polling queue (detik)</td>
                        <td><code>2</code></td>
                    </tr>
                    <tr>
                        <td><code>QUEUE_TRIES</code></td>
                        <td>Total percobaan per job</td>
                        <td><code>3</code></td>
                    </tr>
                    <tr>
                        <td><code>QUEUE_MEMORY</code></td>
                        <td>Batas memory worker (MB)</td>
                        <td><code>256</code></td>
                    </tr>
                    <tr>
                        <td><code>QUEUE_KEEPALIVE</code></td>
                        <td>Keep-alive worker (detik)</td>
                        <td><code>300</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Security Settings -->
        <h4 style="font-weight:700;color:#7c3aed;margin:1.5rem 0 1rem;">
            <i class="bi bi-shield-lock"></i> Security Settings
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>JWT_SECRET</code></td>
                        <td>Secret key untuk JWT tokens</td>
                        <td><code>yoursecretkey</code></td>
                    </tr>
                    <tr>
                        <td><code>CRYPTO_KEY</code></td>
                        <td>Key untuk enkripsi/dekripsi data</td>
                        <td><code>yourkey</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Session Settings -->
        <h4 style="font-weight:700;color:#059669;margin:1.5rem 0 1rem;">
            <i class="bi bi-clock-history"></i> Session Settings
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>SESSION_LIFETIME</code></td>
                        <td>Durasi session dalam menit</td>
                        <td><code>120</code></td>
                    </tr>
                    <tr>
                        <td><code>SESSION_SECURE_COOKIE</code></td>
                        <td>Hanya kirim cookie via HTTPS</td>
                        <td><code>false</code> (true di production)</td>
                    </tr>
                    <tr>
                        <td><code>SESSION_DRIVER</code></td>
                        <td>Storage driver session</td>
                        <td><code>file</code>, <code>database</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Timezone -->
        <h4 style="font-weight:700;color:#f59e0b;margin:1.5rem 0 1rem;">
            <i class="bi bi-globe"></i> Timezone
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>TIMEZONE</code></td>
                        <td>Timezone aplikasi</td>
                        <td><code>Asia/Jakarta</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- SMTP Settings -->
        <h4 style="font-weight:700;color:#06b6d4;margin:1.5rem 0 1rem;">
            <i class="bi bi-envelope"></i> SMTP / Mail Settings
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>SMTP_HOST</code></td>
                        <td>SMTP server host</td>
                        <td><code>smtp.gmail.com</code></td>
                    </tr>
                    <tr>
                        <td><code>SMTP_AUTH</code></td>
                        <td>Aktifkan autentikasi SMTP</td>
                        <td><code>true</code></td>
                    </tr>
                    <tr>
                        <td><code>SMTP_EMAIL</code></td>
                        <td>Email pengirim</td>
                        <td><code>you@example.com</code></td>
                    </tr>
                    <tr>
                        <td><code>SMTP_PASSWORD</code></td>
                        <td>Password email / app password</td>
                        <td><code>yourpassword</code></td>
                    </tr>
                    <tr>
                        <td><code>SMTP_SECURE</code></td>
                        <td>Encryption: <code>tls</code>, <code>ssl</code>, atau kosong</td>
                        <td><code>tls</code></td>
                    </tr>
                    <tr>
                        <td><code>SMTP_PORT</code></td>
                        <td>SMTP port (587 TLS, 465 SSL, 25 default)</td>
                        <td><code>587</code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- API Settings -->
        <h4 style="font-weight:700;color:#f43f5e;margin:1.5rem 0 1rem;">
            <i class="bi bi-cloud"></i> API Settings
        </h4>
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Key</th><th>Description</th><th>Example</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>API_DATA</code></td>
                        <td>Default API data / base URL</td>
                        <td><code>https://api.example.com</code></td>
                    </tr>
                    <tr>
                        <td><code>API_KEY</code></td>
                        <td>Default API key</td>
                        <td><code>your-api-key</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- How to Use -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-question-circle text-success"></i> How to Use
    </div>
    <div class="card-body-custom">
        <p>Akses nilai <code>.env</code> dari kode kamu menggunakan helper <code>env()</code>:</p>
        <div class="code-block">
            <pre><code>// Basic
$appName = env('APP_NAME');              // "bpjs-framework"
$debug   = env('APP_DEBUG');             // "true"

// Dengan default value (jika key tidak ditemukan)
$dbHost  = env('DB_HOST', '127.0.0.1');
$queueEngine = env('QUEUE_ENGINE', 'database');

// Di config files
return [
    'host'     => env('DB_HOST', '127.0.0.1'),
    'pool_size' => env('DB_POOL_SIZE', 10),
    'replica'  => [
        'host' => env('DB_REPLICA_HOST', '127.0.0.1'),
        'port' => env('DB_REPLICA_PORT', 3306),
    ],
];

// Di controllers
$slowQuery = env('DB_SLOW_QUERY', 1000);
if (env('APP_ENV') === 'production') {
    // production-only logic
}</code></pre>
        </div>
    </div>
</div>

<!-- Features Grid -->
<div class="row g-3">
    <div class="col-md-4">
        <div class="card-custom h-100" style="border-top: 3px solid #0ea5e9;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;"><i class="bi bi-database"></i> Connection Pool</h5>
                <p style="font-size:0.85rem;color:#64748b;">
                    Optimalkan performa database dengan connection pooling. Atur <code>DB_POOL_SIZE</code> untuk jumlah koneksi.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom h-100" style="border-top: 3px solid #8b5cf6;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;"><i class="bi bi-database-down"></i> Read Replica</h5>
                <p style="font-size:0.85rem;color:#64748b;">
                    Pisahkan operasi READ ke replica database. Otomatis digunakan untuk query SELECT.
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card-custom h-100" style="border-top: 3px solid #0891b2;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;"><i class="bi bi-inbox"></i> Queue System</h5>
                <p style="font-size:0.85rem;color:#64748b;">
                    Job queue untuk background processing. Atur retry attempts, delay, dan memory limit.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #f97316); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Configuration Complete!</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Sekarang kamu siap untuk mulai membangun fitur aplikasi.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('cli') ?>" style="background:white;color:#dc2626;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-terminal"></i> CLI →
            </a>
            <a href="<?= route('orm') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('route') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
        </div>
    </div>
</div>