<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie quizow-admin</title>
</head>
<body>
<form method="get" action="przekierowaniev4.php">
    <?php

    $mysqli = mysqli_connect("localhost", "root", "", "projekt");

    $pytanie = $mysqli->query('SELECT id_quizu, nazwa_uzytkownika,nazwa_quizu FROM quizy ');

    echo "<table border='1px'>";
    echo "<tr><th>ID</th><th>nazwa uzytkownika</th><th>nazwa quizu</th><th>usun</th></tr>";
    if ($pytanie->num_rows > 0) {
        while ($row = $pytanie->fetch_assoc()) {
            echo "<tr>";

            echo " <td>{$row['id_quizu']}</td>";
            echo " <td>{$row['nazwa_uzytkownika']}</td>";
            echo " <td>{$row['nazwa_quizu']}</td>";

            echo "<td style='text-align:center'><input type='submit' name='{$row["id_quizu"]}' value='usun' </td>";

            echo "</tr>";

        }
    }
    echo "</table>";

    $mysqli->close();
    ?>

    <br>
    <a href="projekt.php">Powrót do menu glownego</a>
</form>

</body>
</html>



