<?php
include('cfg.php');
include('showpage.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Language" content="pl" />
    <meta name="Author" content="Mateusz Powirski" />
    <link rel="stylesheet" href="style.css">
    <script src="kolorujtlo.js" type="text/javascript"></script>
    <script src="timedate.js" type="text/javascript"></script>
    <title>koszykówka moją pasją</title>
</head>
<body>
<script>window.onload = startClock;</script>
<header>
    <h1>Strona poświęcona koszykówce</h1>
</header>
<div id="clock-container">
    <p>Date: <span id="date"></span></p>
    <p>Time: <span id="watch"></span></p>
</div>
<div id="menu">
	<a href="index.php?idp=historia">historia koszykówki</a> <br/>
	<a href="index.php?idp=historiapl">historia koszykówki w Polsce</a> <br/>
	<a href="index.php?idp=reguly">reguły gry w koszykówkę</a> <br/>
	<a href="index.php?idp=pozycje">pozycje koszykarskie</a> <br/>
	<a href="index.php?idp=roznice">roznice w roznych federacjach koszykówki</a> <br/>
	<a href="index.php?idp=kontakt">kontakt</a> <br/>
	<a href="index.php?idp=skrypty">skrypty</a> <br/>
	<a href="index.php?idp=filmy">filmy</a><br/>
</div>
<div id="opis">
    <?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$pageId = $_GET['idp'];

if ($pageId == 'historia') {
    echo PokazPodstrone(1);
} elseif ($pageId == 'historiapl') {
    echo PokazPodstrone(2);
} elseif ($pageId == 'reguly') {
    echo PokazPodstrone(3);
} elseif ($pageId == 'pozycje') {
    echo PokazPodstrone(4);
} elseif ($pageId == 'roznice') {
    echo PokazPodstrone(5);
} elseif ($pageId == 'kontakt') {
    echo PokazPodstrone(6);
} elseif ($pageId == 'skrypty') {
    echo PokazPodstrone(7);
} elseif ($pageId == 'filmy') {
    echo PokazPodstrone(8);
}
    ?>
</div>
<div id="content">
    <?php
    $nr_indeksu = '164421 ';
    $nrGrupy = 'ISI3 ';

    echo 'MateuszPowirski '.$nr_indeksu.'grupa '.$nrGrupy.'<br/><br/>';
    ?>
</div>
</body>
</html>
