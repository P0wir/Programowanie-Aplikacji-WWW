<?php
function PokazPodstrone($id)
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza = '164421_moja_strona';

    // Utwórz połączenie z bazą danych
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $baza);

    // Sprawdź połączenie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Oczyszcz identyfikator strony przed SQL Injection
    $id_clear = $conn->real_escape_string($id);

    $query = "SELECT * FROM page_list WHERE id='$id_clear' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $web = $row['page_content'];
    } else {
        $web = '[nie_znaleziono_strony]';
    }

    // Zamknij połączenie z bazą danych
    $conn->close();

    return $web;
}

	?>

