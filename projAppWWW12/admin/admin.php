<link rel="stylesheet" href="../style.css">
<?php
require_once "logowanie.php";
require "../cfg.php";
//funkcja pokazujaca liste podstron
function ListaPodstron($link)
{
    if (!isset($_SESSION["status"]) || $_SESSION["status"] == 1) {
        $query = "SELECT * FROM page_list ORDER BY id ASC";
        $result = mysqli_query($link, $query);

        echo '<div class="lista_podstron">';

        while ($row = mysqli_fetch_array($result)) {
            echo $row["id"] . " " . $row["page_title"] . "<br/>";
        }

        echo "</div>";
    }
}
//funkcja wyswietlajaca formularz edycji strony
function FormularzEdycji()
{
    $edit =
        '
    <div class="edycja">
        <h1 class="heading">Edycja:</h1>
        <div class="edycja">
            <form method="post" name="EditForm" enctype="multipart/form-data" action="' .
        $_SERVER["REQUEST_URI"] .
        '">
                <table class="edycja">
                    <tr><td class="edit_4t">[id_strony_edytowanej]</td><td><input type="text" name="id_strony" class="edycja" /></td></tr>
                    <tr><td class="edit_4t">[tytul]</td><td><input type="text" name="page_title" class="edycja" /></td></tr>
                    <tr><td class="edit_4t">[tresc strony]</td><td><input type="text" name="page_content" class="edycja" /></td></tr>
                    <tr><td class="edit_4t">[czy_aktywna]</td><td><input type="checkbox" name="status" class="edycja" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x2_submit" class="edycja" value="zmien" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $edit;
}
//funcja obslugujaca formularz edycji strony
function EdytujPodstrone()
{
    global $link;

    if (isset($_POST["x2_submit"])) {
        $id = $_POST["id_strony"];
        $tytul = $_POST["page_title"];
        $tresc = mysqli_real_escape_string($link, $_POST["page_content"]);
        $status = isset($_POST["status"]) ? 1 : 0;

        if (!empty($id)) {
            $query = "UPDATE page_list SET page_title = '$tytul', page_content = '$tresc', status = $status WHERE id = $id LIMIT 1";

            $result = mysqli_query($link, $query);

            if ($result) {
                echo "Edycja zakończona pomyślnie!";
                header("Location: admin.php");
                exit();
            } else {
                echo "Błąd podczas edycji: " . mysqli_error($link);
            }
        }
    }
}
//funkcja wyswietlajaca formularz dodawania podstrony
function FormularzDodawania()
{
    $add =
        '
    <div class="dodaj">
        <h1 class="heading">Dodaj Strone:</h1>
        <div class="dodaj">
            <form method="post" name="AddForm" enctype="multipart/form-data" action="' .
        $_SERVER["REQUEST_URI"] .
        '">
                <table class="dodaj">
                    <tr><td class="add_4t">[tytul]</td><td><input type="text" name="page_title_add" class="dodaj" /></td></tr>
                    <tr><td class="add_4t">[tresc strony]</td><td><input type="text" name="page_content_add" class="dodaj" /></td></tr>
                    <tr><td class="add_4t">[czy_aktywna]</td><td><input type="checkbox" name="status_add" class="dodaj" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x3_submit" class="dodaj" value="dodaj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $add;
}
//funkcja obslugujaca formularz dodawania podstrony
function DodajNowaPodstrone()
{
    global $link;
    if (isset($_POST["x3_submit"])) {
        $tytul = $_POST["page_title_add"];
        $tresc = $_POST["page_content_add"];
        $status = isset($_POST["status_add"]) ? 1 : 0;

        $query = "INSERT INTO page_list (page_title, page_content, status) VALUES ('$tytul', '$tresc', $status)";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "Pomyślnie dodano podstronę!";
            header("Location: admin.php");
            exit();
        } else {
            echo "Błąd podczas dodawania podstrony: " . mysqli_error($link);
        }
    }
}
//funkcja wyswietlajaca formularz usuwania podstrony
function FormularzUsuwania()
{
    $remove =
        '
    <div class="usun">
        <h1 class="heading">Usun Strone:</h1>
        <div class="usun">
            <form method="post" name="DeleteForm" enctype="multipart/form-data" action="' .
        $_SERVER["REQUEST_URI"] .
        '">
                <table class="usun">
                    <tr><td class="rem_4t">[id]</td><td><input type="text" name="id_remove" class="usun" /></td></tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x4_submit" class="usun" value="usun" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    return $remove;
}
//funkcja obslugujaca formularz usuwania podstrony
function UsunPodstrone()
{
    global $link;
    if (isset($_POST["x4_submit"])) {
        $id = $_POST["id_remove"];

        $query = "DELETE FROM page_list WHERE id = $id LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result) {
            echo "Pomyślnie usunięto podstronę!";
            echo "<script>window.location.href='admin.php';</script>";
            exit();
        } else {
            echo "Błąd podczas usuwania podstrony: " . mysqli_error($link);
        }
    }
}
//jesli uzytkownik nie jest zalogowany to wyswietlamy formularz logowania
if (isset($_SESSION["status"]) && $_SESSION["status"] == 1) {
    echo " ";
} else {
    echo FormularzLogowania();
    Logowanie($link);
}
//wyswietlam panel CMS
if (isset($_SESSION["status"]) && $_SESSION["status"] == 1) {
	echo '<div id="menu">';
	echo '<a href="wyslij.php" class="kontakt-link">Kontakt</a>';
	echo '<a href="category.php" class="category-edit">edycja kategorii</a>';
	echo '<a href="products.php" class="product-edit">edycja produktow</a>';
	echo '<a href="../index.php" class="strona-powrot">strona glowna</a>';
	echo '</div>';
    ListaPodstron($link);
    echo FormularzEdycji();
    EdytujPodstrone();
    echo FormularzDodawania();
    DodajNowaPodstrone();
    echo FormularzUsuwania();
    UsunPodstrone();
}

?>
