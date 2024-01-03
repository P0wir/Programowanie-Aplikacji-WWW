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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="menu.js" type="text/javascript"></script>
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
<div id="witaj">
	<a href=admin/admin.php>panel CMS</a>
</div>
<div id="menu">
	<a href="index.php?idp=glowna" class="menu-item">Autor Koszykowki</a><br/>
	<a href="index.php?idp=historia" class="menu-item">historia koszykówki</a> <br/>
    <a href="index.php?idp=historiapl" class="menu-item">historia koszykówki w Polsce</a> <br/>
    <a href="index.php?idp=reguly" class="menu-item">reguły gry w koszykówkę</a> <br/>
    <a href="index.php?idp=pozycje" class="menu-item">pozycje koszykarskie</a> <br/>
    <a href="index.php?idp=roznice" class="menu-item">roznice w roznych federacjach koszykówki</a> <br/>
    <a href="index.php?idp=kontakt" class="menu-item">kontakt</a> <br/>
    <a href="index.php?idp=skrypty" class="menu-item">skrypty</a> <br/>
    <a href="index.php?idp=filmy" class="menu-item">filmy</a><br/>
</div>
<div id="opis">
    <?php
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

$pageId = $_GET['idp'];


if ($pageId == 'glowna') {
    echo PokazPodstrone(1);
} else if ($pageId == 'historia') {
    echo PokazPodstrone(2);
} elseif ($pageId == 'historiapl') {
    echo PokazPodstrone(3);
} elseif ($pageId == 'reguly') {
    echo PokazPodstrone(4);
} elseif ($pageId == 'pozycje') {
    echo PokazPodstrone(5);
} elseif ($pageId == 'roznice') {
    echo PokazPodstrone(6);
} elseif ($pageId == 'kontakt') {
    echo PokazPodstrone(7);
} elseif ($pageId == 'skrypty') {
    echo PokazPodstrone(8);
} elseif ($pageId == 'filmy') {
    echo PokazPodstrone(9);
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
