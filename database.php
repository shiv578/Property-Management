<?php
$servername = "localhost";
$username = "root";
$password = ""; // If MySQL has a password, put it here (e.g., "yourpassword")
$dbname = "users"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>