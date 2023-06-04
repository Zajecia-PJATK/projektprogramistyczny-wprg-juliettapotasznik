<?php
session_start()
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
<h1>Edytuj wartosci quizu</h1>

<form action="edytowanieWartosciWQuizie.php" method="post">
    <fieldset>
        <label>Podaj nową nazwe (max 20 znakow)</label>
        <input type="text" name="nazwa" maxlength="20" required>
    </fieldset>
    <fieldset>
        <label>Wybierz nową kategorie:</label></br>
        <select name="kategoria" size="1"  required>
            <option name="filmy" value="filmy">filmy</option>
            <option name="seriale" value="seriale">seriale</option>
            <option name="geografia" value="geografia">geografia</option>
            <option name="wiedza" value="wiedza">wiedza ogolna</option>
        </select>
    </fieldset>
    <fieldset>
        <label>Podaj nowy poziom trudnosci quizu 1-10</label>
        <input type="number" name="poziomTrudnosci" value="1" min="1" max="10" required>
    </fieldset>

    <input type="submit" name="edytujWartosci" value="Zmien"></br>
    <a href="edytujQuiz.php">Powrót do edycji quizu.</a>
</form>
</body>
</html>
<?php
if(isset($_POST['edytujWartosci']))
{
    $mysqli = mysqli_connect("localhost", "root", "", "projekt");
$mysqli->query('UPDATE quizy SET kategoria='."'{$_POST['kategoria']}'".', poziom_trudnosci='."'{$_POST['poziomTrudnosci']}'".', nazwa_quizu='."'{$_POST['nazwa']}'".' WHERE Id_quizu='."'{$_SESSION['id']}'");
    $mysqli->close();
    header('Location: edytujQuiz.php');
}

