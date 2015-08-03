<?php
    session_start();

    $queryString = $_SERVER["QUERY_STRING"];
    $queryValue = explode("=", $queryString);
    $_SESSION["routineId"] = $queryValue[1];
    $routineId = $_SESSION["routineId"];
    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

    $query = "SELECT vid_name, description, youtube_id, difficulty, length FROM Routine WHERE routine_id = $routineId";

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($result);

    $videoName = $row['vid_name'];
    $description = $row['description'];
    $youtubeID = $row['youtube_id'];
    $difficulty = $row['difficulty'];
    $length = $row['length'];    
?>

<!DOCTYPE html>

<html>
    
    <head>
        <title>Yoga Portfolio</title>
        <meta name="author" content="Candace Williford">
        <meta name="date_created" content="2014-09-20">
        
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/templateStylesheet.css" rel="stylesheet">
        <link href="css/chosenRoutineStylesheet.css" rel="stylesheet">
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
                    <li class="nav active"><a href="allRoutines.php">Routines</a></li>
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
                        Chosen Routine
                        <?php
                            if(isset($_SESSION["userPriv"])){
                                $userPriv = $_SESSION["userPriv"];
                                
                                if($userPriv == 'Administrator'){
                                    print '<button id="routine' . $routineId . 'AddButton" class="btn">Edit Poses in This Routine</button>
                                           <button id="routine' . $routineId . 'EditButton" class="btn">Edit This Routine</button>
                                           <button id="routine' . $routineId . 'DeleteButton" class="btn">Delete This Routine</button>
                                    
                                    <script>
                                        //click function for the add pose button
                                        document.getElementById("routine' . $routineId . 'AddButton").onclick = function(){
                                           location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/addPoseToRoutine.php?id=' . $routineId . '";
                                        };
                                                               
                                        //click function for the edit button
                                        document.getElementById("routine' . $routineId . 'EditButton").onclick = function(){
                                           location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/editRoutine.php";
                                        };
                                                               
                                        //click function for the delete button
                                        document.getElementById("routine' . $routineId . 'DeleteButton").onclick = function(){
                                           var deleteThis = confirm("Are you sure you wish to delete this routine? \nThis will delete all references to the routine throughout the application including references users have made to it.");
    
                                           if (deleteThis){
                                              location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/deleteRoutine.php";
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
                        <div class="col-lg-6">
                            <iframe width="560" height="315" src="//www.youtube.com/embed/<?php print $youtubeID; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-6">
                            <div  id="info">
                            <h3><?php print $videoName; ?></h2>
                            <span>
                                <b>About:</b><br />
                                <?php 
                                    $descriptionFile = fopen($description, "r");

                                    $aboutText = fread($descriptionFile, filesize($description));
                                    print $aboutText;
                                ?>
                            </span><br />
                            <span><b>Difficulty: </b><?php print $difficulty; ?></span><br />
                            <span><b>Time: </b><?php print $length; ?></span><br />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Poses in This Routine</h3>
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Pose</th>
                                    <th>Picture</th>
                                </tr>
                            </thead>
                            <?php
                                $query = "SELECT pose_id, pose_name, image FROM Pose NATURAL JOIN Routine_Pose WHERE routine_id = $routineId";

                                $result = mysqli_query($db, $query);
                                if(!$result){
                                    print '<tr><td>None</td></tr>';
                                } else {
                                    foreach($result as $row){
                                        print '<tr>
                                            <td>
                                                <a href="chosenPose.php?id=' . $row['pose_id'] . '" />'
                                                       . $row['pose_name'] . '
                                                </a>
                                            </td>
                                            <td>
                                                <a href="chosenPose.php?id=' . $row['pose_id'] . '" />
                                                   <img class="thumbnail routinePoseImage" src="' . $row['image'] . '"/>
                                                </a>
                                            </td>
                                        </tr>';
                                    }
                                }
                            ?>
                        </table>
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
