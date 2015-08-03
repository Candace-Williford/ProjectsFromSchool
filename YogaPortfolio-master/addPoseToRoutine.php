<?php
    session_start();

    //test to see if the admin is logged in
    if(!isset($_SESSION['loggedIn'])){
        header('Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/login.php');
        die();
    } else if(isset($_SESSION['userPriv'])){
        $userPriv = $_SESSION['userPriv'];
        
        if($userPriv != 'Administrator'){
            header('Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/index.php');
            die();
        }
    }

    $routineId = $_SESSION["routineId"];

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

    $query = "SELECT vid_name FROM Routine WHERE routine_id = " . $routineId;

    $result = mysqli_query($db, $query);

    $row = mysqli_fetch_assoc($result);

    $videoName = $row['vid_name'];

    if(isset($_POST['addButton'])){
        $routineId = $_SESSION['routineId'];
        $poseName = $_POST['poseList'];
        
        $query = "SELECT pose_id FROM Pose WHERE pose_name = '$poseName'";
        
        $result = mysqli_query($db, $query);
        if(!$result){
            print '<script>alert("There was a problem trying to find the pose.");</script>';
            printf("error: %s\n", mysqli_error($db));
        }
            $row = mysqli_fetch_assoc($result);
            $poseId = $row['pose_id'];
            
            $query = "INSERT INTO Routine_Pose VALUES($routineId, $poseId)";
            
            $result = mysqli_query($db, $query);
            if(!$result){
                print '<script>alert("There was a problem adding the pose to the routine. Make sure the pose does not already exist in the routine.");</script>';
                printf("error: %s\n", mysqli_error($db));
            }
        
        
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
                    <li class="nav"><a href="contact.php">Contact</a></li>
<!--                    <li class="nav"><a href="dailyPose.php">Pose of the Day</a></li>-->
                </ul>
            </div>
        </div>
        
        <section class="col-sm-10 col-sm-offset-1">
            <div id="body-panel" class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Edit Poses in this Routine
                    </div>
                </div>
                <div class="panel-body">
                    <h3 style="text-align: center;"><?php print $videoName; ?></h3>
                    <table class="table table-striped">
                        <thead>
                            <th>Poses in This Routine</tn>
                        </thead>
                        <?php
                            $query = "SELECT pose_id, pose_name FROM Pose NATURAL JOIN Routine_Pose WHERE routine_id = $routineId";
                            
                            $result = mysqli_query($db, $query);
                            if(!$result){
                                print '<tr><td>None</td></tr>';
                            } else {
                                foreach($result as $row){
                                    print '<tr><td>'. $row['pose_name'] . '<button id="delete' . $row['pose_id'] . 'Button" class="btn" style="float: right;">Delete</button></td></tr>
                                    <script>
                                        document.getElementById("delete' . $row['pose_id'] . 'Button").onclick = function(){
                                            location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/deletePoseFromRoutine.php?id=' . $row['pose_id'] . '";
                                        };
                                    </script>';
                                }
                            }
                        ?>
                    </table>
                    
                    <form method="post" action="addPoseToRoutine.php">
                        <select name="poseList">
                            <?php
                                $query = "SELECT pose_name, pose_id FROM Pose";

                                foreach($db->query($query) as $row){
                                    print '<option value="' . $row['pose_name'] . '">' . $row['pose_name'] . '</span></option>';
                                }
                            ?>
                        </select>
                        <button id="addButton" type="submit" name="addButton" class="btn">Add Pose</button>
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
