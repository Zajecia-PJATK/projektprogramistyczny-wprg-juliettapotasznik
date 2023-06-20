<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edytowanie quizow</title>
</head>
<body>
<h3>Edytowanie quizów</h3><br>
<br>

<form method="post" action="edytujQuiz.php">
    <?php

        $mysqli = mysqli_connect("localhost", "root", "", "projekt");


        $quiz = $mysqli->query('SELECT nazwa_quizu,kategoria,poziom_trudnosci FROM Quizy where Id_quizu=' . "'{$_SESSION['id_quizu']} '");

        $sql = $mysqli->query('SELECT COUNT(*) FROM Pytania WHERE Id_quizu=' . "'{$_SESSION['id_quizu']} '");
        while ($row = $sql->fetch_assoc()) {

            $iloscPytan = $row['COUNT(*)'];
        }
        if ($iloscPytan == 0) {
            echo "Brak pytań w tym quizie";
              echo "Twoj quiz:";

       echo "<table border='1px'>";
       echo "<tr><th>Nazwa quizu</th><th>Kategoria</th><th>poziom trudnosci</th><th>edytuj</th></tr>";
       if ($quiz->num_rows > 0) {
           while ($row = $quiz->fetch_assoc()) {
               echo "<tr>";
               echo " <td>{$row['nazwa_quizu']}</td>";
            echo "<th align='center'>{$row['kategoria']}</th>";
            echo "<th align='center'>{$row['poziom_trudnosci']}</th>";
            echo "<th align='center'><input type='submit' name='EdytowanieQuizu' value='edytuj'></th>";
               echo "</tr>";

           }
       }
       echo "</table>";



            echo "Aby dodać pytanie do twojego quizu klikjnij poniżej: </br>";
            echo "<input type='submit' name='dodajPytanie' value='Dodaj Pytanie'>";
}
        else{
            echo "Twoj quiz:";
       echo "<table border='1px'>";
       echo "<tr><th>Nazwa quizu</th><th>Kategoria</th><th>poziom trudnosci</th><th>edytuj</th></tr>";
       if ($quiz->num_rows > 0) {
           while ($row = $quiz->fetch_assoc()) {
               echo "<tr>";
               echo " <td>{$row['nazwa_quizu']}</td>";
            echo "<th align='center'>{$row['kategoria']}</th>";
            echo "<th align='center'>{$row['poziom_trudnosci']}</th>";
            echo "<th align='center'><input type='submit' name='edytuj' value='edytuj'></th>";
               echo "</tr>";

           }
       }
       echo "</table>";
       echo "<hr>";
            echo "Aby dodać pytanie do twojego quizu klikjnij poniżej: </br>";
            echo "<input type='submit' name='dodajPytanie' value='Dodaj Pytanie'>";
    echo "<hr>";
            ?>
            </form>
            <form action="usunPytanie.php" method="get">
                <?php
                $pytania= $mysqli->query('SELECT id_pytania,rodzaj_pytania, pytanie FROM Pytania WHERE Id_quizu=' . "'{$_SESSION['id_quizu']}'");

                echo "</br>";

                echo "Aby usunac pytanie kliknij w odpowiedni przycisk";
                echo "<table border='1px'>";
                    echo "<tr><th>Pytanie</th><th>Rodzaj pytania</th><th>usun</th></tr>";
                    if ($pytania->num_rows > 0) {
                    while ($row = $pytania->fetch_assoc()) {
                    echo "<tr>";

                        echo "<td align='center'>{$row['pytanie']}</td>";
                        echo "<td align='center'>{$row['rodzaj_pytania']}</td>";
                        echo "<td align='center'><input type='submit' name='{$row['id_pytania']}'  value='usun'></td>";

                        echo "</tr>";
                    }
                    }

                    echo "</table><hr>";

            echo"</form>";

    }

    ?>

</form>
<br>
<a href="projekt.php">Powrót do menu głównego.</a>
</body>
</html>
<?php

if (isset($_POST['EdytowanieQuizu']))
{
    header("Location: edytowanieWartosciWQuizie.php");

    $mysqli->close();
}
else if (isset($_POST['dodajPytanie']))
{
    include("dodajPytania.php");
    $mysqli->close();
}



