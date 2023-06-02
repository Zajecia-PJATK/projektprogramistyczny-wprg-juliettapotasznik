
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
</head>
<body>
<h1>Dodaj pytania do swojego Quizu</h1>

<form action="dodajPytania.php" method="post">
    <label>Podaj rodzaj pytania:</label></br>
    <select name="rodzaj" size="1"  required>
        <option name="jednokrotnego" value="jednokrotnego">jednokrotnego wyboru</option>
        <option name="wielokrotnego" value="wielokrotnego">wielokrotnego wyboru</option>
        <option name="otwarte" value="otwarte"> otwarte</option>
        <option name="luki" value="luki">z uzupełnieniem luk</option>
    </select>
        <input type="submit" name="dalej" value="dalej">

</form>
</body>
</html>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "projekt");
if(isset($_POST['dalej'])) {
    if ($_POST['rodzaj'] == 'jednokrotnego') {

        require_once("jednokrotnego.php");

    } else if ($_POST['rodzaj'] == 'wielokrotnego') {
        include("wielokrotnego.php");


    } else if ($_POST['rodzaj'] == 'otwarte') {
        include("otwarte.php");
    } else if ($_POST['rodzaj'] == 'luki') {
        include("luki.php");
    }
}


?>
