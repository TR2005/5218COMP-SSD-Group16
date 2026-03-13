<?php
// Include master page so it uses the same page layout and navigation bar 
include "Masterpage.php";
MasterPage();

// Display heading for Gallery of Images
echo "<h2>Uploaded Images</h2>";

// Defines folder where uploaded files are stored
$folder = "uploads/";

// Check if uploads folder exists
if (is_dir($folder)) {

    // Scan uploads folder and return results
    $files = scandir($folder);

    // Loop through each image found
    foreach ($files as $file) {

        // Ignore default directory entries
        if ($file != "." && $file != "..") {

            // Create full path to file for link 
            $path = $folder . $file;

            // Sarts a container for displaying uploaded images
            echo "<div style='margin-bottom:20px;'>";

            // Display file name safely so no dodgy image names
            echo "<p>" . htmlspecialchars($file) . "</p>";

            // Display image on page
            echo "<img src='" . htmlspecialchars($path) . "' style='max-width:300px; height:auto;'>";

            echo "<br>";

            // Provide link so users can see full image
            echo "<a href='" . htmlspecialchars($path) . "' target='_blank'>Open Image</a>";

            // Closes container 
            echo "</div>";
        }
    }

// Display error message if folder isn't found
} else {
    echo "<p>No uploads folder found.</p>";
}
?>
