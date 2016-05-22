<?php
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	// //add client
	$clienttype = 'true';
	$clientQuery = "INSERT INTO Client (fname, mname, lname, client_type, phone)
					VALUES ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$clienttype', '$_POST[phone]')";

	//add donor
	$idnumber = pg_fetch_result(pg_query("SELECT max (idno) from client"), 0);
	echo($idnumber);
	$age = pg_fetch_result(pg_query("SELECT EXTRACT (year from age('$_POST[birthday]'::date))"), 0);
	$date= pg_fetch_result(pg_query("SELECT EXTRACT (year from age('$_POST[date]'::date))"), 0);
	$now = new DateTime();

	if($age < 18){
		header("Location: errorAgePage.html");
		exit();
	}

	if($date < 0){
		header("Location: errorDatePage.html");
            echo pg_last_error(); 
		exit();
	}

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
							'0')";

	$donorResult = pg_query($donorQuery);

	if(!$donorResult){
		header("Location: errorPage.html");
		exit();
	}
	$illness = $_POST[illness];
	$data = preg_split("/[\r\n,]+/", $illness, -1, PREG_SPLIT_NO_EMPTY);

	foreach ($data as $value) {
		$illnessQuery = "INSERT INTO donor_illness (idno, illness) VALUES ('$idnumber', '$value')";
		$illnessResult = pg_query($illnessQuery);
		if(!illnessResult){
			header("Location: errorPage.html");
		}
	}

	$query = "INSERT INTO Blood (bloodtype, 
								bloodrh, 
								date, 
								time, 
								amount, 
								withdrawalstatus,
								idno)
				VALUES ('$_POST[bloodtype]',
						'$rh',
						'$_POST[date]',
						'$_POST[time]',
						'$_POST[amount]',
						'false',
						'$idnumber')";

	$result = pg_query($query);
	$clientResult = pg_query($clientQuery);

	if($donorResult and $result){
		header("Location: viewDonor.php");
		exit();
	}
	else{
		echo pg_last_error();
		exit();
	}	

	pg_close($db);

?>
