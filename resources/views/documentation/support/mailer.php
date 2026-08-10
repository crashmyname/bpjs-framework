<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #f97316); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📧</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Mailer Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Kirim email dengan mudah. Support HTML body, attachments, CC/BCC, reply-to, dan custom headers via SMTP.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Requirements -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-gear text-danger"></i> SMTP Configuration (.env)
    </div>
    <div class="card-body-custom">
        <p>Mailer menggunakan konfigurasi SMTP dari file <code>.env</code>. Pastikan sudah di-set:</p>
        <div class="code-block">
            <pre><code>SMTP_HOST=smtp.gmail.com
SMTP_AUTH=true
SMTP_EMAIL=youremail@gmail.com
SMTP_PASSWORD=your-app-password
SMTP_SECURE=tls
SMTP_PORT=587</code></pre>
        </div>
        <div class="alert-custom alert-warning-custom mt-3">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div><strong>Gmail:</strong> Gunakan <strong>App Password</strong>, bukan password email biasa. <a href="https://myaccount.google.com/apppasswords" target="_blank" style="color:#92400e;font-weight:600;">Buat App Password</a></div>
        </div>
    </div>
</div>

<!-- Import & Basic -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import & Basic Usage
    </div>
    <div class="card-body-custom">
        <h5 style="font-weight:700;">Import:</h5>
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Mailer;</code></pre>
        </div>
        
        <h5 style="font-weight:700;margin-top:1rem;">Simple Email:</h5>
        <div class="code-block">
            <pre><code>Mailer::make()
    ->to('fervian@example.com', 'Fervian')
    ->subject('Selamat Datang!')
    ->body('&lt;h1&gt;Halo!&lt;/h1&gt;&lt;p&gt;Terima kasih sudah bergabung.&lt;/p&gt;')
    ->send();</code></pre>
        </div>
    </div>
</div>

<!-- With View Template -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Using View Templates
    </div>
    <div class="card-body-custom">
        <p>Gunakan view template untuk email body yang lebih rapi:</p>
        <div class="row g-3">
            <div class="col-md-6">
                <h6 style="font-weight:700;">Controller:</h6>
                <div class="code-block">
                    <pre><code>use Bpjs\Framework\Helpers\Mailer;

$mailer = new Mailer();
$body = View::renderToString('emails/welcome', [
    'name' => 'Fervian',
]);

$mailer->to('you@example.com')
    ->subject('Selamat Datang')
    ->body($body)
    ->send();</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight:700;">View Template (emails/welcome.php):</h6>
                <div class="code-block">
                    <pre><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;style&gt;
        body { font-family: Arial, sans-serif; }
        .container { padding: 20px; }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="container"&gt;
        &lt;h1&gt;Halo, &lt;?= $name ?&gt;!&lt;/h1&gt;
        &lt;p&gt;Selamat datang di aplikasi kami.&lt;/p&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Full Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Complete Example with All Options
    </div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:500px;overflow-y:auto;">
            <pre><code>use Bpjs\Framework\Helpers\Mailer;

$mail = Mailer::make()
    // Recipients
    ->to('recipient@example.com', 'Recipient Name')
    ->cc('cc@example.com')
    ->bcc('bcc@example.com')
    ->replyTo('support@example.com', 'Support Team')

    // Content
    ->subject('Test Email with Attachment')
    ->body('&lt;h1&gt;Hello&lt;/h1&gt;&lt;p&gt;This is a test email.&lt;/p&gt;')
    ->altBody('Hello - This is a test email (plain text version)')

    // Attachment
    ->addAttachment('/path/to/document.pdf', 'Document.pdf')

    // Custom header
    ->customHeader('X-App-Name', 'MyApp');

// Send & handle result
if (!$mail->send()) {
    echo 'Error: ' . $mail->getError();
} else {
    echo 'Email sent successfully!';
}</code></pre>
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
                <thead><tr><th>Method</th><th>Parameters</th><th>Description</th></tr></thead>
                <tbody>
                    <tr><td><code>Mailer::make()</code></td><td>—</td><td>Create new Mailer instance (static)</td></tr>
                    <tr><td><code>to()</code></td><td>string $email, ?string $name = null</td><td>Set primary recipient</td></tr>
                    <tr><td><code>cc()</code></td><td>string $email</td><td>Add CC recipient</td></tr>
                    <tr><td><code>bcc()</code></td><td>string $email</td><td>Add BCC recipient</td></tr>
                    <tr><td><code>replyTo()</code></td><td>string $email, ?string $name = null</td><td>Set reply-to address</td></tr>
                    <tr><td><code>subject()</code></td><td>string $subject</td><td>Set email subject</td></tr>
                    <tr><td><code>body()</code></td><td>string $html</td><td>Set HTML body</td></tr>
                    <tr><td><code>altBody()</code></td><td>string $text</td><td>Set plain text alternative body</td></tr>
                    <tr><td><code>addAttachment()</code></td><td>string $path, ?string $name = null</td><td>Attach file to email</td></tr>
                    <tr><td><code>customHeader()</code></td><td>string $key, string $value</td><td>Add custom email header</td></tr>
                    <tr><td><code>send()</code></td><td>—</td><td>Send the email. Returns <code>bool</code>.</td></tr>
                    <tr><td><code>getError()</code></td><td>—</td><td>Get error message if send fails</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Real-world Examples -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#dc2626;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Real-world Examples
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Welcome Email</h6>
                        <div class="code-block"><pre><code>public function sendWelcome(User $user)
{
    $body = View::renderToString('emails/welcome', [
        'user' => $user,
    ]);

    Mailer::make()
        ->to($user->email, $user->name)
        ->subject('Welcome to MyApp!')
        ->body($body)
        ->send();
}</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Password Reset</h6>
                        <div class="code-block"><pre><code>public function sendResetLink(User $user)
{
    $token = Crypto::encrypt(json_encode([
        'user_id' => $user->id,
        'expires' => time() + 3600,
    ]));

    $link = base_url() . '/reset-password?token=' . urlencode($token);
    $body = View::renderToString('emails/reset', [
        'user' => $user,
        'link' => $link,
    ]);

    Mailer::make()
        ->to($user->email, $user->name)
        ->subject('Reset Your Password')
        ->body($body)
        ->send();
}</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #dc2626, #f97316); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Email Ready!</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Mailer dengan Queue untuk mengirim email di background.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('env') ?>" style="background:white;color:#dc2626;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-gear"></i> ENV Config →
            </a>
            <a href="<?= route('crypto') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-lock"></i> Crypto →
            </a>
            <a href="<?= route('view') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-eye"></i> View →
            </a>
        </div>
    </div>
</div>