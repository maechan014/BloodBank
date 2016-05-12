<?php  
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

$status = 'false';

$amount = "UPDATE Donor SET amountdonated = '$_POST[amount]' WHERE idno = $_POST[idnumber]";
$amountresult = pg_query($amount);
if (!$amountresult) {
	echo pg_last_error($db);
}


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
					'$_POST[idnumber]')";

$result = pg_query($query);
$sql = "INSERT into Donor (amountdonated) values('$_POST[amount]')";
$result2 = pg_query($psql);
	if(!$result){
		echo pg_last_error($db);
   	}
   	else {
   		header("Location: successpage.html");
   	}


   pg_close($db);

?>