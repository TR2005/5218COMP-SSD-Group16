<?php
    include "Masterpage.php";
    MasterPage();
    //Connecting to DB
    $dbcreds= new mysqli ('localhost', 'root', '', 'ssdcoursework1');
    $tSignupForm= <<<Signup
        <title>Login</title>
        <form action="" method="POST" class="form-horizontal">
            <fieldset>
                <legend>Login to Account</legend>
                <!--Username Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Input Email</label>
                    <div class="col-md-4">
                        <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="" minlength="8" maxlength="40"> <span class="help-block">Enter the Username</span>
                    </div>
                </div>
                <!--Password Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Password">Input your Password</label>
                    <div class="col-md-4">
                        <input id="Password" name="Password" type="Password" placeholder="" class="form-control input-md" required="" minlength="1" maxlength="20"> <span class="help-block">Enter your Password</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button id="form-submission" name="form-submission" type="submit" class="btn btn-primary btn-lg">Login</button>
                    </div>
                </div>
            </fieldset>
        </form>
    Signup;
    echo "<body>$tSignupForm</body>";
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
        //Assigning form values to variables
        $email = $_POST['email'];
        $password = $_POST['Password'];
        //Preparing statement to be used with bind_param to stop SQL Injection
        if($stmt = $dbcreds ->prepare("SELECT Username, Password FROM users WHERE Email = ? ")){
            $stmt -> bind_param("s", $email);
            $stmt -> execute();
            $stmt -> bind_result($username, $phash);
            $stmt -> store_result();
            while ($stmt -> fetch()){
                if(password_verify($password, $phash)){
                    $_SESSION['username'] = $username;
                    header("Location: Home.php");
                }
                echo "<script type ='text/javascript'>alert('Email or Password incorrect');</script>";
            }
        }
    }
?>