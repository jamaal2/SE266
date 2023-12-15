<?php

require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $character_id = $_POST['character_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $media_id = $_POST['media_id'];

    try {
        // Update character details in the database
        $query = "UPDATE Characters SET name = :name, description = :description, media_id = :media_id WHERE character_id = :character_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':media_id', $media_id);
        $stmt->bindParam(':character_id', $character_id);
        $stmt->execute();

        
        header("Location: characters.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
