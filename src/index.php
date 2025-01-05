<?php
include 'db.php';

if (!$conn) {
    echo "Database connection failed!";
    exit();  // Stop further script execution if no connection
}

$query = "SELECT * FROM stuffToDo";
$todos = $conn->query($query);

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
            <form action="functions/create.php" method="POST">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                    <input type="text"
                            name="title"
                            placeholder="Required field"/>
                <button type="submit">Add</button>

                <?php } else { ?>
                <input type="text"
                        name="title"
                        placeholder="Add task" />
                <button type="submit">Add</button>
                <?php } ?>
            </form>
        </div>
        <div class="show-todo-section">
            <?php if ($todos->rowCount() <= 0) { ?>
                <div class="todo-item">
                    <div class="empty">
                        <p>No tasks to show</p>
                        <!-- <img src="" alt="Pic 1" width="100%" />
                        <img src="" alt="Pic 2" width="80px"> -->
                        </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <a href="functions/edit.php?id=<?php echo $todo['id']; ?>" class="edit-btn">Edit</a>

                    <a href="functions/remove.php?id=<?php echo $todo['id']; ?>" class="remove-todo" onclick="return confirm('Are you sure you want to delete this task?')">x</a>                    
                    <?php if ($todo['checked']) { ?>
                        <input type="checkbox"
                            class="check-box"
                            data-todo-id="<?php echo $todo['id']; ?>"
                            checked />
                        <h2 class="checked">
                            <?php echo $todo['title'] ?>
                        </h2>
                    <?php } else { ?>
                        <input type="checkbox"
                            data-todo-id ="<?php echo $todo['id']; ?>"
                            class="check-box" />
                        <h2><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>created: <?php echo $todo['date_time'] ?></small>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>