<?php
include '../db.php';

if (isset($_POST['id']) && isset($_POST['checked'])) {
    $id = (int)$_POST['id'];
    $checked = $_POST['checked'] == '1' ? 1 : 0;

    $query = "UPDATE stuffToDo SET checked = :checked WHERE id = :id";
        // Förbereder SQL-frågan för att uppdatera 'checked'-statusen för uppgiften i databasen.

    try {
        // Förbereder SQL-fråga för exekvering
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':checked', $checked);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: ../index.php"); // Omdirigerar till huvudsidan efter man lagt till uppgift
        exit();
    } catch (PDOException $e) {
        error_log("Update failed: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
    }
} else {
    echo 'Invalid parameters.';
}
?>
