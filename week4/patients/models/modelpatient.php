<?php
include('db.php');

function getAllPatients() {
    global $conn;
    $sql = "SELECT * FROM patients";
    $result = $conn->query($sql);

    $patients = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row;
        }
    }

    return $patients;
}

function addPatient($firstName, $lastName, $married, $birthdate) {
    global $conn;
    $sql = "INSERT INTO patients (patientFirstName, patientLastName, patientMarried, patientBirthDate) 
            VALUES ('$firstName', '$lastName', '$married', '$birthdate')";
    if ($conn->query($sql) === TRUE) {
        return "Patient added successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
