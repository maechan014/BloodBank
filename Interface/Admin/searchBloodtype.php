<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$type = (string)$_POST['bloodtype'];
$rh = (string)$_POST['bloodrh'];
   $sql =<<<EOF
      SELECT * FROM BLOODTYPE_VIEW where bloodtype='$type' and bloodrh='$rh';
EOF;
   $sql2 =<<<EOF
      SELECT * FROM BLOOD where bloodtype='$type' and bloodrh='$rh' and idno IS NULL;
EOF;

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
         <th>Blood RH</th>
         <th>Amount</th>
         <th>Time</th>
         <th>Date</th>
         <th>Withdrawal Status</th>

      </tr>
   

<?php

   $clients = pg_query($db, $sql);
   $clients2 = pg_query($db, $sql2);

   if(!$clients){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients)){
      echo "<tr>";
      echo "<td>" . $records['trackingno'] . "</td>";
      echo "<td>" . $records['idno'] . " " . "</td>";
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['amount'] . "</td>";
      echo "<td>" . $records['time'] . "</td>";
      echo "<td>" . $records['date'] . "</td>";
      echo "<td>" . $records['withdrawalstatus'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }

   if(!$clients2){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients2)){
      echo "<tr>";
      echo "<td>" . $records['trackingno'] . "</td>";
      echo "<td>" . $records['idno'] . " " . "</td>";
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
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