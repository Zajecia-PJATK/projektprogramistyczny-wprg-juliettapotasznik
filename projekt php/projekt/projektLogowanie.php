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
    <label>Admin</label>
    <input type="radio" name="admin">
    </br>
    <input type="submit" name="zaloguj"  value="Zaloguj">
</form>
</body>
</html>
<?php

$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['zaloguj'])) {
    if (isset($_POST['admin'])) {
        $admin = $_POST['admin'];
        $email = $_POST['email'];
        $haslo = $_POST['password'];
        $pom = $mysqli->query('SELECT haslo FROM uzytkownicy where email='."'$email'");
        while ($row = $pom->fetch_assoc()) {
            $hash = $row['haslo'];
        }
        if (password_verify($haslo, $hash) == true) {

            $spr = 'SELECT email FROM uzytkownicy WHERE email=' . "'$email'";
            $result = $mysqli->query($spr);

            if ($result->num_rows > 0) {

                $pyt= $mysqli->query('SELECT isAdmin FROM uzytkownicy WHERE email=' . "'$email'");
                while($row=$pyt->fetch_assoc())
                {
                    $isAdmin=$row['isAdmin'];
                }
                if($isAdmin==1) {
                    setcookie('email', $email);
                    $_SESSION['admin']=TRUE;
                    header("Location: projekt.php");
                    exit();
                }
                else
                    echo "Nie jestes adminem";


            } else
                echo "Wpisane niepoprawne dane";
            $mysqli->close();

        } else
            echo "Niepoprawne haslo";

    }
    else{
        $email = $_POST['email'];
        $haslo = $_POST['password'];
        $pom = $mysqli->query('SELECT haslo FROM uzytkownicy ');
        while ($row = $pom->fetch_assoc()) {
            $hash = $row['haslo'];
        }
        if (password_verify($haslo, $hash) == true) {

            $spr = 'SELECT email FROM uzytkownicy WHERE email=' . "'$email'";
            $result = $mysqli->query($spr);

            if ($result->num_rows > 0) {

                    setcookie('email', $email);
                $_SESSION['admin']=FALSE;

                    header("Location: projekt.php");
                    exit();

            } else
                echo "Wpisane niepoprawne dane";
            $mysqli->close();

        } else
            echo "Wpisane niepoprawne dane";


    }
}

?>