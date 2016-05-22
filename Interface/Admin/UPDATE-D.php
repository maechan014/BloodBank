<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	$id = $_GET['id']; 
	$query = "SELECT FROM donor where idno='$id'"; 
	$result = pg_query($query); 
?>

<!DOCTYPE html>
<html>  
<head> 
	<title>Edit Request</title>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
</head>  

<body>  
	<h2>Edit Request</h2>  
		<?php	
			if(!$result){
				echo pg_last_error($db);
                    exit;
			}
			echo "<form name="insert" action="update-donor.php" method="POST" >";
			while ($records = pg_fetch_assoc($result)) {
					echo "<li>ID Number: <input type="number" name="idnumber" value="Mahar"></li>";
					echo "<li>First Name: <input type="text" name="fname_update"></li>";
					echo "<li>Middle Name: <input type="text" name="mname_update"></li>";
					echo "<li>Last Name: <input type="text" name="lname_update"><br></li>";
					echo "<li>Phone: <input type="text" name="phone_update"></li>";
					echo "<li>House No: <input type="text" name="houseno_update"></li>";
					echo "<li>Street: <input type="text" name="street_update"></li>";
					echo "<li>Barangay: <input type="text" name="barangay_update"></li>";
					echo "<li>City/Municipality: <input type="text" name="citymun_update"></li>";
					echo "<li>Province: <input type="text" name="province_update"></li>";
					echo "<li>ZIP Code: <input type="text" name="zipcode_update"></li>";
					echo "<li>Ethnicity: <input type="text" name="ethnicity_update"></li>";
					echo "<li>Blood Type: <input type="text" name="bloodtype_update"></li>";
					echo "<li>Blood RH: <input type="text" name="bloodrh_update"></li>";
					echo "<li>Birthday: <input type="date" name="birthday_update">";
					echo "<li>Weight: <input type="text" name="weight_update"></li>";
					echo "<li>Height: <input type="text" name="height_update"></li>";
					echo "<li><input type="submit"/></li>";
			
			}
			echo "</form>";
		?>
		
</body>  
</html>
?>