<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $service_ids = $_POST['service_ids'];
    $employee_ids = $_POST['employee_ids'];
    $service_duration_hours = $_POST['service_duration_hours'];
    $service_duration_minutes = $_POST['service_duration_minutes'];
    $enquiry_status = $_POST['enquiry_status'];
    $created_at = date('Y-m-d H:i:s'); // Current timestamp

    // Validate input data
    if (empty($customer_name) || empty($mobile_number) || empty($email) || empty($appointment_date) || empty($appointment_time) || empty($service_ids) || empty($employee_ids) || (empty($service_duration_hours) && empty($service_duration_minutes)) || empty($enquiry_status)) {
        die('Please fill all the required fields.');
    }

    // Ensure service_ids and employee_ids are arrays and contain valid integers
    if (!is_array($service_ids) || !is_array($employee_ids)) {
        die('Service IDs and Employee IDs must be arrays.');
    }

    foreach ($service_ids as $service_id) {
        if (!filter_var($service_id, FILTER_VALIDATE_INT)) {
            die('Invalid Service ID.');
        }
    }

    foreach ($employee_ids as $employee_id) {
        if (!filter_var($employee_id, FILTER_VALIDATE_INT)) {
            die('Invalid Employee ID.');
        }
    }

    // Calculate total service duration in minutes
    $service_duration_hours = (int)$service_duration_hours;
    $service_duration_minutes = (int)$service_duration_minutes;
    $service_duration = ($service_duration_hours * 60) + $service_duration_minutes;

    // Insert data into appointments table for each service and employee
    foreach ($service_ids as $service_id) {
        foreach ($employee_ids as $employee_id) {
            $stmt = $conn->prepare("
                INSERT INTO appointments (customer_name, mobile_number, email, appointment_date, appointment_time, service_id, employee_id, service_duration, enquiry_status, created_at)
                VALUES (:customer_name, :mobile_number, :email, :appointment_date, :appointment_time, :service_id, :employee_id, :service_duration, :enquiry_status, :created_at)
            ");
            if (!$stmt) {
                die('Prepare failed: ' . htmlspecialchars($conn->errorInfo()[2]));
            }
            $result = $stmt->execute([
                ':customer_name' => $customer_name,
                ':mobile_number' => $mobile_number,
                ':email' => $email,
                ':appointment_date' => $appointment_date,
                ':appointment_time' => $appointment_time,
                ':service_id' => $service_id,
                ':employee_id' => $employee_id,
                ':service_duration' => $service_duration,
                ':enquiry_status' => $enquiry_status,
                ':created_at' => $created_at
            ]);
            if (!$result) {
                die('Execute failed: ' . htmlspecialchars($stmt->errorInfo()[2]));
            }
        }
    }

    // Redirect or output success message
    echo 'Appointment successfully created.';
}
?>