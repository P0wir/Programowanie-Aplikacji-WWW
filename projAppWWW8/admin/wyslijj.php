<?php

$to = 'papajek14@gmail.com';
$subject = 'Test Subject';
$message = 'Test Message';
$headers = 'From: papajek14@gmail.com' . "\r\n" .
    'Reply-To: papajek14@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$mailSent = mail($to, $subject, $message, $headers);

if ($mailSent) {
    echo 'Mail sent successfully!';
} else {
    echo 'Error: Unable to send email.';
    error_log(error_get_last()['message']);
}

?>