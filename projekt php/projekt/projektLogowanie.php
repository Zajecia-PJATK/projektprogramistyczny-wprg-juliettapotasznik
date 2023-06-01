<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz-logowanie</title>
</head>
<body>
<h1>Zaloguj się</h1>
<form action="projektLogowanie.php" method="post">
    <lable >Podaj swój adres e-mail: </lable><br>
    <input type="email" name="email"  required/></br>
    <label >Podaj hasło: </label><br>
    <input type="password" name="password"  required/><br><br>
    <input type="submit" name="zaloguj"  value="Zaloguj">
</form>
</body>
</html>
<?php

$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['zaloguj']))
{
    $email=$_POST['email'];
    $haslo=$_POST['password'];
   $spr='SELECT email,haslo FROM uzytkownicy WHERE email='."'$email'".'AND haslo='."'$haslo'";
    $result=$mysqli->query($spr);
    if ($result->num_rows > 0)
    {
        $_SESSION['zalogowany'] = true;
        $_SESSION['email'] = $email;
        header("Location: projekt.php");
        exit();


        }
    else
        echo "Wpisane niepoprawne dane";
    $mysqli->close();

}