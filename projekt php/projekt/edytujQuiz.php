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
    if (isset($_SESSION['edytuj'])){
        $mysqli = mysqli_connect("localhost", "root", "", "projekt");
        $number = intval($_SESSION['edytuj']);

        $s = $mysqli->query('SELECT nazwa_quizu,kategoria,poziom_trudnosci FROM Quizy where nazwa_uzytkownika='."'{$_COOKIE['email']} '");
        while($row = mysqli_fetch_array($s))
        {
            $nazwy_quizow[]=$row['nazwa_quizu'];
            $kategoria[]=$row['kategoria'];
            $poziomTrudnosci[]=$row['poziom_trudnosci'];
        }
        $result=$mysqli->query('SELECT Id_quizu FROM Quizy WHERE nazwa_uzytkownika='."'{$_COOKIE['email']} '".'AND nazwa_quizu='."'{$nazwy_quizow[$number]} '");
        while ($row = $result->fetch_assoc()) {
            $id= $row['Id_quizu'];
        }
        $_SESSION['id']=$id;
        $sql=$mysqli->query('SELECT COUNT(*) FROM Pytania WHERE Id_quizu='."'$id '");
        while ($row = $sql->fetch_assoc()) {

            $iloscPytan= $row['COUNT(*)'];
        }
        if($iloscPytan==0)
        {
            echo "Brak pytań w tym quizie";
        }
        else {
            echo"<h5>Twoj quiz:</h5>";
            echo "<table border='1px'>";
            echo "<tr><th>Nazwa quizu</th><th>Kategoria</th><th>poziom trudnosci</th><th>edytuj</th></tr>";
            echo "<tr>";
                echo "<tr>";
                echo "<th align='center'>{$nazwy_quizow[$number]}</th>";
                 echo "<th align='center'>{$kategoria[$number]}</th>";
                 echo "<th align='center'>{$poziomTrudnosci[$number]}</th>";
            echo "<th align='center'><input type='submit' name='EdytowanieQuizu' value='edytuj'></th>";

                echo "</tr>";



            echo "</table><hr>";



            $wynik = $mysqli->query('SELECT rodzaj_pytania, pytanie FROM Pytania WHERE Id_quizu=' . "'$id '");
            while ($row = mysqli_fetch_array($wynik)) {
                $rodzaj[] = $row['rodzaj_pytania'];
                $pytanie[] = $row['pytanie'];
            }


            echo "Aby usunac lub edytowac pytanie zaznacz pytanie i kliknij odpowiedni przycisk";
            echo "<table border='1px'>";
            echo "<tr><th>Pytanie</th><th>Rodzaj pytania</th><th>usun</th><th>edytuj</th></tr>";
            echo "<tr>";
            for ($i = 0; $i < $iloscPytan; $i++) {
                echo "<tr>";

                echo "<td align='center'>{$pytanie[$i]}<input type='radio' value={$i} name='pytania'></td>";
                echo "<td align='center'>{$rodzaj[$i]}</td>";
                echo "<td align='center'><input type='submit' name='usun'  value='usun'></td>";
                echo "<td align='center'><input type='submit' name='edytuj' value='edytuj'></td>";
                echo "</tr>";
            }


            echo "</table>";
        }

    }else{
        echo "Błąd!<br>";
    }
    ?>

</form>
<br>
<a href="projekt.php">Powrót do menu głównego.</a>
</body>
</html>
<?php
if (isset($_POST['usun'])) {
    $_SESSION['usunPytanie'] = $_POST['pytania'];
    $liczba=intval($_SESSION['usunPytanie']);
    $mysqli->query('DELETE FROM Pytania WHERE pytanie='."'{$pytanie[$liczba]} '".'AND Id_quizu='."'$id '".'AND rodzaj_pytania='."'{$rodzaj[$liczba]}'");
    $mysqli->close();
} elseif (isset($_POST['edytuj'])) {
    $_SESSION['edytujPytanie'] = $_POST['pytania'];
    $liczba=intval($_SESSION['edytujPytanie']);

    $mysqli->query('DELETE FROM Pytania WHERE pytanie='."'{$pytanie[$liczba]} '".'AND Id_quizu='."'$id '".'AND rodzaj_pytania='."'{$rodzaj[$liczba]}'");
    $mysqli->close(); //tutaj zamieniac

}
elseif (isset($_POST['EdytowanieQuizu']))
{

    $mysqli->close();
}



