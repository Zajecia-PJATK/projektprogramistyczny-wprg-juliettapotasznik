<?php
session_start();

class PytanieZLuka
{
    public $id;
    public $pytanie;
    public $podpowiedz;
    public $odpowiedz1;

    public function __construct($id,$pytanie, $podpowiedz, $odpowiedz1)
    {
        $this->id= $id;
        $this->pytanie = $pytanie;
        $this->podpowiedz = $podpowiedz;
        $this->odpowiedz1 = $odpowiedz1;
    }


}
class PytanieOtwarte extends PytanieZLuka
{

    public function __construct($id,$pytanie, $podpowiedz, $odpowiedz1)
    {
        parent::__construct($id,$pytanie, $podpowiedz, $odpowiedz1);
    }
}

class PytanieJenokrotnego extends PytanieZLuka
{
    public $nieprawidlowa_odp1;
    public $nieprawidlowa_odp2;


    public function __construct($id,$pytanie, $podpowiedz, $odpowiedz1,$nieprawidlowa_odp1, $nieprawidlowa_odp2)
    {
        parent::__construct($id,$pytanie, $podpowiedz, $odpowiedz1);
        $this->nieprawidlowa_odp1 = $nieprawidlowa_odp1;
        $this->nieprawidlowa_odp2 = $nieprawidlowa_odp2;
    }

}
class PytanieWielokrotnego extends PytanieJenokrotnego
{
    public $nieprawidlowa_odp3;
    public $odpowiedz2;
    public $odpowiedz3;


    public function __construct($id,$pytanie, $podpowiedz, $odpowiedz1,$nieprawidlowa_odp1, $nieprawidlowa_odp2,$nieprawidlowa_odp3, $odpowiedz2, $odpowiedz3)
    {
        parent::__construct($id,$pytanie, $podpowiedz, $odpowiedz1,$nieprawidlowa_odp1, $nieprawidlowa_odp2);
        $this->nieprawidlowa_odp3 = $nieprawidlowa_odp3;
        $this->odpowiedz2 = $odpowiedz2;
        $this->odpowiedz3 = $odpowiedz3;
    }

}

$mysqli = mysqli_connect("localhost", "root", "", "projekt");
$pytania=$mysqli->query('SELECT * FROM Pytania WHERE Id_quizu='."'{$_SESSION['ID_QUIZU']}'");
$tabPytania=array();
while($row = mysqli_fetch_assoc($pytania))
    {
        $tabPytania[$row['id_pytania']] = array(
            "rodzajPytania" => $row['rodzaj_pytania'],
            "pytanie" => $row['pytanie'],
            "odpowiedz1" => $row['odpowiedz1'],
            "odpowiedz2" => $row['odpowiedz2'],
            "odpowiedz3" => $row['odpowiedz3'],
            "podpowiedz" => $row['podpowiedz'],
            "nieprawidlowa_odp1" => $row['nieprawidlowa_odp1'],
            "nieprawidlowa_odp2" => $row['nieprawidlowa_odp2'],
            "nieprawidlowa_odp3" => $row['nieprawidlowa_odp3']
        );
    }
    $_SESSION['tablica']=$tabPytania;

$luki = array();
$otwarte=array();
$jednokrotnego=array();
$wielokrotnego=array();
foreach ($tabPytania as $id=>$dane)
{
        if($dane['rodzajPytania']=='luki')
        {
            $luka = new PytanieZLuka("'{$id}'","'{$dane['pytanie']}'","'{$dane['podpowiedz']}'","'{$dane['odpowiedz1']}'");
            array_push($luki,$luka);
        }
        elseif ($dane['rodzajPytania']=='otwarte')
        {
            $otwarta=new PytanieOtwarte("'{$id}'","'{$dane['pytanie']}'","'{$dane['podpowiedz']}'","'{$dane['odpowiedz1']}'");
            array_push($otwarte,$otwarta);
        }
        elseif ($dane['rodzajPytania']=='jednokrotnego')
        {
            $jedno=new PytanieJenokrotnego("'{$id}'","'{$dane['pytanie']}'","'{$dane['podpowiedz']}'","'{$dane['odpowiedz1']}'","'{$dane['nieprawidlowa_odp1']}'","'{$dane['nieprawidlowa_odp2']}'");
            array_push($jednokrotnego,$jedno);
        }
        elseif ($dane['rodzajPytania']=='wielokrotnego')
        {
            $wielo=new PytanieWielokrotnego("'{$id}'","'{$dane['pytanie']}'","'{$dane['podpowiedz']}'","'{$dane['odpowiedz1']}'","'{$dane['nieprawidlowa_odp1']}'","'{$dane['nieprawidlowa_odp2']}'","'{$dane['nieprawidlowa_odp3']}'","'{$dane['odpowiedz2']}'","'{$dane['odpowiedz3']}'");
            array_push($wielokrotnego,$wielo);
        }


}
$tabPytania['aktualnePytanie']=0;
//print_r($tabPytania);
//$wszystkieObiekty=array($luki,$otwarte,$jednokrotnego,$wielokrotnego);

if (!isset($_SESSION['pom'])) {
    $_SESSION['pom']=$tabPytania;


}
print_r($_SESSION['pom']);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>QUIZ</title>
</head>
<body>
<?php
$aktualnePytanie = $_SESSION['pom']['aktualnePytanie'];
$numery_rekordow = array_keys($_SESSION['pom']);
$_SESSION['numeryRekordow'] = $numery_rekordow;
$_SESSION['aktualnePytanie'] = $aktualnePytanie;

    echo '<form action="rozwiazywanieQuizow.php" method="post">';
    echo $_SESSION['aktualnePytanie'];
    echo count($_SESSION['numeryRekordow'])-2;

    if ($_SESSION['pom'][$numery_rekordow[$aktualnePytanie]]['rodzajPytania'] == 'jednokrotnego') {
        include "jednokrotnegoQuiz.php";
    } else if ($_SESSION['pom'][$numery_rekordow[$aktualnePytanie]]['rodzajPytania'] == 'wielokrotnego') {
        include "wielokrotnegoQuiz.php";
    } else if ($_SESSION['pom'][$numery_rekordow[$aktualnePytanie]]['rodzajPytania'] == 'luki') {
        include "lukiQuiz.php";
    } else if ($_SESSION['pom'][$numery_rekordow[$aktualnePytanie]]['rodzajPytania'] == 'otwarte') {
        include "lukiQuiz.php";
    }
    echo "</br>";
    echo "<input type='submit' value='zakoncz' name='zakoncz'>";


    echo '</form>';
    echo '<br>';

?>

</body>
</html>
<?php
if(isset($_POST['zakoncz']))
{
    header("Location: koniecQuizu.php");
    unset($_SESSION['pom']);

}