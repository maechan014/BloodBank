<?php
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	$age = pg_fetch_result(pg_query("SELECT EXTRACT (year from age('$_POST[birthday]'::date))"), 0);
	if($age < 18){
		header("Location: errorAgePage.html");
		exit();
	}

	$now = time();
    $dateOfDonation = strtotime("$_POST[date]");
    $datediff = $now - $dateOfDonation;

	if($datediff < 0){
			header("Location: addDonor-User-error.html");
			exit();
		}

	// //add client
	$clienttype = 'true';
	$clientQuery = "INSERT INTO Client (fname, mname, lname, client_type, phone)
					VALUES ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$clienttype', '$_POST[phone]')";
	$clientResult = pg_query($clientQuery);


	//add donor
	$idnumber = pg_fetch_result(pg_query("SELECT max (idno) from client"), 0);
	echo($idnumber);

	$username = str_pad($idnumber, 8, '0', STR_PAD_LEFT);
	$password = generatePassword(8);

	$usersQuery = "INSERT INTO users (username, usertype, password, idno) 
				VALUES ('$username', 'd', '$password', '$idnumber')";

	$usersResult = pg_query($usersQuery);

	//$age = pg_fetch_result(pg_query("SELECT EXTRACT (year from age('$_POST[birthday]'::date))"), 0);

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

	$illness = $_POST[illness];
	$data = preg_split("/[\r\n,]+/", $illness, -1, PREG_SPLIT_NO_EMPTY);

	foreach ($data as $value) {
		$illnessQuery = "INSERT INTO donor_illness (idno, illness) VALUES ('$idnumber', '$value')";
		$illnessResult = pg_query($illnessQuery);
		if(!illnessResult){
			echo pg_last_error($db);
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

	function generatePassword($_len) {

	    $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            // small letters
	    $_alphaCaps  = strtoupper($_alphaSmall);                // CAPITAL LETTERS
	    $_numerics   = '1234567890';                            // numerics

	    $_container = $_alphaSmall.$_alphaCaps.$_numerics;   // Contains all characters
	    $password = ''; // will contain the desired pass

	    for($i = 0; $i < $_len; $i++) {                                 // Loop till the length mentioned
	        $_rand = rand(0, strlen($_container) - 1);                  // Get Randomized Length
	        $password .= substr($_container, $_rand, 1);                // returns part of the string [ high tensile strength ;) ] 
	    }

    	return $password;       // Returns the generated Pass
	}



	if($result){
		header("Location: addDonorSuccess.php");
		exit();
	}
	else{
		echo pg_last_error($db);
		exit();
	}	

	pg_close($db);

?>
