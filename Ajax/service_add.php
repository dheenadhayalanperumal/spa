<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['service_name'];
    $price = $_POST['service_price'];
    $duration = $_POST['service_duration'];
    $created_at = date("Y-m-d H:i:s"); // Current timestamp
    $updated_at = date("Y-m-d H:i:s"); // Current timestamp

    // Prepare insert query
    $insertQuery = "INSERT INTO services (name, price, duration, created_at, updated_at) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->execute([$name, $price, $duration, $created_at, $updated_at]);

    // Execute the statement
    if ($stmt->rowCount() > 0) {
        echo "New record created successfully";
    } else {
        echo "Error: " . htmlspecialchars($stmt->errorInfo()[2]);
    }

    // Close the statement
    $stmt = null;
} else {
    echo "No POST data received.";
}

// Close the connection
$conn = null;
?>