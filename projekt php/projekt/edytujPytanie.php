<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytowanie Pytania</title>
</head>
<body>

<form action="dodajQuiz.php" method="post">

    <fieldset>
        <label>Zmień  kategorię:</label></br>
        <select name="kategoria" size="1"  required>
            <option name="filmy" value="filmy">filmy</option>
            <option name="seriale" value="seriale">seriale</option>
            <option name="geografia" value="geografia">geografia</option>
            <option name="wiedza" value="wiedza">wiedza ogolna</option>
        </select>
    </fieldset>
    <fieldset>
        <label>Zmienpoziom trudnosci quizu 1-10</label>
        <input type="number" name="poziomTrudnosci" value="1" min="1" max="10" required>
    </fieldset>

    <input type="submit" name="stworz" value="Stwórz">

</form>
</body>
</html>
