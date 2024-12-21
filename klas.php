<?php
include 'database.php';


class klas {
   private $db;

   public function __construct() {
       $this->db = new DB(); // Initialiseer de database verbinding
   }

   public function getklasById($klasID) {
    $sql = "SELECT * FROM klas WHERE klasID = ?";
    $stmt = $this->db->execute($sql, array($klasID));
    return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
   }

   public function addKlas($klas_naam, $aantal_leerlingen, $mentor, $niveau) {
       $sql = "INSERT INTO klas (klas_naam, aantal_leerlingen, mentor, niveau) VALUES (?, ?, ?, ?)";
       return $this->db->execute($sql, array($klas_naam, $aantal_leerlingen, $mentor, $niveau));
   }

   public function getAllKlas() {
       $sql = "SELECT * FROM Klas";
       $stmt = $this->db->execute($sql);
       return $stmt ? $this->db->fetchAll($stmt) : [];
   }

   public function updateKlas($klas_naam, $aantal_leerlingen, $mentor, $niveau, $GesprekID) {
       $sql = "UPDATE klas SET klas_naam, aantal_leerlingen=?, mentor=?, $niveau=? WHERE GesprekID=?";
       return $this->db->execute($sql, array($klas_naam, $aantal_leerlingen, $mentor, $niveau, $GesprekID));
   }

   public function deleteKlas($klasID) {
       $sql = "DELETE FROM klas WHERE klasID = ?";
       return $this->db->execute($sql, array($klasID));
   }
}
?>