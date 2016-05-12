<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

$sql ="SELECT bloodtype, bloodrh, count (bloodtype) from blood WHERE withdrawalstatus = 't' group by blood.bloodtype, blood.bloodrh order by blood.bloodtype ";
$withdrawal = pg_query($sql);

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Bank</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="view.css" rel="stylesheet" type="text/css" media="all" />
<style>
	table{
		background: #FFF;
	}
	h2{
		color: #FFF;
	}
</style>

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
				<li><a href="admin-addPage.html" title="Add">Add</a>
				<li><a href="admin-viewPage.html" title="View">View</a></li>
				<li><a href="admin-search.html" title="Search">Search</a>
			</ul>
			
		</div>
	</div>
</div>

<!-- MENU / HEADER-->

<!-- BODY -->
<div id="content"> 
	<h2>Withrawal Summary</h2>
	 <table width="600" border="2" cellspacing="3" cellpadding="3">
      <tr>
         <th>Blood Type</th>
         <th>Blood RH</th>
         <th>Count</th>
      </tr>
   
<!-- Displays the query result-->
		<?php
		   if(!$withdrawal){
		      echo pg_last_error($db);
		      exit;
		   }
		   
		   while($records = pg_fetch_array($withdrawal)){
		      echo "<tr>";
		      echo "<td>" . $records['bloodtype'] . "</td>";
		      echo "<td>" . $records['bloodrh'] . "</td>";
		      echo "<td>" . $records['count'] . "</td>";
		      echo "<br>";
		   }


		   pg_close($db);
		?>


</table>


</div>
<!-- BODY -->




</body>
</html>
