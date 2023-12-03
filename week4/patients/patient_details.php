<?php
include __DIR__ . '/models/model_patient.php';

// Check if an ID is provided in the URL for editing an existing patient
$editMode = false;
if (isset($_GET['id'])) {
    $editMode = true;
    $patientID = $_GET['id'];
    $patient = getPatientByID($patientID); // Fetch patient details by ID
} else {
    // For adding a new patient
    $patient = [
        'patientFirstName' => '',
        'patientLastName' => '',
        'patientMarried' => '',
        'patientBirthDate' => '',
    ];
}

// Handling form submission for adding/updating/deleting patients
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cancel'])) {
        // Redirect back to view_patients.php if cancel button is clicked
        header("Location: view_patients.php");
        exit();
    }

    if (isset($_POST['delete'])) {
        // Handle deleting the patient and redirect to view_patients.php
        deletePatient($_POST['id']);
        header("Location: view_patients.php");
        exit();
    }

    if ($editMode) {
        // Convert 'single'/'married' to 0/1
        $marriedValue = ($_POST['married'] === 'married') ? 1 : 0;
        
        // Handle updating patient details with integer value
        updatePatient($_POST['id'], $_POST['firstName'], $_POST['lastName'], $marriedValue, $_POST['birthDate']);
    } else {
        // Convert 'single'/'married' to 0/1 for adding a new patient
        $marriedValue = ($_POST['married'] === 'married') ? 1 : 0;
        
        // Handle adding a new patient with integer value
        addPatient($_POST['firstName'], $_POST['lastName'], $marriedValue, $_POST['birthDate']);
    }

    // Redirect back to view_patients.php after adding/updating a patient
    header("Location: view_patients.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
</head>
<body>

<h2>Patient Details</h2>

<form method="POST" action="">
    <!-- For editing, include a hidden input field for the patient ID -->
    <?php if ($editMode): ?>
        <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
    <?php endif; ?>

    <!-- Input fields for patient details -->
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value="<?php echo $patient['patientFirstName']; ?>" required><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $patient['patientLastName']; ?>" required><br>

    <label for="married">Marital Status:</label>
    <select id="married" name="married" required>
        <option value="single" <?php if ($patient['patientMarried'] === 'single') echo 'selected'; ?>>Single</option>
        <option value="married" <?php if ($patient['patientMarried'] === 'married') echo 'selected'; ?>>Married</option>
    </select><br>

    <label for="birthDate">Birth Date:</label>
    <input type="date" id="birthDate" name="birthDate" value="<?php echo $patient['patientBirthDate']; ?>" required><br>

    <!-- Buttons for actions -->
    <button type="submit" name="save"><?php echo ($editMode) ? 'Update' : 'Add'; ?> Patient</button>
    <?php if ($editMode): ?>
        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
    <?php endif; ?>
    <button type="submit" name="cancel">Cancel</button>
</form>

<!-- Link to View Patients page -->
<a href="view_patients.php">Back to View Patients</a>

</body>
</html>
                                                    