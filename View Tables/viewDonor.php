<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=123");

   $sql =<<<EOF
      SELECT * FROM Client;
EOF;

   $clients = pg_query($db, $sql);
?>

<!DOCTYPE html>  
   <head> 
   <title>View All Donors</title>  
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
      echo "<td>" . $records['birthday'] . "</td>";
      echo "<td>" . $records['age'] . "</td>";
      echo "<td>" . $records['weight'] . "</td>";
      echo "<td>" . $records['height'] . "</td>";
      echo "<td>" . $records['ethnicity'] . "</td>";
      echo "<td>" . $records['house no'] . "</td>";
      echo "<td>" . $records['street'] . "</td>";
      echo "<td>" . $records['barangay'] . "</td>";
      echo "<td>" . $records['city/municipality'] . "</td>";
      echo "<td>" . $records['province'] . "</td>";
      echo "<td>" . $records['zip code'] . "</td>";
      echo "<td>" . $records['blood type'] . "</td>";
      echo "<td>" . $records['blood rh'] . "</td>";
      echo "<td>" . $records['gallons'] . "</td>";
      echo "<td>" . $records['amount donated'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
$result = pg_query($query);   
?>

</table>

</body>
</html>