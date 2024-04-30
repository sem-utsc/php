<?php
// Database connection details
$servername = "db";
$username = "mariadb";
$password = "mariadb";
$dbname = "mariadb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get email and password from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($hashedPassword);
$stmt->fetch();

// Verify the password
if (password_verify($password, $hashedPassword)) {
    // Password is correct, login successful
    session_start();
    $_SESSION['email'] = $email;
} else {
    // Password is incorrect, login failed
    echo "Invalid email or password.";
}

// Close the database connection
$stmt->close();
$conn->close();
?>