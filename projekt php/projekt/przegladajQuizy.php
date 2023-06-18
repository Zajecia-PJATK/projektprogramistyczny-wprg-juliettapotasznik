<?php
session_start();
?>
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
       header("Location: wszystkieQuizy.php");
    }
    else if($_POST['filtry']=='Kategoria')
    {
header("Location: kategoriaFiltr.php");
    }
    else
    {
        header( "Location: poziomTrudnosciFiltr.php");
    }

}
if(isset($_POST['szukaj']))
{
    $szukane='%'.$_POST['slowo'].'%';

    $_SESSION['slowo']=$szukane;
   header( "Location: slowoFiltr.php");


}


