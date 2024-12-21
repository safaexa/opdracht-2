<?php
include 'database.php';


class Docent {
   private $db;

   public function __construct() {
       $this->db = new DB(); // Initialiseer de database verbinding
   }

   public function getGesprekById($GesprekID) {
    $sql = "SELECT * FROM manager WHERE docentID = ?";
    $stmt = $this->db->execute($sql, array($GesprekID));
    return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
   }

   public function addDocent($naam, $achternaam, $vak, $aantal_leerlingen) {
       $sql = "INSERT INTO manager (naam, achternaam, vAk, aantal_leerlingen) VALUES (?, ?, ?, ?)";
       return $this->db->execute($sql, array($naam, $achternaam, $vak, $aantal_leerlingen));
   }

   public function getAllDocent() {
       $sql = "SELECT * FROM manager";
       $stmt = $this->db->execute($sql);
       return $stmt ? $this->db->fetchAll($stmt) : [];
   }

   public function updateDocent($naam, $achternaam, $vak, $aantal_leerlingen, $docentID) {
    $sql = "UPDATE manager SET naam=?, achternaam=?, vak=?, aantal_leerlingen=? WHERE docentID=?";
    return $this->db->execute($sql, array($naam, $achternaam, $vak, $aantal_leerlingen, $docentID));
}


   public function deleteDocent($docentID) {
       $sql = "DELETE FROM docent WHERE docentID = ?";
       return $this->db->execute($sql, array($docentID));
   }
}
?>