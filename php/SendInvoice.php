<?php
require 'vendor/autoload.php'; // Ensure you include Composer's autoloader if using PHPMailer by running composer require phpmailer/phpmailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendInvoice($toEmail, $subject, $invoiceContent, $attachmentPath) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com'; // SMTP username
        $mail->Password = 'your-password'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your-email@example.com', 'Your Name');
        $mail->addAddress($toEmail);

        // Attachments
        if (!empty($attachmentPath)) {
            $mail->addAttachment($attachmentPath);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $invoiceContent;

        $mail->send();
        echo 'Invoice has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

/*
// Example usage
$toEmail = 'customer@example.com';
$subject = 'Your Invoice';
$invoiceContent = '<h1>Invoice</h1><p>Thank you for your purchase!</p>';
$attachmentPath = '/path/to/invoice.pdf';

sendInvoice($toEmail, $subject, $invoiceContent, $attachmentPath);
*/
