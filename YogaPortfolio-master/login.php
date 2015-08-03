<?php
	$error = "";
	$email = "";
	$password = "";
	
	if(isset($_POST['submit-login'])){
        session_start();
        
        $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
        
		$email = $_POST['email'];
		$password = $_POST['password'];
        
        $hashedPassword = md5($password);
        
        $query = "SELECT * FROM User WHERE email = '$email'";
        

        $result = $db->query($query);
        
        $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 1){//to make sure only one row was found
            if($hashedPassword == $row["password"]){                
                $_SESSION['userID'] = $row["user_id"];
                $_SESSION['userPriv'] = $row["user_priv"];
                $_SESSION['firstName'] = $row["first_name"];
                $_SESSION['lastName'] = $row["last_name"];
                $_SESSION['email'] = $row["email"];
                $_SESSION['loggedIn'] = true;
                
                print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/index.php";</script>';
            } else {
                print '<script>alert("Incorrect username or password");</script>';
                $password = "";
            }
        } else {
            print '<script>alert("Incorrect username or password");</script>';
            $password = "";
        }
	}
?>

<html>
    
    <head>
        <title>Yoga Portfolio</title>
        <meta name="author" content="Candace Williford">
        <meta name="date_created" content="2014-09-20">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateStylesheet.css" rel="stylesheet">
    </head>
    
    <body>
        <div id="pageBackground">
            <img src="images/yogaBackground.jpg" alt="Yoga Background" id="backgroundImage" />
	    </div>
        <div class="container">
            <h1 id="pageTitle">Yoga Portfolio</h1>
            <div id="signInButtons" class="btn-group pull-right hidden-xs btn-group-sm">
                <button id="signInButton" 
                        class="btn"
                        <?php if(isset($_SESSION['loggedIn'])){ print 'disabled';} ?>>
                    Sign In
                </button>
                <button id="signOutButton" 
                        class="btn"
                        <?php if(!isset($_SESSION['loggedIn'])){ print 'disabled';} ?>>
                    Sign Out
                </button>
            </div>
        </div>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button class="btn navbar-toggle" 
                        data-toggle="collapse" 
                        data-target=".navbar-collapse">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav"><a href="index.php">Home</a></li>
                    <li class="nav active"><a href="createAccount.php">Account</a></li>
                    <li class="nav"><a href="allRoutines.php">Routines</a></li>
                    <li class="nav"><a href="allPoses.php">Poses</a></li>
                    <li class="nav"><a href="contact.php">Contact</a></li>
<!--                    <li class="nav"><a href="dailyPose.php">Pose of the Day</a></li>-->
                </ul>
            </div>
        </div>
        
        <section class="col-sm-10 col-sm-offset-1">
            <div id="body-panel" class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Log In
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" 
                                   class="form-control" 
                                   value="<?php echo $email; ?>" 
                                   name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" 
                                   class="form-control" 
                                   value="<?php echo $password; ?>" 
                                   name="password"/>
                        </div>
                        Don't have an account? <a href="createAccount.php">Create one here.</a>
                        <button type="submit" class="btn btn-lg" value="Login" name="submit-login" />Login</button>                        
					</form>
                </div>
            </div>
        </section>
        
        <ul id="footer-menu" class="nav navbar-nav navbar-right col-xs-12">
            <li class="nav"><a href="index.php">Home</a></li>
            <li class="nav"><a href="#pageTitle">Top</a></li>
        </ul>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <!-- Add the click function to the sign in/out buttons. -->
        <script>
            //sign in button click function
            document.getElementById("signInButton").onclick = function(){
                location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/login.php";
            };
            
            //sign out button click function
            document.getElementById("signOutButton").onclick = function(){
                location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/logout.php";
            };
        </script>
    </body>
    
</html>
