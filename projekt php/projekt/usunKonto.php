<form action="usunKonto.php" method="post">
    <label>Czy na pewno chcesz usunac swoje konto?</label>
    <br>
    <input type="submit" name="TAK" value="TAK">

    <input type="submit" name="NIE" value="NIE">
    </br>

</form>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");


if (isset($_POST['TAK']))
{


    $mysqli->query('DELETE FROM uzytkownicy WHERE email='."'{$_COOKIE['email']}'");


        echo "Konto zostalo usuniete pomyslnie";
        echo'<a href="projektLogowanieRejestracja.html">Powrot do strony z logowaniem i rejestracja</a>';

    $mysqli->close();
}
else if(isset($_POST['NIE']))
{
    header("Location: edytujProfil.php");
}
