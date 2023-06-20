<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Edytuj profil</title>
</head>
<body>
<h1>Tutaj mozesz edytowac swoj profil</h1>

<form action="edytujProfil.php" method="post">
    <input type="submit" name="zmienHaslo" value="Ustaw nowe hasło">
</br>
    <input type="submit" name="zmienEmail" value="Ustaw nowy adres emial">
    </br>
    <input type="submit" name="usunKonto" value="Usun konto">
    </br>
    <a href="projekt.php">Powrot do menu głównego</a>


</form>
</body>
</html>
<?php
if(isset($_POST['zmienHaslo']))
{
 include "zmienHaslo.php";

}

else if (isset($_POST['zmienEmail']))
{
    include "zmienEmail.php";

}
else if(isset($_POST['usunKonto']))
{
    include "usunKonto.php";
}



