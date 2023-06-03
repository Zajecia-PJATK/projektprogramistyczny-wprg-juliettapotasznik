<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>


<form action="otwarte.php" method="post">
    <fieldset>
        <label>Podaj pytanie:</label>
        <input type="text" name="pytanie" maxlength="100" required></br>
        <label>Podaj podpowiedz:</label>
        <input type="text" name="podpowiedz" maxlength="100" required></br>
        <label>Podaj odpowiedz:</label>
        <input type="text" name="odpowiedz1" maxlength="100" required></br>

    </fieldset>
    <input type="submit" name="dodaj" value="dodaj">

</form>
</body>
</html>
<?php

$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['dodaj']))
{

    $rodzaj = $_COOKIE['rodzaj'];
    $pytanie= $_POST['pytanie'];
    $odpowiedz1= $_POST['odpowiedz1'];

    $podpowiedz= $_POST['podpowiedz'];



    $mysqli->query("INSERT INTO Pytania (`Id_quizu`,`rodzaj_pytania`, `pytanie`,`odpowiedz1`,`podpowiedz`)
                    VALUES ( '" .$_COOKIE['IDquizu'] . "','" . $rodzaj . "', '" . $pytanie . "', '" . $odpowiedz1 . "','" . $podpowiedz . "');");

    $mysqli->close();
    header("Location: dodajPytania.php");



}



