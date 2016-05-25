<?php
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
	$sql = "SELECT * FROM Request";

 	$clients = pg_query($db, $sql);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Bank</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<style>
	#card{
		position: relative;
		top: 150px;
		background: #FFF;
		width: 350px;
		height: 100px;
		margin: auto 0;
	}
</style>
</head>

<body>
<!-- MENU / HEADER-->
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
				<li><a href="index.html" title="Logout">Logout</a><li>
			</ul>
			
		</div>
	</div>
</div>

<!-- MENU / HEADER-->

<!-- BODY -->
<div id="content">
	<div id="card">
		
		<?php
			echo "Name: ";
			echo $name = "Name";
			echo "<br>";
			echo "Username: ";
			echo $username = "Username";
			echo "<br>";
			echo "Password: ";
			echo $pass = " Password";
			
		?>
		
	</div> 

</div>
<!-- BODY -->




</body>
</html>
