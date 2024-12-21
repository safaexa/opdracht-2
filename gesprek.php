<?php
include 'database.php';


class Gesprek {
   private $db;

   public function __construct() {
       $this->db = new DB(); // Initialiseer de database verbinding
   }

   public function getGesprekById($GesprekID) {
    $sql = "SELECT * FROM gesprek WHERE GesprekID = ?";
    $stmt = $this->db->execute($sql, array($GesprekID));
    return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
   }

   public function addGesprek($Naam_leerling, $Achternaam_leerling, $Gesprek) {
       $sql = "INSERT INTO gesprek (Naam_leerling, Achternaam_leerling, Gesprek) VALUES (?, ?, ?)";
       return $this->db->execute($sql, array($Naam_leerling, $Achternaam_leerling, $Gesprek));
   }

   public function getAllGesprek() {
       $sql = "SELECT * FROM gesprek";
       $stmt = $this->db->execute($sql);
       return $stmt ? $this->db->fetchAll($stmt) : [];
   }

   public function updateGesprek($Naam_leerling, $Achternaam_leerling, $Gesprek, $GesprekID) {
       $sql = "UPDATE gesprek SET Naam_leerling=?, Achternaam_leerling=?, Gesprek=? WHERE GesprekID=?";
       return $this->db->execute($sql, array($Naam_leerling, $Achternaam_leerling, $Gesprek, $GesprekID));
   }

   public function deleteGesprek($GesprekID) {
       $sql = "DELETE FROM gesprek WHERE GesprekID = ?";
       return $this->db->execute($sql, array($GesprekID));
   }
}
?>