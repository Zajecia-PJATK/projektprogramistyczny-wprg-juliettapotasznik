
<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
$pyt= $mysqli->query('SELECT isAdmin FROM uzytkownicy WHERE email=' . "'{$_COOKIE['email']} '");
                while($row=$pyt->fetch_assoc())
                {
                    $isAdmin=$row['isAdmin'];
                }
                if($isAdmin==0) {



?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
<h1>Aplikacja Quiz</h1>
<?php
echo "<h4>Witaj {$_COOKIE['email']}</h4> ";

?>
<h3 text align="right">Ranking wszystkich uzytkownikow:</h3>
<?php
$ranking= $mysqli->query('SELECT email,liczba_punktow,rozegrane_quizy FROM uzytkownicy order by liczba_punktow DESC ');

echo "<table text align='right' border='1px'>";
echo "<tr><th>Nazwa uzytkownika</th><th>liczba punktow</th><th>Rozegrane quizy</th></tr>";
if ($ranking->num_rows > 0) {
    while ($row = $ranking->fetch_assoc()) {
        echo "<tr>";
        echo " <td>{$row['email']}</td>";
        echo " <td>{$row['liczba_punktow']}</td>";
        echo " <td>{$row['rozegrane_quizy']}</td>";


        echo "</tr>";

    }
}
echo "</table>";

?>
<form method="get" action="przekierowanie.php">
    <?php

    $sql=$mysqli->query('SELECT COUNT(*) FROM Quizy WHERE nazwa_uzytkownika='."'{$_COOKIE['email']} '");
    while ($row = $sql->fetch_assoc()) {
        $iloscQuizow = $row['COUNT(*)'];
    }
   if ($iloscQuizow == 0) {
        echo "<p>Brak quizów</p>";
    }else {
        echo "<h4>Twoje quizy:</h4>";
        echo "Aby usunac lub edytowac quiz zaznacz nazwę i kliknij odpowiedni przycisk";

       $pytanie = $mysqli->query('SELECT nazwa_quizu , Id_quizu FROM Quizy where nazwa_uzytkownika=' . "'{$_COOKIE['email']} '");

       echo "<table border='1px'>";
       echo "<tr><th>Nazwa quizu</th><th>usun</th><th>edytuj</th></tr>";
       if ($pytanie->num_rows > 0) {
           while ($row = $pytanie->fetch_assoc()) {
               echo "<tr>";
               echo " <td>{$row['nazwa_quizu']}</td>";
               echo "<td style='text-align:center'><input type='submit' name='{$row["Id_quizu"]}' value='usun' </td>";
               echo "<td style='text-align:center'><input type='submit' name='{$row["Id_quizu"]}' value='edytuj' </td>";

               echo "</tr>";

           }
       }
       echo "</table>";


   }
    $mysqli->close();
    ?>
</form>
        <hr>
        Opcje:<ul>
            <li><a href="dodajQuiz.php">Dodaj quiz</a></li>
        <li><a href="przegladajQuizy.php">Przeglądaj lub wyszukaj quizów</a></li>
        <li><a href="edytujProfil.php">Edytuj swoj profil</a></li>
        </ul>
<hr>
<form action="projekt.php" method="post">
    <input type="submit" name="wyloguj" value="wyloguj">

</form>

</body>
</html>
<?php
}
else
{
    ?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
<h1>ADMIN</h1>
<?php
echo "<h4>Witaj adminie {$_COOKIE['email']}</h4> ";
?>
<hr>
Opcje Admina:<ul>
    <li><a href="usunUzytkownikow.php">Usun uzytkownikow</a></li>
    <li><a href="usunQuizyAdmin.php">Usun quizy</a></li>

</ul>
<form action="projekt.php" method="post">
    <input type="submit" name="wyloguj" value="wyloguj">

</form>


</body>
</html>
<?php
}
if(isset($_POST['wyloguj']))
{
    header("Location: projektLogowanieRejestracja.html");
}
