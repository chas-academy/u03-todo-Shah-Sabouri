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
        "$password",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Anslutning lyckades!";
} catch (PDOException $e) {
    echo "Anslutningsfel: " . $e->getMessage();
}
?>