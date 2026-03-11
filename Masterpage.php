    <?php
    function MasterPage(){
        $tauth = "";
        if(isset($_SESSION['id'])) 
        {
            $tauth = <<<Display
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
            $tauth = <<<Log
                <a class="btn btn-info navbar-right" href="Signup.php">SignUp</a>
                <a class="btn btn-primary navbar-right" href="Login.php">Login</a>
            Log;
        }        
        $tmasterpage = <<<MASTER
        <head>
        <link rel ="stylesheet" href="CSS\bootstrap.css">
        </head>
            <div class="container">
            	<div class="header clearfix">
            		<nav>
            		    {$tauth}
                        <h3 class="text-muted"><a href="Home.php">Home</a></h3>
            			<ul class="nav nav-pills">
            				<li role="presentation"><a href="Search.php">Search</a></li>
            			</ul>
            		</nav>
            	</div>
            </div>        
        MASTER;
        return $tmasterpage;
    }
    echo MasterPage();
    ?>