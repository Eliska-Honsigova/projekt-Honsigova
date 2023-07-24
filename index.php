<?php
require_once 'modely/Pojistenci.php';
require_once 'kontrolery/PojistenciKontroler.php';

//Vytvoření instance kontroleru
$kontroler = new PojistenciKontroler ();

//Zpracování požadavků 
if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
//Zpracování formuláře pro vytvoření pojištěnce 
$kontroler -> vytvorPojistence($_POST);
}

//Získání seznamu všech pojištěnců 
$seznamPojistenych = $kontroler->seznamPojistenych();
require_once 'pohledy/PojistenciPohled.phtml'
?>