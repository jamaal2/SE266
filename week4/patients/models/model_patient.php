<?php
require_once 'db.php';

class Patient {
    private $conn;

    public function __construct() {
        // Create a database connection
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllPatients() {
        // Retrieve all patients from the database
        $stmt = $this->conn->prepare("SELECT * FROM patients");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPatient($firstName, $lastName, $married, $birthDate) {
        // Add a new patient to the database
        $stmt = $this->conn->prepare("INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) VALUES (:firstName, :lastName, :married, :birthDate)");
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':married', $married);
        $stmt->bindParam(':birthDate', $birthDate);
        return $stmt->execute();
    }

    
}
?>
