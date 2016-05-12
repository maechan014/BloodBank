<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$name = (string)$_POST['name'];

?>

<!DOCTYPE html>  
   <head> 
   <title>Client Information</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <style>  
      li {
         listt-style: none;
      }
   </style>  
   </head>  
   <body>
      <h1>Client Information</h1>
   <table width="600" border="2" cellspacing="1" cellpadding="1">
      <tr>
         <td>Client ID</td> 
         <td>First Name</td> 
         <td>Middle Name</td> 
         <td>Last Name</td>
         <td>Phone</td>
      </tr>
   

<?php

   $query = "SELECT * FROM Client where fname='$name' or mname='$name' or lname='$name'"; 
        $res = pg_query($db, $query);
        if(!$res){
          echo pg_last_error($db);
          exit;
        }

        while($records = pg_fetch_assoc($res)){
          echo "<tr>";
          echo "<td>" . $records['idno'] . "</td>";
          echo "<td>" . $records['fname'] . "</td>";
          echo "<td>" . $records['mname'] . "</td>";
          echo "<td>" . $records['lname'] . "</td>";
          echo "<td>" . $records['phone'] . "</td>";
          echo "</tr>";
          echo "<br>";
       }
   pg_close($db);
   ?>

</table>

</body>
</html>