<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Welcome</title>
</head>

<body>
  <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
  <p>This is a secured page.</p>
  <a href="logout_process.php">Logout</a>
</body>

</html>