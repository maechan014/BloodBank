<?php
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	// //add client
	$clienttype = 'true';
	$clientQuery = "INSERT INTO Client (fname, mname, lname, client_type)
					VALUES ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$clienttype')";
	$clientResult = pg_query($clientQuery);


	//add donor
	$maxID = "SELECT max(idno) from Client";
	$id = intval(pg_query($maxID));

	$row = pg_fetch_row($id);
	$max = "$row[0]";

	// $intmax = int($max);
	$intmax = 6;

	$rh = '-';
	if($_POST[bloodrh] == "+"){
		$rh = '%2B';
	}

	$donorQuery = "INSERT INTO Donor (idno, houseno, street, barangay, citymun, province, zipcode, ethnicity, bloodrh, bloodtype, birthday, weight, height) 
					VALUES ('$id',
							'$_POST[houseno]', 
							'$_POST[street]', 
							'$_POST[barangay]', 
							'$_POST[citymun]', 
							'$_POST[province]', 
							'$_POST[zipcode]',
							'$_POST[ethnicity]', 
							'$rh', 
							'$_POST[bloodtype]', 
							'$_POST[birthday]', 
							'$_POST[weight]', 
							'$_POST[height]')";
	$donorResult = pg_query($donorQuery);

	// $age = "SELECT age (birthday) from Client where (idno = (SELECT max (idno) from Client))";

	
	if($donorResult){
		header("Location: addDonation.php");
		exit();
	}
	else{
		echo intval($id);
		echo pg_last_error($db);
		// header("Location: addDonor.html");
		exit();
	}	

?>
