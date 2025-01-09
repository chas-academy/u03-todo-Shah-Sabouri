<?php
include '../db.php';

if (isset($_POST['title']) && !empty($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);

    $query = "INSERT INTO stuffToDo (title, checked, date_time) VALUES (:title, 0, NOW())";
    // Förbereder SQL-frågan för 'checked'-status för uppgift i databasen


    try {
        // Förbereder SQL-fråga för exekvering
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':title', $title);
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