<?php

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
	
	$queryString = $_SERVER["QUERY_STRING"];
    $queryValue = explode("=", $queryString);
    $searchString = $queryValue[1];

    $query = "SELECT pose_id, pose_name, image FROM Pose WHERE pose_name LIKE '$searchString%'";

    foreach ($db->query($query) as $row) {
        print '<div class="col-xs-6 col-sm-4 col-lg-3 poseColumn">
            <a href="chosenPose.php?id=' . $row['pose_id'] . '" />
                <img class="thumbnail" src="' . $row['image'] . '"/>' . $row['pose_name']
            . '</a>
        </div>';
    }
	
	mysqli_close($db);

?>
