<?php
$servername = "localhost";  // Replace with your server address if different
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "Spa"; // Replace with your database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Uncomment this line if you want to check the connection status
    // echo "Connected successfully" . "<br>"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
