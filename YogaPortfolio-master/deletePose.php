<?php
    session_start();

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
    $poseId = $_SESSION["poseId"];

    //test to see if the admin is logged in
    if(!isset($_SESSION['loggedIn'])){
        header('Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/login.php');
        die();
    } else if(isset($_SESSION['userPriv'])){
        $userPriv = $_SESSION['userPriv'];
        
        if($userPriv != 'Administrator'){
            header("Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/chosenPose.php?id=$poseId");
            die();
        }
    }

    //delete from User_Pose
    $query = "DELETE FROM User_Pose WHERE pose_id = $poseId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //then delete from Routine_Pose
    $query = "DELETE FROM Routine_Pose WHERE pose_id = $poseId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //then delete from Pose_Anatomy
    $query = "DELETE FROM Pose_Anatomy WHERE pose_id = $poseId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //then delete from Pose_Focus
    $query = "DELETE FROM Pose_Focus WHERE pose_id = $poseId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //finally delete from Pose
    $query = "DELETE FROM Pose WHERE pose_id = $poseId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }
    
    //delete the description file
    $fileName = "routineDescriptions/routine$poseId.txt";
    unlink($fileName);
    
    header("Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/allPoses.php");
?>