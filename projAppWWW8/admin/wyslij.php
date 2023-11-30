<?php

function PokazKontakt()
{
    $wynik = '
    <div class="PokazKontakt">
        <h1 class="heading">wyslij mail:</h1>
        <div class="kontakt">
            <form method="post" name="mail" enctype="multipart/form-data" action="' . $_SERVER['REQUEST_URI'] . '">
                <table class="kontakt">
                    <tr><td class="kon4_t">temat:</td><td><input type="text" name="kontakt" class="kontakt" /></td></tr>
                    <tr><td class="kon4_t">tresc:</td><td><input type="text" name="tresc" class="kontakt" /></td></tr>
                    <tr><td class="kon4_t">nadawca:</td><td><input type="text" name="email" class="kontakt" /></td></tr>
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
    if((!empty($_POST['temat']) || !empty($_POST['tresc']) || !empty($_POST['email'])) && isset($_POST['x4_submit']))
    {
        $mail['subject'] = $_POST['kontakt'];
        $mail['body'] = $_POST['tresc'];
        $mail['sender'] = $_POST['email'];
        $mail['reciptient'] = $odbiorca;

        $header = "From: Formularz kontaktowy <".$mail['sender'].">\n";
        $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: ";
        $header .= "X-Sender: <".$mail['sender'].">\n";
        $header .= "X-Mailer: PRapwww mail 1.2\n";
        $header .= "X-Priority: 3\n";
        $header .= "Return-Path: <".$mail['sender'].">\n";

        mail($mail['reciptient'],$mail['subject'],$mail['body'],$header);

        echo '[wiadomosc_wyslana]';
    }
    else
    {
        echo '[nie_wypelniles_pola]';
    }
}

function PrzypomnijHaslo()
{

}


$odbiorca = "powirskimateusz@gmail.com";
WyslijMailaKontakt($odbiorca);

?>