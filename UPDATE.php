<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	$id = $_GET['id']; 
	$query = "SELECT FROM client where idno='$id'"; 
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
		<form name="insert" action="update-donor.php" method="POST" > 
			<?php	
				if(!$clients){
					echo "ERROR!";
					// echo pg_last_error($db);
	                exit;
				while ($records = pg_fetch_array($result)) {
					<li>ID Number:<input type="text" name="idnumber"> </li>
					<li>First Name: <input type="text" name="fname_update"></li>
					<li>Middle Name: <input type="text" name="mname_update"></li>
					<li>Last Name: <input type="text" name="lname_update"></li>
					<li>Phone: <input type="text" name="phone_update"></li>
					<li>House No: <input type="text" name="houseno_update"></li>
					<li>Street: <input type="text" name="street_update"></li>
					<li>Barangay: <input type="text" name="barangay_update"></li>
					<li>City/Municipality: <input type="text" name="citymun_update"></li>
					<li>Province: <input type="text" name="province_update"></li>
					<li>ZIP Code: <input type="text" name="zipcode_update"></li>
					<li>Ethnicity: <input type="text" name="ethnicity_update"></li>
					<li>Blood Type: <input type="text" name="bloodtype_update"></li>
					<li>Blood RH: <input type="text" name="bloodrh_update"></li>
					<li>Birthday: <input type="date" name="birthday_update">
					<li>Weight: <input type="text" name="weight_update"></li>
					<li>Height: <input type="text" name="height_update"></li>
					<li><input type="submit"/></li>	
				}
			?>
		</form>
</body>  
</html>

