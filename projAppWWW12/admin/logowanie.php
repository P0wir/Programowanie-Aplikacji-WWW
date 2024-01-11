<link rel="stylesheet" href="../style.css">
<?php
session_start();
require "../cfg.php";


$dbhost = $config['dbhost'];
$dbuser = $config['dbuser'];
$dbpass = $config['dbpass'];
$baza = $config['baza'];

$link = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$link) {
    echo "<b>przerwane połączenie </b>";
}

if (!mysqli_select_db($link, $baza)) {
    echo "nie wybrano bazy";
}
//wyswietlam formularz logowania
function FormularzLogowania()
{
    $wynik =
        '
    <div class="logowanie">
        <h1 class="heading">Panel CMS:</h1>
        <div class="logowanie">
            <form method="post" name="LoginForm" enctype="multipart/form-data" action="' .
        $_SERVER["REQUEST_URI"] .
        '">
                <table class="logowanie">
                    <tr><td class="kog4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td></tr>
                    <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="zaloguj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $wynik;
}
//funkcja obslugujaca logowanie
function Logowanie($link)
{
    if (isset($_POST["x1_submit"])) {
        $mail = $_POST["login_email"];
        $haslo = $_POST["login_pass"];

        $query = "SELECT * FROM tabela_uzytkownikow WHERE email = '$mail' AND haslo = '$haslo' LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $_SESSION["status"] = 1;
            session_write_close();
            header("Location: admin.php");
            exit();
            echo "Logowanie udane! <br></br>";
        } else {
            echo "Niepoprawne dane logowania <br></br>";
            $_SESSION["status"] = 2;
        }
    }
}
?>