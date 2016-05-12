<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$btype = (String)$_POST['bloodtype'];
$rh = (string)$_POST['bloodrh'];
   $sql =<<<EOF
      SELECT * FROM DONOR_VIEW where bloodtype='$btype' and bloodrh='$rh';
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
      <h1>Donor Information</h1>
   <table width="600" border="2" cellspacing="1" cellpadding="1">
      <tr>

         <th>ID Number</th>
         <th>First Name</th>
         <th>Middle Name</th>
         <th>Last Name</th>
         <th>Phone</th>
         <th>Birthday</th>
         <th>Age</th>
         <th>Weight</th>
         <th>Height</th>
         <th>Ethnicity</th>
         <th>House No</th>
         <th>Street</th>
         <th>Barangay</th>
         <th>City/Municipality</th>
         <th>Province</th>
         <th>Zip Code</th>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Gallons</th>
         <th>Amount Donated</th>

      </tr>

<?php
   if(!$clients){
      echo pg_last_error($db);
      exit;
   } 
   while($records = pg_fetch_assoc($clients)){
      echo "<tr>";
      echo "<td>" . $records['idno'] . "</td>";
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['phone'] . "</td>";
      echo "<td>" . $records['birthday'] . "</td>";
      echo "<td>" . $records['age'] . "</td>";
      echo "<td>" . $records['weight'] . "</td>";
      echo "<td>" . $records['height'] . "</td>";
      echo "<td>" . $records['ethnicity'] . "</td>";
      echo "<td>" . $records['houseno'] . "</td>";
      echo "<td>" . $records['street'] . "</td>";
      echo "<td>" . $records['barangay'] . "</td>";
      echo "<td>" . $records['citymun'] . "</td>";
      echo "<td>" . $records['province'] . "</td>";
      echo "<td>" . $records['zipcode'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['gallons'] . "</td>";
      echo "<td>" . $records['amountdonated'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
?>

</table>

</body>
</html>