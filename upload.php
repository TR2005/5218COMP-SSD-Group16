<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>

<h2>Upload File</h2>

<form action="upload-process.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>