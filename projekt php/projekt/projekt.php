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
<form method="post" action="przekierowanie.php">
    <?php
    $mysqli = mysqli_connect("localhost", "root", "", "projekt");
    $sql=$mysqli->query('SELECT COUNT(*) FROM Quizy WHERE nazwa_uzytkownika='."'{$_COOKIE['email']} '");
    while ($row = $sql->fetch_assoc()) {
        $iloscQuizow = $row['COUNT(*)'];
    }
    if ($iloscQuizow == 0) {
        echo "<p>Brak quizów</p>";
    }else {
        echo "<h4>Twoje quizy:</h4>";
        echo "Aby usunac lub edytowac quiz zaznacz nazwę i kliknij odpowiedni przycisk";
        echo "<table border='1px'>";
        echo "<tr><th>Nazwa quizu</th><th colspan='2' align='center'>Usuń | Edytuj</th></tr>";

        $pytanie = $mysqli->query('SELECT nazwa_quizu FROM Quizy where nazwa_uzytkownika='."'{$_COOKIE['email']} '");
        while($row = mysqli_fetch_array($pytanie))
        {
            $nazwy_quizow[]=$row['nazwa_quizu'];

        }

        for ($i = 0; $i < $iloscQuizow; $i ++) {

            echo "<tr>";

            echo "<td  align='center'>{$nazwy_quizow[$i]}<input type='radio' value={$i} name='nazwy'></td>";


            echo "<td align='center'><input type='submit' name='usun'  value='usun'></td>";
            echo "<td align='center'><input type='submit' name='edytuj' value='edytuj'></td>";
            echo "</tr>";
        }

        echo "</table>";

    }
    $mysqli->close();
    ?>
        <hr>
        Opcje:<ul>
            <li><a href="dodajQuiz.php">Dodaj quiz</a></li>
        <li><a href="przegladajQuizy.php">Przeglądaj lub wyszukaj quizów</a></li>



        </ul>

</body>
</html>