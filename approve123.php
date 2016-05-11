<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

if(isset($_POST['approve'])){
                if(isset($_POST['check'])){
                  echo $_POST['check'];
                    foreach ($_POST['check'] as $value){
                        $sql = "UPDATE request SET status= 't' WHERE requestno = $value"; //write this query according to your table schema
                        pg_query($sql);
                    }
                }
            }

?>