
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>

<form action="jednokrotnego.php" method="post">
    <fieldset>
        <label>Podaj pytanie:</label>
        <input type="text" name="pytanie" maxlength="100" required></br>
        <label>Podaj odpowiedz:</label>
        <input type="text" name="odpowiedz1" maxlength="100" required></br>
        <label>Podaj podpowiedz:</label>
        <input type="text" name="podpowiedz" maxlength="100" required></br>
        <label>Podaj pierwsza nieprawdziwa odpowiedz:</label>
        <input type="text" name="odp1" maxlength="100" required></br>
        <label>Podaj druga nieprawdziwa odpowiedz:</label>
        <input type="text" name="odp2" maxlength="100" required></br>
    </fieldset>
    <input type="submit" name="dodaj" value="dodaj">

</form>
</html>

<?php

$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['dodaj']))
{

    $rodzaj = $_COOKIE['rodzaj'];
            $pytanie= $_POST['pytanie'];
             $odpowiedz1= $_POST['odpowiedz1'];
        $podpowiedz= $_POST['podpowiedz'];
        $niep_odp1= $_POST['odp1'];
        $niep_odp2= $_POST['odp2'];



                $mysqli->query("INSERT INTO Pytania (`Id_quizu`,`rodzaj_pytania`, `pytanie`,`odpowiedz1`,`podpowiedz`,`nieprawidlowa_odp1`,`nieprawidlowa_odp2`)
                    VALUES ( '" .$_COOKIE['IDquizu'] . "','" .$rodzaj . "', '" . $pytanie . "', '" . $odpowiedz1 . "', '" . $podpowiedz . "', '" . $niep_odp1 . "', '" . $niep_odp2 . "');");

    $mysqli->close();
   header("Location: dodajPytania.php");



}

