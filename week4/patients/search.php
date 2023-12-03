<?php
session_start();

// Check if the user is not logged in; if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$patients = [
    ['patientFirstName' => 'John', 'patientLastName' => 'Doe', 'patientMarried' => 'Married'],
    ['patientFirstName' => 'Jane', 'patientLastName' => 'Smith', 'patientMarried' => 'Single'],
    // Additional patient data as needed
];
                                
// Search functionality
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Filter patients based on the search term
    $filteredPatients = array_filter($patients, function ($patient) use ($searchTerm) {
        return stripos($patient['patientFirstName'], $searchTerm) !== false ||
               stripos($patient['patientLastName'], $searchTerm) !== false ||
               stripos($patient['patientMarried'], $searchTerm) !== false;
    });

    // If search results are found, use the filtered patients; otherwise, display all patients
    $patients = !empty($filteredPatients) ? array_values($filteredPatients) : $patients;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Patients</title>
</head>
<body>

<h2>Search Patients</h2>

<form method="GET" action="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
</form>

<!-- Display patients -->
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Marital Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?php echo $patient['patientFirstName']; ?></td>
                <td><?php echo $patient['patientLastName']; ?></td>
                <td><?php echo $patient['patientMarried']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Link to logoff.php -->
<p><a href="logoff.php">Logoff</a></p>

<!-- Link to the full patient listing page from previous weeks -->
<p><a href="view_patients.php">View All Patients</a></p>

</body>
</html>
