<?php  
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");

$status = 'false';

$query = "INSERT INTO Blood VALUES ('$_POST[idnumber]',
									'$_POST[bloodtype]',
									'$_POST[bloodrh]',
									'$_POST[trackingnum]',
									'$_POST[date]',
									'$_POST[time]',
									'$_POST[amount]',
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