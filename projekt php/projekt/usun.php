<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "projekt");

if (isset($_POST['TAK'])) {


    $mysqli->query('DELETE FROM uzytkownicy WHERE id=' . "'{$_SESSION['id-uzytkownika']}'");


    echo "Uzytkownik zostal usuniety";
    echo ' <a href="usunUzytkownikow.php">Powrót do listy uzytkownikow</a>';


    $mysqli->close();
}