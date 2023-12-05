<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = 'moja_strona';

require '../cfg.php';

session_start();

$link = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$link) echo '<b>przerwane połączenie </b>';
if (!mysqli_select_db($link, $baza)) echo 'nie wybrano bazy';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';

function PokazKontakt()
{
    $wynik = '
    <div class="PokazKontakt">
        <h1 class="heading">wyslij mail:</h1>
        <div class="formularz">
            <form method="post" name="mail" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="formularz">
                    <tr><td class="kon4_t">temat:</td><td><input type="text" name="kontakt" class="formularz" /></td></tr>
                    <tr><td class="kon4_t">tresc:</td><td><input type="text" name="tresc" class="formularz" /></td></tr>
                    <tr><td class="kon4_t">nadawca:</td><td><input type="text" name="email" class="formularz" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x4_submit" class="kontakt" value="wyslij" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

function WyslijMailaKontakt($odbiorca)
{
    echo PokazKontakt();
    global $config;

    if ((!empty($_POST['kontakt']) || !empty($_POST['tresc']) || !empty($_POST['email'])) && isset($_POST['x4_submit']) && !isset($_SESSION['form_submitted'])) {
        $_SESSION['form_submitted'] = true;

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $config['smtp_host'];
            $mail->SMTPAuth = $config['smtp_auth'];
            $mail->Username = $config['smtp_username'];
            $mail->Password = $config['smtp_password'];
            $mail->SMTPSecure = $config['smtp_secure'];
            $mail->Port = $config['smtp_port'];

            $mail->setFrom($_POST['email'], 'Formularz kontaktowy');
            $mail->addAddress($odbiorca);

            $mail->isHTML(false);
            $mail->Subject = $_POST['kontakt'];
            $mail->Body = $_POST['tresc'];

            $mail->send();
            echo '[wiadomosc_wyslana]';
        } catch (Exception $e) {
            echo 'wiadomosc nie wyslana';
        }
    } else {
        echo 'wypelnij pola';
    }
}

function Zapomniane_haslo()
{
    $wynik = '
    <div class="Zapomniane_haslo">
        <h1 class="heading">wyslij mail:</h1>
        <div class="formularzZapomniane">
            <form method="post" name="mail" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="formularz">
                    <tr><td class="for4_t">email:</td><td><input type="text" name="emailf" class="formularzZapomniane" /></td></tr>
                    <tr><td class="for4_t">na jaki mail?:</td><td><input type="text" name="emaild" class="formularzZapomniane" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x5_submit" class="formularzZapomniane" value="wyslij" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}

$odbiorca = "papajek14@gmail.com";
WyslijMailaKontakt($odbiorca);

function PrzypomnijHaslo()
{
    global $link;
    echo Zapomniane_haslo();
    global $config;

    if (isset($_POST['x5_submit'])) {
        $email = $_POST['emailf'];
        $emaild = $_POST['emaild'];
        $query = "SELECT haslo FROM tabela_uzytkownikow WHERE email = '$email' LIMIT 1";

        $wynik = mysqli_query($link, $query);

        if (mysqli_num_rows($wynik) > 0) {
            $row = mysqli_fetch_assoc($wynik);
            $haslo = $row['haslo'];

            $mail = new PHPMailer(true);

            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = $config['smtp_host'];
                $mail->SMTPAuth = $config['smtp_auth'];
                $mail->Username = $config['smtp_username'];
                $mail->Password = $config['smtp_password'];
                $mail->SMTPSecure = $config['smtp_secure'];
                $mail->Port = $config['smtp_port'];

                $mail->setFrom($config['smtp_username'], 'Formularz kontaktowy');
                $mail->addAddress($emaild);

                $mail->isHTML(false);
                $mail->Subject = 'Przypomnienie hasła';
                $mail->Body = 'Twoje hasło: ' . $haslo;

                $mail->send();
                echo '[wiadomosc_wyslana]';
                header("Location: wyslij.php");
                exit();
            } catch (Exception $e) {
                echo 'Wiadomość nie została wysłana: ' . $mail->ErrorInfo;
            }
        } else {
            echo 'Podany email nie istnieje w bazie danych.';
        }

        mysqli_close($link);
    } else {
        echo 'Wypełnij pola.';
    }
}

PrzypomnijHaslo();
?>