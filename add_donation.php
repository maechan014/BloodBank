<!DOCTYPE html>  
<head> 
<title>Add Blood Donation</title>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<style>  
li {listt-style: none;}  
</style>  
</head>  
<body>  
<h2>Enter Donation Information111</h2>  
<ul>
<form name="insert" action="add_request.php" method="POST" >
<li>Donor ID: <?php echo $_POST["idnumber"]?></li>
<li>Blood Type: <?php echo $_POST["bloodtype"]?></li>
<li>Blood RH: <?php echo $_POST["bloodrh"]?></li>
<li>Tracking Number:</li><li><input type="number" name="trackingnum" /></li>  
<li>Date of donation:</li><li><input type="date" name="date" /></li>
<li>Time of Donation:</li><li><input type="time" name="time" /></li>  
<li>Amount (in cc):</li><li><input type="number" step="1"  name="amount" /></li>  

<li><input type="submit" /></li>
</form>  
</ul>  
</body>  
</html>

<?php  
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");

$status = 'false';

$query = "INSERT INTO Blood VALUES ('$_POST[idnumber]',
									'$_POST[bloodtype]',
									'$_POST[bloodrh]',
									'$_POST[trackingnum]',
									'$_POST[date]',
									'$_POST[time]',
									'$_POST[amount]',
									'$_POST[status]')";  
$result = pg_query($query);

	if(!$result){
		echo pg_last_error($db);
   	}
   	else {
      echo "Records created successfully\n";
   	}

   pg_close($db);

?>