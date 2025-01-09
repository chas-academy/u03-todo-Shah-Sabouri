<?php
include '../db.php';

if (isset($_POST['title']) && !empty($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';

    $query = "INSERT INTO stuffToDo (title, description, checked, date_time) VALUES (:title, :description, 0, NOW())";
    // Förbereder SQL-frågan för 'checked'-status för uppgift i databasen

    try {
        // Förbereder SQL-fråga för exekvering
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        header("Location: ../index.php"); // Omdirigerar till huvudsidan efter läggt till
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php?mess=error");
    exit();
}
