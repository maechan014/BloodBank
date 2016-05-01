<?php
session_start();
	$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=admin");

	$query = "INSERT INTO Client (idnumber, fname, lname, phone, bloodtype, bloodrh)
			VALUES ('$_POST[idnumber]', 
					'$_POST[fname]',  
					'$_POST[lname]', 
					'$_POST[phone]', 
					'$_POST[bloodtype]',
					'$_POST[bloodrh]')";

	$result = pg_query($query);
	$rh = '-';
	if($_POST[bloodrh] == "+"){
		$rh = '%2B';
	}
	if($result){
		header("Location: http://localhost/Blood Bank UI/add_requestform.php?idnumber=$_POST[idnumber]&fname=$_POST[fname]&lname=$_POST[lname]&bloodtype=$_POST[bloodtype]&bloodrh=$rh");
		exit();
	}
	else{
		header("Location: http://localhost/Blood Bank UI/add_request.html");
		exit();
	}	

?>