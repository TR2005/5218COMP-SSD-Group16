<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "Comments table";

$conn = mysqli_connect($host,$user,$password,$dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>

<?php
include "config.php";

$post_id = $_GET['id']; // which post is being viewed
?>

<h2>Post Title</h2>
<p>This is an example blog post.</p>

<hr>

<h3>Comments</h3>

<?php

$sql = "SELECT * FROM comments WHERE post_id='$post_id'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

    echo "<p>".$row['comment']."</p>";
}

?>

<hr>

<h3>Add Comment</h3>

<form action="add_comment.php" method="POST">

<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

<textarea name="comment" placeholder="Write a comment..." required></textarea>

<br><br>

<button type="submit">Post Comment</button>

</form>

<?php

include "config.php";

$post_id = $_POST['post_id'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (post_id, comment)
        VALUES ('$post_id','$comment')";

mysqli_query($conn,$sql);

header("Location: view_post.php?id=".$post_id);

?>