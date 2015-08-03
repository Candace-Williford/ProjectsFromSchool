<?php
    session_start();

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
    $routineId = $_SESSION["routineId"];

    //test to see if the admin is logged in
    if(!isset($_SESSION['loggedIn'])){
        header('Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/login.php');
        die();
    } else if(isset($_SESSION['userPriv'])){
        $userPriv = $_SESSION['userPriv'];
        
        if($userPriv != 'Administrator'){
            header("Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/chosenRoutine.php?id=$routineId");
            die();
        }
    }

    //delete from User_Routine
    $query = "DELETE FROM User_Routine WHERE routine_id = $routineId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //then delete from Routine_Pose
    $query = "DELETE FROM Routine_Pose WHERE routine_id = $routineId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //then delete from Routine_Anatomy
    $query = "DELETE FROM Routine_Anatomy WHERE routine_id = $routineId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //then delete from Routine_Focus
    $query = "DELETE FROM Routine_Focus WHERE routine_id = $routineId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }

    //finally delete from Routine
    $query = "DELETE FROM Routine WHERE routine_id = $routineId";
    if(!mysqli_query($db, $query)){
        printf("error: %s\n", mysqli_error($db));
    }
    
    //delete the description file
    $fileName = "routineDescriptions/routine$routineId.txt";
    unlink($fileName);
    
    header("Location: http://ps11.pstcc.edu/~c2230a08/YogaPortfolio/allRoutines.php");
?>