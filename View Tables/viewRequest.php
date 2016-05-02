<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=123");

   $sql =<<<EOF
      SELECT * FROM Request;
EOF;

   $clients = pg_query($db, $sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>View Request</title>  
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
         <th>Status</th>
         <th>Request No</th>
         <th>ID Number</th>
         <th>Date</th>
         <th>Time</th>
         <th>Date Needed</th>
         <th>Recipient Name</th>
         
      </tr>
   

<?php
   if(!$clients){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients)){
      echo "<tr>";
      echo "<td>" . $records['status'] . "</td>";
      echo "<td>" . $records['request no'] . "</td>";
      echo "<td>" . $records['idno'] . "</td>";
      echo "<td>" . $records['date'] . "</td>";
      echo "<td>" . $records['time'] . "</td>";
      echo "<td>" . $records['date needed'] . "</td>";
      echo "<td>" . $records['recipient name'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
$result = pg_query($query);   
?>

</table>

</body>
</html>