<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<body>

<h2>Login Page</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type ="password" name="password" placeholder="Password">
<button type="submit">Login</button>

</form>
<?php

if(isset($_POST['username'])){

$username = $_POST['username'];
$password = $_POST['password'];

if($username == "admin" && $password == "admin123"){
    echo "Welcome Amdmin!";

}
else{
    echo "Login Failed!";

}

}

?>

</body>
</html>