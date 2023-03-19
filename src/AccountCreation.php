<?php
// Get the user input from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$user = $_POST['username'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO users (firstName, lastName, Email, UserName, Password) VALUES (?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("sssss", $first_name, $last_name, $email, $user, $hashed_password);

// Execute the query
if ($stmt->execute()) {
    echo "User created successfully";
} else {
    echo "Error creating user: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
}
?>