<?php
// Include the database connection file
include 'db.php';  // Ensure you have db.php file with the database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an SQL query to insert the user into the database
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $hashed_password);  // 'ss' specifies both parameters are strings

    // Execute the query
    if ($stmt->execute()) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>