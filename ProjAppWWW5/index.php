<?php
if (empty($_GET['page'])) {
    $strona = 'html/index.html';
} elseif ($_GET['page'] == 'historia') {
    $strona = 'html/historia.html';
} elseif ($_GET['page'] == 'historiapl') {
    $strona = 'html/historiapl.html';
} elseif ($_GET['page'] == 'reguly') {
    $strona = 'html/reguly.html';
} elseif ($_GET['page'] == 'pozycje') {
    $strona = 'html/pozycje.html';
} elseif ($_GET['page'] == 'roznice') {
    $strona = 'html/roznice.html'; 
} elseif ($_GET['page'] == 'kontakt') {
    $strona = 'html/kontakt.html';
} elseif ($_GET['page'] == 'zabawaskrypty') {
    $strona = 'html/zabawaskrypty.html';
} elseif ($_GET['page'] == 'filmy') {
    $strona = 'html/filmy.html';
} else {
    $strona = 'html/strona_nie_istnieje.html';
}
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
    <a href="index.php?page=historia">historia koszykówki</a> <br/>
    <a href="index.php?page=historiapl">historia koszykówki w Polsce</a> <br/>
    <a href="index.php?page=reguly">reguły gry w koszykówkę</a> <br/>
    <a href="index.php?page=pozycje">pozycje koszykarskie</a> <br/>
    <a href="index.php?page=roznice">roznice w roznych federacjach koszykówki</a> <br/>
    <a href="index.php?page=kontakt">kontakt</a> <br/>
    <a href="index.php?page=zabawaskrypty">skrypty</a> <br/>
	<a href="index.php?page=filmy">filmy</a><br/>
</div>
<div id="opis">
    <?php
    $contentPath = $strona; 
    $contentPath = realpath($contentPath);
    if ($contentPath && file_exists($contentPath)) {
        include($contentPath);
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
