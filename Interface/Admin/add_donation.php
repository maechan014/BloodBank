<?php  
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

$sql =<<<EOF
      SELECT bloodtype, bloodrh FROM Donor where idno='$_POST[idno]';
EOF;

$donor = pg_query($db, $sql);
$record = pg_fetch_assoc($donor);
$btype = $record['bloodtype'];
$rh = $record['bloodrh'];

$status = 'false';

$query = "INSERT INTO Blood (bloodtype, 
							bloodrh, 
							date, 
							time, 
							amount, 
							withdrawalstatus,
							idno)
			VALUES ('$btype',
					'$rh',
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
   		header("Location: viewDonations.php");
   	}


   pg_close($db);

?>