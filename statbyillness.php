<?php
   $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $sql ="SELECT illness, count (illness) from donor_illness group by donor_illness.illness order by donor_illness.illness";
   $withdrawal = pg_query($sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>Donor Illness Statistics</title>  
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
         <th>Illness</th>
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
      echo "<td>" . $records['illness'] . "</td>";
      echo "<td>" . $records['count'] . "</td>";
      echo "<br>";
   }

   pg_close($db);
?>


</table>

</body>
</html>