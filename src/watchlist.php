<?php
session_start();
// Replace these values with your own database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Redirect to login page if user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.php");
  exit;
}

// Check if form has been submitted
if (isset($_POST['submit'])) {
  // Check for "add" action
  if ($_POST['action'] === 'add') {
    // Loop through checked checkboxes and add to watchlist array
    $watchlist = array();
    if (isset($_POST['cryptos'])) {
      foreach ($_POST['cryptos'] as $crypto_id) {
        $watchlist[] = $crypto_id;
      }
    }
    // Add watchlist to session variable
    $_SESSION['watchlist'] = $watchlist;
  }
}



// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Watchlist</title>
  </head>
  <body>
    <h1>Watchlist</h1>
    <table>
      <thead>
        <tr>
        <th>Market Cap Rank</th>
      <th>Name</th>
      <th>Current Price</th>
      <th>24h Price Change</th>
      
        </tr>
      </thead>
      <tbody>
       
        <tr>
          <td></td>
          <td></td>
          <td> </td>
          <td></td>
        </tr>
       
      </tbody>
    </table>
  </body>
</html>