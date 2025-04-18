<?php
session_start();

// Database connection (same as your other files)
$host = 'localhost';
$db   = 'your_database';
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
    die(json_encode(['error' => 'Database connection failed']));
}

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die(json_encode(['count' => 0]));
}

$stmt = $pdo->prepare("SELECT COUNT(*) as count FROM favorites WHERE user_id = ?");
$stmt->execute([$userId]);
$result = $stmt->fetch();

header('Content-Type: application/json');
echo json_encode(['count' => (int)$result['count']]);
?>