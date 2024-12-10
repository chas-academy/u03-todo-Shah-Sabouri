<?php

// require '../db.php';

function getTasks($conn)
{
    $stmt = $conn->query('SELECT task_id, title, isDone FROM task');
    return $stmt->fetchAll();
}

function getLists($conn)
{
    $stmt = $conn->query('SELECT list_id, title FROM list');
    return $stmt->fetchAll();
}

function deleteTask($conn, $task_id) {
    $query = "DELETE FROM tasks WHERE task_id = :task_id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

    return $stmt->execute();
}