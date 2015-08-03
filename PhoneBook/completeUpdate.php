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
            //get the entry from the session variable in update.php
            $entryToUpdate = str_replace("%20", " ", $_SESSION["entryToUpdate"]);

            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $phoneNumber = $_POST["phoneNumber"];

            if($firstName != "" && $lastName != "" && $phoneNumber != ""){
                //get all entries from the file
                $phonesFile = fopen("phones.dat", "r") or die("Unable to open file");

                $allEntries = fread($phonesFile, filesize("phones.dat"));
                $entries = explode("\r\n", $allEntries);
                fclose($phonesFile);

                for($i = 0; $i < (count($entries) - 1); $i++){
                    if($entries[$i] == $entryToUpdate){
                        $updatedEntry = "$firstName $lastName, $phoneNumber";
                        $entries[$i] = $updatedEntry;
                    }
                }

                $phonesFile = fopen("phones.dat", "w") or die("Unable to open file");
                foreach($entries as $entryToWrite){
                    if($entryToWrite == $entries[count($entries) - 1])
                        fwrite($phonesFile, "$entryToWrite");
                    else
                        fwrite($phonesFile, "$entryToWrite\r\n");
                }
                fclose($phonesFile);
                session_unset();
                session_destroy();
                
                print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/index.php#"</script>';
            } else {
                print '<script>alert("Invalid data entered");</script>';
                print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/update.php?' . $_SESSION["queryString"] . '";</script>';
            }
        ?>
    </body>
</html>