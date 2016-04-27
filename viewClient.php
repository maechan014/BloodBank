<!DOCTYPE html>  
<head> 
<title>View All Clients</title>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<style>  
li {listt-style: none;}  
</style>  
</head>  
<body>  
<h2>View Client</h2>    
</body>  
</html>

<?php  
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");


$sql =<<<EOF
      SELECT * FROM Client;
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
      exit;
   } 
   while($row = pg_fetch_row($ret)){
      echo "ID Number= ". $row[0] . "\n";
      echo "First Name = ". $row[1] ."\n";
      echo "Middle Name = ". $row[2] ."\n";
      echo "Last Name =  ".$row[4] ."\n";
      echo "Phone Number = ". $row[5] ."\n";
      echo "Donor or not? ". $row[6] ."\n\n";
   }
   echo "Operation done successfully\n";
   pg_close($db);
$result = pg_query($query);   
?>