<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $customer_name = $_POST['customer_name'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $source = $_POST['source'];
    $interested_services = isset($_POST['interested_services']) ? implode(", ", $_POST['interested_services']) : '';  // Check if 'interested_services' is set
    $preferred_date = $_POST['preferred_date'];
    $preferred_time = $_POST['preferred_time'];
    $enquiry_status = $_POST['enquiry_status'];
    
    // Debugging: Print form values
    // echo "Customer Name: " . $customer_name . "<br>";
    // echo "Mobile Number: " . $mobile_number . "<br>";
    // echo "Email: " . $email . "<br>";
    // echo "Source: " . $source . "<br>";
    // echo "Interested Services: " . $interested_services . "<br>";
    // echo "Preferred Date: " . $preferred_date . "<br>";
    // echo "Preferred Time: " . $preferred_time . "<br>";
    // echo "Enquiry Status: " . $enquiry_status . "<br>";

    // Check if the enquiry_status is valid
    $valid_statuses = ['pending', 'follow-up', 'confirmed', 'rejected'];
    if (!in_array($enquiry_status, $valid_statuses)) {
        echo "Invalid enquiry status.";
        exit;
    }

    $enquiry_date = date("Y-m-d H:i:s"); // Current date and time
    // echo "Enquiry Date: " . $enquiry_date . "<br>";

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Enquiries (customer_name, mobile_number, email, source, interested_services, preferred_date, preferred_time, enquiry_status, enquiry_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->execute([$customer_name, $mobile_number, $email, $source, $interested_services, $preferred_date, $preferred_time, $enquiry_status, $enquiry_date]);

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