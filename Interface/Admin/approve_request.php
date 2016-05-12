<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $sql ="SELECT * FROM Request where status = 'f'";
   $clients = pg_query($sql);
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
   <table width="600" border="2" cellspacing="3" cellpadding="3">
      <tr>
         <th>Request No</th>
         <th>ID No</th>
         <th>Status</th>
         <th>Date</th>
         <th>Time</th>
         <th>Date Needed</th>
         <th>Recipient Name</th>
         <th>Approve/Disapprove</th>
      </tr>
   
<!-- Displays the request table together with a button on each record-->
<?php
   if(!$clients){
      echo pg_last_error($db);
      exit;
   }
   $i=1;

   echo "<form action='approve123.php' method='post'>";
   while($records = pg_fetch_array($clients)){
      echo "<tr>";
      echo "<td>" . $records['requestno'] . "</td>";
      echo "<td>" . $records['idno'] . "</td>";
      echo "<td>" . $records['status'] . "</td>";
      echo "<td>" . $records['date'] . "</td>";
      echo "<td>" . $records['time'] . "</td>";
      echo "<td>" . $records['dateneeded'] . "</td>";
      echo "<td>" . $records['recipientname'] . "</td>";
      echo "<td><input type='checkbox' name='check[$i]' value = '".$records['requestno']."'></td>";
      echo "<br>";
      $i++;
   }

   echo "<input type='submit' name='approve' value = 'Approve'></td>";
   echo "</form>";

   pg_close($db);
?>


</table>

</body>
</html>