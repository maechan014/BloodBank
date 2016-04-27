<?php  
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");

$status = 'false';

$query = "INSERT INTO Blood ()
			VALUES ('$_POST[date]',
					'$_POST[amount]',
					'$_POST[time]',
					$bloodtype,
					'$_POST[trackingnum]',
					$idnumber,
					'$_POST[status]')";  
$result = pg_query($query);

	if(!$result){
		echo pg_last_error($db);
   	}
   	else {
      echo "Records created successfully\n";
   	}

   pg_close($db);

?>