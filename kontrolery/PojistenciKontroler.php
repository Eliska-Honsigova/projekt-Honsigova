 <?php

require_once 'modely/Pojistenci.php';

class PojistenciKontroler {
    private $db;
    //constructor- připojení k databázi 
    public function __construct() {
        $server = 'localhost';
        $dbname = 'pojistenci';
        $user = 'root';
        $pass = '';

        // Ošetření chyby při připojení k databázi. 
        $this->db = new mysqli($server, $user, $pass, $dbname);
        if ($this->db->connect_errno) {
            echo('Chyba při připojení k databázi: ' . $this->db->connect_error);
            exit();
        }
    }
    public function vytvorPojistence($formData) {
        $jmeno = $formData['jmeno']; 
        $prijmeni = $formData['prijmeni']; 
        $vek = $formData['vek']; 
        $telefon = $formData['telefon']; 

        $stmt = $this->db->prepare("INSERT INTO pojistenci (jmeno, prijmeni, vek, telefon) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $jmeno, $prijmeni, $vek, $telefon);
        $stmt->execute();
        $stmt->close();
    }

    public function seznamPojistenych() {
        $result = $this->db->query("SELECT * FROM pojistenci");
        $seznamPojistenych = [];

        while ($row = $result->fetch_assoc()) {
            $pojistenec = new Pojistenec($row['id'], $row['jmeno'], $row['prijmeni'], $row['vek'], $row['telefon']);
            $seznamPojistenych[] = $pojistenec;
        }

        $result->free();
        return $seznamPojistenych;
    }
}
