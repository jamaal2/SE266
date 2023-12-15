<?php

require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
  
    $character_id = $_GET['id'];

    try {
     
        $query = "SELECT * FROM Characters WHERE character_id = :character_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':character_id', $character_id);
        $stmt->execute();

        
        $character = $stmt->fetch(PDO::FETCH_ASSOC);

    
        if ($character) {
?>
            <!-- HTML form for editing character details -->
            <h2>Edit Character</h2>
            <form action="update_character.php" method="POST">
                <input type="hidden" name="character_id" value="<?php echo $character['character_id']; ?>">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $character['name']; ?>"><br>
                <label>Description:</label>
                <textarea name="description"><?php echo $character['description']; ?></textarea><br>
                <label>Media ID:</label>
                <input type="text" name="media_id" value="<?php echo $character['media_id']; ?>"><br>
                <input type="submit" value="Update Character">
            </form>
<?php
        } else {
            echo "Character not found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
