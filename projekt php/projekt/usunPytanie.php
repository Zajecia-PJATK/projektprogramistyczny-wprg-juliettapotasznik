<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
$pom= $_SERVER['REQUEST_URI'];
$pattern ='/\?.*?\b(\d{1,3})(?:\D+(\d{1,3})(?:\D+(\d{1,3}))?)?/';
preg_match($pattern,$pom,$match);
$_SESSION['id_pytania']=$match[1];

    $mysqli->query('DELETE FROM Pytania WHERE id_pytania='."'{$_SESSION['id_pytania']}'");
    echo "pomyslenie usunieto pytanie </br>";
    echo '<a href="edytujQuiz.php">Powrót do edycji quizu.</a>';
    $mysqli->close();
