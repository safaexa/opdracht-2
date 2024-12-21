<?php
class DB {
    public $pdo;
    protected $stmt;

    // Constructor om verbinding te maken met de database
    public function __construct($db = "school", $user = "root", $pwd = "", $host = "localhost:3308") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully to $db";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // Methode om een SQL query uit te voeren met parameters
    public function execute($sql, $params = array()) {
        try {
            $this->stmt = $this->pdo->prepare($sql);  // Voorbereiden van de SQL-statement
            $this->stmt->execute($params);  // Uitvoeren van de SQL-statement met parameters
            return $this->stmt;
        } catch (PDOException $e) {
            echo "Execution failed: " . $e->getMessage();
            return false;
        }
    }

    // Methode om alle resultaten op te halen
    public function fetchAll($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

}

$myDb = new DB('school');
?>