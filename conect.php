<?php

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pinkline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Validate and sanitize form data
$name = sanitizeInput($_POST['name']);
$email = sanitizeInput($_POST['email']);
$subject = sanitizeInput($_POST['subject']);
$phone = sanitizeInput($_POST['phone']);
$message = sanitizeInput($_POST['message']);

// SQL query to insert data into the ContactForm table
$sql = "INSERT INTO ContactForm (name, email, subject, phone, message) VALUES ('$name', '$email', '$subject', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Your message has been sent. Thank you!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
