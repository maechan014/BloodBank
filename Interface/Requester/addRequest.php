<?php
session_start();
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	echo $type ? 'true' : 'false';

	//add to client relation
	$addclient = "INSERT INTO client (fname, mname, lname, client_type)
			VALUES ('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', 'false')";
	$result = pg_query($addclient);

	$idnumber = pg_fetch_result(pg_query("SELECT max (idno) from client"), 0);

	$date = pg_fetch_result(pg_query("SELECT now()::timestamp"), 0);

	$query = "INSERT INTO Request (idno, dateneeded, recipientname, status, date, bloodtype, bloodrh, illness)
			VALUES ('$idnumber', '$_POST[dateneeded]', '$_POST[recipientname]', 'false', '$date', '$_POST[bloodtype]', '$_POST[bloodrh]', '$_POST[illness]')";
	$result = pg_query($query);

	
	if($result){
		header("Location: addRequest-success.html");
		exit();
	}
	else{
		echo pg_last_error($db);
		exit();
	}	

?>
