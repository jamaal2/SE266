<?php

require_once 'db.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Display characters (Read)
    try {
        $query = "SELECT * FROM Characters";
        $stmt = $db->prepare($query);
        $stmt->execute();


        echo "<h2>Characters List</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Description</th><th>Media ID</th></tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['media_id'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
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
