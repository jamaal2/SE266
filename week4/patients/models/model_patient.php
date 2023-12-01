<?php
include (__DIR__ . '/db.php');

// class Patients {
    
//     private $conn;

//     public function __construct() {
//         // Create a database connection
//         $db = new Database();
//         $this->conn = $db->getConnection();
//     }

//     public function getAllPatients() {
//         // Retrieve all patients from the database
//         $stmt = $this->conn->prepare("SELECT * FROM patients");
//         $stmt->execute();
//         return $stmt->fetchAll(PDO::FETCH_ASSOC);
//     }

//     public function addPatient($firstName, $lastName, $married, $birthDate) {
//         // Add a new patient to the database
//         $stmt = $this->conn->prepare("INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) VALUES (:firstName, :lastName, :married, :birthDate)");
//         $stmt->bindParam(':firstName', $firstName);
//         $stmt->bindParam(':lastName', $lastName);
//         $stmt->bindParam(':married', $married);
//         $stmt->bindParam(':birthDate', $birthDate);
//         return $stmt->execute();
//     }

    
// }

function getPatients () {
    global $db;
    
    $results = [];

    $stmt = $db->prepare("SELECT id,patientLastName, patientFirstName, patientMarried, patientBirthDate FROM  patients ORDER BY patientLastName, patientFirstName"); 
    
    if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             
     }
     
     return ($results);
}


function addPatient ($first, $last, $bdate, $married) {
    global $db;
    $result = "";
    $sql = "INSERT INTO patients set patientFirstName = :firstName, patientLastName = :lastName, patientBirthDate = :bdate, patientMarried=:married";
    $stmt = $db->prepare($sql);

    $binds = array(
        ":firstName" => $first,
        ":lastName" => $last,
        ":bdate" => $bdate,
        ":married" => $married
        
        
    );
    
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $result = 'Data Added';
    }
    
    return ($result);
}

 ?>
