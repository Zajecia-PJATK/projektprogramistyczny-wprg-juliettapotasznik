<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
<h1>Dodaj swój Quiz</h1>

<form action="dodajQuiz.php" method="post">
    <fieldset>
        <label>Podaj nazwe (max 20 znakow)</label>
        <input type="text" name="nazwa" maxlength="20" required>
    </fieldset>
<fieldset>
    <label>Wybierz kategorie:</label></br>
    <select name="kategoria" size="1"  required>
        <option name="filmy" value="filmy">filmy</option>
        <option name="seriale" value="seriale">seriale</option>
        <option name="geografia" value="geografia">geografia</option>
        <option name="wiedza" value="wiedza">wiedza ogolna</option>
    </select>
</fieldset>
    <fieldset>
        <label>Podaj poziom trudnosci quizu 1-10</label>
        <input type="number" name="poziomTrudnosci" value="1" min="1" max="10" required>
    </fieldset>

        <input type="submit" name="stworz" value="Stwórz">

</form>
</body>
</html>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");


if (isset($_POST['stworz']))
{
    $nazwa=$_POST['nazwa'];
    $kategoria=$_POST['kategoria'];
    $poziomTrudnosci=$_POST['poziomTrudnosci'];


        $mysqli->query("INSERT INTO quizy (`nazwa_uzytkownika`, `kategoria`,`poziom_trudnosci`,`nazwa_quizu`)
                    VALUES ('".$_COOKIE['email']."', '".$kategoria."', '".$poziomTrudnosci."', '".$nazwa."');");


        include ("dodajPytania.php");


    $mysqli->close();
}
?>
