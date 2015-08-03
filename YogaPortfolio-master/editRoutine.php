<?php
    session_start();

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
    $routineId = $_SESSION['routineId'];

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
        $videoName = $_POST['videoName'];
        $youtubeID = $_POST['youtubeID'];
        $videoPicture = $_POST['videoPicture'];
        $difficulty = $_POST['difficulty'];
        $anatomy = $_POST['anatomy'];
        $videoDescription = $_POST['videoDescription'];
        $length = $_POST['length'];
        $focus = $_POST['focus'];
        $style = $_POST['style'];
        
        if($videoName != "" 
           && $youtubeID != "" 
           && $length != ""
           && $videoPicture != ""
           && $videoDescription != ""){
            if($style == ""){
                $style = null;
            }
            
            $query = "UPDATE Routine SET vid_name = '$videoName', youtube_id = '$youtubeID', vid_picture = '$videoPicture', difficulty = '$difficulty', length = '$length', style = '$style' WHERE routine_id = $routineId";
            
            //update the routine in the routine table
            if(!$db->query($query)){
                print '<script>alert("There was a problem while adding the routine to the database.")</script>';
                printf("error: %s\n", mysqli_error($db));
            }
            
            //add the description to the table.
            $fileName = "routineDescriptions/routine$routineId.txt";
            $descriptionFile = fopen($fileName, "w"); //write the contents of the description textarea to a file
            fwrite($descriptionFile, $videoDescription);
            
            //update the record to add the filepath to the description
            $query = "UPDATE Routine SET description = '$fileName' WHERE routine_id = $routineId";
            
            if(!$db->query($query)){
                print '<script>alert("There was a problem while adding the description to the database.")</script>';
                printf("error: %s\n", mysqli_error($db));
            }
            
            //re-add the anatomy
            if(!empty($anatomy)){                
                $n = count($anatomy);
                for($i = 0; $i < $n; $i++){
                    $query = "INSERT INTO Routine_Anatomy VALUES ((SELECT routine_id FROM Routine WHERE vid_name = '$videoName'), '$anatomy[$i]')";
                
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
                    $query = "INSERT INTO Routine_Focus VALUES ((SELECT routine_id FROM Routine WHERE vid_name = '$videoName'), '$focus[$i]')";
                
                    if(!$db->query($query)){
                        print '<script>alert("There was a problem while adding the focuses.")</script>';
                        printf("error: %s\n", mysqli_error($db));
                    }
                }
            }
            
            //redirect back to the chosen routine page
            header("Location: chosenRoutine.php?id=$routineId");
        }
    } else {

        //get the variables to fill the form values
        $query = "SELECT vid_name, youtube_id, length, style, vid_picture, description FROM Routine WHERE routine_id = $routineId";//difficulty doesn't need to be retrieved because it can just be reset from the dropbox in the post
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        $vidName = $row['vid_name'];
        $youtubeId = $row['youtube_id'];
        $length = $row['length'];
        $style = $row['style'];
        $vidPicture = $row['vid_picture'];
        $descriptionFileName = $row['description'];
        
        //if style is null set to an empty string
        if($style == null){
            $style = "";
        }

        //open the description file to get the text to fill the description textarea
        $descriptionFile = fopen($descriptionFileName, "r");
        $description = fread($descriptionFile, filesize($descriptionFileName));
        fclose($descriptionFile);

        //To update the focuses and anatomy they are removed entirely from their respective tables
        $query = "DELETE FROM Routine_Focus WHERE routine_id = $routineId";
        if(!mysqli_query($db, $query)){
            printf("error: %s\n", mysqli_error($db));
        }

        $query = "DELETE FROM Routine_Anatomy WHERE routine_id = $routineId";
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
                        Edit this Routine
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" action="editRoutine.php">
                        <div class="form-group">
                            <label for="videoName">Video Name</label>
                            <input type="text" name="videoName" class="form-control" value="<?php print $vidName; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="youtubeID">Video's Youtube ID</label>
                            <input type="text" name="youtubeID" class="form-control" value="<?php print $youtubeId; ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="videoPicture">Link to video picture</label>
                            <input type="text" name="videoPicture" class="form-control" value="<?php print $vidPicture; ?>" required />
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
                            <label for="videoDescription">Video Description</label>
                            <textarea class="form-control" name="videoDescription" required><?php print $description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="length">Length of video</label>
                            <input type="text" name="length" class="form-control" value="<?php print $length; ?>" required />
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
                        <div class="checkbox">
                            <label><input type="checkbox" value="Weight Loss" name="focus[]" />Weight Loss</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Arm Balances" name="focus[]" />Arm Balances</label>
                        </div>
                        <div class="form-group">
                            <label for="style">Style</label>
                            <input type="text" name="style" class="form-control" value="<?php print $style; ?>" />
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
