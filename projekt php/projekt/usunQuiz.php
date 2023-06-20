<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie quizu</title>
</head>
<body>
<form method="post" action="usunQuiz.php">
    <?php

        $mysqli = mysqli_connect("localhost", "root", "", "projekt");
          $quiz = $mysqli->query('SELECT nazwa_quizu,kategoria,poziom_trudnosci FROM Quizy where Id_quizu=' . "'{$_SESSION['id_quizu']} '");
   echo "Dane twojego quizu:";
    echo "<table border='1px'>";
    echo "<tr><th>Nazwa quizu</th><th>Kategoria</th><th>poziom trudnosci</th></tr>";
    if ($quiz->num_rows > 0) {
        while ($row = $quiz->fetch_assoc()) {
            echo "<tr>";
            echo " <td>{$row['nazwa_quizu']}</td>";
            echo "<th align='center'>{$row['kategoria']}</th>";
            echo "<th align='center'>{$row['poziom_trudnosci']}</th>";

            echo "</tr>";
        }
    }
    echo "</table>";
    ?>

    <br>
    <input type="submit" name="usun" value="Potwierdź usnięcie quizu"><br>
    <a href="projekt.php">Powrót do menu glownego</a>
</form>
<?php
if (isset($_POST['usun'])){

    $mysqli->query('DELETE FROM pytania WHERE id_quizu='."'{$_SESSION['id_quizu']}'");
    $mysqli->query('DELETE FROM quizy WHERE id_quizu='."'{$_SESSION['id_quizu']}'");
    echo "Quiz został usunięty.<br>";
}
$mysqli->close();
?>
</body>
</html>
