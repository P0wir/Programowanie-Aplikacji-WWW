<?php
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;

$mail->isHTML(true);
$mail->Subject = 'Birthday Reminders for August';
$mail->Body = $message;

// Add recipient
$mail->addAddress('papajek14@gmail.com', 'Recipient Name');

// Set additional headers
$mail->From = 'papamati142@gmail.com';
$mail->FromName = 'Birthday Reminder';

// Add CC and BCC if needed
// $mail->addCC('cc@example.com', 'CC Name');
// $mail->addBCC('bcc@example.com', 'BCC Name');

if ($mail->send()) {
    echo 'Email sent successfully';
} else {
    echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
}

?>