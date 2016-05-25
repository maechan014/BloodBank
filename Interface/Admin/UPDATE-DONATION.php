<html>  
<head> 
	<title>Edit Donation Info</title> 
</head>
<body>
	<form method="POST" action="update-donation-record.php">
		<?php
			$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
		
			if(!$db){
				echo pg_last_error();
			}


			echo $trackingno = $_GET['trackingno'];
					
			$query = "SELECT * FROM Blood where trackingno='$trackingno'";
			$result = pg_query($query);

				while($row = pg_fetch_array($result)){
					$amount = $row['amount'];
					$date = $row['date'];
					$time = $row['time'];
				}

		?>

			<p>Tracking Number : <input type="text" name="trackingnumber" value="<?=$trackingno?>"><br>
            <p>Date: <input name="date_update" type="date" value="<?=$date?>"><br> 
            <p>Time: <input type="time" name="time_update" size="20" length="30" value="<?=$time?>"><br>             	
            <p>Amount: <input type="text" name="amount_update" size="20" length="30" value="<?=$amount?>"><br>
            <br>
            <input type="submit" name="submit" value="Update It">

</form>
</body>  
</html>
