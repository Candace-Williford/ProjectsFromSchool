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
        <link href="css/allPosesStylesheet.css" rel="stylesheet">        
        
        <script>
            var xmlhttp;
            
            function search(searchString){
                if (window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTO");
                }
                
                xmlhttp.onreadystatechange = function(){
                    if (xmlhttp.readyState==4 && xmlhttp.status==200){
                        document.getElementById("relevantTab").innerHTML=xmlhttp.responseText;
                    }
                }
                
                xmlhttp.open("POST","searchPoses.php?q=" + searchString,true);
                xmlhttp.send(); 
            }
        </script>
    </head>
    
    <body onload="search('');">
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
                        All Poses
                        
                        <?php
                            if(isset($_SESSION["userPriv"])){
                                $userPriv = $_SESSION["userPriv"];
                                
                                if($userPriv == 'Administrator'){
                                    print 
                                    '<div id="addPoseButton" class="pull-right">
                                        <button class="btn">Add Pose</button>
                                    </div>
                                    <script>
                                        document.getElementById("addPoseButton").onclick = function(){
                                            location.href = "http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/addPose.php";
                                        };
                                    </script>';
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <span class="h4">Filter By:</span>
                        </div>
                        <div class="form-group">
                            <label for="searchInput" 
                                   class="control-label col-sm-offset-3 col-sm-1">
                                Search
                            </label>
                            <div class="col-sm-5">
                                <input type="text" 
                                       id="searchBox"
                                       name="searchInput" 
                                       class="form-control"
                                       onkeyup="search(this.value)" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section>                        
                        <div id="filter-panel" class="panel col-sm-3">
                            <ul class="list-unstyled">
                                <li class="b">Focus</li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="#strengthCheckbox" type="checkbox" onclick="alterAppliedFilters('strength', this);"> Strength
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="flexibilityCheckbox" type="checkbox" onclick="alterAppliedFilters('flexibility', this);"> Flexibility
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="balanceCheckbox" type="checkbox" onclick="alterAppliedFilters('balance', this);"> Balance
                                        </label>
                                    </div>
                                </li>
                                <hr />
                                <li>Anatomy</li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" onclick="alterAppliedFilters('arms', this);"> Arms
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div id="legsCheckbox" class="checkbox">
                                        <label>
                                            <input id="armsCheckbox" type="checkbox" onclick="alterAppliedFilters('legs', this);"> Legs
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="backCheckbox" type="checkbox" onclick="alterAppliedFilters('back', this);"> Back
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="coreCheckbox" type="checkbox" onclick="alterAppliedFilters('core', this);"> Core
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="hipsCheckbox" type="checkbox" onclick="alterAppliedFilters('hips', this);"> Hips
                                        </label>
                                    </div>
                                </li>
                                <hr />
                                <li>Level</li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="beginnerCheckbox" type="checkbox" onclick="alterAppliedFilters('beginner', this);"> Beginner
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="intermediateCheckbox" type="checkbox" onclick="alterAppliedFilters('intermediate', this);"> Intermediate
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input id="advancedCheckbox" type="checkbox" onclick="alterAppliedFilters('advanced', this);"> Advanced
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <div class="panel col-sm-9">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#relevantTab" data-toggle="tab">Relevant</a></li>
                            <li><a href="#popularTab" data-toggle="tab">Most Popular</a></li>
                            <li><a href="#newestTab" data-toggle="tab">Newest</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="relevantTab" class="tab-pane active">
                                <div class="row bottomMargin">                        
                                    <!-- filled by searchPoses.php-->
                                </div>
                            </div>
                            <div id="popularTab" class="tab-pane">
                                <span>This is the most popular tab</span>
                            </div>
                            <div id="newestTab" class="tab-pane">
                                <span>This is the newest tab</span>
                            </div>
                        </div>
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