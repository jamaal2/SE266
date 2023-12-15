<?php
require_once 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
   
    $searchTerm = $_GET['search'];

    try {

        $query = "SELECT * FROM Characters WHERE name LIKE :searchTerm";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
        $stmt->execute();

      
        echo "<h2>Search Results</h2>";

        if ($stmt->rowCount() > 0) {
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
        } else {
            echo "No results found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
