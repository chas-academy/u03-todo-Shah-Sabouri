<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "UPDATE todo SET checked = NOT checked WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);

    $status = ($stmt->rowCount() > 0) ? '0' : '1';
    echo $status;
}
?>