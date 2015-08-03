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

$queryString = $_SERVER["QUERY_STRING"];
$queryValue = explode("=", $queryString);
$poseId = $queryValue[1];
$routineId = $_SESSION['routineId'];
$db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

$query = "DELETE FROM Routine_Pose WHERE routine_id = $routineId AND pose_id = $poseId";

if(!mysqli_query($db, $query)){
    print '<script>alert("There was a problem removing the pose from the routine");</script>';
    printf("error: %s\n", mysqli_error($db));
}

header("Location: addPoseToRoutine.php");

?>