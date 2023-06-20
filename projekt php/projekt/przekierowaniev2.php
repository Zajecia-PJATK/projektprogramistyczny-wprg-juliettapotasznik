<?php
session_start();
$pom= $_SERVER['REQUEST_URI'];
$pattern ='/\?.*?\b(\d{1,3})(?:\D+(\d{1,3})(?:\D+(\d{1,3}))?)?/';
 preg_match($pattern,$pom,$match);
$_SESSION['ID_QUIZU']=$match[1];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>QUIZ</title>

</head>
<h2 text align="center">ZACZNIJ ROZWIĄZYWAĆ QUIZ</h2>
<body>
<form action="rozwiazywanieQuizow.php" method="POST">
    <h3 text align="center"><input  type="submit" name="zaczynamy" value="START"></h3>
</form>
<br>
<a href="przegladajQuizy.php">Powrót do przegladania quizów.</a>

</body>

</html>
