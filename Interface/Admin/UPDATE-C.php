<html>  
<head> 
	<title>Edit Client</title> 
</head>
<body>

	<form method="POST" action="update-client-record.php">
	<tr>

		<?php 

			$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
		
			if(!$db){
				echo pg_last_error();
			}


			echo $id = $_GET['id'];
					
			$query = "SELECT * FROM client where idno='$id'"; 
			$result = pg_query($query);

				while($row = pg_fetch_array($result)){
					$fname = $row['fname'];
					$mname = $row['mname'];
					$lname = $row['lname'];
					$phone = $row['phone'];
				}

		?>
			<p>ID to Update : <input type="text" name="idno" value="<?=$id?>"><br> 
            <p>First Name : <input name="fname_update" type="text" value="<?=$fname?>"><br> 
            <p>Middle Name: <input type="text" name="mname_update" size="20" length="30"><br>
            <p>Last Name: <input type="text" name="lname_update" size="20" length="30" value="<?=$lname?>"><br> 
            <p>Phone: <input type="text" name="phone_update" size="20" length="30" value="<?=$phone?>"><br> 
            <br>
            <input type="submit" name="submit" value="Update It"> 
            <input type="reset" name="reset" value="Clear It"> 

		<!-- <tr>
		<td></td>
		</tr>
		<tr>
		<td width="100">First Name</td>
		<td></td>
		</tr>
		<tr>
		<td width="100">Middle Name</td>
		<td><input name="mname_update" type="text" value="<?=$mname?>"></td>
		</tr>
		<tr>
		<td width="100">Last Name</td>
		<td><input name="lname_update" type="text" value="<?=$lname?>"></td>
		</tr>
		<tr>
		<td width="100">Phone Number</td>
		<td><input name="phone_update" type="text" value="<?=$phone?>"></td>
		</tr>
		<input type="submit" name="submit" value="Update It"> -->
</form>
</body>  
</html>
