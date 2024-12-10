<?php 

include 'db.php'
include '/src/functions/crud-functions.php'

if (isset($_POST['task_id']) && is_numeric($_POST['task_id'])) {
    $task_id = (int) $_POST['task_id'];

    if ($delSucessful) {
        header("Location: index.php?message=Task deleted successfully");
        exit;
    } else {
        echo "Error: Could not delete task, please try again.";
} else {
        echo "Invalid task ID."
}
?>