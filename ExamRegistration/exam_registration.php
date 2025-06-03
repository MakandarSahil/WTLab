<!DOCTYPE html>
<html>

<head>
  <title>Student Exam Registration</title>
  <style>
    .error {
      color: red;
    }

    body {
      font-family: Arial;
      margin: 30px;
    }

    form {
      max-width: 500px;
    }

    input,
    textarea {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
    }
  </style>
</head>

<body>

  <?php
  $name = $email = $dob = $regno = $subject = "";
  $nameErr = $emailErr = $dobErr = $regnoErr = $subjectErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //validate name
    if (empty($_POST["name"])) {
      $nameErr = "Name is Required !!";
    } else {
      $name = htmlspecialchars($_POST["name"]);
      if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only Letters and White Spaces are Allowed !!";
      }
    }

    //validate email
    if (empty($_POST["email"])) {
      $emailErr = "Email is Required !!";
    } else {
      $email = htmlspecialchars($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email formart !!";
      }
    }

    //validate DOB
    if (empty($_POST["dob"])) {
      $dobErr = "Date of Birth is Required !!";
    } else {
      $dob = htmlspecialchars($_POST["dob"]);
    }

    //validate Reg no
    if (empty($_POST["regno"])) {
      $regnoErr = "Registration number is required !!";
    } else {
      $regno = htmlspecialchars($_POST["regno"]);
      if (!preg_match("/^[0-9]{6,10}$/", $regno)) {
        $regnoErr = "Only 6 to 10 digits allowed";
      }
    }

    // Validate Subject
    if (empty($_POST["subject"])) {
      $subjectErr = "Subject is required";
    } else {
      $subject = htmlspecialchars($_POST["subject"]);
    }

    //if no errors 
    if (empty($nameErr) && empty($emailErr) && empty($dobErr) && empty($regnoErr) && empty($subjectErr)) {
      echo "<h3 style='color:green;'>Registration Successful!</h3>";
      echo "<p><strong>Name:</strong> $name</p>";
      echo "<p><strong>Email:</strong> $email</p>";
      echo "<p><strong>Date of Birth:</strong> $dob</p>";
      echo "<p><strong>Registration No:</strong> $regno</p>";
      echo "<p><strong>Subject:</strong> $subject</p>";
      exit;
    }
  }

  ?>

  <h2>Student Exam Registration Form</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <span class="error">* <?php echo $nameErr; ?></span>
    <input type="text" name="name" value="<?php echo $name; ?>">

    Email: <span class="error">* <?php echo $emailErr; ?></span>
    <input type="text" name="email" value="<?php echo $email; ?>">

    Date of Birth: <span class="error">* <?php echo $dobErr; ?></span>
    <input type="date" name="dob" value="<?php echo $dob; ?>">

    Registration Number: <span class="error">* <?php echo $regnoErr; ?></span>
    <input type="text" name="regno" value="<?php echo $regno; ?>">

    Subject: <span class="error">* <?php echo $subjectErr; ?></span>
    <input type="text" name="subject" value="<?php echo $subject; ?>">

    <input type="submit" value="Register">
  </form>

</body>

</html>