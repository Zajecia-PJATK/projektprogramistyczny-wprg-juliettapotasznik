<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz-Rejestracja</title>
</head>
<body>
<h1>Zarejestruj się</h1>
<form action="projektRejestracja.php" method="post">

    <label for="email">Podaj adres e-mail: </label>
    <input type="email" name="email" required pattern="^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,4}$"><br><br>
    <label for="password">Podaj hasło: </label>
    <input type="password" name="password"  required pattern="(?=^.{6,}$)((?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]))|((?=.*\d)(?=.*[A-Z])(?=.*[a-z]))|((?=.*\W+)(?![.\n])(?=.*\d)(?=.*[a-z]))|((?=.*\W+)(?![.\n])(?=.*\d)(?=.*[A-Z])).*$"><br>
    <label style="color: gray"> (Hasło powinno składać się z conajmniej 6 znaków oraz zawierać conajmniej: 1 dużą literę, cyfrę oraz znak specjany)</label><br><br>
    <input type="submit" name="rejestracja" value="Zarejestruj"/>
</form>
</body>
</html>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");


if (isset($_POST['rejestracja']))
{
    $email=$_POST['email'];
    $haslo=password_hash($_POST['password'],PASSWORD_DEFAULT);

$semail='SELECT email FROM uzytkownicy WHERE email='."'$email'";
    $result=$mysqli->query($semail);
    // sprawdzamy czy email nie jest już w bazie
    if ($result->num_rows == 0)
    {

        $mysqli->query("INSERT INTO uzytkownicy (`email`, `haslo`,`liczba_punktow`,`rozegrane_quizy`)
                    VALUES ('".$email."', '".$haslo."',0,0);");

            echo "Konto zostało utworzone!";
        header("Location: projektLogowanie.php");

    }
    else
        echo "Podany login jest już zajęty.";
    $mysqli->close();
}

?>
