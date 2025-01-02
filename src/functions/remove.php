<?php

include 'db.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM stuffToDo WHERE id = :id"
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);

    if ($stmt->rowCOunt() > 0) {
        echo 'Success!';
    } else {
        echo 'Error';
    }
}
?>