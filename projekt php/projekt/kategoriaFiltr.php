<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przegladanie quizow</title>
</head>
<body>

<form action="kategoriaFiltr.php" method="post">
    Wybierz kategorię:
    <fieldset>
        <select name="kategoria" size="1"  required>
            <option name="filmy" value="filmy">filmy</option>
            <option name="seriale" value="seriale">seriale</option>
            <option name="geografia" value="geografia">geografia</option>
            <option name="wiedza" value="wiedza">wiedza ogolna</option>
        </select>
    </fieldset>
    <input type="submit" name="wybierz" value="wybierz">
</form>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");

if(isset($_POST['wybierz']))
{

        $kategoria = $mysqli->query('SELECT * FROM Quizy where kategoria='."'{$_POST['kategoria']}'");
    echo "<form action='przekierowaniev2.php' method='get'>";
    echo "<h4>Naciśnij na wybrany tytuł i zacznij quiz!!</h4>";
    echo "<table border='1px'>";
    echo "<tr><th>nazwa użytkownika</th><th>kategoria</th><th>poziom trudności</th><th>nazwa quizu</th></tr>";
    if ($kategoria->num_rows > 0) {
        while ($row = $kategoria->fetch_assoc()) {
            echo "<tr>";

            echo " <td>{$row["nazwa_uzytkownika"]}</td>";
            echo "<td>{$row["kategoria"]}</td>";
            echo "<td>{$row["poziom_trudnosci"]} </td>";
            echo "<td style='text-align:center'><input type='submit' name='{$row["Id_quizu"]}' value='{$row["nazwa_quizu"]}' </td>";

            echo "</tr>";

        }
    }
    echo "</table>";
    echo "</form>";
    $mysqli->close();

}
?>
</form>
<br>
<a href="przegladajQuizy.php">Powrót do przegladania quizów.</a>
</body>
</html>

