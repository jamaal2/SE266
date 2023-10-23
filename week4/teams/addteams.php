<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/models/model_team.php';
    
    $error = "";
    $teamName = "";
    $division = "";
   
    if (isset($_POST['storeTeam'])) {
        $teamName = filter_input(INPUT_POST, 'team_name');
        $division = filter_input(INPUT_POST, 'division');
        
        if ($teamName == "") $error .= "<li>Please provide team name</li>";
        if ($division == "") $error .= "<li>Please provide team's division</li>";
    }
    
    if(isset($_POST['storeTeam']) && $error == ""){
        addTeam ($teamName, $division);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFL Teams</title>
</head>
<body>
    



    <style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>


    <!-- FORM RESULTS -->
    <?php
        if (isset($_POST['storeTeam']) && $error == ""):
    ?>
        <h2>Team was added</h2>
        
        <ul>
            <li><?php echo "Team Name: $teamName"; ?></li>
            <li><?php echo "Division: $division"; ?></li>
        </ul>
        <a href="viewteams.php">View All NFL Teams</a>
    <?php
        endif;
    ?>

    <!-- ADD TEAM FORM -->
    <h2>Add New NFL Team</h2>

    <form name="team" method="post" action="addteams.php">
        
        <!-- IF error is not empty, list out my errors -->
        <?php
            if ($error != ""):
        ?>
                
        <div class="error">
            <p>Please fix the following and resubmit</p>
            <ul>
                <?php echo $error; ?>
            </ul>
        </div>
        <?php
            endif;
        ?>

        <!--FORM-->
        <div class="wrapper">
            <div class="label">
                <label>Team Name:</label>
            </div>
            <div>
                <input type="text" name="team_name" value="<?= $teamName; ?>" />
            </div>
            <div class="label">
                <label>Divison:</label>
            </div>
            <div>
                <input type="text" name="division" value="<?= $division; ?>" />
            </div>

            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storeTeam" value="Save New Team Information" />
            </div>
           
        </div>

       
    </form>
    <p>
       
    </p>


    </body>
</html>
