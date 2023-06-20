<?php
session_start();
$pom= $_SERVER['REQUEST_URI'];
$pattern ='/\?.*?\b(\d{1,3})(?:\D+(\d{1,3})(?:\D+(\d{1,3}))?)?/';
preg_match($pattern,$pom,$match);
$_SESSION['id_quizu']=$match[1];
$czesci = explode("=", $pom);

$czesc = $czesci[1];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Przekierowanie</title>
</head>
<body>
<?php
if($czesc=='usun')
{
   header('Location: usunQuiz.php');
}
else if($czesc=='edytuj')
{
    header('Location: edytujQuiz.php');
}
else
{
    echo "Błąd! <a href='projekt.php'>Powrót do tabeli</a><br>";
}

?>
</body>
</html>
