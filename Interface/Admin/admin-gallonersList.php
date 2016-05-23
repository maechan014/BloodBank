
<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $query = "SELECT idno, fname, mname, lname, bloodtype, bloodrh, gallons, amountdonated from client natural join donor where gallons>='1'";
   $galloner=pg_query($query);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galloner's List</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="bloodtype.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
<!-- MENU / HEADER-->
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#" title="Blood Bank">Blood Bank</a></h1>
			<span>Donate now!</span> 
		</div>
	


		<div id="menu">
			<ul>
            <li><a href="admin-homepage.html" title="Home">Home</a></li>
            <li><a href="admin-addDonor.html" title="Add">Add</a></li>
            <li><a href="admin-approveRequest.php" title="Requests">Requests</a></li>
            <li><a href="admin-viewPage.html" class="currentpage" title="View">View</a></li>
            <li><a href="admin-search.html" title="Search">Search</a></li>
            <li><a href="index.html" title="Logout">Logout</a><li>
         </ul>
			
		</div>
	</div>
</div>

<!-- MENU / HEADER-->

<!-- BODY -->
<div id="content"> 
      <div id="form-style">
          <h1>GALLONER'S LIST</h1>
        <table width="600" border="2" cellspacing="5" cellpadding="3">
      <tr>
         <th>ID No</th>
         <th>First Name</th>
         <th>Middle Name</th>
         <th>Last Name</th>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Gallons</th>
         <th>Total cc Donated</th>
      </tr>
   
<!-- Displays the request table together with a button on each record-->
<?php
   if(!$galloner){
      echo pg_last_error($db);
      exit;
   }

   echo "<form action='approve123.php' method='post'>";
   while($records = pg_fetch_array($galloner)){
      echo "<tr>";
      echo "<td>" . $records['idno'] . "</td>";
      echo "<td>" . $records['fname'] . "</td>";
      echo "<td>" . $records['mname'] . "</td>";
      echo "<td>" . $records['lname'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['gallons'] . "</td>";
      echo "<td>" . $records['amountdonated'] . "</td>";
      echo "<br>";
   }

   pg_close($db);
?>


</table>

      </div> 

     
</div>
<!-- BODY -->

</body>
</html>

