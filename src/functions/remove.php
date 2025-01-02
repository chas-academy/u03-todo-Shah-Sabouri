<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM todo WHERE id = :id"
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);

    echo 'Success!';
}
?>