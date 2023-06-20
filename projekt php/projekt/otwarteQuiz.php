<?php
if(isset($_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]))
{

    $pytanie=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['pytanie'];
    $odpowiedz=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['odpowiedz1'];
    $podpowiedz=$_SESSION['pom'][$_SESSION['numeryRekordow'][$_SESSION['aktualnePytanie']]]['podpowiedz'];


}

?>

<form action="otwarteQuiz.php" method="post">
    <?php
    echo"<fieldset>";
    echo "Odpowiedz na pytanie ";
    echo "<br>";
    echo $pytanie;
    echo "<br>";
    echo "<input type='text' name='odpowiedz'>";
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
    $odp='/'.$odpowiedz.'/i';
if(preg_match($odp,$_POST['odpowiedz'])==1)
{if(isset($_COOKIE['wynik']))
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

