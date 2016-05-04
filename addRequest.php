<?php
session_start();
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

	echo $type ? 'true' : 'false';

	$date = pg_fetch_result(pg_query("SELECT now()::timestamp"), 0);

	$query = "INSERT INTO Request (idno, dateneeded, recipientname, status, date)
			VALUES ('$_POST[idno]', '$_POST[dateneeded]', '$_POST[recipientname]', 'false', '$date')";
	$result = pg_query($query);

	
	if($result){
		header("Location: add_donationform.php");
		exit();
	}
	else{
		echo pg_last_error($db);
		exit();
	}	

?>
