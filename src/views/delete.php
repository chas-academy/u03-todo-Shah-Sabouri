<?php 

include '../db.php';
include '../functions/crud-functions.php';
include '../header.php';

if (isset($_POST['task_id']) && is_numeric($_POST['task_id'])) {
    $task_id = (int) $_POST['task_id'];

    $delSuccessful = deleteTask($task_id);

    if ($delSuccessful) {
        header("Location: index.php?message=Task deleted successfully");
        exit;
    } else {
        echo "Error: Could not delete task, please try again.";
    }

} else {
    echo "Invalid task ID.";
}
?>