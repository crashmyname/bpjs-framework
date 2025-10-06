<section class="section">
    <div class="section-header">
        <h1>Mailer</h1>
    </div>

    <div class="section-body">
        <h4>Helper Mailer</h4>
        <b>Helper Mailer adalah function untuk mengirimkam email</b><br>
        Import Mailer:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Mailer;');
        echo '</code>';
        echo '</pre>';
        ?>
        Contoh Penggunaan Mailer di controller:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Mailer;

Mailer::make()
    ->to("fervian@example.com", "Fervian")
    ->subject("Selamat Datang!")
    ->body("<h1>Halo!</h1><p>Terima kasih sudah bergabung.</p>")
    ->send();');
        echo '</code>';
        echo '</pre>';
        ?>
        Contoh Penggunaan Mailer di controller dengan view:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$mailer = new Mailer();
$body = View::renderToString("emails.welcome", ["name" => "Fervian"]);
$mailer->to("you@example.com")->subject("Selamat Datang")->body($body)->send();');
        echo '</code>';
        echo '</pre>';
        ?>
        Contoh Penggunaan Lengkap:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Mailer;

$mail = Mailer::make()
    ->to("recipient@example.com", "Recipient Name")
    ->cc("cc@example.com")
    ->bcc("bcc@example.com")
    ->replyTo("replyto@example.com", "Support")
    ->subject("Test Email")
    ->body("<h1>Hello</h1><p>This is a test email</p>")
    ->altBody("Hello - This is a test email (plain text)")
    ->addAttachment("/path/to/file.pdf", "Document.pdf")
    ->customHeader("X-App", "iStock");

if (!$mail->send()) {
    echo "Error sending mail: " . $mail->getError();
} else {
    echo "Mail sent successfully!";
}
');
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>
