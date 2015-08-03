<?php
    session_start();

    $firstName = "";
    $lastName = "";
    $email = "";

    if(isset($_POST['submitButton'])){
        $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $confirmEmail = $_POST["confirmEmail"];
        $hashedPassword = md5($_POST["password"]);
        $confirmHashedPassword = md5($_POST["confirmPassword"]);

        date_default_timezone_set('EST');
        $joinDate = date('Y-m-d');
        
        //create the account
        if ($email == $confirmEmail && $email != "" && $confirmEmail != ""){
            $query = "SELECT email FROM User";

            foreach($db->query($query) as $row){
                if($row["email"] == $email){
                    print '<script>alert("That email is already in use.");</script>';
                    print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/createAccount.php";</script>';
                }
            }

            if ($hashedPassword == $confirmHashedPassword && $hashedPassword != "" && $confirmHashedPassword != ""){
                $query = "INSERT INTO User (first_name, last_name, email, password, join_date)
                          VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$joinDate')";

                $db->query($query);
                
                header('Location: index.php');
            } else {
                print '<script>alert("Retype your password.");</script>';
            }
        } else {
            print '<script>alert("Retype your email address.");</script>';
        }
        
        //log the new account in
        $query = "SELECT * FROM User";
        
        $result = $db->query($query);
        $row = $result->fetch_assoc();
        if(mysqli_num_rows($result) == 1){
            $_SESSION['userID'] = $row["user_id"];
            $_SESSION['firstName'] = $row["first_name"];
            $_SESSION['lastName'] = $row["last_name"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['loggedIn'] = true;
        }
        
        print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/index.php";</script>';
    }
    
?>

<!DOCTYPE html>

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
                        Create an Account
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" action="createAccount.php">
                        <div class="form-group">
                            <label for="firstName">First Name</label> 
                            <input type="text"
                                   name="firstName"
                                   value="<?php echo $firstName; ?>"
                                   class="form-control"
                                   required />
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text"
                                   name="lastName"
                                   value="<?php echo $lastName; ?>"
                                   class="form-control"
                                   required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                   name="email"
                                   value="<?php echo $email; ?>"
                                   class="form-control"
                                   required />
                        </div>
                        <div class="form-group">
                            <label for="confirmEmail">Confirm Email</label>
                            <input type="email"
                                   name="confirmEmail"
                                   class="form-control" 
                                   required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control" 
                                   required />
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password"
                                   name="confirmPassword"
                                   class="form-control" 
                                   required />
                        </div>
                        Already have an account? <a href="login.php">Sign in here.</a>
                        <button type="submit" class="btn btn-large" name="submitButton">Submit</button>
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
