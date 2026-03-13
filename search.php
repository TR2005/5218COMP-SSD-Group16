<?php
include "Masterpage.php";
MasterPage();
//Connecting to DB
$conn= new mysqli ('localhost', 'root', '', 'ssdcoursework1');
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Page</title>
</head>

<body>

<h2>Search</h2>
<form method="GET">
<input type="text" name="query" placeholder="Search here">
<button type="submit">Search</button>

</form>

<?php

if(isset($_GET['query'])){
    $search = $_GET['query'];
    //Getting param to work with Like statement
    $search = '%' . $search . '%';
    if($stmt = $conn ->prepare("SELECT comment FROM comments WHERE comment LIKE ?")){
        $stmt -> bind_param("s", $search);
        $stmt -> execute();
        $stmt -> bind_result($comment);
        $stmt -> store_result();
        while ($stmt -> fetch()){
            echo "<h3>$comment</h3>";
        }
    }
}

?>

</body>
</html>