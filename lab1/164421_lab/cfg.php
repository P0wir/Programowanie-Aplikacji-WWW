<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$baza = '164421_moja_strona';

$link = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$link) {
    echo '<b>Przerwane połączenie: </b>' . mysqli_connect_error();
}

if (!mysqli_select_db($link, $baza)) {
    echo 'Nie wybrano bazy: ' . mysqli_error($link);
}
?>