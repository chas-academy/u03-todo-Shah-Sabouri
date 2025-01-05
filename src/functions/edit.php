<?php
include '../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    $query = "SELECT * FROM stuffToDo WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $todo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$todo) {
        header("Location: ../index.php");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>