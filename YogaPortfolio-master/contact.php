<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Yoga Portfolio</title>
        <meta name="author" content="Candace Williford">
        <meta name="date_created" content="2014-09-20">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateStylesheet.css" rel="stylesheet">
        <link href="css/contactStylesheet.css" rel="stylesheet">
        
        <script>
            var messageDisplayed;
            var displayedRequired = false;
            
            function validateForm(){
                messageDisplayed = false;
                
                checkNull(document.getElementById("subjectField"), document.getElementById("subjectLabel"))
                checkNull(document.getElementById("nameField"), document.getElementById("nameLabel"))
                checkNull(document.getElementById("emailField"), document.getElementById("emailLabel"))
                checkNull(document.getElementById("problemField"), document.getElementById("problemLabel"))
            }
            
            function checkNull(field, label) {
                if(field.value == ""){
                    if(!findRequired(label)){
                        label.className = label.className + " required";
                    }
                    
                    if(!messageDisplayed){
                        alert("You are missing some required fields");
                        messageDisplayed = true;
                    }
                } else {
                    return(false);
                }
            }
            
            function findRequired(label){
                var labelClasses = label.className.split(" ");
                
                for(var i = 0; i < labelClasses.length; i++){
                    if(labelClasses[i] == "required")
                        return true;
                    else
                        return false;
                }
            }
        </script>
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
                    <li class="nav"><a href="index.php">Home</a></li>
                    <li class="nav"><a href="createAccount.php">Account</a></li>
                    <li class="nav"><a href="allRoutines.php">Routines</a></li>
                    <li class="nav"><a href="allPoses.php">Poses</a></li>
                    <li class="nav active"><a href="contact.php">Contact</a></li>
<!--                    <li class="nav"><a href="dailyPose.php">Pose of the Day</a></li>-->
                </ul>
            </div>
        </div>
        
        <section class="col-sm-10 col-sm-offset-1">
            <div id="body-panel" class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Contact
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-sm-8 col-sm-offset-2">
                    <form>
                        <div class="form-group">
                            <label id="subjectLabel" class="control-label" for="subject">Subject</label>
                            <input id="subjectField" class="form-control" type="text" name="subject">
                        </div>
                        <div class="form-group">
                            <label id="nameLabel" class="control-label" for="name">Your Name</label>
                            <input id="nameField" class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label id="emailLabel" class="control-label" for="email">Email</label>
                            <input id="emailField" class="form-control" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <label id="problemLabel" class="control-label" for="problem">What can we do for you?</label>
                            <textarea id="problemField" class="form-control"></textarea>
                        </div>
                        <input id="submitButton" class="btn btn-primary" type="submit" name="submit" onclick="validateForm();">
                    </form>
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