<?php

// require '../db.php';

function getTasks($conn)
{
    $stmt = $conn->query('SELECT id, title, isDone FROM task');
    return $stmt->fetchAll();
}

function getLists($conn)
{
    $stmt = $conn->query('SELECT id, title, FROM list');
    return $stmt->fetchAll();
}