<?php
session_start();

$pom= $_SERVER['REQUEST_URI'];
$pattern ='/\?.*?\b(\d{1,3})(?:\D+(\d{1,3})(?:\D+(\d{1,3}))?)?/';
preg_match($pattern,$pom,$match);
$_SESSION['id-uzytkownika']=$match[1];


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Usuwane uzytkownika</title>
</head>
<body>
<form method="post" action="usun.php">
    <label>Czy na pewno chcesz usunac tego uzytkownika?</label>
    <br>
    <input type="submit" name="TAK" value="Tak"><br>
    <a href="usunUzytkownikow.php">Powrót do listy uzytkownikow</a>
</form>

</body>
</html>
<?php
