<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $query = "SELECT trackingno, bloodtype, bloodrh, amount, age(date) from blood where withdrawalstatus='f'";
   $galloner=pg_query($query);
?>

<!DOCTYPE html>  
   <head> 
   <title>Blood Inventory</title>  
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
         <th>Tracking No</th>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Amount</th>
         <th>Time Span</th>
      </tr>
   
<!-- Displays the request table together with a button on each record-->
<?php
   if(!$galloner){
      echo pg_last_error($db);
      exit;
   }
   $i=1;

   echo "<form action='approve123.php' method='post'>";
   while($records = pg_fetch_array($galloner)){
      echo "<tr>";
      echo "<td>" . $records['trackingno'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['amount'] . "</td>";
      echo "<td>" . $records['age'] . "</td>";
      echo "<br>";
      $i++;
   }

   pg_close($db);
?>


</table>

</body>
</html> 