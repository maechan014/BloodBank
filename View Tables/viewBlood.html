<?php
$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123");

   $sql =<<<EOF
      SELECT * FROM Blood;
EOF;

   $clients = pg_query($db, $sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>View Blood</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <style>  
      li {
         listt-style: none;
      }
   </style>  
   </head>  
   <body>  
   <table width="600" border="2" cellspacing="1" cellpadding="1">
      <tr>
         <th>ID Number</th>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Tracking Number</th>
         <th>Date</th>
         <th>Time</th>
         <th>Amount</th>
         <th>Withdrawal Status</th>
      </tr>
   

<?php
   if(!$clients){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients)){
      echo "<tr>";
      echo "<td>" . $records['idnumber'] . "</td>";
      echo "<td>" . $records['blood type'] . "</td>";
      echo "<td>" . $records['blood rh'] . "</td>";
      echo "<td>" . $records['tracking number'] . "</td>";
      echo "<td>" . $records['date'] . "</td>";
      echo "<td>" . $records['time'] . "</td>";
      echo "<td>" . $records['amount'] . "</td>";
      echo "<td>" . $records['Withdrawal status'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
$result = pg_query($query);   
?>

</table>

</body>
</html>