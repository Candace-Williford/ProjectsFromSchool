<!DOCTYP html>

<html>
    <head>
        <title>Candace's Phonebook</title>
    </head>
    <body>
        <?php
            $queryString = $_SERVER["QUERY_STRING"];
            $queryValue = explode("=", $queryString);

            $db = mysqli_connect("xxx", "xxx", "xxx", "xxx");
            $query = "delete from Phone where id = $queryValue[1]";

            $db->query($query);

            mysqli_close($db);

            print '<script>location.href = "http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/index.php#"</script>'
        ?>
    </body>
</html>