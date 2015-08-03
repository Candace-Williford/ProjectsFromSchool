<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Yoga Portfolio</title>
        <meta name="author" content="Candace Williford">
        <meta name="date_created" content="2014-09-20">
        <meta name="date_modified" content="2014-09-27">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateStylesheet.css" rel="stylesheet">
        <link href="css/homeStylesheet.css" rel="stylesheet">
    </head>
    
    <body>
        <div id="pageBackground">
            <img src="images/yogaBackground.jpg" alt="Yoga Background" id="backgroundImage" />
	    </div>
        <div class="container">
            <div id="welcomeTag" class="pull-right">
                <?php
                    if(isset($_SESSION['loggedIn'])){
                        echo "Welcome " . $_SESSION['firstName'];
                    }
                ?>
            </div>
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
                    <li class="nav active"><a href="index.php">Home</a></li>
                    <li class="nav"><a href="createAccount.php">Account</a></li>
                    <li class="nav"><a href="allRoutines.php">Routines</a></li>
                    <li class="nav"><a href="allPoses.php">Poses</a></li>
                    <li class="nav"><a href="contact.php">Contact</a></li>
<!--                    <li class="nav"><a href="dailyPose.php">Pose of the Day</a></li>-->
                </ul>
            </div>
        </div>
        
        <section class="col-sm-10 col-sm-offset-1">
            <div id="body-panel" class="panel panel-default">
                <div class="panel-body">
                    <div id="images" class="row">
                        <div class="col-xs-6">
                            <a href="allPoses.php">
                                <img class="imgLink" src="images/HomePage/poses.jpg" />
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="allRoutines.php">
                                <img class="imgLink" src="images/HomePage/routines.jpg" />
                            </a>
                        </div>
                    </div>
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