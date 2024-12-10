<?php

include 'db.php';
include './functions/crud-functions.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="shahryar">
    <link rel="stylesheet" href="/src/style/style.css">
    <title>Funky ass todo app</title>
</head>

<body>
    <h1>Todo</h1>
    <h2>Lists:</h2>
    <?php
    $list = getLists($conn);

    foreach ($list as $l): ?>
        <div class="list-container">
            <p class="list-info"><?php echo htmlspecialchars($l['id']); ?>.</p>
            <p class="list-info"><?php echo htmlspecialchars($l['title']); ?>.</p>
        </div>

    <?php endforeach; ?>
    <div class="task-list">
        <h2>Tasks:</h2>
        <?php
        $tasks = getTasks($conn);

        foreach ($tasks as $t): ?>
            <div class="task">
                <h3 class="task-title"><?php echo htmlspecialchars($t['title']); ?></h3>
                <div class="container">
                    <div class="task-info">
                        <p><?php echo htmlspecialchars($t['id']); ?></p>
                        <input type="checkbox" <?php if ($t['isDone']) echo 'checked'; ?>>
                    </div>
                    <div class="cta-container">
                        <button><a href="./views/edit.php">edit</a></button>
                        <button>delete</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>