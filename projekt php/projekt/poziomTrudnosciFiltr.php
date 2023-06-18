<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przegladanie quizow</title>
</head>
<body>
<h2>Przeglądaj quizy innych użytkowników</h2>
<form action="poziomTrudnosciFiltr.php" method="post">
    Wybierz poziom trudnosci:
    <fieldset>
        <input type="number" name="poziomTrudnosci" value="1" min="1" max="10" required>
    </fieldset>
    <input type="submit" name="wybierz" value="wybierz">
</form>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");

if(isset($_POST['wybierz']))
{
    $poziomTrudnosci = $mysqli->query('SELECT * FROM Quizy where poziom_trudnosci='."{$_POST['poziomTrudnosci']}");

    echo "<form action='przekierowaniev2.php' method='get'>";


    echo "<h4>Naciśnij na wybrany tytuł i zacznij quiz!!</h4>";
    echo "<table border='1px'>";
    echo "<tr><th>nazwa użytkownika</th><th>kategoria</th><th>poziom trudności</th><th>nazwa quizu</th></tr>";
    if ($poziomTrudnosci->num_rows > 0) {
        while ($row = $poziomTrudnosci->fetch_assoc()) {
            echo "<tr>";

            echo " <td>{$row["nazwa_uzytkownika"]}</td>";
            echo "<td>{$row["kategoria"]}</td>";
            echo "<td>{$row["poziom_trudnosci"]} </td>";
            echo "<td style='text-align:center'><input type='submit' name='{$row["Id_quizu"]}' value='{$row["nazwa_quizu"]}' </td>";

            echo "</tr>";

        }
    }
    echo "</table>";
    $mysqli->close();

}
?>
<br>
<a href="przegladajQuizy.php">Powrót do przegladania quizów.</a>
</body>
</html>

