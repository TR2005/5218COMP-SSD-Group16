<?php
include "Masterpage.php";
MasterPage();
//Connecting to DB
$conn= new mysqli ('localhost', 'root', '', 'ssdcoursework1');

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>

<?php
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

<form method="POST">

<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

<textarea name="comment" placeholder="Write a comment..." required></textarea>

<br><br>

<button type="submit">Post Comment</button>

</form>

<?php
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
        $post_id = $_POST['post_id'];
        $comment = $_POST['comment'];
        if ($stmt = $conn -> prepare("INSERT INTO comments (post_id, comment) Values (?, ?)")){
            $stmt -> bind_param("ss", $post_id, $comment);
            $stmt -> execute();
            if ($stmt -> insert_id == 0){
                echo "<script type ='text/javascript'>alert('Failed to add comment');/script>";
                exit();
            }else{header("Location: Comments.php?id=$post_id");}
            $stmt -> close();
        }
    }
?>