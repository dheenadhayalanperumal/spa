<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee_id = $_POST['employee_id'];
    $service_id = $_POST['service_id'];

    // Debugging: Print the form data
    // var_dump($employee_id);
    // var_dump($service_id);

    // Check if employee_id and service_id are set
    if (empty($employee_id) || empty($service_id)) {
        die('Employee ID or Service ID is missing or invalid.');
    }

    // Prepare and execute the SQL query using PDO
    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("INSERT INTO service_employee (employee_id, service_id) VALUES (:employee_id, :service_id)");
        $stmt->execute([':employee_id' => $employee_id, ':service_id' => $service_id]);
        $conn->commit();
        echo 'Service assigned successfully.';
    } catch (Exception $e) {
        $conn->rollBack();
        die('Error: ' . $e->getMessage());
    }
} else {
    die('Invalid request method.');
}
?>