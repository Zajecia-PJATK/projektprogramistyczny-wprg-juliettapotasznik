<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Przegladanie quizow</title>
    </head>
<body>
    <h2>Przeglądaj quizy innych użytkowników</h2>

    <form action="przekierowaniev2.php" method="GET">
        <?php
        $wszystko = $mysqli->query('SELECT * FROM Quizy where nazwa_quizu LIKE '."'{$_SESSION['slowo']}'");

        echo "<h4>Naciśnij na wybrany tytuł i zacznij quiz!!</h4>";
        echo "<table border='1px'>";
        echo "<tr><th>nazwa użytkownika</th><th>kategoria</th><th>poziom trudności</th><th>nazwa quizu</th></tr>";
        if ($wszystko->num_rows > 0) {
            while ($row = $wszystko->fetch_assoc()) {
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
        ?>
    </form>
    <br>
    <a href="przegladajQuizy.php">Powrót do przegladania quizów.</a>
    </body>
    </html>

