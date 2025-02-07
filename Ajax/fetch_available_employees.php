<?php
include '../db_config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Calculate the start and end time of the appointment
    $start_time = new DateTime("$date $time");

    // Fetch employees who do not have an overlapping appointment
    $stmt = $conn->prepare("
        SELECT id, first_name 
        FROM Employees 
        WHERE id NOT IN (
            SELECT employee_id 
            FROM appointments 
            WHERE appointment_date = :date 
            AND (
                (appointment_time <= :start_time AND DATE_ADD(appointment_time, INTERVAL duration MINUTE) > :start_time) OR
                (appointment_time < DATE_ADD(:start_time, INTERVAL duration MINUTE) AND DATE_ADD(appointment_time, INTERVAL duration MINUTE) >= DATE_ADD(:start_time, INTERVAL duration MINUTE)) OR
                (appointment_time >= :start_time AND DATE_ADD(appointment_time, INTERVAL duration MINUTE) <= DATE_ADD(:start_time, INTERVAL duration MINUTE))
            )
        )
    ");
    $stmt->execute([
        ':date' => $date,
        ':start_time' => $start_time->format('H:i:s')
    ]);
    $available_employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the available employees as JSON
    echo json_encode($available_employees);
}
?>