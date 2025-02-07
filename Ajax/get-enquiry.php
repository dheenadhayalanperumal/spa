<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Log the received ID for debugging
    // error_log("Received ID: " . $id);
    // echo "Received ID: " . $id . "<br>";

    // Check if the ID is valid
    if (!is_numeric($id)) {
        echo json_encode(["error" => "Invalid ID"]);
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM enquiries WHERE id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result === false) {
        error_log("Execute failed: " . $stmt->errorInfo()[2]);
        echo json_encode(["error" => "Database error"]);
        exit;
    }

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["error" => "Enquiry not found"]);
    }

    // Close the statement
    $stmt = null;
} else {
    echo json_encode(["error" => "Invalid request"]);
}

// Close the connection
$conn = null;
?>