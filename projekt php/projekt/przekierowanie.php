<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Przekierowanie</title>
</head>
<body>
<?php
if (isset($_POST['usun'])){
    $_SESSION['usun'] = $_POST['nazwy'];
    header('Location: usunQuiz.php');
}elseif (isset($_POST['edytuj'])){
    $_SESSION['edytuj'] = $_POST['nazwy'];
    header('Location: edytujQuiz.php');
}else{
    echo "Błąd! <a href='projekt.php'>Powrót do tabeli</a><br>";
}
?>
</body>
</html>
