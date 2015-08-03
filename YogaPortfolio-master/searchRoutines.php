<?php

    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
	
	$queryString = $_SERVER["QUERY_STRING"];
    $queryValue = explode("=", $queryString);
    $searchString = $queryValue[1];

    $query = "SELECT routine_id, vid_name, vid_picture FROM Routine WHERE vid_name LIKE '$searchString%'";

    foreach ($db->query($query) as $row) {
        print '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 routineColumn">
            <a href="chosenRoutine.php?id=' . $row['routine_id'] . '" />
               <img class="thumbnail" src="' . $row['vid_picture'] . '"/>' . $row['vid_name']
            . '</a>
        </div>';
                                        }
	
	mysqli_close($db);

?>
