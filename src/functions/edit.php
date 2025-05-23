<?php
include '../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    $query = "SELECT * FROM stuffToDo WHERE id = :id LIMIT 1";
    // Förbereder SQL-frågan att hämta uppgift med angivet 'id'

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $todo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$todo) {
        header("Location: ../index.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Kontrollerar om formuläret skickades (POST-förfrågan)
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $newTitle = $_POST['title'];
            $newDescription = empty($_POST['description']) ? null : htmlspecialchars($_POST['description']);

            $updateQuery = "UPDATE stuffToDo SET title = :title, description = :description WHERE id = :id";
            // Förbereder SQL-frågan för att uppdatera uppgiftens titel i databasen
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bindParam(':title', $newTitle);
            $updateStmt->bindParam(':description', $newDescription, PDO::PARAM_STR);
            // Binder beskrivningen som en sträng (null om den är tom)
            $updateStmt->bindParam(':id', $id);

            if ($updateStmt->execute()) { // Kör uppdateringsfrågan
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error updating task. Please try again.";
            }
        } else {
            echo "Title cannot be empty!";
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="main-section">
        <div class="edit-section">
            <h1>Edit Task</h1>
            <form action="edit.php?id=<?php echo $todo['id']; ?>" method="POST">
                <input type="hidden" name="id" value="
                <?php echo $todo['id']; ?>" />
                <input type="text" name="title"
                placeholder="Edit task name" 
                value="<?php echo $todo['title']; ?>" required />
                <textarea name="description" placeholder="Edit task description"><?=$todo['description']?></textarea>
                <div class="button-container">
                    <button type="submit" 
                    class="update-btn">Update Task</button>
                    <button type="button" class="cancel-btn" 
                    onclick="window.location.href='../index.php';">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
