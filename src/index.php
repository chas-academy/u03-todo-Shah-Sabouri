<?php

include 'db.php';
include './functions/crud-functions.php'

?>

<?php include "header.php"; ?>


    <h1>Todo</h1>
    <h2>Lists:</h2>
    <?php
    $list = getLists($conn);

    foreach ($list as $l): ?>
        <div class="list-container">
            <p class="list-info"><?php echo htmlspecialchars($l['list_id']); ?>.</p>
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
                        <p><?php echo htmlspecialchars($t['task_id']); ?></p>
                        <input type="checkbox" <?php if ($t['isDone']) echo 'checked'; ?>>
                    </div>
                    <div class="cta-container">
                        <button><a href="./views/edit.php">edit</a></button>
                        <button><a href="./views/delete.php">delete</a></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>