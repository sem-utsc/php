<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Validate the form data (you can add more validation as per your requirements)
    if (empty($name) || empty($password) || empty($email)) {
        echo "Please fill in all the fields.";
    } else {
        // Connect to your database (replace the placeholders with your actual database credentials)
        $servername = "db";
        $dbusername = "mariadb";
        $dbpassword = "mariadb";
        $dbname = "mariadb";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query to insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, password_hash($password,PASSWORD_DEFAULT), $email);
        $stmt->execute();

        // Check if the user is successfully registered
        if ($stmt->affected_rows > 0) {
            echo "User registered successfully.";
        } else {
            echo "Error registering user.";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    }
}
require 'register.view.php';
?>