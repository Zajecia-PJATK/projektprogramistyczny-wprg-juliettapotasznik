<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
<h1>Aplikacja Quiz</h1>
<?php
echo "Witaj {$_COOKIE['email']} ";
?>
        <hr>
        Opcje:<ul>
            <li><a href="dodajQuiz.php">Dodaj quiz</a></li>
            <li><a href="edytujQuiz.php">Edytuj Quiz</a></li>
            <li><a href="usunQuiz.php">Usuń Quiz</a></li>
        </ul>

</body>
</html>