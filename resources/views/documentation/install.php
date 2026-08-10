<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-rocket-takeoff text-primary"></i> Installation
    </div>
    <div class="card-body-custom">
        <h2 style="font-weight:800; margin-bottom:0.5rem;">Get Started in Minutes</h2>
        <p style="color:#64748b; font-size:0.95rem;">Follow these simple steps to set up your BPJS Framework project.</p>
    </div>
</div>

<!-- Step 1: Composer -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#4f46e5;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Install via Composer
    </div>
    <div class="card-body-custom">
        <p>Buat project baru dengan satu perintah:</p>
        <div class="code-block">
            <pre><code>composer create-project bpjs/bpjs nama_proyek_kamu</code></pre>
        </div>
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-check-circle-fill" style="font-size:1.1rem;"></i>
            <div>Pastikan Composer sudah terinstall di sistem kamu. <a href="https://getcomposer.org" target="_blank" style="color:#166534;font-weight:600;">Download Composer</a></div>
        </div>
    </div>
</div>

<!-- Step 2: Environment -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#4f46e5;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Configure Environment
    </div>
    <div class="card-body-custom">
        <p>Copy file <code>.env.example</code> menjadi <code>.env</code> dan sesuaikan konfigurasi:</p>
        <div class="code-block">
            <pre><code>cp .env.example .env</code></pre>
        </div>
        
        <p class="mt-3 mb-2">Isi file <code>.env</code>:</p>
        <div class="code-block">
            <pre><code>APP_NAME=bpjs-framework
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/bpjs-framework
APP_LOCALE=id

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bpjs
DB_USERNAME=root
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
API_KEY=</code></pre>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill" style="font-size:1.1rem;"></i>
            <div><strong>Penting:</strong> Jangan commit file <code>.env</code> ke repository. File ini berisi kredensial sensitif.</div>
        </div>
    </div>
</div>

<!-- Step 3: Ready -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#10b981;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">✓</span>
        You're Ready!
    </div>
    <div class="card-body-custom">
        <p>Setelah konfigurasi selesai, kamu bisa langsung mulai membuat project:</p>
        <div class="code-block">
            <pre><code>php -S localhost:8080</code></pre>
        </div>
        <p class="mt-2">Buka browser dan akses <code>http://localhost:8080</code> — project kamu sudah berjalan! 🚀</p>
    </div>
</div>

<!-- Folder Structure -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-folder2-open text-warning"></i> Struktur Folder
    </div>
    <div class="card-body-custom">
        <p>Berikut struktur folder project BPJS Framework:</p>
        
        <div class="code-block">
            <pre><code>nama_proyek_kamu/
├── app/
│   ├── Controllers/       # Controller kelas aplikasi
│   ├── Exports/           # Export data (Excel, PDF, dll)
│   ├── handle/
│   │   └── errors/        # Custom error handler
│   ├── helpers/           # Custom helper functions
│   ├── Imports/           # Import data handler
│   ├── Middleware/        # Custom middleware
│   ├── Models/            # Model database
│   └── Services/          # Business logic layer
├── bootstrap/             # Bootstrap & app setup
├── config/                # File konfigurasi
├── database/              # Migrations & seeders
├── logs/                  # Application logs
├── public/                # Assets publik (CSS, JS, images)
├── resources/
│   └── views/             # View templates
├── routes/
│   ├── web.php            # Web routes
│   └── api.php            # API routes
├── src/                   # Framework core source
├── storage/               # Cache, sessions, uploads
├── vendor/                # Composer dependencies
├── .env                   # Environment variables
├── .env.example           # Example env file
├── .gitignore
├── .htaccess
├── bpjs                   # CLI entry point
└── index.php              # Application entry point</code></pre>
        </div>
        
        <!-- Legend -->
        <div class="row mt-3 g-2">
            <div class="col-md-3 col-6">
                <div style="background:#f0fdf4;border-radius:8px;padding:0.6rem;text-align:center;font-size:0.8rem;font-weight:600;color:#166534;">
                    <i class="bi bi-folder"></i> app
                    <div style="font-weight:400;font-size:0.7rem;color:#64748b;">Application Logic</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#eff6ff;border-radius:8px;padding:0.6rem;text-align:center;font-size:0.8rem;font-weight:600;color:#1e40af;">
                    <i class="bi bi-folder"></i> routes
                    <div style="font-weight:400;font-size:0.7rem;color:#64748b;">URL Definitions</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#fffbeb;border-radius:8px;padding:0.6rem;text-align:center;font-size:0.8rem;font-weight:600;color:#92400e;">
                    <i class="bi bi-folder"></i> resources
                    <div style="font-weight:400;font-size:0.7rem;color:#64748b;">Views & Assets</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#fef2f2;border-radius:8px;padding:0.6rem;text-align:center;font-size:0.8rem;font-weight:600;color:#991b1b;">
                    <i class="bi bi-folder"></i> storage
                    <div style="font-weight:400;font-size:0.7rem;color:#64748b;">Cache & Uploads</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #4f46e5, #7c3aed); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Ready to Dive Deeper?</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Pelajari routing, controller, dan ORM untuk mulai membangun aplikasi.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('route') ?>" style="background:white;color:#4f46e5;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                <i class="bi bi-signpost-2"></i> Routing →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                <i class="bi bi-cpu"></i> Controllers →
            </a>
            <a href="<?= route('orm') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                <i class="bi bi-database"></i> ORM →
            </a>
        </div>
    </div>
</div>