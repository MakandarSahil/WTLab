<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
</head>

<body>
  <h2>Login Form</h2>
  <form action="login_process.php" method="post">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>

  <?php
  session_start();
  if (isset($_SESSION['error'])) {
    echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']);
  }
  ?>
</body>

</html>