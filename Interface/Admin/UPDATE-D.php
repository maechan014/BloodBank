<html>  
<head> 
	<title>Edit Donor</title> 
	<link href="default.css" rel="stylesheet" type="text/css" media="all" />
	<style>
	#content{
		background: #c72121;
		min-height: 800px;
		padding: 0em 7em;
	}
	#form-style{
		position: relative;
		top: 50px;
		left: 0;
		right: 0;
		bottom: 0;
		margin: auto;
		width: 500px;
		min-height: 750px;
	    padding: 10px 10px 10px 20px;
	    font: 12px "Roboto", "Lucida Grande", sans-serif;
	    font-weight: 3px;
	    border: 1px solid #c72121;

	    color: black;
	    background: #FFF;

	}

	#form-style h1{
	    text-align: center;
	}

	#form-style h1, h2{
		 color: black;
	}

	#form-style li {
	    padding: 0;
	    display: block;
	    list-style: none;
	    margin: 10px 0 0 0;
	}

	#form-style label{
		width:150px;
	    margin-top: 3px;
	    display:inline-block;
	    float:left;
	    padding-left:3px;
	}

	#form-style input {
	    width: 230px; 
	}

	#form-style input[type=submit], #form-style input[type=button]{
		margin-left: 153px;
	    background: #c72121;
	    padding: 8px 15px 8px 15px;
	    border: none;
	    color: #FFF;
	}
	#form-style input[type=submit]:hover, #form-style input[type=button]:hover{
	    cursor: pointer;
	}

	.required{
		color: red;
		padding-left: 2px;
	}
	.hr-1{
		border-top: 3px double black;
	}
	</style>
</head>
<body>
	<!-- MENU / HEADER -->
		<div id="header-wrapper">
			<div id="header" class="container">
				<div id="logo">
					<h1><a href="admin-homepage.html" title="Blood Bank">Blood Bank</a></h1>
					<span>Donate now!</span> 
				</div>
			
				<div id="menu">
					<ul>
						<li><a href="admin-homepage.html"  class="currentpage" title="Home">Home</a></li>
						<li><a href="admin-addDonor.html" title="Add">Add</a></li>
						<li><a href="admin-approveRequest.php" title="Requests">Requests</a></li>
						<li><a href="admin-viewPage.html" title="View">View</a></li>
						<li><a href="admin-search.html" title="Search">Search</a></li>
						<li><a href="index.html" title="Logout">Logout</a><li>
					</ul>
					
				</div>
			</div>
		</div>
	<!-- MENU / HEADER -->

	<!-- CONTENT -->
		<div id="content">
			<div id="form-style">
				<form method="POST" action="update-donor-record.php">
	<tr>

		<?php 

			$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
		
			if(!$db){
				echo pg_last_error();
			}


			$id = $_GET['id'];
					
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
			
			<li><label>ID to Update : </label><input type="text" name="idno" value="<?=$id?>" disabled></li>
            <li><label>First Name : </label><input name="fname_update" type="text" value="<?=$fname?>"></li>
            <li><label>Middle Name: </label><input type="text" name="mname_update" size="20" length="30" value="<?=$mname?>"></li>
            <li><label>Last Name: </label><input type="text" name="lname_update" size="20" length="30" value="<?=$lname?>"></li>
            <li><label>Phone: </label><input type="text" name="phone_update" size="20" length="30" value="<?=$phone?>"></li>
            <li><label>House Number: </label><input name="houseno_update" type="text" value="<?=$houseno?>"></li>
            <li><label>Street: </label><input name="street_update" type="text" value="<?=$street?>"></li>
            <li><label>Barangay: </label><input name="barangay_update" type="text" value="<?=$barangay?>"></li>
            <li><label>City/Municipality: </label><input name="citymun_update" type="text" value="<?=$citymun?>"></li>
            <li><label>Province </label><input name="province_update" type="text" value="<?=$province?>"></li>
            <li><label>ZIP CODE </label><input name="zipcode_update" type="text" value="<?=$zipcode?>"></li>
            <li><label>Ethnicity: </label><input name="ethnicity_update" type="text" value="<?=$ethnicity?>"></li>
            <li><label>Blood Type: </label><select name="bloodtype_update" value="<?=$bloodtype?>">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
								<option value="O">O</option>
							</select></li>
            <li><label>Blood RH: </label><select name="bloodrh_update" value="<?=$bloodrh?>" >
								<option value="+">+</option>
								<option value="-">-</option>
							</select></li>
            <li><label>Birthdate: </label><input name="birthday_update" type="text" value="<?=$birthday?>"></li>
            <li><label>Weight: </label><input name="weight_update" type="text" value="<?=$weight?>"></li>
            <li><label>Height: </label><input name="height_update" type="text" value="<?=$height?>"></li>
            <li><input type="submit" name="submit" value="Update It"> </li>
            <!-- <li><input type="reset" name="reset" value="Clear It"> </li> -->
            <div class="function">
	            <?php
					echo "<li>" . "<a href='delete-client.php?action=view&id=".$id."'> ".DELETE." </a>" . "</li>";
				?>
            </div>
			            
</form>
			</div>
		</div>
	<!-- CONTENT -->
	
</body>  
</html>
