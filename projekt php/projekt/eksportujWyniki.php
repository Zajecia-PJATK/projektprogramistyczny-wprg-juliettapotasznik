<?php
interface ZapiszDoPliku
{
    public function  zapisz($plik,$tablica);
}

class Plik implements ZapiszDoPliku {


    public function zapisz($plik, $tablica)
    {
        $fp = fopen($plik, 'w');

        foreach ($tablica as $wiersz) {
            fputcsv($fp, $wiersz);
        }

        fclose($fp);
    }


}
$dbuser = 'root';
$dbpass = '';
$db = new PDO("mysql:host=localhost;dbname=projekt", $dbuser,$dbpass);
$query = "SELECT email,liczba_punktow,rozegrane_quizy FROM uzytkownicy where email="."'{$_COOKIE['email']}'";
$result = $db->query($query);
if (!$result){
    echo "BŁĄD w zapytaniu";
    exit;
}

while($row = $result->fetch(PDO::FETCH_ASSOC)){
   $tablica[]=$row;
}

$plik = 'C:\Users\julie\OneDrive\Pulpit\projekt php\projekt\wyniki.csv';
$eksportuj=new Plik();
$eksportuj->zapisz($plik,$tablica);
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"" . basename($plik) . "\"");
readfile($plik);


?>


