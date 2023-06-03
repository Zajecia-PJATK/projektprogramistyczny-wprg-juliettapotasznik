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
    if (isset($_SESSION['usun'])){
        $mysqli = mysqli_connect("localhost", "root", "", "projekt");
        $number = intval($_SESSION['usun']);
        $pytanie = $mysqli->query('SELECT nazwa_quizu FROM Quizy where nazwa_uzytkownika='."'{$_COOKIE['email']} '");
        while($row = mysqli_fetch_array($pytanie))
        {
            $nazwy_quizow[]=$row['nazwa_quizu'];
        }



        echo "<h4>Dane usuwanego quizu:</h4><br>";
        echo "<table border='1px'>";
        echo "<tr><th>Nazwa</th></tr>";
        echo "<tr>";

        echo "<td>{$nazwy_quizow[$number]}</td>";
        echo "</tr>";
        echo "</table>";
    }else{
        echo "Błąd!<br>";
    }
    ?>

    <br>
    <input type="submit" name="delete" value="Potwierdź usnięcie quizu"><br>
    <a href="projekt.php">Powrót do menu glownego</a>
</form>
<?php
if (isset($_POST['delete'])){
    $_SESSION['usunPytanie'] = $_POST['pytania'];
    $liczba=intval($_SESSION['usunPytanie']);
    $mysqli->query('DELETE FROM Pytania WHERE pytanie='."'{$pytanie[$liczba]} '".'AND Id_quizu='."'$id '".'AND rodzaj_pytania='."'{$rodzaj[$liczba]}'");
    echo "Quiz został usunięty.<br>";
}
$mysqli->close();
?>
</body>
</html>
