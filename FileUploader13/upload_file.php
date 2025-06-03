<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["uploadedFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if file is an actual image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["uploadedFile"]["tmp_name"]);
  if ($check !== false) {
    echo "File is an image - " . $check["mime"] . ".<br>";
  } else {
    echo "File is not an image.<br>";
    $uploadOk = 0;
  }

  // Check file size (< 20000 bytes)
  if ($_FILES["uploadedFile"]["size"] > 200000) {
    echo "Sorry, your file is too large. Max 2MB allowed.<br>";
    $uploadOk = 0;
  }

  // Allow only specific formats
  if (!in_array($imageFileType, ["gif", "jpeg", "pjpeg", "jpg"])) {
    echo "Sorry, only GIF, JPEG, PJPEG, and JPG files are allowed.<br>";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($targetFile)) {
    echo "Sorry, file already exists.<br>";
    $uploadOk = 0;
  }

  // Upload file
  if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $targetFile)) {
      echo "The file " . htmlspecialchars(basename($_FILES["uploadedFile"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "Your file was not uploaded.";
  }
}
