<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name       = $_POST['first_name'];
    $last_name        = $_POST['last_name'];
    $mobile_number    = $_POST['mobile_number'];
    $email            = $_POST['email'];
    $gender           = $_POST['gender'];
    $address          = $_POST['address'];
    $city             = $_POST['city'];
    $state            = $_POST['state'];
    $pincode          = $_POST['pincode'];
    $date_of_birth    = $_POST['dob'];
    $joining_date     = $_POST['joining_date'];
    $department       = $_POST['department'];
    $designation      = $_POST['designation'];
    $employment_type  = $_POST['employment_type'];
    $employee_status  = $_POST['employee_status'];
    $created_at       = date("Y-m-d H:i:s"); // Current timestamp

    // Validate unique email and mobile number
    $checkQuery = "SELECT * FROM Employees WHERE email = ? OR mobile_number = ?";
    $stmt = $conn->prepare($checkQuery);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->execute([$email, $mobile_number]);

    if ($stmt->rowCount() > 0) {
        echo "Error: Employee with this Email or Mobile Number already exists!";
        exit;
    }

    // Prepare insert query
    $insertQuery = "INSERT INTO Employees (first_name, last_name, mobile_number, email, gender, address, city, state, pincode, date_of_birth, joining_date, department, designation, employment_type, employee_status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->execute([$first_name, $last_name, $mobile_number, $email, $gender, $address, $city, $state, $pincode, $date_of_birth, $joining_date, $department, $designation, $employment_type, $employee_status, $created_at]);

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