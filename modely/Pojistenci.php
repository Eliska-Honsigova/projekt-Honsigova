<?php
class Pojistenec {
    private $ID;
    private $jmeno;
    private $prijmeni;
    private $vek;
    private $telefon;

    public function __construct($ID, $jmeno, $prijmeni, $vek, $telefon) {
        $this-> ID=$ID;
        $this-> jmeno=$jmeno;
        $this-> prijmeni=$prijmeni;
        $this-> vek=$vek;
        $this-> telefon=$telefon;
    }

    //Gettery pro jednotlvé vlastnosti
    public function getID () {
        return $this->ID; 
    }
    public function getJmeno () {
        return $this->jmeno;
    }
    public function getPrijmeni () {
        return $this->prijmeni;
    }
    public function getVek () {
        return $this->vek;
    }
    public function getTelefon() {
        return $this->telefon;
    }
}
?>