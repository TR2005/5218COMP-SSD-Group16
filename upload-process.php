<?php
// Include master page so it uses the same page layout and navigation bar 
include "Masterpage.php";
MasterPage();

// Set directory for uploaded images
$target_dir = "uploads/";

// Create file path by combining folder with uploaded file-name
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

// Check for whether the file / image is safe to process
$uploadOk = 1;

// Converts image / file name to lowercase for format checks (jpg, GIF, PNG, JPEG, JPG)
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if the form was submitted
if (isset($_POST["submit"])) {

    // Check if image is an image
    // getimagesize() will return false if file isn't a valid image
    $check = @getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        // If it's a valid image, displays format of image
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        // Prevent upload if file isn't an image
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }

    // Check if image with same name exists in uploads folder
    if (file_exists($target_file)) {
        echo "Sorry, this file already exists. Please rename the file, or upload a different file.<br>";
        $uploadOk = 0;
    }

    // Only allow common media formats to be uploaded
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Please upload files in these formats: JPG, JPEG, PNG, & GIF.<br>";
        $uploadOk = 0;
    }

    // If any checks fail, upload will cancel
    if ($uploadOk == 0) {
        echo "File was not uploaded. Please make changes according to errors stated above.";
    } else {
        // If all checks are good, move image to uploads folder
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            // Display error message to user if upload had an error
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>
