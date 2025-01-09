<?php
include '../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    error_log("Task ID to delete: " . $id);

    $query = "DELETE FROM stuffToDo WHERE id = :id";
    // Förbereder SQL-frågan för att ta bort uppgift med angivet 'id'

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            error_log("Task with ID $id was deleted.");
            header("Location: ../index.php");
            exit();
        } else {
            error_log("Failed to delete task with ID $id.");
            echo "An error occurred. Please try again later.";
            exit();
        }
    } catch (PDOException $e) {
        // Fångar eventuella undantag vid frågeexekvering, loggar felet
        error_log("Error deleting task with ID $id: " . $e->getMessage());
        echo "An error occurred. Please try again later."; // Visar ett felmeddelande, stoppar exekveringen
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
