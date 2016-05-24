<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$type = (String)$_POST['bloodtype'];
$rh = (String)$_POST['bloodrh'];
   $sql =<<<EOF
      SELECT * FROM WITHDRAWAL_VIEW where bloodtype='$type' and bloodrh='$rh';
EOF;
   
   $sql2 =<<<EOF
      SELECT * FROM BLOOD where bloodtype='$type' and bloodrh='$rh' and withdrawalstatus='true' and idno IS NULL;
EOF;

   $withdrawal = pg_query($db, $sql);
   $withdrawal2 = pg_query($db, $sql2);
?>

<!DOCTYPE html>   
   </head>
   <head title="View Withdrawals">

         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Search</title>
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
      <link href="default.css" rel="stylesheet" type="text/css" media="all" />
      <link href="bloodtype.css" rel="stylesheet" type="text/css" media="all" />
      <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

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
                  <li><a href="admin-homepage.html"   title="Home">Home</a></li>
                  <li><a href="admin-addDonor.html" title="Add">Add</a></li>
                  <li><a href="admin-approveRequest.php" title="Requests">Requests</a></li>
                  <li><a href="admin-viewPage.html" class="currentpage" title="View">View</a></li>
                  <!-- <li><a href="admin-search.html" title="Search">Search</a></li> -->
                  <li><a href="index.html" title="Logout">Logout</a><li>
                </ul>
                
            </div>
        </div>
    </div>

<!-- MENU / HEADER-->

<div id = "content">
   <div id="form-style">
      <ul id = "keywords">
      <li><h1>Blood Type Withdrawals</h1></li>
      <table width="600" border="2" cellspacing="1" cellpadding="1">
         <tr>
            <th>Tracking Number</th>
            <th>ID Number</th>
            <th>Donor Name</th>
            <th>Blood Type</th>
            <th>Blood RH</th>
            <th>Date</th>
            <th>Time</th>
            <th>Amount</th>
         </tr>
      

   <?php
      if(!$withdrawal){
         echo pg_last_error($db);
         exit;
      } 
      while($records = pg_fetch_assoc($withdrawal)){
         echo "<tr>";
         echo "<td>" . $records['trackingno'] . "</td>";
         echo "<td>" . $records['idno'] . "</td>";
         echo "<td>" . $records['fname'] . " " . $records['lname'] . "</td>";
         echo "<td>" . $records['bloodtype'] . "</td>";
         echo "<td>" . $records['bloodrh'] . "</td>";
         echo "<td>" . $records['date'] . "</td>";
         echo "<td>" . $records['time'] . "</td>";
         echo "<td>" . $records['amount'] . "</td>";
         echo "</tr>";
         echo "<br>";
      }
      
      if(!$withdrawal2){
         echo pg_last_error($db);
         exit;
      } 
      while($records = pg_fetch_assoc($withdrawal2)){
         echo "<tr>";
         echo "<td>" . $records['trackingno'] . "</td>";
         echo "<td>" . $records['idno'] . "</td>";
         echo "<td>" . $records['fname'] . " " . $records['lname'] . "</td>";
         echo "<td>" . $records['bloodtype'] . "</td>";
         echo "<td>" . $records['bloodrh'] . "</td>";
         echo "<td>" . $records['date'] . "</td>";
         echo "<td>" . $records['time'] . "</td>";
         echo "<td>" . $records['amount'] . "</td>";
         echo "</tr>";
         echo "<br>";
      }
      pg_close($db);
   ?>

   </table>
</div>

</body>
</html>