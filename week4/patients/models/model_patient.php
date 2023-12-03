<?php
include (__DIR__ . '/db.php');

function getPatients() {
    global $db;
    $results = [];
    $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients ORDER BY patientLastName, patientFirstName");
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function getPatientByID($id) {
    global $db;
    $stmt = $db->prepare("SELECT id, patientFirstName, patientLastName, patientMarried, patientBirthDate FROM patients WHERE id = :id");
    $stmt->bindParam(':id', $id);
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

function addPatient($first, $last, $married, $bdate) {
    global $db;
    $result = "";
    $sql = "INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) VALUES (:firstName, :lastName, :married, :bdate)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':firstName', $first);
    $stmt->bindParam(':lastName', $last);
    $stmt->bindParam(':married', $married);
    $stmt->bindParam(':bdate', $bdate);

    if ($stmt->execute()) {
        $result = 'Data Added';
    }
    return $result;
}

function updatePatient($id, $first, $last, $married, $bdate) {
    global $db;
    $result = "";
    $sql = "UPDATE patients SET patientFirstName = :firstName, patientLastName = :lastName, patientMarried = :married, patientBirthDate = :bdate WHERE id = :id";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':firstName', $first);
    $stmt->bindParam(':lastName', $last);
    $stmt->bindParam(':married', $married);
    $stmt->bindParam(':bdate', $bdate);

    if ($stmt->execute()) {
        $result = 'Data Updated';
    }
    return $result;
}

function deletePatient($id) {
    global $db;
    $sql = "DELETE FROM patients WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
    
?>
