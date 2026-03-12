<?php
    include "Masterpage.php";
    MasterPage();
    //Connecting to DB
    $dbcreds= new mysqli ('localhost', 'root', '', 'ssdcoursework1');
    $user = $_SESSION['username'];
    //Preparing statement to be used with bind_param to stop SQL Injection
    if($stmt = $dbcreds ->prepare("SELECT Email, Firstname, Lastname FROM users WHERE Username = ? ")){
        $stmt -> bind_param("s", $user);
        $stmt -> execute();
        $stmt -> bind_result($email, $Fname, $Lname);
        $stmt -> fetch();
    }
    //Html for displaying info and logout button
    $tAcctM= <<<AccountM
        <title>Account Managment</title>
        <article>
            <!--Overview-->
            <h2> Account Details</h2>
            <div class="media-left">
                <p>
                    Username: {$user}<br>
                    First name: {$Fname}<br>
                    Last name: {$Lname}<br>
                    Email: {$email}<br>
                </p>
            </div>
            <form method="POST">
                <fieldset>
                    <div class="col-md-4">
                        <button name="destroy-session" type="submit" class="btn btn-primary btn-lg">Log out</button>
                    </div>
                </fieldset>
            </form>
        </article>
    AccountM;
    echo $tAcctM;
    if (isset($_POST['destroy-session'])){
        //destroying session and sending to homepage
        session_destroy();
        header("Location: Home.php");
    }
?>