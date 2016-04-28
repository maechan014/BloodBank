<?php
$db = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=123");

   $sql =<<<EOF
      SELECT * FROM Client;
EOF;

   $clients = pg_query($db, $sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>View All Clients</title>  
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
         <th>Illness</th>
         <th>First Name</th>
         <th>Middle Name</th>
         <th>Last Name</th>
         <th>Date</th>
         <th>Time</th>
         <th>Date Needed</th>
         <th>Amount</th>
         <th>Tracking Number</th>
         <th>ID</th>
         <th>Street</th>
         <th>Barangay</th>
         <th>City/Municipality</th>
         <th>Province</th>
         <th>Zip Code</th>
         <th>Total Blood Donated</th>
         <th>Blood in Galloons</th>
         <th>Donor or Not?</th>
      </tr>
   

<?php
   if(!$clients){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients)){
      echo "<tr>";
      echo "<td>" . $records['idnumber'] . "</td>";
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['age'] . "</td>";
      echo "<td>" . $records['bdate'] . "</td>";
      echo "<td>" . $records['phone'] . "</td>";
      echo "<td>" . $records['ethnicity'] . "</td>";
      echo "<td>" . $records['height'] . "</td>";
      echo "<td>" . $records['weight'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['street'] . "</td>";
      echo "<td>" . $records['brgy'] . "</td>";
      echo "<td>" . $records['citymun'] . "</td>";
      echo "<td>" . $records['province'] . "</td>";
      echo "<td>" . $records['zip'] . "</td>";
      echo "<td>" . $records['total blood donated'] . "</td>";
      echo "<td>" . $records['blood in galloons'] . "</td>";
      echo "<td>" . $records['isdonor'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
$result = pg_query($query);   
?>

</table>

</body>
</html>