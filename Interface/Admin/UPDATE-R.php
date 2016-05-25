<html>  
<head> 
	<title>Edit Request</title> 
</head>
<body>
	<form method="POST" action="update-request.php">
		<?php
			$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
		
			if(!$db){
				echo pg_last_error();
			}


			echo $requestno = $_POST['requestno'];
					
			$query = "SELECT * FROM Request where requestno='$requestno'";
			$result = pg_query($query);

				while($row = pg_fetch_array($result)){
					$date = $row['date'];
					$time = $row['time'];
					$dateneeded = $row['dateneeded'];
					$recipientname = $row['recipientname'];
					$bloodrh = $row['bloodrh'];
					$bloodtype = $row['bloodtype'];
					$illness = $row['illness'];
				}

		?>

			<p>Request Number : <input type="text" name="requestnumber" value="<?=$requestno?>"><br> 
            <p>Date : <input name="date_update" type="date" value="<?=$date?>"><br> 
            <p>Time: <input type="time" name="time_update" size="20" length="30" value="<?=$time?>"><br>
            <p>Date Needed: <input type="date" name="dateneeded_update" size="20" length="30" value="<?=$dateneeded?>"><br> 
            <p>Recipient's Name: <input type="text" name="recipientname_update" size="20" length="30" value="<?=$recipientname?>"><br> 
            <p>Blood Type: <input type="text" name="bloodtype_update" size="20" length="30" value="<?=$bloodtype?>"><br> 
            <p>Blood RH: <input type="text" name="bloodrh_update" size="20" length="30" value="<?=$bloodrh?>"><br> 
           	<p>Illness: <input type="text" name="illness_update" size="20" length="30" value="<?=$illness?>"><br> 
            <br>
            <input type="submit" name="submit" value="Update It">

</form>
</body>  
</html>
