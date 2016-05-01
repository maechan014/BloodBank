<?php 
	$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=admin");
	$status = 'false';

	$query = "INSERT INTO Request (status, 
				requestno, 
				illness, 
				r_fname, 
				r_mname, 
				r_lname, 
				date, 
				time, 
				date_needed, 
				amount, 
				trackingnumber, 
				idnumber) VALUES 
					('$_POST[status]'&
					'$_POST[requestno]'&  
					'$_POST[illness]'&
					'$_POST[fname]'&
					null&
					'$_POST[lname]'&
					'$_POST[date]'&
					'$_POST[time]'&
					'$_POST[date_needed]'&
					'$_POST[amount]'&
					'$_POST[trackingnumber]'&
					'$_POST[idnumber]'
					)";
	$result = pg_query($query);
	if(!$result){
		echo pg_last_error($db);
	}else{
		echo "Request added\n";
	}
	pg_close($db);

?>