<?php
session_start();

// Database connection (same as update-favorites.php)
// ...$host = 'localhost';
$db   = 'users';
$user = 'your_username';
$pass = 'your_password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die(json_encode([]));
}

$stmt = $pdo->prepare("SELECT property_id FROM favorites WHERE user_id = ?");
$stmt->execute([$userId]);
$favorites = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($favorites);
?>