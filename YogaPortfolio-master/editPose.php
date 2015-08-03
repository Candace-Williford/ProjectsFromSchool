<?php
    session_start();
    $poseId = $_SESSION['poseId'];

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

    //test to see if the admin is logged in
    if(!isset($_SESSION['loggedIn'])){
        header('Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/login.php');
    } else if(isset($_SESSION['userPriv'])){
        $userPriv = $_SESSION['userPriv'];
        
        if($userPriv != 'Administrator'){
            header('Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/index.php');
        }
    }

    if(isset($_POST['submitButton'])){
        $poseName = $_POST['poseName'];
        $image = $_POST['image'];
        $instructionalVid = $_POST['instructionalVid'];
        $difficulty = $_POST['difficulty'];
        $anatomy = $_POST['anatomy'];
        $sanskritName = $_POST['sanskritName'];
        $focus = $_POST['focus'];
        
        if($poseName != "" 
           && $image != "" 
           && $instructionalVid != ""){
            if($sanskritName == ""){
                $sanskritName = null;
            }
            
            $query = "UPDATE Pose SET pose_name = '$poseName', image = '$image', instruct_vid_youtube_id = '$instructionalVid', difficulty = '$difficulty', sanskrit_name = '$sanskritName' WHERE pose_id = $poseId";
            
            //update the pose
            if(!$db->query($query)){
                print '<script>alert("There was a problem while adding the pose to the database.")</script>';
                printf("error: %s\n", mysqli_error($db));
            }
            
            //re-add the anatomy
            if(!empty($anatomy)){                
                $n = count($anatomy);
                for($i = 0; $i < $n; $i++){
                    $query = "INSERT INTO Pose_Anatomy VALUES ((SELECT pose_id FROM Pose WHERE pose_name = '$poseName'), '$anatomy[$i]')";
                
                    if(!$db->query($query)){
                        print '<script>alert("There was a problem while adding the anatomy.")</script>';
                        printf("error: %s\n", mysqli_error($db));
                    }
                }
            }
            
            //re-add the focuses
            if(!empty($focus)){
                $n = count($focus);
                for($i = 0; $i < $n; $i++){
                    $query = "INSERT INTO Pose_Focus VALUES ((SELECT pose_id FROM Pose WHERE pose_name = '$poseName'), '$focus[$i]')";
                
                    if(!$db->query($query)){
                        print '<script>alert("There was a problem while adding the focuses.")</script>';
                        printf("error: %s\n", mysqli_error($db));
                    }
                }
            }
            
            //redirect back to the chosen pose page
            header("Location: chosenPose.php?id=$poseId");
        } else {
            print '<script>alert("Please make sure you filled in all the required fields.")</script>';
        }
    } else {
        //get the variables to fill the form values
        $query = "SELECT pose_name, image, instruct_vid_youtube_id, difficulty, sanskrit_name FROM Pose WHERE pose_id = $poseId";//difficulty doesn't need to be retrieved because it can just be reset from the dropbox in the post
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        $poseName = $row['pose_name'];
        $image = $row['image'];
        $instructionalVid = $row['instruct_vid_youtube_id'];
        $difficulty = $row['difficulty'];
        $sanskritName = $row['sanskrit_name'];
        
        //if style is null set to an empty string
        if($sanskritName == null){
            $sanskritName = "";
        }

        //To update the focuses and anatomy they are removed entirely from their respective tables
        $query = "DELETE FROM Pose_Focus WHERE pose_id = $poseId";
        if(!mysqli_query($db, $query)){
            printf("error: %s\n", mysqli_error($db));
        }

        $query = "DELETE FROM Pose_Anatomy WHERE pose_id = $poseId";
        if(!mysqli_query($db, $query)){
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
                        Title
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" action="editPose.php">
                        <div class="form-group">
                            <label for="poseName">Pose Name: </label>
                            <input name="poseName" class="form-control" type="text" value="<?php print $poseName; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="image">Image: </label>
                            <input name="image" class="form-control" type="text" value="<?php print $image; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="instructionalVid">Instructional Video's Youtube ID: </label>
                            <input name="instructionalVid" class="form-control" type="text" value="<?php print $instructionalVid; ?>" required />
                        </div>
                        <select name="difficulty" class="dropdown">
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Arms" name="anatomy[]" />Arms</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Chest" name="anatomy[]" />Chest</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Legs" name="anatomy[]" />Legs</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Back" name="anatomy[]" />Back</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Core" name="anatomy[]" />Core</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Hips" name="anatomy[]" />Hips</label>
                        </div>
                        <div class="form-group">
                            <label for="sanskritName">Sanskrit Name: </label>
                            <input name="sanskritName" class="form-control" type="text" value="<?php print $sanskritName; ?>" />
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Strength" name="focus[]" />Strength</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Flexibility" name="focus[]" />Flexibility</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Balance" name="focus[]" />Balance</label>
                        </div>
                        <button name="submitButton" type="submit" class="btn btn-primary">Submit</button>
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
