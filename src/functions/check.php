<?php

include "db.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "UPDATE stuffToDo SET checked = NOT checked WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $id]);

    $currentCheckedState = $stmt->fetchColumn();

    if ($currentCheckedState !== false) {
        $newState = ($currentCheckedState == 1) ? 0 : 1;

        $query = "UPDATE stuffToDo SET checked = :newState WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['newState' => $newState, 'id' => $id]);

        echo $newState;
    } else {
        echo 'error';
    }
}
?>