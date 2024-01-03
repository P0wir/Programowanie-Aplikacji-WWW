<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo "Ulubiony kolor to: " . $_SESSION["color"] . ".<br>";
echo "Ulubione zwierze to: " . $_SESSION["animal"] . ".";
?>
<br>
Powrót do strony z kodem: <a href="index.php">Kod PHP</a>

</body>
</html>