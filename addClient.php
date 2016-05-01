<?php
session_start();
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=123");

	echo $type ? 'true' : 'false';

	$query = "INSERT INTO client (fname, mname, lname, client_type)
			VALUES ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[client_type]')";
	$result = pg_query($query);

	
	if($result){
		header("Location: add_donationform.php");
		exit();
	}
	else{
		header("Location: addClient.html");
		exit();
	}	

?>
