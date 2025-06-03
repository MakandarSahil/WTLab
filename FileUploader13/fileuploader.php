<!DOCTYPE html>
<html>

<head>
  <title>File Uploader</title>
</head>

<body>
  <h2>Upload an Image (GIF, JPEG, or PJPEG only, max 20KB)</h2>
  <form action="upload_file.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="uploadedFile" required>
    <br><br>
    <input type="submit" name="submit" value="Upload">
  </form>
</body>

</html>