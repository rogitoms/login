<?php
// Include the database connection file
include 'db.php';  // Assuming you created db.php for your database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the query to select the user by email
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);  // 's' specifies the type of the parameter as string
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            echo "Login successful! Welcome, " . $user['email'];
            // Redirect to dashboard or other page here
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with this email.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
