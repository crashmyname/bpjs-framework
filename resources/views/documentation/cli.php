<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0f172a, #334155); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">💻</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">CLI — Command Line Interface</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Generate models, controllers, migrations, dan lainnya langsung dari terminal. Percepat workflow development kamu.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-terminal text-dark"></i> Overview
    </div>
    <div class="card-body-custom">
        <p><strong>BPJS CLI</strong> menyediakan berbagai perintah untuk mempercepat development. Semua perintah dijalankan dari terminal di root project.</p>
        <div class="code-block">
            <pre><code>php bpjs [command] [options]</code></pre>
        </div>
    </div>
</div>

<!-- Available Commands -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-list-check text-info"></i> Available Commands
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th style="width:5%;">#</th><th style="width:35%;">Command</th><th style="width:60%;">Description</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><code>php bpjs make:model</code></td>
                        <td>Generate model class di <code>app/Models/</code></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><code>php bpjs make:controller</code></td>
                        <td>Generate controller class di <code>app/Controllers/</code></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><code>php bpjs make:import</code></td>
                        <td>Generate import class di <code>app/Imports/</code></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><code>php bpjs make:export</code></td>
                        <td>Generate export class di <code>app/Exports/</code></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><code>php bpjs make:service</code></td>
                        <td>Generate service class di <code>app/Services/</code></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><code>php bpjs make:migration</code></td>
                        <td>Generate migration file di <code>database/</code></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><code>php bpjs db:migrate</code></td>
                        <td>Jalankan semua migration yang pending</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><code>php bpjs db:rollback</code></td>
                        <td>Rollback migration terakhir</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td><code>php bpjs serve</code></td>
                        <td>Jalankan development server</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Generate Commands -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-hammer text-warning"></i> Generate Commands
    </div>
    <div class="card-body-custom">
        
        <!-- make:model -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;">
                    <i class="bi bi-box text-purple" style="color:#7c3aed;"></i> make:model
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Generate model class dengan struktur BaseModel.</p>
                <div class="code-block">
                    <pre><code>php bpjs make:model User</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>app/Models/User.php</code></p>
            </div>
        </div>

        <!-- make:controller -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;">
                    <i class="bi bi-cpu text-info"></i> make:controller
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Generate controller class dengan struktur dasar.</p>
                <div class="code-block">
                    <pre><code>php bpjs make:controller UserController</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>app/Controllers/UserController.php</code></p>
            </div>
        </div>

        <!-- make:import -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;">
                    <i class="bi bi-file-arrow-down text-success"></i> make:import
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Generate import class untuk data import.</p>
                <div class="code-block">
                    <pre><code>php bpjs make:import UserImport</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>app/Imports/UserImport.php</code></p>
            </div>
        </div>

        <!-- make:export -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;">
                    <i class="bi bi-file-arrow-up text-warning"></i> make:export
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Generate export class untuk data export.</p>
                <div class="code-block">
                    <pre><code>php bpjs make:export UserExport</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>app/Exports/UserExport.php</code></p>
            </div>
        </div>

        <!-- make:service -->
        <div class="card-custom" style="border:1px solid #e2e8f0;margin-bottom:1rem;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;">
                    <i class="bi bi-gear text-danger"></i> make:service
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Generate service class untuk business logic.</p>
                <div class="code-block">
                    <pre><code>php bpjs make:service UserService</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>app/Services/UserService.php</code></p>
            </div>
        </div>

        <!-- make:migration -->
        <div class="card-custom" style="border:1px solid #e2e8f0;">
            <div class="card-body-custom">
                <h5 style="font-weight:700;">
                    <i class="bi bi-database-add text-primary"></i> make:migration
                </h5>
                <p style="font-size:0.85rem;color:#64748b;">Generate migration file untuk skema database.</p>
                <div class="code-block">
                    <pre><code>php bpjs make:migration create_users_table</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Output: <code>database/xxxx_xx_xx_xxxxxx_create_users_table.php</code></p>
            </div>
        </div>
    </div>
</div>

