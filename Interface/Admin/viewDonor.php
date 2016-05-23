<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $sql =<<<EOF
      SELECT * FROM donor_view;
EOF;

   $donors = pg_query($db, $sql);
?>

<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Blood Bank</title>
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
                  <li><a href="admin-homepage.html"   title="Home">Home</a></li>
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
            <h1>DONOR LIST</h1>
            <table width="600" border="2" cellspacing="1" cellpadding="1">
               <tr>
                  <th>ID Number</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
               </tr>

               <?php
                  if(!$donors){
                     echo pg_last_error($db);
                     exit;
                  } 
                  while($records = pg_fetch_assoc($donors)){
                     echo "<tr>";
                     echo "<td>" . $records['idno'] . "</td>";
                     echo "<td>" . $records['fname'] . "</td>";
                     echo "<td>" . $records['mname'] . "</td>";
                     echo "<td>" . $records['lname'] . "</td>";
                     echo "</tr>";
                  }
               pg_close($db);
               $result = pg_query($query);   
               ?>
          </table>
         </div>
               
      </div>
<!-- BODY -->

</body>
</html>
