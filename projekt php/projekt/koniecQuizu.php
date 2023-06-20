<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>QUIZ</title>
</head>
<h2 text align="center">Koniec quizu</h2>
<body>
<?php
$liczba=1;
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
$mysqli->query("UPDATE uzytkownicy SET liczba_punktow = " . 'liczba_punktow'.'+'."'{$_COOKIE['wynik']}'".'WHERE email=' . "'{$_COOKIE['email']}'");
    echo '<h3 text align="center">Twoj wynik to: ' . $_COOKIE['wynik'] . '</h3>';
$mysqli->query("UPDATE uzytkownicy SET rozegrane_quizy = ". 'rozegrane_quizy'.'+'."'$liczba'".'WHERE email=' . "'{$_COOKIE['email']}'");

?>
<br>
<a href="projekt.php">Powrót do menu glownego</a>

</body>

</html>
