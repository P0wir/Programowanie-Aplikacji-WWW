-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 22, 2023 at 10:01 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

CREATE TABLE tabela_uzytkownikow (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    haslo VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matka INT DEFAULT 0,
    nazwa VARCHAR(255) NOT NULL
);

CREATE TABLE products (
	id INT AUTO_INCREMENT PRIMARY KEY,
	tytul VARCHAR(255) NOT NULL,
	opis VARCHAR(255) NOT NULL,
	data_utworzenia DATE NOT NULL,
	data_modyfikacji DATE NOT NULL,
	data_wygasniecia DATE NOT NULL,
	cena_netto FLOAT NOT NULL,
	podatek_vat FLOAT NOT NULL,
	ilosc INT NOT NULL,
	status BOOL NOT NULL,
	kategoria INT NOT NULL,
	gabaryt FLOAT NOT NULL,
	zdjecie VARCHAR(255),
	FOREIGN KEY (kategoria) REFERENCES categories(id)
);



INSERT INTO tabela_uzytkownikow (id, email, haslo) VALUES (1, '164421@student.uwm.edu.pl', '12345678');

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'glowna', '<h1>Autor Koszykowki</h1><div id="opis">Koszykówka (lub piłka koszykowa) – dyscyplina sportu drużynowego (sport olimpijski), w której dwie pięcioosobowe drużyny grają przeciwko sobie próbując zdobyć jak największą liczbę punktów wrzucając piłkę do kosza drużyny przeciwnej. Za datę powstania koszykówki uznaje się 21 grudnia 1891 r., a za jej twórcę – Jamesa Naismitha.<figure><img id="james-naismith-img" src="obrazki/James-Naismith.png" alt="twórca_koszykówki"><figcaption>James Naismith</figcaption></figure></div>',1),
(2, 'historia', '<h1>historia</h1><div id="historia">Koszykówka powstała około grudnia 1891 roku w Springfield w stanie Massachusetts, gdy protestancki pastor i amerykański nauczyciel wychowania fizycznego (pochodzenia kanadyjskiego) w YMCA James Naismith opracował nową grę zespołową. W 1891 roku Rada Pedagogiczna w Springfield YMCA Sport College rozpisała konkurs na dyscyplinę sportu potrzebną do zachowania kondycji dzieci i młodzieży w czasie semestru zimowego. Naismith chciał stworzyć grę, która minimalizowałaby kontakt fizyczny, ale zawierała dużo skakania, biegania oraz koordynacji wzrokowo-ruchowej związanej z posiadaniem piłki w dłoniach[11]. Wygrał projekt dr. Jamesa Naismitha <br/><figure><img id="First-Basketball-img" src="obrazki/Firstbasketball.jpg" alt="pierwsze_boisko"><figcaption>Pierwsze boisko do koszykówki</figcaption></figure><figure><img id="szkic-img" src="obrazki/szkic.jpg" alt="wizja_koszykowki"></figure>Gra polegała na rzucaniu piłki do wiklinowych koszy zawieszonych na balkonach sali gimnastycznej. Kosze te nie miały dziury na ich dnie, więc po każdym celnym rzucie piłkę należało wyciągać specjalnymi kijami. Początkowo do gry w koszykówkę używano zwykłej piłki futbolowej. Pierwsza piłka przeznaczona wyłącznie do koszykówki powstała w 1894 roku. Naismith stworzył podstawowe zasady gry w koszykówkę:<ul style="list-style-type:circle"><li>Okrągłą piłką należało grać wyłącznie przy użyciu rąk. Piłka powinna być duża, lekka i możliwa do trzymania w dłoniach.</li><li>Trzymając piłkę, nie wolno było się z nią przemieszczać – należało ją podawać.</li><li>Zawodnicy mieli prawo znajdować się w dowolnym miejscu boiska.</li><li>Nie wolno było stosować przemocy fizycznej między zawodnikami.</li><li>Niewielka bramka w formie kosza powinna być umieszczona poziomo, wysoko w górze.</li></ul></div>', 1),
(3, 'historiapl','<h1>Historia koszykówki w Polsce</h1><div id="historiapl"><figure><img id="flaga" src="obrazki/flaga.png" alt="flaga_polski"></figure>Na ziemiach polskich pierwszy mecz koszykówki został rozegrany przez kobiety. Miało to miejsce 29 czerwca 1909 roku we Lwowie – w zawodach odbywających się na trawiastym boisku z koszami bez tablic, zagrało sześć zespołów gimnazjalnych. Po odzyskaniu przez Polskę niepodległości, koszykówka stała się sportem powszechnie nauczanym w szkołach podstawowych i średnich. W styczniu 1919 odbył się pierwszy centralny turniej koszykówki mężczyzn. W kolejnych latach (aż do 1928) organizowano w Polsce bardzo wiele zawodów koszykówki zarówno męskiej, jak i kobiecej, rozgrywanych przez drużyny szkół średnich. Pierwsze oficjalne Mistrzostwa Polski miały miejsce we wrześniu roku 1929 w Krakowie. Mistrzostwa te dotyczyły koszykówki mężczyzn oraz kobiet. Według innych źródeł, pierwsze mistrzostwa Polski w koszykówce odbyły się w 1928 roku, natomiast w koszykówce kobiet w 1929 roku. Pierwszy międzynarodowy mecz koszykówki w którym brała udział Polska, rozegrały kobiety. Ten mecz między Polską a Szwecją rozegrany został w czerwcu 1930 w Krakowie. Polki wygrały 30:13. Pierwszy międzynarodowy mecz koszykówki mężczyzn Polska rozegrała z Estonią. Spotkanie to miało miejsce w Tallinnie w lutym 1935 roku. W tym samym roku reprezentacja kobiet zdobyła złoty medal na Akademickich Mistrzostwach Świata w Budapeszcie. W 1936 koszykówka stała się sportem olimpijskim. Polska zajęła wtedy IV miejsce i było to najwyższe miejsce wśród państw europejskich. W 1938 roku w Rzymie miały miejsce pierwsze oficjalne Mistrzostwa Europy w koszykówce kobiet – Polska zajęła III miejsce[21].<figure><img src="obrazki/meczpl.jpg" alt="meczpl"></figure></div>', 1),
(4, 'reguly', '<h1>reguły gry w koszykówkę</h1><div id="reguly"><figure><img id="mecz" src="obrazki/mecz.jpg" alt="mecz_koszykarski"></figure><h1>Mecz</h1>W meczu grają ze sobą dwie drużyny, mające po 5 zawodników na boisku. Zwycięża drużyna, która uzyska większą liczbę punktów na koniec meczu. Możliwe jest również rozegranie dwumeczu z łączoną punktacją. <br/>Mecz składa się z czterech 10-minutowych kwart. Jeśli wynik jest nierozstrzygnięty (remis), rozgrywa się tyle 5-minutowych dogrywek, ile będzie konieczne do ustalenia wyniku meczu. <br/><h1>Przerwy</h1>Podczas meczu występują następujące przerwy: <br/><ul style="list-style-type:circle"><li>20-minutowa przerwa przed rozpoczęciem meczu.</li><li>2-minutowe przerwy między 1 i 2 kwartą, 3 i 4 kwartą, oraz między dogrywkami.</li><li>15-minutowa przerwa między 2 i 3 kwartą.</li></ul><h1>Boisko do koszykówki</h1><h2>Elementy boiska:</h2><ul style="list-style-type:circle"><li>back court</li><li>kosz</li><li>koło</li><li>koło środkowe</li><li>linia rzutów za 3 punkty</li><li>linia środkowa boiska</li><li>linia wprowadzenia</li><li>obszar ograniczony</li><li>półkole podkoszowe</li><li>półkole rzutów wolnych</li><li>strefa ławek drużyn</li></ul><figure><img id="court" src="obrazki/court.png" alt="boisko_do_koszykowki"></figure> <br/><h2>Wyposażenie:</h2><ul style="list-style-type:circle"><li>konstrukcja do koszykówki</li><li>obręcz kosza</li><li>obręcz uchylna</li><li>piłka do koszykówki</li><li>protokół meczu FIBA</li><li>stolik sędziowski</li><li>strzałka naprzemiennego posiadania piłki</li><li>tablica</li><li>tablica wyników</li><li>wskaźnik fauli drużyny</li><li>wskaźniki fauli zawodnika</li><li>zegar czasu gry</li></ul><figure><img id="pilka" src="obrazki/pilka.png" alt="pilka"><figcaption>typowa piłka uzywana w koszykowce</figcaption></figure><h2>Druzyna:</h2>Drużyna składa się z:<ul style="list-style-type:circle"><li>co najwyżej 12 zawodników</li><li>trenera i asystenta trenera</li><li>co najwyżej 7 osób towarzyszących</li><li>W trakcie meczu członek drużyny może być:<ul style="list-style-type:square"><li>zawodnikiem</li><li>zmiennikiem</li><li>zawodnikiem wykluczonym</li></ul></li></ul><figure><img id="team" src="obrazki/team-usa.jpg" alt="team_usa"><figcaption>druzyna USA z 1992</figcaption></figure><h3>Dopuszczalne numery strojów to 0, 00 oraz liczby od 1 do 99.</h3><figure><img id="jersey" src="obrazki/doublezero.jpg" alt="koszulka_podwojne_zero"><figcaption>koszulka z 00</figcaption></figure><h2>Rzut sędziowski</h2>Rzut sędziowski to sytuacja, w której sędzia podrzuca piłkę w kole środkowym boiska, pomiędzy dwoma zawodnikami, na rozpoczęcie pierwszej kwarty meczu. Piłka musi zostać zbita przez co najmniej jednego z zawodników po tym, jak osiągnie najwyższy punkt wznoszenia. Żaden ze skaczących zawodników nie może jej dotknąć więcej niż dwa razy lub chwycić.<h2>Sytuacja rzutu sędziowskiego następuje, gdy:</h2><ul style="list-style-type:circle"><li>obie drużyny popełnią błąd podczas ostatniego rzutu wolnego</li><li>sędziowie mają wątpliwości, która drużyna jako ostatnia dotknęła piłkę, w sytuacji wybicia jej na aut</li><li>piłka jest przetrzymana</li><li>piłka utknie na koszu</li><li>żadna z drużyn nie ma prawa do posiadania piłki, gdy piłka staje się martwa</li><li>w wyniku sytuacji specjalnej po skasowaniu kar, gdy przed popełnieniem pierwszego naruszenia przepisów żadna z drużyn nie posiadała piłki ani nie miała prawa do jej posiadania</li><li>rozpoczyna się kolejna kwarta (oprócz pierwszej).</li></ul><figure><img id="rzut" src="obrazki/rzut_sedziowski.jpg" alt="rzut_sedziowski"><figcaption>rzut sedziowski</figcaption></figure></div>', 1),
(5, 'pozycje', '<h1>pozycje w koszykówce</h1><div id="pozycje"><h1>w koszykówce istnieje 5 pozycji</h1><ul style="list-style-type:circle"><li>Rozgrywający (Point Guard)</li><li>Rzucający obrońca (Shooting Guard)</li><li>Niski skrzydłowy (Small Forward)</li><li>Silny skrzydłowy (Power Forward)</li><li>Środkowy (Center)</li></ul><figure><img id="pozycje" src="obrazki/pozycje-w-koszykowce.jpg" alt="pozycje_w_koszykowce"><figcaption>pozycje w koszykowce</figcaption></figure></div>', 1),
(6, 'roznice', '<h1>różnice w różnych federacjach koszykówki</h1><div id="roznice"><figure><img src="obrazki/wymiary.png" alt="wymiary"><figcaption>wymiary boiska w roznych federacjach</figcaption></figure><figure><img src="obrazki/trumna.png" alt="trumna"><figcaption>obszar ograniczony w roznych federacjach</figcaption></figure></div>', 1),
(7, 'kontakt', '<h1>kontakt</h1><div id="mail"><a href="mailto:123456@gmail.com"><img id="koperta" src="obrazki/3178158.png" alt="email icon"></a><form action="123456@gmail.com" method="post"><input name="Imię" placeholder="Podaj swoje imię"><br/><input name="mail" placeholder="Podaj swoj adres e-mail"><br/><input name="wiadomosc" placeholder="napisz wiadomość"><br/><input type="submit" value="Wyślij formularz"><input type="reset" value="Wyczyść dane"></form></div>', 1),
(8, 'skrypty', '<title>skrypty</title><form method="POST" name="background"><input type="button" value="żółty" onclick="changeBackground(\'#FFF000\')"><input type="button" value="czarny" onclick="changeBackground(\'#000000\')"><input type="button" value="biały" onclick="changeBackground(\'#FFFFFF\')"><input type="button" value="zielony" onclick="changeBackground(\'#00FF00\')"><input type="button" value="niebieski" onclick="changeBackground(\'#0000FF\')"><input type="button" value="pomarańczowy" onclick="changeBackground(\'#FF8000\')"><input type="button" value="szary" onclick="changeBackground(\'#c0c0c0\')"><input type="button" value="czerwony" onclick="changeBackground(\'#FF00000\')"></form>', 1),
(9, 'filmy', '<h1>Filmy o koszykówce</h1><div id="filmy"><iframe width="560" height="315" src="https://www.youtube.com/embed/at0ndNFp4mI" frameborder="0" allowfullscreen></iframe><iframe width="560" height="315" src="https://www.youtube.com/embed/4lRJepOnh1k" frameborder="0" allowfullscreen></iframe><iframe width="560" height="315" src="https://www.youtube.com/embed/wYjp2zoqQrs" frameborder="0" allowfullscreen></iframe></div>', 1);
COMMIT;

INSERT INTO categories (matka, nazwa) VALUES
    (0, 'Ubrania'),
    (1, 'T-shirty'),
    (1, 'Bluzy'),
    (0, 'Akcesoria'),
    (4, 'Czapki'),
    (4, 'Plecaki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO products (
    tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia,
    cena_netto, podatek_vat, ilosc, status, kategoria, gabaryt, zdjecie
) VALUES
    ('T-shirt XL', 'Opis T-shirta XL', '2024-01-03', '2024-01-03', '2024-02-03',
     29.99, 0.23, 100, 1, 2, 0.5, NULL),
    ('Czapka zimowa', 'Opis zimowej czapki', '2024-01-03', '2024-01-03', '2024-02-03',
     19.99, 0.23, 50, 1, 5, 0.2, '../obrazki/czapka.png');
