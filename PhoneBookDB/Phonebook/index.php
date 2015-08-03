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
        <link href="css/indexStylesheet.css"
              rel="stylesheet"
              type="text/css" />
    </head>
    <body>
        <div id="contactList" class="container">
            <section>
                <div id="formPanel" class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Phone Number</td>
                                </tr>
                            </thead>
                            <?php
                                //This will generate the list of phonebook entries on this page
                                $db = mysqli_connect("localhost", "c2230a08", "c2230a08", "c2230a08test");
                                $query = "select * from Phone";

                                foreach($db->query($query) as $row){
            //                        print '<input type="text" name="id" value="' . $row["id"] . '" hidden />' . 
            //                              '<a href="' . 'update.php?entry=' . $row["id"] . '">' . 
            //                                   $row["firstName"] . ' ' . $row["lastName"] . ' ' . $row["phoneNumber"] . 
            //                              '</a>
            //                              <a href="http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/delete.php?entry=' . $row["id"] . '">x</a></br>';

                                    print '<tr>
                                            <td><a href="' . 'update.php?entry=' . $row["id"] . '">' . ' ' . $row["firstName"] . $row["lastName"] . '</a></td>
                                            <td>' . $row["phoneNumber"] . '</td>
                                           </tr>';
                                }

                                mysqli_close($db);
                            ?>
                        </table>
                        <br /><button id="addButton" class="btn">Add a Phone Number</button>
                    </div>
                </div>
            </section>
        </div>
        <script>
            document.getElementById("addButton").onclick = function(){
                location.href = "http://ps11.pstcc.edu/~c2230a08/week10/Phonebook/input.html";
            };
        </script>
    </body>
</html>