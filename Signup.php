<?php
    //Connecting to DB
    $dbcreds= new mysqli ('localhost', 'root', '', 'ssdcoursework1');
    include "Masterpage.php";
    MasterPage();
    //HTML Form
    $tSignupForm= <<<Signup
        <title>Sign up</title>
        <form method="POST" class="form-horizontal">
            <fieldset>
                <legend>Create a New Account</legend>
                <!--Username Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Input Username</label>
                    <div class="col-md-4">
                        <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="" minlength="8" maxlength="40"> <span class="help-block">Enter the Username</span>
                    </div>
                </div>
                <!--First Name Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Firstname">Input your First Name</label>
                    <div class="col-md-4">
                        <input id="Firstname" name="Firstname" type="text" placeholder="" class="form-control input-md" required="" minlength="1" maxlength="20"> <span class="help-block">Enter your First Name</span>
                    </div>
                </div>
                <!--Last Name Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Lastname">Input your Last Name</label>
                    <div class="col-md-4">
                        <input id="Lastname" name="Lastname" type="text" placeholder="" class="form-control input-md" required="" minlength="1" maxlength="20"> <span class="help-block">Enter your Last Name</span>
                    </div>
                </div>
                <!--Email Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Email">Input your Email</label>
                    <div class="col-md-4">
                        <input id="Email" name="Email" type="email" placeholder="" class="form-control input-md" required="" minlength="1" maxlength="100"> <span class="help-block">Enter your Email</span>
                    </div>
                </div>
                <!--Password Input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Password">Input Password</label>
                    <div class="col-md-4">
                        <input id="Password" name="Password" type="password" placeholder="" class="form-control input-md" required="" minlength="1" maxlength="1000"> <span class="help-block">Enter a Password</span>
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
        $firstname = $_POST['Firstname'];
        $lastname = $_POST['Lastname'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        //hashing password
        $hashpass = password_hash($password, PASSWORD_DEFAULT);
        //Preparing statement to be used with bind_param to stop SQL Injection
        if ($stmt = $dbcreds -> prepare("INSERT INTO users (Username, Firstname, Lastname, Email, Password) Values (?, ?, ?, ?, ?)")){
            $stmt -> bind_param("sssss", $username, $firstname, $lastname, $email, $hashpass);
            $stmt -> execute();
            if ($stmt -> insert_id == 0){
                echo "<script type ='text/javascript'>alert('Failed to sign up');/script>";
                exit();
            }else{
                //sending to homepage
                header("Location: Home.php");
            }
            $stmt -> close();
        }
    }

?>
