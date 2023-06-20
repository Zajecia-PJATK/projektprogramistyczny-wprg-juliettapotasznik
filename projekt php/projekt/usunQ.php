<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "projekt");

if (isset($_POST['TAK'])) {

    $mysqli->query('DELETE FROM pytania WHERE id_quizu=' . "'{$_SESSION['id-quizu']}'");
    $mysqli->query('DELETE FROM quizy WHERE id_quizu=' . "'{$_SESSION['id-quizu']}'");


    echo "quzi zostal usuniety";
    echo ' <a href="usunQuizyAdmin.php">Powrót do listy quziow</a>';


    $mysqli->close();
}