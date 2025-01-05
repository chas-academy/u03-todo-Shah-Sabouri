<?php
include '../db.php';

if (isset($_POST['id']) && isset($_POST['checked'])) {
    $id = (int)$_POST['id'];
    $checked = $_POST['checked'] == '1' ? 1 : 0;


    $query = "UPDATE stuffToDo SET checked = :checked WHERE id = :id";
    // Förbereder SQL-frågan för att uppdatera 'checked'-statusen för uppgiften i databasen.

    try {
        $stmt = $conn->prepare($query);

        // Binder samman följande parametrar till förberedd SQL-fråga
        $stmt->bindParam(':checked', $checked);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: ../index.php"); // Omdirigerar till huvudsidan efter uppdatering
        exit();
    } catch (PDOException $e) {
        // Fångar eventuella fel under uppdateringen av databasen och loggar dem för felsökning.
        error_log("Uppdatering misslyckades: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
        exit()
    }
} else {
    header("Location: ../index.php");
    exit(); // Om de nödvändiga parametrarna inte är inställda, omdirigeras användaren till huvudsidan.
}
?>