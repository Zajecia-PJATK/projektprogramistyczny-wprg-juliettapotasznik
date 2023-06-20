<?php
session_start();

$pom= $_SERVER['REQUEST_URI'];
$pattern ='/\?.*?\b(\d{1,3})(?:\D+(\d{1,3})(?:\D+(\d{1,3}))?)?/';
preg_match($pattern,$pom,$match);
$_SESSION['id-quizu']=$match[1];


?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Usuwane uzytkownika</title>
    </head>
    <body>
    <form method="post" action="usunQ.php">
        <label>Czy na pewno chcesz usunac ten quzi?</label>
        <br>
        <input type="submit" name="TAK" value="Tak"><br>
        <a href="usunQuizyAdmin.php">Powrót do listy quziow</a>
    </form>

    </body>
    </html>
<?php

