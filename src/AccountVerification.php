<?php
session_start();
// Retrieve the user input values
$user = $_POST['user'];
$login_password = $_POST['password'];

// Connect to the SQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";
$conn = new mysqli($servername, $username, $password, $dbname);

// Query the database to retrieve the user's record
$sql = "SELECT * FROM users WHERE UserName='$user'";
$result = $conn->query($sql);

// Verify the password
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $hashed_password = $row['Password'];
  if (password_verify($login_password, $hashed_password)) {
    // Password is correct, allow the user to proceed to the main page
    $_SESSION['username'] = $row['UserName']; // Set session variable
    $_SESSION['loggedin'] = true;
    header('Location: index.php');
    exit();
  } else {
    // Password is incorrect, display an error message
    $_SESSION['error_message'] = "Incorrect username or password";
    
  }
} else {
  // User not found, display an error message
  $_SESSION['error_message'] = "Incorrect username or password";
    header('Location: login.php');
}

// Close the database connection
$conn->close();
?>








