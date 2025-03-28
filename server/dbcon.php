<?php
$host = 'localhost';
$dbname = 'pub-quote';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Database connection successful!";
} catch (PDOException $e) {
    
    die("Database connection failed: " . $e->getMessage());
}
?>