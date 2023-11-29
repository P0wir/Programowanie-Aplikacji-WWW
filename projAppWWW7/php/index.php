<?php
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="Content-Language" content="pl" />
		<meta name="Author" content="Mateusz Powirski" />
		<link rel="stylesheet" href="../style.css">
		<script src="../kolorujtlo.js" type="text/javascript"></script>
		<script src="../timedate.js" type="text/javascript"></script>
        <title>koszykówka moją pasją</title>
    </head>
    <Body>
	<script>window.onload = startClock;</script>
	<Header>
		<h1>Strona poświęcona koszykówce</h1>
	</Header>
	<div id="clock-container">
		<p>Date: <span id="date"></span></p>
		<p>Time: <span id="watch"></span></p>
	</div>
	<div id="menu">
		<a href="../historia.html">historia koszykówki</a> <br/>
		<a href="../historiapl.html">historia koszykówki w Polsce</a> <br/>
		<a href="../reguly.html">reguły gry w koszykówkę</a> <br/>
		<a href="../pozycje.html">pozycje koszykarskie</a> <br/>
		<a href="../roznice.html">roznice w roznych federacjach koszykówki</a> <br/>
		<a href="../kontakt.html">kontakt</a> <br/>
		<a href="../zabawaskrypty.html">skrypty</a> <br/>
	</div>
        <div id="content">
            <?php
                $nr_indeksu = '164421 ';
                $nrGrupy = 'ISI3 ';

                echo 'MateuszPowirski '.$nr_indeksu.'grupa '.$nrGrupy.'<br/><br/>';

                echo 'Zastosowanie metody include()<br/><br/>';

                echo 'Podpunkt a)';
                echo '<br/><br/>';
                echo 'Wyświetla tekst z pliku includetest.php:';
                echo '<br/><br/>';

                include 'includetest.php';

                echo '<br/><br/>';
                echo 'Metoda require_once() sprawdza, czy plik został już wcześniej wywołany, jeśli nie, to go wywoła';
                echo '<br/><br/>';
                require_once 'includetest.php';
                echo '<br/>';
                require_once 'requireonce.php';
                echo '<br/><br/>';

                echo 'Podpunkt b)';
                echo '<br/><br/>';
                echo 'Warunek if, sprawdza czy większe jest a czy b';
                echo '<br/><br/>';

                $a = 20;
                $b = 20;

                echo 'a jest równe '.$a;
                echo '<br/>';
                echo 'b jest równe '.$b;
                echo '<br/>';

                if ($a > $b)
                {
                    echo 'a jest większe od b';
                }
                else 
                {
                    echo 'b jest większe od a';
                }
                echo '<br/><br/>';
                echo 'Tutaj użyty został warunek elseif';
                echo '<br/><br/>';
                if ($a > $b)
                {
                    echo 'a jest większe od b';
                }
                elseif ($a == $b)
                {
                    echo 'a jest równe b';
                }
                else 
                {
                    echo 'b jest większe od a';
                }

                echo '<br/><br/>';
                echo 'Teraz został użyty warunek switch';
                echo '<br/><br/>';
                $c = 2;

                switch ($c)
                {
                    case 0:
                        echo 'c jest równe 0';
                        break;
                    case 1:
                        echo 'c jest równe 1';
                        break;
                    case 2:
                        echo 'c jest równe 2';
                        break;
                }

                echo '<br/><br/>';
                echo 'Podpunkt c)';
                echo '<br/><br/>';
                echo 'Pętla while - wyświetla liczby dopóki nie doliczy do 10';
                echo '<br/><br/>';
                $d = 0;
                while ($d <= 10)
                {
                    echo $d++;
                    echo '<br/>';
                }
                echo '<br/><br/>';
                echo 'Pętla for - wyświetla liczby dopóki nie doliczy do 10';
                echo '<br/><br/>';
                for ($d = 0; $d <= 10; $d++) {
                    echo $d.'<br/>';
                }
                echo '<br/><br/>';

                echo 'Podpunkt d)';

                echo '<br/><br/>';

                echo 'Formularz z metodą GET';
                echo "<form action='get.php' method='get'>";
                echo "Name: <input type='text' name='name'/><br>";
                echo "<input type='submit'/><br><br>";
                echo "</form>";

                echo '<br/><br/>';

                echo 'Formularz z metodą POST';
                echo "<form action='post.php' method='post'>";
                echo "Name: <input type='text' name='name'/><br>";
                echo "<input type='submit'/><br><br>";
                echo "</form>";

                echo '<br/><br/>';

                echo 'Zmienna SESSION';
                echo '<br/><br/>';
                $_SESSION["color"] = "czarny";
                $_SESSION["animal"] = "pies";
                echo "<a href='session.php'>Session</a>";
                echo '<br/><br/>';
            ?>
        </div>

    </body>
</html>