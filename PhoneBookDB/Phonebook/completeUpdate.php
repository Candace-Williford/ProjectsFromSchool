<?php
    session_start();
?>

<!DOCTYP html>

<html>
    <head>
        <title>Candace's Phonebook</title>
    </head>
    <body>
        <?php
            $db = mysqli_connect("localhost", "c2230a08", "c2230a08", "c2230a08test");

            $button = $_POST["submit"];
            
            if($button == "Update"){
                $id = $_POST["id"];
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $phoneNumber = $_POST["phoneNumber"];

                if($firstName != "" && $lastName != "" && $phoneNumber != ""){
                    $query = "update Phone 
                              set firstName = '$firstName',
                                  lastName = '$lastName',
                                  phoneNumber = '$phoneNumber'
                              where id = $id";

                    $db->query($query);
                    mysqli_close($db);

                    session_unset();
                    session_destroy();

                    print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/index.php"</script>';
                } else {
                    print '<script>alert("Invalid data entered");</script>';
                    print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/update.php?' . $_SESSION["queryString"] . '";</script>';
                }
            } else if($button == "Delete"){
                print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/delete.php?' . $_SESSION["queryString"] . '";</script>';
            }
        ?>
    </body>
</html>