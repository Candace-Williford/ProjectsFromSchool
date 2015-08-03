<?php
    session_start();

    $queryString = $_SERVER["QUERY_STRING"];
    $queryValue = explode("=", $queryString);
    $_SESSION['poseId'] = $queryValue[1];
    $poseId = $_SESSION['poseId'];
    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

    $query = "SELECT pose_name, sanskrit_name, difficulty, instruct_vid_youtube_id, image FROM Pose WHERE pose_id = $poseId";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($result);

    $poseName = $row['pose_name'];
    $sanskritName = $row['sanskrit_name'];
    $difficulty = $row['difficulty'];
    $instructionalVid = $row['instruct_vid_youtube_id'];
    $image = $row['image'];
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Yoga Portfolio</title>
        <meta name="author" content="Candace Williford">
        <meta name="date_created" content="2014-09-20">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateStylesheet.css" rel="stylesheet">
        <link href="css/chosenPoseStylesheet.css" rel="stylesheet">
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
                    <li class="nav active"><a href="allPoses.php">Poses</a></li>
                    <li class="nav"><a href="contact.php">Contact</a></li>
<!--                    <li class="nav"><a href="dailyPose.php">Pose of the Day</a></li>-->
                </ul>
            </div>
        </div>
        
        <section class="col-sm-10 col-sm-offset-1">
            <div id="body-panel" class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Chosen Pose
                        
                        <?php
                            if(isset($_SESSION["userPriv"])){
                                $userPriv = $_SESSION["userPriv"];
                                
                                if($userPriv == 'Administrator'){
                                    print '<button id="pose' . $poseId . 'EditButton" class="btn">Edit This Pose</button>
                                           <button id="pose' . $poseId . 'DeleteButton" class="btn">Delete This Pose</button>
                                    
                                    <script>
                                        //click function for the edit button
                                        document.getElementById("pose' . $poseId . 'EditButton").onclick = function(){
                                           location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/editPose.php";
                                        };
                                                               
                                        //click function for the delete button
                                        document.getElementById("pose' . $poseId . 'DeleteButton").onclick = function(){
                                           var deleteThis = confirm("Are you sure you wish to delete this pose? \nThis will delete all references to the pose throughout the application including references users have made to it.");
    
                                           if (deleteThis){
                                              location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/deletePose.php";
                                           }
                                        };
                                    </script>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="thumbnail posePicture"
                                 src="<?php print $image; ?>" 
                                 alt="Scorpion Pose" />
                        </div>
                        <div class="col-sm-6">
                            <h2><?php print $poseName; ?></h2>
                            <?php 
                                if($sanskritName != null) {
                                    print "<h3>$sanskritName</h3>";
                                } 
                            ?>
                            <span><b>Difficulty: </b><?php print $difficulty; ?></span><br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-offset-2">
                            <iframe width="560" height="315" src="//www.youtube.com/embed/<?php print $instructionalVid; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
<!--
                        <div class="row">
                            <div id="routinesList">
                                <h3>Routines That Use This Pose:</h3>
                                <div class="col-sm-3">
                                    <a href="chosenRoutine.php">
                                    <div class="col-sm-6">
                                        <img class="thumbnail"
                                         src="images/scorpionPoseRoutine.jpg" 
                                         alt="Scorpion Pose" />
                                    </div>
                                    <div class="col-sm-6">
                                        <h5>Hard Poses Made Easy | Intermediate Yoga With Tara Stiles</h5>
                                    </div>
                                    </a>
                                </div>
                                
                                <div class="row">
                                    <span class="routineRow">Another Routine would go here, displayed just like the one above.</span>
                                </div>
                                
                                <?php
                                    $counter = 0;

                                    
                                ?>
                            </div>
                        </div>
-->
                    
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
