<?php

include (__DIR__ . '/db.php');

    
    function getTeams(){
        //grab $db object - 
        //needs global scope since object is coming from outside the function
        global $db;

        //initialize return dataset
        $results = [];

        //prepare our SQL statment
        $stmt = $db->prepare("SELECT id, teamName, division FROM  teams ORDER BY teamName"); 
        
        //if our SQL statement returns results, populate our results array
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         }
         
         //return results
         return ($results);

    }

    function addTeam ($teamName, $division) {
        //grab $db object - 
        //needs global scope since object is coming from outside the function
                        global $db;

        //initialize return dataset
        $result = "";

        //prepare our SQL statment
        $sql = "INSERT INTO teams set teamName = :t, division = :d";
        $stmt = $db->prepare($sql);

        //bind values
        $binds = array(
            ":t" => $teamName,
            ":d" => $division
        );
        
        //if our SQL statement returns results, populate our results confirmation string
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = 'Data Added';
        }
        
        //return results
        return ($result);
    }