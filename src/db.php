<?php
$servername = "db";
$username = "root";
$password = "mariadb";
$dbname = "todo";
// PDO-anslutning
try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        "$username",
        "$password",);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Anslutningsfel: " . $e->getMessage());
    echo "Anslutning till databass misslyckades, försök igen senare.";
    exit();
}
?>