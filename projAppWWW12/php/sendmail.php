<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../PHPMailer-master/src/PHPMailer.php";
require "../PHPMailer-master/src/SMTP.php";
require "../PHPMailer-master/src/Exception.php";
require "../cfg.php";

session_start();
$_SESSION["form_submitted"] = false;

function WyslijMailaKontakt($odbiorca)
{
    global $config;

    if (
        (!empty($_POST["Imie"]) ||
            !empty($_POST["wiadomosc"]) ||
            !empty($_POST["mail"])) &&
        isset($_POST["x6_submit"]) &&
        $_SESSION["form_submitted"] !== true
    ) {

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = $config["smtp_host"];
            $mail->SMTPAuth = $config["smtp_auth"];
            $mail->Username = $config["smtp_username"];
            $mail->Password = $config["smtp_password"];
            $mail->SMTPSecure = $config["smtp_secure"];
            $mail->Port = $config["smtp_port"];

            $mail->setFrom($_POST["mail"], "Formularz kontaktowy");
            $mail->addAddress($odbiorca);

            $mail->isHTML(false);
            $mail->Subject = $_POST["Imie"];
            $mail->Body = $_POST["wiadomosc"];

            $mail->send();
            echo '<script>alert("Wiadomość została wysłana pomyślnie."); window.location.replace("../index.php?idp=kontakt");</script>';
            exit();
        } catch (Exception $e) {
            echo '<script>alert("Wiadomość nie została wysłana."); window.location.replace("../index.php?idp=kontakt");</script>';
            exit();
        }
    } else {
        echo '<script>alert("wypelnij pola."); window.location.replace("../index.php?idp=kontakt");</script>';
        exit();
    }
}

$odbiorca = "papajek14@gmail.com";
WyslijMailaKontakt($odbiorca);
?>
