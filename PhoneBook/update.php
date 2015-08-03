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
        <link href="css/updateStylesheet.css"
              rel="stylesheet"
              type="text/css" />
    </head>
    <body>
        <div id="updateForm" class="container">
            <form method="post" action="completeUpdate.php">
                <?php
                    $_SESSION["queryString"] = $_SERVER["QUERY_STRING"];
                    $queryValue = explode("=", $_SESSION["queryString"]);

                    $_SESSION["entryToUpdate"] = $queryValue[1];
                    //entry[0] = FULL NAME
                    //entry[1] = phone number
                    $entry = explode(",%20", $queryValue[1]);//split the entry into name and phone number
                    //name[0] = first name
                    //name[1] = last name
                    $name = explode("%20", $entry[0]);//split entry[0] on the space to separate first and last name
                    print 'First Name: <input type="text" name="firstName" value="' . $name[0] . '" /><br />';
                    print 'Last Name: <input type="text" name="lastName" value="' . $name[1] . '" /><br />';
                    print 'Phone Number: <input type="text" name="phoneNumber" value="' . $entry[1] . '" /><br />';
                ?>
                <input type="submit" value="Update" />
            </form>
            <button id="deleteButton">Delete</button>
        </div>
            
            <?php
                $_SESSION["queryString"] = $_SERVER["QUERY_STRING"];

                print '<script>
                            document.getElementById("deleteButton").onclick = function(){
                                location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/delete.php?' . $_SESSION["queryString"] . '";};
                      </script>';
            ?>
    </body>
</html>