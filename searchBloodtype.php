<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=123");
$type = (string)$_POST['bloodtype'];
   $sql =<<<EOF
      SELECT * FROM BLOODTYPE_VIEW where bloodtype='$type';
EOF;

   $clients = pg_query($db, $sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>Donor Information</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <style>  
      li {
         listt-style: none;
      }
   </style>  
   </head>  
   <body>
      <h1>Blood Type Information</h1>
   <table width="600" border="2" cellspacing="1" cellpadding="1">
      <tr>

         <th>Tracking Number</th>
         <th>Donor ID</th>
         <th>Donor's First Name</th>
         <th>Donor's Middle Name</th>
         <th>Donor's Last Name</th>
         <th>Blood Type</th>
         <th>Amount</th>
         <th>Time</th>
         <th>Date</th>
         <th>Withdrawal Status</th>

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
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['amount'] . "</td>";
      echo "<td>" . $records['time'] . "</td>";
      echo "<td>" . $records['date'] . "</td>";
      echo "<td>" . $records['withdrawalstatus'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
$result = pg_query($query);   
?>

</table>
</body>
</html>