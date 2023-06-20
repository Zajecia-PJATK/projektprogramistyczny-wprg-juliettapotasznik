<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie uzytkownikow-admin</title>
</head>
<body>
<form method="get" action="przekierowaniev3.php">
    <?php

        $mysqli = mysqli_connect("localhost", "root", "", "projekt");

        $pytanie = $mysqli->query('SELECT id, email FROM uzytkownicy ');

    echo "<table border='1px'>";
    echo "<tr><th>Uzytkownicy</th><th>usun</th></tr>";
    if ($pytanie->num_rows > 0) {
        while ($row = $pytanie->fetch_assoc()) {
            echo "<tr>";

            echo " <td>{$row['email']}</td>";

            echo "<td style='text-align:center'><input type='submit' name='{$row["id"]}' value='usun' </td>";

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


