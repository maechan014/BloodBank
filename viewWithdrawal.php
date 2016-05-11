<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=9718");

   $sql =<<<EOF
      SELECT * FROM WITHDRAWAL_VIEW;
EOF;

   $clients = pg_query($db, $sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>View Withdrawals</title>  
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
         <th>Tracking Number</th>
         <th>ID Number</th>
         <th>Donor Name</th>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Date</th>
         <th>Time</th>
         <th>Amount</th>
      </tr>
   

<?php
   if(!$clients){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients)){
      echo "<tr>";
      echo "<td>" . $records['trackingno'] . "</td>";
      echo "<td>" . $records['idno'] . "</td>";
      echo "<td>" . $records['fname'] . " " . $records['lname'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['date'] . "</td>";
      echo "<td>" . $records['time'] . "</td>";
      echo "<td>" . $records['amount'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
$result = pg_query($query);   
?>

</table>

</body>
</html>