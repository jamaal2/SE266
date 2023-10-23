<?php   
    require_once __DIR__ . '/models/model_team.php';
    $teams = getTeams();
?>


<html lang="en">
<head>
  <title>View NFL Teams</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        
    <div class="col-sm-offset-2 col-sm-10">
        <h1>NFL Teams</h1>
        <br />

        <!-- Link to add a new team -->
        <!-- We $_GET the update page with action "Add" -->
        <a href="updateTeam.php?action=Add">Add New Team</a>      
        <!-- ---------------------- -->

         <!-- Begin table of teams -->
         <table class="table table-striped">
        <thead>
            <tr>
                <th>Team Name</th>
                <th>Division</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>

        <!-- Build each row here -->
        <?php foreach ($teams as $row): ?>
            <tr>
                <td><?= $row['teamName']; ?></td> 
                <td><?= $row['division']; ?></td> 
                <!-- We $_GET the update page with action "Update" -->
                
            </tr>
        <?php endforeach; ?>
        <!-- End table rows -->
       
        </tbody>
    </table>
    <!-- End table of teams -->
      
    </div>
    </div>
</body>
</html>