<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przegladanie quizow</title>
</head>
<body>

<h2>Przeglądaj quizy innych użytkowników</h2>
<form action="przegladajQuizy.php" method="post">
    Wybierz filtr:
    <fieldset>
       <select name="filtry" size="1" required>
           <option name="Kategoria">Kategoria</option>
           <option name="PoziomTrudnosci" >Poziom Trudności</option>
           <option name="Wszystkie" >Wszystkie</option>
       </select>
    </fieldset>
    <input type="submit" name="przegladaj" value="przegladaj">
</form>
</br>
<form action="przegladajQuizy.php" method="post">
    Lub wyszukaj poprzez slowo kluczowe:
    <fieldset>
       <input type="text" name="slowo" required>
    </fieldset>
    <input type="submit" name="szukaj" value="szukaj">
</form>
<br>
<a href="projekt.php">Powrót do menu głównego.</a>
</body>
</html>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['przegladaj']))
{


    if($_POST['filtry']=='Wszystkie')
    {
        $wszystko = $mysqli->query('SELECT nazwa_uzytkownika, kategoria,poziom_trudnosci, nazwa_quizu FROM Quizy ');
        echo "<table border='1px'>";
        echo "<tr><th>nazwa użytkownika</th><th>kategoria</th><th>poziom trudności</th><th>nazwa quizu</th></tr>";
        if ($wszystko->num_rows > 0) {
            while ($row = $wszystko->fetch_assoc()) {
                echo "<tr>";

                echo " <td>{$row["nazwa_uzytkownika"]}</td>";
                echo "<td>{$row["kategoria"]}</td>";
                echo "<td>{$row["poziom_trudnosci"]} </td>";
                echo "<td>{$row["nazwa_quizu"]} </td>";
                echo "</tr>";

            }
        }
        echo "</table>";
    }
    else if($_POST['filtry']=='Kategoria')
    {
 include "kategoriaFiltr.php";
    }
    else
    {
        include "poziomTrudnosciFiltr.php";
    }

}
if(isset($_POST['szukaj']))
{
    $szukane='%'.$_POST['slowo'].'%';


    $tab = $mysqli->query('SELECT nazwa_uzytkownika, kategoria,poziom_trudnosci, nazwa_quizu FROM Quizy where nazwa_quizu LIKE '."'$szukane'");
    echo "<table border='1px'>";
    echo "<tr><th>nazwa użytkownika</th><th>kategoria</th><th>poziom trudności</th><th>nazwa quizu</th></tr>";
    if ($tab->num_rows > 0) {

        while ($row = $tab->fetch_assoc()) {
            echo "<tr>";

            echo " <td>{$row["nazwa_uzytkownika"]}</td>";
            echo "<td>{$row["kategoria"]}</td>";
            echo "<td>{$row["poziom_trudnosci"]} </td>";
            echo "<td>{$row["nazwa_quizu"]} </td>";
            echo "</tr>";

        }
    }
    echo "</table>";


}
$mysqli->close();

