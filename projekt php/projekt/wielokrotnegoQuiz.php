<?php
if(isset($_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]))
{

    $pytanie=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['pytanie'];
    $odpowiedz1=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['odpowiedz1'];
    $odpowiedz2=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['odpowiedz2'];
    $odpowiedz3=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['odpowiedz3'];
    $podpowiedz=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['podpowiedz'];
    $niep1=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['nieprawidlowa_odp1'];
    $niep2=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['nieprawidlowa_odp2'];
    $niep3=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['nieprawidlowa_odp3'];

}

?>

    <form action="wielokrotnegoQuiz.php" method="post">
        <?php
        echo"<fieldset>";
        echo "Wybierz poprawne odpowiedzi";
        echo "<br>";
        echo $pytanie;
        echo "<br>";
        echo $odpowiedz1."<input type='radio' value=$odpowiedz1 name='odpowiedz1'>";
        echo "<br>";
        echo $odpowiedz2."<input type='radio' value=$odpowiedz2 name='odpowiedz2'>";
        echo "<br>";
        echo $odpowiedz3."<input type='radio' value=$odpowiedz3 name='odpowiedz3'>";
        echo "<br>";
        echo $niep1."<input type='radio' value='{$niep1}' name='nieprawidlowa1'>";
        echo "<br>";
        echo $niep2."<input type='radio' value='{$niep2}' name='nieprawidlowa2'>";
        echo "<br>";
        echo $niep3."<input type='radio' value='{$niep3}' name='nieprawidlowa3'>";
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
    if($_POST['odpowiedz1']==$odpowiedz1 && $_POST['odpowiedz2']==$odpowiedz2 && $_POST['odpowiedz3']==$odpowiedz3  )
    {
        if(isset($_COOKIE['wynik']))
        {
            $wynik=$_COOKIE['wynik'];
            $wynik++;
            setcookie('wynik',$wynik,time()+3600);
        }
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

