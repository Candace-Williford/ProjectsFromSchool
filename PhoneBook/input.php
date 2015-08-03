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

            $phonesFile = fopen("phones.dat", "r") or die("Unable to open file");
            $allEntries = fread($phonesFile, filesize("phones.dat"));
            fclose($phonesFile);
            $entries = explode("\r\n", $allEntries);
            
            $entry = "$firstName $lastName, $phoneNumber";

            for($i=0; $i < count($entries) - 1; $i++){
                if($entries[$i] == $entry){
                    print '<script>alert("That entry already exists.");</script>';
                    print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/index.php";</script>';
                    goto skip;
                }
            }

            $phonesFile = fopen("phones.dat", "a") or die("Unable to open file");
            
            if($firstName != "" && $lastName != "" && $phoneNumber != ""){
                $entry = "$firstName $lastName, $phoneNumber\r\n";
                fwrite($phonesFile, $entry);
                fclose($phonesFile);
                print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/index.php#";</script>';
            } else {
                print '<script>alert("Invalid data entered");</script>';
                print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/input.html";</script>';
            }

            skip: echo "skipped stuff";
        ?>
    </body>
</html>