<!DOCTYPE html>  
<head> 
<title>Add Client</title>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<style>  
li {listt-style: none;}  
</style>  
</head>  
<body>  
<h2>Enter Client Information</h2>  
<ul>  
<form name="insert" action="add_client.php" method="POST" >  
<li>ID Number:</li><li><input type="number" name="idnumber" /></li>
<li>First Name:</li><li><input type="text" name="fname" /></li>  
<li>Middle Name:</li><li><input type="text" name="mname" /></li>  
<li>Last Name:</li><li><input type="text" name="lname" /></li>
<li>Birthday:</li><li><input type="date" name="bdate" /></li>  
<li>Phone:</li><li><input type="text" name="phone" /></li>
<li>Ethnicity:</li><li><input type="text" name="ethnicity" /></li>
<li>Height:</li><li><input type="number" name="height" /></li>
<li>Weight:</li><li><input type="number" name="weight" /></li>
<li>Blood Type:</li><li><input type="text" name="bloodtype" /></li>
<li>Blood RH:</li><li><input type="text" name="bloodrh" /></li>
<li>Address:</li>
<li>Street:</li><li><input type="text" name="street" /></li>
<li>Barangay:</li><li><input type="text" name="brgy" /></li>
<li>City/Municipality:</li><li><input type="text" name="citymun" /></li>
<li>Province:</li><li><input type="text" name="province" /></li>
<li>ZIP Code:</li><li><input type="number" name="zip" /></li>
<li>Type:</li><li><input type="boolean" name="type" /></li>
<li><input type="submit" /></li>  
</form>  
</ul>  
</body>  
</html>

<?php  
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");

echo $type ? 'true' : 'false'; // no conversion

$query = "INSERT INTO Client (IDNumber, FName, MName, LName, Bdate, Phone, Ethnicity, Height,
								Weight, Bloodtype, BloodRH, Street, Brgy, CityMun, Province, Zip, isDonor)
		VALUES ('$_POST[idnumber]', '$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[bdate]',
				'$_POST[phone]', '$_POST[ethnicity]', '$_POST[height]', '$_POST[height]', '$_POST[bloodtype]',
				'$_POST[bloodrh]', '$_POST[street]', '$_POST[brgy]', '$_POST[citymun]', '$_POST[province]',
				'$_POST[zip]', '$_POST[type]')";
$result = pg_query($query);

$query = "INSERT INTO Donor_Illness (IDNumber) VALUES ('$_POST[idnumber]')";
$result = pg_query($query);

$query = "INSERT INTO Blood (IDNumber) VALUES ('$_POST[idnumber]')";
$result = pg_query($query);
?>