<?php
// Database connection settings
$host = 'localhost';  // Database host
$dbname = 'CAT1';     // Your database name
$username = 'root';   // Your MariaDB username (use yours)
$password = '';       // Your MariaDB password (use yours)

// Create a new database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
