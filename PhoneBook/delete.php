<!DOCTYP html>

<html>
    <head>
        <title>Candace's Phonebook</title>
    </head>
    <body>
        <?php
            $queryString = $_SERVER["QUERY_STRING"];
            $queryValue = explode("=", $queryString);

            $entryToDelete = str_replace("%20", " ", $queryValue[1]);

            $phonesFile = fopen("phones.dat", "r") or die("Unable to open file");
            $allEntries = fread($phonesFile, filesize("phones.dat"));
            fclose($phonesFile);
            $entries = explode("\r\n", $allEntries);

            for($i = 0; $i < count($entries) - 1; $i++){
                if($entries[$i] == $entryToDelete){
                    $entries[$i] = "";
                }
            }
            
            $phonesFile = fopen("phones.dat", "w") or die("Unable to open file");
            for($i = 0; $i < count($entries) - 1; $i++){
                if($entries[$i] != ""){
                    if($i == count($entries) - 1){
                        print '<script>' . $entries . '</script>';
                        fwrite($phonesFile, $entries[$i]);
                    }
                    else {
                        fwrite($phonesFile, $entries[$i] . "\r\n");
                    }
                }
            }
            fclose($phonesFile);

            print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week9/Phonebook/index.php#"</script>'
        ?>
    </body>
</html>