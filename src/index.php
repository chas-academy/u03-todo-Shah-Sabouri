<?php

include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href= "style.css">
</head>
<body>
    <div class="main-section">
        <div class="add-section">
            <form action="">
                <input type="text"
                        name="title"
                        placeholder="Required field"/>
                <button type="submit">Add</button>
            </form>
        </div>
        <div class="show-todo-section">
            <div class="todo-item">
                <input type="checkbox">
                <h2>Random</h2>
                <br>
                <small>created: Dec 17, 2024</small>
            </div>
        </div>
    </div>
</body>
</html>