<?php
session_start();
	$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");

	echo $type ? 'true' : 'false';

	$query = "INSERT INTO Client (IDNumber, FName, MName, LName, Bdate, Phone, Ethnicity, Height,
									Weight, Bloodtype, BloodRH, Street, Brgy, CityMun, Province, Zip, isDonor)
			VALUES ('$_POST[idnumber]', '$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[bdate]',
					'$_POST[phone]', '$_POST[ethnicity]', '$_POST[height]', '$_POST[weight]', '$_POST[bloodtype]',
					'$_POST[bloodrh]', '$_POST[street]', '$_POST[brgy]', '$_POST[citymun]', '$_POST[province]',
					'$_POST[zip]', '$_POST[type]')";
	$result = pg_query($query);
	$rh = '-';
	if($_POST[bloodrh] == "+"){
		$rh = '%2B';
	}
	if($result){
		header("Location: http://localhost/add_donationform.php?id=$_POST[idnumber]&btype=$_POST[bloodtype]&brh=$rh");
		exit();
	}
	else{
		header("Location: http://localhost/add_client.html");
		exit();
	}	

?>
