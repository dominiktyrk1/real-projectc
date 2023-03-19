<?php
session_start();
$_SESSION["loggedin"] = false;
$_SESSION["username"] = null;
session_unset();
session_destroy();
header('Location: index.php'); // Redirect to login page

?>

