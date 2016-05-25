<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

$sql ="SELECT bloodtype, bloodrh, count (bloodtype) from blood WHERE withdrawalstatus = 't' group by blood.bloodtype, blood.bloodrh order by blood.bloodtype ";
$withdrawal = pg_query($sql);

?>

<!DOCTYPE html>  
   <head> 
   <title>Withdrawal Tally</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <style>  
      li {
         listt-style: none;
      }
   </style>  
   </head>  
   <body>  
   <table width="600" border="2" cellspacing="3" cellpadding="3">
      <tr>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Count</th>
      </tr>
   
<!-- Displays the query result-->
      <?php
         if(!$withdrawal){
            echo pg_last_error($db);
            exit;
         }
         
         while($records = pg_fetch_array($withdrawal)){
            echo "<tr>";
            echo "<td>" . $records['bloodtype'] . "</td>";
            echo "<td>" . $records['bloodrh'] . "</td>";
            echo "<td>" . $records['count'] . "</td>";
            echo "<br>";
         }


         pg_close($db);
      ?>


   </table>

</body>
</html>