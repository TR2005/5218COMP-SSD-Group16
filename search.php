<?php

$conn = mysqli_connect("localhost","root","","secure_app");
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
    $sql = "SELECT * FROM posts WHERE title LIKE '%$search%'";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($result)){
        echo "<h3>".$row['title']."</h3>";
        echo "<p>".$row['content']."</p>";

}

}

?>

</body>
</html>