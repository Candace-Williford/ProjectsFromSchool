<!DOCTYPE html>

<html>
    <head>
        <title>Candace's Phonebook</title>
        <link href="css/bootstrap.min.css"
              rel="stylesheet"
              type="text/css" />
        <link href="css/indexStylesheet.css"
              rel="stylesheet"
              type="text/css" />
    </head>
    <body>
        <div id="contactList" class="container">
            <?php
                //This will generate the list of phonebook entries on this page
                $phonesFile = fopen("phones.dat", "r") or die("Unable to open file");

                if(fileSize("phones.dat") > 0){
                    $allEntries = fread($phonesFile, filesize("phones.dat"));
                    $entries = explode("\r\n", $allEntries);

                    foreach($entries as $entry){
                        if($entry != $entries[count($entries) - 1]){
                        echo '<a href="'. "update.php?entry=$entry" . '">' . $entry . '</a> (<a href="' . "delete.php?entry=$entry" . '">x</a>)<br />';
                        }
                    }
                } else {
                    $allEntries = "No entries";
                    echo $allEntries . "\r\n";
                }
            ?>

            <br /><button id="addButton">Add a Phone Number</button>
        </div>
        <script>
            document.getElementById("addButton").onclick = function(){
                location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/input.html";
            };
        </script>
    </body>
</html>