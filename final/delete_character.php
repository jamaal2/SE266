<?php
require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['character_id'])) {

    $character_id = $_POST['character_id'];

    try {
    
        $query = "DELETE FROM Characters WHERE character_id = :character_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':character_id', $character_id);
        $stmt->execute();

        header("Location: characters.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
