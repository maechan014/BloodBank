<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $sql =<<<EOF
      SELECT * FROM Client;
EOF;

   $clients = pg_query($db, $sql);
?>

<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>View Client</title>
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
   <link href="default.css" rel="stylesheet" type="text/css" media="all" />
   <style> 
      #content{
         background: #c72121;
         padding: 0em 7em;
      }
      table{
         position: absolute;
         top: 150px;
         background: #FFF;
         margin: 0 auto;
      }     
      #content h1{
         margin: 0 auto;
         position: relative;
         top: 10px;
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
            <h1>CLIENT INFORMATION</h1>
         <table width="600" border="2" cellspacing="1" cellpadding="1">
                        
            <tr>
               <th>ID Number</th>
               <th>First Name</th>
               <th>Middle Name</th>
               <th>Last Name</th>
               <th>Phone</th>
               <th>Client Type</th>
            </tr>                                 

            <?php
            if(!$clients){
               echo pg_last_error($db);
                  exit;
            } 
            while($records = pg_fetch_assoc($clients)){
               echo "<tr>";
               echo "<td>";
                  echo "<a href='searchDonor.php?action=view&id=".$records['idno']."'> ".$records['idno']." </a>";
               echo "</td>";
               echo "<td>" . $records['fname'] . "</td>";
               echo "<td>" . $records['mname'] . "</td>";
               echo "<td>" . $records['lname'] . "</td>";
               echo "<td>" . $records['phone'] . "</td>";
               echo "<td>" . $records['client_type'] . "</td>";
               echo "<td>";
                  echo "<a href='delete-client.php?action=view&id=".$records['idno']."'> ".Delete." </a>";
               echo "</td>";
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
