<html>  
<head> 
	<title>Edit Donor</title> 
</head>
<body>

	<form method="POST" action="update-donor-record.php">
	<tr>

		<?php 

			$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
		
			if(!$db){
				echo pg_last_error();
			}


			echo $id = $_GET['id'];
					
			$query = "SELECT * FROM donor_view where idno='$id'"; 
			$result = pg_query($query);

				while($row = pg_fetch_array($result)){
					$fname = $row['fname'];
					$mname = $row['mname'];
					$lname = $row['lname'];
					$phone = $row['phone'];
					$houseno = $row['houseno'];
					$street = $row['street'];
					$barangay = $row['barangay'];
					$citymun = $row['citymun'];
					$province = $row['province'];
					$zipcode = $row['zipcode'];
					$ethnicity = $row['ethnicity'];
					$bloodtype = $row['bloodtype'];
					$bloodrh = $row['bloodrh'];
					$birthday = $row['birthday'];
					$weight = $row['weight'];
					$height = $row['height'];
				}

		?>
			<p>ID to Update : <input type="hidden" name="idno" value="<?=$id?>"><br> 
            <p>First Name : <input name="fname_update" type="text" value="<?=$fname?>"><br> 
            <p>Middle Name: <input type="text" name="mname_update" size="20" length="30" value="<?=$mname?>"><br>
            <p>Last Name: <input type="text" name="lname_update" size="20" length="30" value="<?=$lname?>"><br> 
            <p>Phone: <input type="text" name="phone_update" size="20" length="30" value="<?=$phone?>"><br> 
            <p>House Number: <input name="houseno_update" type="text" value="<?=$houseno?>"><br>
            <p>Street: <input name="street_update" type="text" value="<?=$street?>"><br>
            <p>Barangay: <input name="barangay_update" type="text" value="<?=$barangay?>"><br>
            <p>City/Municipality: <input name="citymun_update" type="text" value="<?=$citymun?>"><br>
            <p>Province <input name="province_update" type="text" value="<?=$province?>"><br>
            <p>ZIP CODE <input name="zipcode_update" type="text" value="<?=$zipcode?>"><br>
            <p>Ethnicity: <input name="ethnicity_update" type="text" value="<?=$ethnicity?>"><br>
            <p>Blood Type: <select name="bloodtype_update" value="<?=$bloodtype?>">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
								<option value="O">O</option>
							</select><br>
            <p>Blood RH: <select name="bloodrh_update" value="<?=$bloodrh?>">
								<option value="+">+</option>
								<option value="-">-</option>
							</select><br>
            <p>Birthdate: <input name="birthday_update" type="text" value="<?=$birthday?>"><br>
            <p>Weight: <input name="weight_update" type="text" value="<?=$weight?>"><br>
            <p>Height: <input name="height_update" type="text" value="<?=$height?>"><br>
            <br>
            <input type="submit" name="submit" value="Update It"> 
            <input type="reset" name="reset" value="Clear It"> 
</form>
</body>  
</html>
