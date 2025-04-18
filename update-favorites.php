<?php
session_start();

// Database connection (modify with your credentials)
$host = 'localhost';
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

// Get user ID (you'll need to implement proper authentication)
$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    die(json_encode(['error' => 'User not authenticated']));
}

// Get property data
$propertyId = $_POST['id'] ?? null;
$action = $_POST['action'] ?? null;

if (!$propertyId || !in_array($action, ['add', 'remove'])) {
    die(json_encode(['error' => 'Invalid request']));
}

if ($action === 'add') {
    // Check if already favorited
    $stmt = $pdo->prepare("SELECT * FROM favorites WHERE user_id = ? AND property_id = ?");
    $stmt->execute([$userId, $propertyId]);
    
    if ($stmt->rowCount() === 0) {
        // Add to favorites
        $stmt = $pdo->prepare("INSERT INTO favorites (user_id, property_id) VALUES (?, ?)");
        $stmt->execute([$userId, $propertyId]);
    }
} else {
    // Remove from favorites
    $stmt = $pdo->prepare("DELETE FROM favorites WHERE user_id = ? AND property_id = ?");
    $stmt->execute([$userId, $propertyId]);
}

echo json_encode(['success' => true]);
?>