<!DOCTYPE html>

<html>
    <head>
        <title>Candace's Phonebook</title>
    </head>
    <body>
        <?php
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $phoneNumber = $_POST["phoneNumber"];

            $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");

            if($firstName != "" && $lastName != "" && $phoneNumber != ""){
                $query = "insert into Phone(firstName, lastName, phoneNumber) values('$firstName', '$lastName', '$phoneNumber')";
                $db->query($query);
            } else {
                print '<script>alert("You did not enter anything");</script>';
            }

            print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/index.php";</script>';
            mysqli_close($db);
        ?>
    </body>
</html>