<?php
function MasterPage(){
    //@ is used to avoid ignoring session_start() as it always appears when calling from function for some reason
    @session_start();
    $tAccount = "";
    if(isset($_SESSION['username'])) 
    {
        //Html for displaying user name if logged in
        $tAccount = <<<Display
            <div class="navbar-form navbar-right">
               <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                   <div class="form-control">{$_SESSION['username']}</div>                                        
               </div>
               <a class="btn btn-primary navbar-right" href="AccountManagment.php">Account Management</a>
            </div>
        Display;
    }
    else
    {
        //alternative to above for when not logged in
        $tAccount = <<<Log
            <a class="btn btn-info navbar-right" href="Signup.php">SignUp</a>
            <a class="btn btn-primary navbar-right" href="Login.php">Login</a>
        Log;
    }     
    //Loading bootstrap and adding navigation pills   
    $tmasterpage = <<<MASTER
    <head>
    <link rel ="stylesheet" href="CSS\bootstrap.css">
    </head>
        <div class="container">
        	<div class="header clearfix">
        		<nav>
        		    {$tAccount}
                    <h3 class="text-muted"><a href="Home.php">Home</a></h3>
        			<ul class="nav nav-pills">
        				<li role="presentation"><a href="Search.php">Search</a></li>
                        <li role="prenstation"><a href="upload.php">Upload</a></li>
        			</ul>
        		</nav>
        	</div>
        </div>        
    MASTER;
    return $tmasterpage;
}
echo MasterPage();

?>
