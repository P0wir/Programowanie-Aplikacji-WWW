<!-- index.php -->
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
</div>
<div id="opis">
    <?php
    // Obsługa dynamicznego ładowania treści
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $contentPath = "html/{$page}.html";

    // Uzyskaj pełną ścieżkę do pliku
    $contentPath = realpath($contentPath);

    // Sprawdź, czy plik istnieje przed includem
    if ($contentPath && file_exists($contentPath)) {
        include($contentPath);
    } else {
        echo '<p>Strona nie istnieje</p>';
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
