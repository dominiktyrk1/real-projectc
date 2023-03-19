
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login - Crypto Tracker</title>

    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
      }
      
      header {
        background-color: #1f1f1f;
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.2);
      }
      
      .logo {
        font-size: 24px;
        font-weight: bold;
      }
      
      .navigation {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      
      .navigation a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
      }
      
      .navigation a:hover {
        background-color: #555;
      }
      
      .form-box {
        margin: 20px auto;
        padding: 30px;
        max-width: 400px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.2);
      }
      
      .form-box h3 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
      }
      
      .input-box {
        margin-bottom: 20px;
      }
      
      .input-box input[type="text"], 
      .input-box input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        font-weight: bold;
        color: #333;
        background-color: #f1f1f1;
      }
      
    .input-box input[type="text"], 
.input-box input[type="password"] {
  display: block;
  width: 90%; /* updated width value */
  padding: 10px;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 3px 3px rgba(0, 0, 0, 0.1);
  font-size: 16px;
  font-weight: bold;
  color: #333;
  background-color: #f1f1f1;
}
      .extra-links {
        display: column;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
      }
      
      .extra-links a {
        color: #333;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
      }
      
      .extra-links a:hover {
        text-decoration: underline;
      }
      
      .btn {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #000;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
      }
      .btn:hover {
        background-color: #111;
      }
    </style>
  </head>
  <body>
    <header>
      <h1 class="logo">Logo</h1>
      <nav class="navigation">
        <a href="index.php">Home</a>
        <a href="#">Portfolio</a>
        <a href="Calc.html">Calculator</a>
        <a href="watchlist.php">Watchlist</a>
        <a href="login.php">Login</a>
      </nav>
      
      </header>
    <div class="form-box login">
      <h3>Login</h3>
      <?php
      session_start();
        if (isset($_SESSION['error_message'])) {
          echo '<p style="color:red">'.$_SESSION['error_message'].'</p>';
          unset($_SESSION['error_message']);
        }
        ?>
      <form method="post" action="AccountVerification.php">
        <div class="input-box">
          <input type="text" id="user" name="user" required placeholder="Enter your username...">
        </div>
        <br>
        <div class="input-box">
          <input type="password" id="password" name="password" required placeholder="Enter your password...">
          <div class="extra-links">
            <div class="remember-forget">
              <a href="forgotpassword.html">Forget Password?</a>
            </div>
            <p>Don't have an account? <a href="signup.html" class="register-link">Register</a></p>
            <button type="submit" class="btn">Login</button>
          </div>
        </div>
       
        <div class="login-register">        
        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>