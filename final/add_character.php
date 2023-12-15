<?php

require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $media_id = $_POST['media_id'];

    try {
        $query = "INSERT INTO Characters (name, description, media_id) VALUES (:name, :description, :media_id)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':media_id', $media_id);
        $stmt->execute();

       
        header("Location: characters.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
