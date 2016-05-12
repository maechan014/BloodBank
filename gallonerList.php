<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $query = "SELECT idno, fname, mname, lname, bloodtype, bloodrh, gallons, amountdonated from client natural join donor where gallons>='1'";
   $galloner=pg_query($query);
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
   <table width="600" border="2" cellspacing="5" cellpadding="3">
      <tr>
         <th>ID No</th>
         <th>First Name</th>
         <th>Middle Name</th>
         <th>Last Name</th>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Gallons</th>
         <th>Total cc Donated</th>
      </tr>
   
<!-- Displays the request table together with a button on each record-->
<?php
   if(!$galloner){
      echo pg_last_error($db);
      exit;
   }

   echo "<form action='approve123.php' method='post'>";
   while($records = pg_fetch_array($galloner)){
      echo "<tr>";
      echo "<td>" . $records['idno'] . "</td>";
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['gallons'] . "</td>";
      echo "<td>" . $records['amountdonated'] . "</td>";
      echo "<br>";
   }

   pg_close($db);
?>


</table>

</body>
</html>