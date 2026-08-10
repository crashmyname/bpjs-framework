<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #06b6d4); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📬</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Queue System</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Background job processing. Jalankan task secara asynchronous — email, notifikasi, import, dan lainnya.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Overview -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-info-circle text-info"></i> What is Queue?
    </div>
    <div class="card-body-custom">
        <p><strong>Queue</strong> adalah sistem antrian untuk menjalankan task berat atau lambat di background tanpa membuat user menunggu. Cocok untuk: <strong>kirim email, generate PDF, import data, push notification</strong>, dan lainnya.</p>
        
        <div style="text-align:center;padding:1rem 0;">
            <div style="display:inline-flex;align-items:center;gap:0.75rem;flex-wrap:wrap;justify-content:center;">
                <div style="background:#eff6ff;border-radius:10px;padding:0.75rem 1.25rem;font-weight:700;color:#1e40af;">App</div>
                <span style="font-size:1.2rem;">→</span>
                <div style="background:#fef3c7;border-radius:10px;padding:0.75rem 1.25rem;font-weight:700;color:#92400e;">Queue (DB)</div>
                <span style="font-size:1.2rem;">→</span>
                <div style="background:#f0fdf4;border-radius:10px;padding:0.75rem 1.25rem;font-weight:700;color:#166534;">Worker</div>
                <span style="font-size:1.2rem;">→</span>
                <div style="background:#f5f3ff;border-radius:10px;padding:0.75rem 1.25rem;font-weight:700;color:#7c3aed;">Done ✓</div>
            </div>
        </div>
    </div>
</div>

<!-- ENV Configuration -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Queue Configuration (.env)
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code>QUEUE_ENGINE=database
QUEUE_MAX_ATTEMPTS=3
QUEUE_RETRY_AFTER=90
QUEUE_SLEEP=2
QUEUE_TRIES=3
QUEUE_MEMORY=256
QUEUE_KEEPALIVE=300</code></pre>
        </div>
    </div>
</div>

<!-- Database Table -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Jobs Table Structure
    </div>
    <div class="card-body-custom">
        <p>Queue menggunakan tabel <code>jobs</code> di database. Pastikan tabel sudah dibuat:</p>
        <div class="code-block">
            <pre><code>CREATE TABLE jobs (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    queue VARCHAR(100) DEFAULT 'default',
    payload LONGTEXT NOT NULL,
    status ENUM('pending','processing','done','failed') DEFAULT 'pending',
    attempts INT DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);</code></pre>
        </div>
    </div>
</div>

<!-- Basic Operations -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Queue Operations
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;color:#059669;">Push Job</h6>
                <div class="code-block"><pre><code>Queue::push(SendEmailJob::class, [
    'email' => 'user@mail.com',
    'name'  => 'Fervian',
], 'default');</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;color:#0ea5e9;">Pop Job</h6>
                <div class="code-block"><pre><code>$job = Queue::pop('default');
// Returns job object or null if empty</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;color:#059669;">Mark Done</h6>
                <div class="code-block"><pre><code>Queue::done($job->id);</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;color:#dc2626;">Mark Failed</h6>
                <div class="code-block"><pre><code>Queue::fail($job->id);</code></pre></div>
            </div>
            <div class="col-md-4">
                <h6 style="font-weight:700;color:#f59e0b;">Release (Retry)</h6>
                <div class="code-block"><pre><code>Queue::release($job->id);
// Kembali ke pending</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Worker -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Queue Worker
    </div>
    <div class="card-body-custom">
        <p>Worker berjalan di background untuk memproses job dari queue:</p>
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>while (true) {
    $job = Queue::pop('default');

    if ($job) {
        try {
            $payload = json_decode($job->payload);
            $class = $payload->job;
            $data  = $payload->data;

            (new $class)->handle($data);
            Queue::done($job->id);
        } catch (\Exception $e) {
            Queue::fail($job->id);
            logger('Queue failed: ' . $e->getMessage());
        }
    }

    sleep(1); // Jeda 1 detik
}</code></pre>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-terminal"></i>
            <div><strong>Jalankan Worker:</strong> <code>php bpjs queue:work</code> atau buat cron job untuk production.</div>
        </div>
    </div>
</div>

<!-- Job Class Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Job Class Example
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Job Class:</h6>
                <div class="code-block"><pre><code>namespace App\Jobs;

class SendEmailJob
{
    public function handle(array $data): void
    {
        $email = $data['email'];
        $name  = $data['name'];

        Mailer::make()
            ->to($email, $name)
            ->subject('Welcome!')
            ->body("&lt;h1&gt;Hello {$name}!&lt;/h1&gt;")
            ->send();
    }
}</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">Dispatch from Controller:</h6>
                <div class="code-block"><pre><code>class UserController
{
    public function register(Request $request)
    {
        $user = User::create([
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Kirim welcome email via queue
        Queue::push(SendEmailJob::class, [
            'email' => $user->email,
            'name'  => $user->name,
        ]);

        return redirect('/login');
    }
}</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Helper Functions -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-lightning-charge text-warning"></i> Helper Functions
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">dispatch() Helper</h6>
                <div class="code-block"><pre><code>// Shortcut untuk push job
dispatch(SendEmailJob::class, [
    'email' => 'user@mail.com',
], 'default');</code></pre></div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">queue() Helper</h6>
                <div class="code-block"><pre><code>// Direct insert ke database
queue(SendEmailJob::class, [
    'email' => 'user@mail.com',
], 'handle');</code></pre></div>
            </div>
        </div>
    </div>
</div>

<!-- Methods Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-book text-warning"></i> Methods Reference
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead><tr><th>Method</th><th>Description</th></tr></thead>
                <tbody>
                    <tr><td><code>Queue::push($class, $data, $queue)</code></td><td>Tambah job ke queue (insert ke DB)</td></tr>
                    <tr><td><code>Queue::pop($queue)</code></td><td>Ambil 1 job pending (update status ke processing)</td></tr>
                    <tr><td><code>Queue::done($id)</code></td><td>Tandai job selesai (status = done)</td></tr>
                    <tr><td><code>Queue::fail($id)</code></td><td>Tandai job gagal (status = failed)</td></tr>
                    <tr><td><code>Queue::release($id)</code></td><td>Kembalikan job ke pending untuk retry</td></tr>
                    <tr><td><code>dispatch($class, $data, $queue)</code></td><td>Helper shortcut untuk push job</td></tr>
                    <tr><td><code>queue($class, $data, $method)</code></td><td>Helper direct insert dengan method custom</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #06b6d4); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Process in Background</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Queue dengan Mailer untuk email async yang cepat.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('mailer') ?>" style="background:white;color:#0891b2;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-envelope"></i> Mailer →
            </a>
            <a href="<?= route('env') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-gear"></i> ENV Config →
            </a>
            <a href="<?= route('cli') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-terminal"></i> CLI →
            </a>
        </div>
    </div>
</div>