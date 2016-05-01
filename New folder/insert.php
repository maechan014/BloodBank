<?php  
	$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=admin");
	echo $type ? true : false; // no conversion

	$query = "INSERT INTO Client VALUES ('$_POST[idnumber]', '$_POST[fname]', '$_POST[mname]','$_POST[lname]', '$_POST[phone]', '$_POST[type]')";  
	$result = pg_query($query);   
?>