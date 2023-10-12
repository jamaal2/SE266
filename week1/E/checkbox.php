<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
<!--Array-->
    <?php 
        $tasks = [
            'title' => 'Fix Brakes',
            'due' => 'End of Week',
            'assigned to' => 'Hazel',
            'completed' => true
        ];

    ?>
<!--HTML-->
    <ul>
            <li><strong>Title: </strong>  <?= $tasks['title']; ?></li>

            <li><strong>Due Date: </strong>  <?= $tasks['due']; ?></li>

            <li><strong>Assigned To:</strong>  <?= $tasks['assigned to']; ?></li>

            <li><strong>Done:</strong>
            <!--Read From Array-->
              <?php
              if ($tasks['completed']) {
                  echo '<span class="icon">&#9989;</span>';
              }else{
                  echo 'Incomplete';
              }
             ?>
            </li>
    </ul>

    
    </body>
</html>