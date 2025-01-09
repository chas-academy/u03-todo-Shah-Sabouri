<?php

include 'db.php';

if (!$conn) {
    echo 'Database connection failed!';
    exit();
}

$query = 'SELECT * FROM stuffToDo';
$todos = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="main-section">
        <h1>To-Do List</h1>
        <div class="add-section">
            <form action="functions/create.php" method="POST">
                <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="title" placeholder="Required field"/>
                    <button type="submit">Add</button>
                <?php } else { ?>
                    <input type="text" name="title" placeholder="Add task" />
                    <button type="submit">Add</button>
                <?php } ?>
            </form>
        </div>
        <div class="show-todo-section">
            <?php if ($todos->rowCount() <= 0) { ?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="assets/img-empty-todo.jpg" alt="img" width="100%">
                    </div>
                </div>
            <?php } ?>

            <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <div class="options-container">
                        <a href="functions/edit.php?id=<?php echo $todo['id']; ?>"
                        class="edit-btn">Edit</a>
                        <a href="functions/remove.php?id=<?php echo $todo['id']; ?>"
                        class="remove-todo" onclick="return confirm('Are you sure you want to delete this task?')">
                        x</a>
                    </div>

                    <form action="functions/check.php" method="POST" class="todo-form">
                        <input type="hidden" name="id" value="<?php echo $todo['id']; ?>" />
                        <input type="hidden" name="checked" value="<?php echo $todo['checked'] ? 0 : 1; ?>" />
                        <div class="todo-checkbox-container">
                            <input type="checkbox" name="toggle"
                            <?php echo $todo['checked'] ? 'checked' : ''; ?>
                            onchange="this.form.submit()" />
                            <h2 class="<?php echo $todo['checked'] ? 'checked' : ''; ?>">
                                <?php echo htmlspecialchars($todo['title']); ?>
                            </h2>
                        </div>
                    </form>
                    <br>
                    <small>created: <?php echo $todo['date_time']; ?></small>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>