<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>


<form action="wielokrotnego.php" method="post">
    <fieldset>
        <label>Podaj pytanie:</label>
        <input type="text" name="pytanie" maxlength="100" required></br>
        <label>Podaj pierwsza odpowiedz:</label>
        <input type="text" name="odpowiedz1" maxlength="100" required></br>
        <label>Podaj druga odpowiedz:</label>
        <input type="text" name="odpowiedz2" maxlength="100" required></br>
        <label>Podaj trzecią odpowiedz:</label>
        <input type="text" name="odpowiedz3" maxlength="100" required></br>
        <label>Podaj podpowiedz:</label>
        <input type="text" name="podpowiedz" maxlength="100" required></br>
        <label>Podaj pierwsza nieprawdziwa odpowiedz:</label>
        <input type="text" name="odp1" maxlength="100" required></br>
        <label>Podaj druga nieprawdziwa odpowiedz:</label>
        <input type="text" name="odp2" maxlength="100" required></br>
        <label>Podaj trzecią nieprawdziwa odpowiedz:</label>
        <input type="text" name="odp3" maxlength="100" required></br>
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
    $odpowiedz2= $_POST['odpowiedz2'];
    $odpowiedz3= $_POST['odpowiedz3'];
    $podpowiedz= $_POST['podpowiedz'];
    $niep_odp1= $_POST['odp1'];
    $niep_odp2= $_POST['odp2'];
    $niep_odp3= $_POST['odp3'];



    $mysqli->query("INSERT INTO Pytania (`Id_quizu`,`rodzaj_pytania`, `pytanie`,`odpowiedz1`,`odpowiedz2`,`odpowiedz3`,`podpowiedz`,`nieprawidlowa_odp1`,`nieprawidlowa_odp2`,`nieprawidlowa_odp3`)
                    VALUES ( '" .$_COOKIE['IDquizu'] . "','" . $rodzaj . "', '" . $pytanie . "', '" . $odpowiedz1 . "', '" . $odpowiedz2 . "', '" . $odpowiedz3 . "', '" . $podpowiedz . "', '" . $niep_odp1 . "', '" . $niep_odp2 . "', '" . $niep_odp3 . "');");

    $mysqli->close();
    header("Location: dodajPytania.php");



}


