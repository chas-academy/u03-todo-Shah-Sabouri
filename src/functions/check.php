<?php

include 'db.php';

if (isset($_POST['id']) && isset($_POST['checked'])) {
    $id = (int)$_POST['id'];
    $checked = $_POST['checked'] == '1' ? 1 : 0;

    $query = "UPDATE stuffToDo SET checked = :checked WHERE id = :id";

    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':checked', $checked);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: index.php"); // Omdirigerar till huvudsidan efter uppdatering
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>