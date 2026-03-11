<?php
    include "Masterpage.php";
    MasterPage();
    //Connecting to DB
    $dbcreds= new mysqli ('localhost', 'root', '', 'ssdcoursework1');
    $tSignupForm= <<<Signup
        <form action="" method="POST" class="form-horizontal">
            <fieldset>
                <legend>Create a New Account</legend>
                <!--Username Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Input Username</label>
                    <div class="col-md-4">
                        <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="" minlength="8" maxlength="40"> <span class="help-block">Enter the Username</span>
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
                        <button id="form-submission" name="form-submission" type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                    </div>
                </div>
            </fieldset>
        </form>
    Signup;
    echo "<body>$tSignupForm</body>";
    if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
        //Assigning form values to variables
        $username = $_POST['username'];
        $password = $_POST['Password'];
        $phash = password_hash($password, PASSWORD_DEFAULT);
        //hashing password
        $hashpass = password_hash($password, PASSWORD_DEFAULT);
        if($stmt = $dbcreds ->prepare("SELECT 'ID' FROM users WHERE BINARY 'Username' = ? AND 'Password' = ?")){
            $stmt -> bind_param("ss", $username, $phash);
            $stmt -> execute();
            $stmt -> bind_result($id);
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            echo "session started";
            header("Location: http://localhost/ssd/Home.php");
            $stmt->close();
        }
    }
?>