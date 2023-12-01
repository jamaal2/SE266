<?php
   
    require_once 'models/model_patient.php';

    $patients = new Patients();

    $patients = $patient->getAllPatients();
?>

<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
        </tr>
    </thead>    
    <tbody>
        <?php foreach ($patients as $p): ?>
            <tr>
                <td><?php echo $p['patientFirstName']; ?></td>
                <td><?php echo $p['patientLastName']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Link to add a new patient -->
<a href="add_patient.php">Add Patient</a>
