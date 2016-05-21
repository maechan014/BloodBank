<?php  
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

$status = 'false';

$query = "INSERT INTO Blood (bloodtype, 
							bloodrh, 
							date, 
							time, 
							amount, 
							withdrawalstatus,
							idno)
			VALUES ('$_POST[bloodtype]',
					'$_POST[bloodrh]',
					'$_POST[date]',
					'$_POST[time]',
					'$_POST[amount]',
					'false',
					'$_POST[idno]')";

$result = pg_query($query);

	if(!$result){
		echo pg_last_error($db);
   	}
   	else {
   		header("Location: successpage.html");
   	}


   pg_close($db);

?>