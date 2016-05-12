<?php
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	// //add client
	$clienttype = 'true';
	$clientQuery = "INSERT INTO Client (fname, mname, lname, client_type, phone)
					VALUES ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$clienttype', '$_POST[phone]')";
	$clientResult = pg_query($clientQuery);


	//add donor
	$idnumber = pg_fetch_result(pg_query("SELECT max (idno) from client"), 0);
	echo($idnumber);
	$age = 19;
	$age = pg_fetch_result(pg_query("SELECT EXTRACT (year from age('$_POST[birthday]'::date))"), 0);

	$rh = '-';
	if($_POST[bloodrh] == "+"){
		$rh = '+';
	}

	$donorQuery = "INSERT INTO Donor (idno, houseno, street, barangay, citymun, province, zipcode, ethnicity, bloodrh, bloodtype, birthday, age, weight, height, amountdonated) 
					VALUES ('$idnumber',
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
							'$age', 
							'$_POST[weight]', 
							'$_POST[height]',
							'$_POST[amount]')";
	$donorResult = pg_query($donorQuery);

	$illness = $_POST[illness];
	$data = preg_split("/[\r\n,]+/", $illness, -1, PREG_SPLIT_NO_EMPTY);

	foreach ($data as $value) {
		$illnessQuery = "INSERT INTO donor_illness (idno, illness) VALUES ('$idnumber', '$value')";
		$illnessResult = pg_query($illnessQuery);
		if(!illnessResult){
			echo pg_last_error($db);
		}
	}
	
	if($donorResult){
		header("Location: admin-addDonation2.php?id=$idnumber&btype=$_POST[bloodtype]&brh=$rh");
		exit();
	}
	else{
		echo pg_last_error($db);
		exit();
	}	

?>
