<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Dummy check - replace with database check in real app
if ($username === "admin" && $password === "admin123") {
  $_SESSION['user'] = $username;
  header("Location: secured.php");
} else {
  $_SESSION['error'] = "Invalid username or password.";
  header("Location: login.php");
}
