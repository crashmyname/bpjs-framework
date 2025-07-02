<?php
namespace Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    protected PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // SMTP Config dari .env
        $this->mail->isSMTP();
        $this->mail->Host       = env('SMTP_HOST');
        $this->mail->SMTPAuth   = env('SMTP_AUTH', true);
        $this->mail->Username   = env('SMTP_EMAIL');
        $this->mail->Password   = env('SMTP_PASSWORD');
        $this->mail->SMTPSecure = env('SMTP_SECURE', 'tls');
        $this->mail->Port       = env('SMTP_PORT', 587);

        // Default sender
        $this->mail->setFrom(env('SMTP_EMAIL'), env('APP_NAME', 'Mailer'));
        $this->mail->isHTML(true);
    }

    public static function make(): self
    {
        return new self();
    }

    public function to(string $email, string $name = ''): self
    {
        $this->mail->addAddress($email, $name);
        return $this;
    }

    public function subject(string $subject): self
    {
        $this->mail->Subject = $subject;
        return $this;
    }

    public function body(string $body): self
    {
        $this->mail->Body = $body;
        return $this;
    }

    public function addAttachment(string $filePath, string $name = ''): self
    {
        $this->mail->addAttachment($filePath, $name);
        return $this;
    }

    public function send(): bool
    {
        try {
            return $this->mail->send();
        } catch (Exception $e) {
            error_log("Mailer error: " . $this->mail->ErrorInfo);
            return false;
        }
    }
}
