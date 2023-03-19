<?php
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Crypto Tracker</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <nav>
      <!-- menu items go here -->
      <div id="menu">
        <div id="menu-items">
          <a href="Today.php" class="menu-item">Today's Crypto Prices</a>
          <a href="index.php" class="menu-item">Home</a>
          <a href="#" class="menu-item">Portfolio</a>
          <a href="Calc.html" class="menu-item">Calculator</a>
          <a href="watchlist.php" class="menu-item">Watchlist</a>
          <a href="login.php" class="menu-item">Login</a>   
        </div>
        <div id="menu-background-pattern"></div>
      </div>
    </nav>
    <?php

      if (isset($_SESSION['username'])) {
        echo "<div id='user-menu'>";
        echo "<span>Welcome, " . $_SESSION['username'] . "</span>";
        echo "<a href='logout.php'>Sign Out</a>";
        echo "</div>";
      } else {
        echo "Not logged in";
      }
    ?>
  </body>
</html>
    