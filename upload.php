<!DOCTYPE html>

<?php
// Include master page so it uses the same page layout and navigation bar 
include "Masterpage.php";
MasterPage();
?>

<html>
<head>
    <title>Upload File</title>
</head>
<body>
<!-- Heading for Upload --> 
<h2>Upload File</h2>

<!-- Allows user to upload file to server. --> 
<form action="upload-process.php" method="post" enctype="multipart/form-data">

    <!-- Prompts user selects an image to upload -->
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required>

    <!-- Submit button to send file to upload-process.php --> 
    <input type="submit" value="Upload File" name="submit">
</form>

</body>

</html>
