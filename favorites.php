<?php
session_start();

// Database connection
// ...

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header('Location: login.php');
    exit;
}

// Get favorite properties
$stmt = $pdo->prepare("
    SELECT p.* 
    FROM properties p
    JOIN favorites f ON p.id = f.property_id
    WHERE f.user_id = ?
");
$stmt->execute([$userId]);
$properties = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Favorites</title>
    <!-- Include your CSS and JS files -->
</head>
<body>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-8">My Favorite Properties</h1>
        
        <?php if (empty($properties)): ?>
            <div class="text-center py-12">
                <i class="fas fa-heart text-5xl text-gray-300 mb-4"></i>
                <p class="text-xl text-gray-500">You haven't saved any favorites yet</p>
                <a href="properties.php" class="mt-4 inline-block bg-purple-600 text-white px-6 py-2 rounded-lg">
                    Browse Properties
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($properties as $property): ?>
                    <div class="property-card bg-gray-900 rounded-xl overflow-hidden transition hover:shadow-xl hover:shadow-purple-500/10">
                        <!-- Display property card similar to your main page -->
                        <!-- Make sure to include the favorite button with red heart -->
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>