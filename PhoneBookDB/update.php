<?php
    session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Candace's Phonebook</title>
        
        <link href="css/bootstrap.min.css"
              rel="stylesheet"
              type="text/css" />
        <link href="css/phonebookStylesheet.css"
              rel="stylesheet"
              type="text/css" />
        <link href="css/updateStylesheet.css"
              rel="stylesheet"
              type="text/css" />
    </head>
    <body>
        <div id="updateForm" class="container">
            <section>
            <form method="post" action="completeUpdate.php">
                <?php
                    $_SESSION["queryString"] = $_SERVER["QUERY_STRING"];
                    $queryValue = explode("=", $_SESSION["queryString"]);

                    $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
                    $query = "select * from Phone where id = $queryValue[1]";

                    foreach($db->query($query) as $row){
                        print '<input type="text" name="id" value="' . $row["id"] . '" hidden />';
                        print '<div class="form-group">
                                    First Name: <input type="text" name="firstName" value="' . $row["firstName"] . '" class="form-control" />
                               </div><br />';
                        print '<div class="form-group">
                                    Last Name: <input type="text" name="lastName" value="' . $row["lastName"] . '" class="form-control" />
                               </div><br />';
                        print '<div class="form-group">
                                    Phone Number: <input type="text" name="phoneNumber" value="' . $row["phoneNumber"] . '" class="form-control" />
                               </div><br />';
                    }

                    mysqli_close($db);
                ?>
                <input id="updateButton" class="btn" type="submit" name="submit" value="Update" />
                <input id="deleteButton" class="btn" type="submit" name="submit" value="Delete" />
            </form>
        </div>
        </section>
    </body>
</html>