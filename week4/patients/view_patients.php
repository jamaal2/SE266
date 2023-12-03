<?php
include __DIR__ . '/models/model_patient.php';

// Retrieve all patients
$patients = getPatients();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Patients</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>All Patients</h2>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?php echo $patient['patientFirstName']; ?></td>
                <td><?php echo $patient['patientLastName']; ?></td>
                <td><a href="patient_details.php?id=<?php echo $patient['id']; ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Link to add a new patient -->
<p><a href="patient_details.php">Add Patient</a></p>

</body>
</html>