<!-- Database Commands -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-database text-success"></i> Database Commands
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h5 style="font-weight:700;">
                            <i class="bi bi-play-circle text-success"></i> db:migrate
                        </h5>
                        <p style="font-size:0.85rem;color:#64748b;">Jalankan semua migration yang belum dieksekusi.</p>
                        <div class="code-block">
                            <pre><code>php bpjs db:migrate</code></pre>
                        </div>
                        <div class="alert-custom alert-info-custom mt-2">
                            <i class="bi bi-info-circle-fill"></i>
                            <div>Migration dijalankan berurutan berdasarkan timestamp. Setiap migration hanya dijalankan sekali.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h5 style="font-weight:700;">
                            <i class="bi bi-arrow-counterclockwise text-danger"></i> db:rollback
                        </h5>
                        <p style="font-size:0.85rem;color:#64748b;">Batalkan migration terakhir.</p>
                        <div class="code-block">
                            <pre><code>php bpjs db:rollback</code></pre>
                        </div>
                        <div class="alert-custom alert-warning-custom mt-2">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <div><strong>Hati-hati:</strong> Rollback akan menghapus tabel/data. Pastikan sudah backup!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Serve Command -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-server text-info"></i> Development Server
    </div>
    <div class="card-body-custom">
        <h5 style="font-weight:700;">php bpjs serve</h5>
        <p>Jalankan PHP built-in development server dengan mudah.</p>
        
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:600;">Default:</h6>
                <div class="code-block">
                    <pre><code>php bpjs serve</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Server berjalan di: <code>http://localhost:8080</code></p>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:600;">Custom Host & Port:</h6>
                <div class="code-block">
                    <pre><code>php bpjs serve --host=0.0.0.0 --port=3000</code></pre>
                </div>
                <p style="font-size:0.8rem;color:#94a3b8;">Server berjalan di: <code>http://0.0.0.0:3000</code></p>
            </div>
        </div>
        
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-lightbulb-fill"></i>
            <div>
                <strong>Tips:</strong>
                <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                    <li>Gunakan <code>--host=0.0.0.0</code> agar bisa diakses dari device lain di jaringan</li>
                    <li>Default port adalah <code>8080</code> jika tidak dispesifikkan</li>
                    <li>Tekan <code>Ctrl+C</code> untuk menghentikan server</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Quick Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-lightning-charge text-warning"></i> Quick Reference
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code># Generate
php bpjs make:model User
php bpjs make:controller UserController
php bpjs make:import UserImport
php bpjs make:export UserExport
php bpjs make:service UserService
php bpjs make:migration create_users_table

# Database
php bpjs db:migrate
php bpjs db:rollback

# Server
php bpjs serve
php bpjs serve --host=0.0.0.0 --port=3000</code></pre>
        </div>
    </div>
</div>

<!-- Workflow Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-diagram-3 text-info"></i> Typical Workflow
    </div>
    <div class="card-body-custom">
        <p>Alur kerja umum saat membuat fitur baru:</p>
        
        <div style="display:flex;flex-wrap:wrap;gap:1rem;margin-top:1rem;">
            <div style="flex:1;min-width:120px;text-align:center;">
                <div style="background:#f5f3ff;border-radius:12px;padding:1rem;">
                    <div style="font-size:1.5rem;">1</div>
                    <div style="font-weight:700;font-size:0.85rem;margin-top:0.5rem;">Migration</div>
                    <code style="font-size:0.7rem;">make:migration</code>
                </div>
            </div>
            <div style="display:flex;align-items:center;font-size:1.2rem;color:#94a3b8;">→</div>
            <div style="flex:1;min-width:120px;text-align:center;">
                <div style="background:#eff6ff;border-radius:12px;padding:1rem;">
                    <div style="font-size:1.5rem;">2</div>
                    <div style="font-weight:700;font-size:0.85rem;margin-top:0.5rem;">Migrate</div>
                    <code style="font-size:0.7rem;">db:migrate</code>
                </div>
            </div>
            <div style="display:flex;align-items:center;font-size:1.2rem;color:#94a3b8;">→</div>
            <div style="flex:1;min-width:120px;text-align:center;">
                <div style="background:#f0fdf4;border-radius:12px;padding:1rem;">
                    <div style="font-size:1.5rem;">3</div>
                    <div style="font-weight:700;font-size:0.85rem;margin-top:0.5rem;">Model</div>
                    <code style="font-size:0.7rem;">make:model</code>
                </div>
            </div>
            <div style="display:flex;align-items:center;font-size:1.2rem;color:#94a3b8;">→</div>
            <div style="flex:1;min-width:120px;text-align:center;">
                <div style="background:#fffbeb;border-radius:12px;padding:1rem;">
                    <div style="font-size:1.5rem;">4</div>
                    <div style="font-weight:700;font-size:0.85rem;margin-top:0.5rem;">Controller</div>
                    <code style="font-size:0.7rem;">make:controller</code>
                </div>
            </div>
            <div style="display:flex;align-items:center;font-size:1.2rem;color:#94a3b8;">→</div>
            <div style="flex:1;min-width:120px;text-align:center;">
                <div style="background:#fef2f2;border-radius:12px;padding:1rem;">
                    <div style="font-size:1.5rem;">5</div>
                    <div style="font-weight:700;font-size:0.85rem;margin-top:0.5rem;">Serve</div>
                    <code style="font-size:0.7rem;">serve</code>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0f172a, #334155); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Start Building!</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Generate model dan controller pertamamu, lalu jalankan server development.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#0f172a;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('controller') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-cpu"></i> Controller →
            </a>
            <a href="<?= route('env') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-gear"></i> ENV →
            </a>
        </div>
    </div>
</div>