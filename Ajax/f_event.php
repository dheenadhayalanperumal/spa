<?php
include 'db_config.php';  

$start = $_GET['start'];
$end = $_GET['end'];

try {
    // Prepare SQL query with placeholders to prevent SQL injection
    $sql = "SELECT id, customer_name, preferred_date FROM appointments 
            WHERE preferred_date BETWEEN :start AND :end";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':start', $start);
    $stmt->bindParam(':end', $end);
    $stmt->execute();

    $events = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $events[] = [
            "id" => $row["id"],
            "title" => $row["customer_name"],
            "start" => $row["preferred_date"]
        ];
    }

    echo json_encode($events);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
