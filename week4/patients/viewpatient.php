<?php
include('modelpatient.php');

$patients = getAllPatients();
foreach ($patients as $patient) {
    echo "<div>{$patient['patientFirstName']} {$patient['patientLastName']}, Married: {$patient['patientMarried']}, Birthdate: {$patient['patientBirthDate']}</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Patients</title>
</head>
<body>
    <h1>View Patients</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Married</th>
            <th>Birth Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($patients as $patient) { ?>
            <tr>
                <td><?php echo $patient['patientFirstName'] . ' ' . $patient['patientLastName']; ?></td>
                <td><?php echo $patient['patientMarried']; ?></td>
                <td><?php echo $patient['patientBirthDate']; ?></td>
                <td>
                    <a href="editpatient.php?id=<?php echo $patient['id']; ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="addpatient.php">Add Patient</a>
</body>
</html>