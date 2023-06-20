<?php
echo '<form action="zmienHaslo.php" method="post">';
echo 'Wpisz nowe haslo:';
echo '<input type="password" name="noweHaslo" required pattern="(?=^.{6,}$)((?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]))|((?=.*\d)(?=.*[A-Z])(?=.*[a-z]))|((?=.*\W+)(?![.\n])(?=.*\d)(?=.*[a-z]))|((?=.*\W+)(?![.\n])(?=.*\d)(?=.*[A-Z])).*$"><br>';
echo '<input type="submit" name="zmien" value="Zmien">';
echo "</form>";
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['zmien'])) {
    echo "cos";
    $haslo = password_hash($_POST['noweHaslo'], PASSWORD_DEFAULT);
    $semail = 'SELECT email FROM uzytkownicy WHERE email=' . "'{$_COOKIE['email']}'";
    $result = $mysqli->query($semail);
    if ($result->num_rows == 1) {

        $mysqli->query("UPDATE uzytkownicy SET haslo=" . "'{$haslo}'" . 'WHERE email=' . "'{$_COOKIE['email']}'");

        echo "Haslo zostalo zmienione!";
        echo'<a href="edytujProfil.php">Powrot do edycji profilu</a>';
    }

    $mysqli->close();
}


