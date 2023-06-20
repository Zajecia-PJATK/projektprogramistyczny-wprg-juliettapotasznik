<form action="zmienEmail.php" method="post">
    <input type="emial" name="nowyEmail" required  pattern="^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$">
    <br>
    <input type="submit" name="zmien" value="Zmien">
    </br>

</form>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");


if (isset($_POST['zmien']))
{

    $email=$_POST['nowyEmail'];

    $semail='SELECT email FROM uzytkownicy WHERE email='."'$email'";
    $result=$mysqli->query($semail);
    // sprawdzamy czy email nie jest już w bazie
    if ($result->num_rows == 0)
    {

        $mysqli->query("UPDATE uzytkownicy SET email=" . "'{$email}'" . 'WHERE email=' . "'{$_COOKIE['email']}'");

        setcookie('email',$email);

        echo "Email zostal zmieniony!";
        echo'<a href="edytujProfil.php">Powrot do edycji profilu</a>';

    }
    else
        echo "Podany emial jest już zajęty.";
    $mysqli->close();
}