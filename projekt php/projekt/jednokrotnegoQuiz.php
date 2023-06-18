<?php

    if(isset($_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]))
        {

        $pytanie=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['pytanie'];
        $odpowiedz=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['odpowiedz1'];
        $podpowiedz=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['podpowiedz'];
        $niep1=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['nieprawidlowa_odp1'];
        $niep2=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['nieprawidlowa_odp2'];

    }


?>

    <form action="jednokrotnegoQuiz.php" method="post">
        <?php
        echo"<fieldset>";
        echo "Wybierz poprawna odpowiedz";
        echo "<br>";
        echo $pytanie;
        echo "<br>";
        echo $odpowiedz."<input type='radio' value=$odpowiedz name='odpowiedzi'>";
        echo "<br>";
        echo $niep1."<input type='radio' value='{$niep1}' name='odpowiedzi'>";
        echo "<br>";
        echo $niep2."<input type='radio' value='{$niep2}' name='odpowiedzi'>";
        echo "<br>";
       echo "<input type='submit' value='dalej' name='dalej'>";
        echo "<br>";
        echo "<input type='submit' value='podpowiedz' name='podpowiedz'>";
        echo"</fieldset>";
        ?>
    </form>
<?php

if(isset($_POST['dalej']))
{
    if($_POST['odpowiedzi']==$odpowiedz)
    {
        $wynik= $_COOKIE['wynik'];
        setcookie('wynik',$wynik++);
    }
$ile=count($_SESSION['numeryRekordow'])-2;
    if ($_SESSION['aktualnePytanie']== $ile)
    {
    header("Location: koniecQuizu.php");
    unset($_SESSION['pom']);
    exit;
}
    else {
        $_SESSION['pom']['aktualnePytanie']++; // zwiększenie indeksu pytania
        header("Location: rozwiazywanieQuizow.php");
    }





}
if(isset($_POST['podpowiedz']))
{
    echo "Twoja podpowiedz to: ".$podpowiedz."\n";
}

