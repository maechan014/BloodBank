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
   <link href="viewClient.css" rel="stylesheet" type="text/css" media="all" />
   <style>
      #search{
         background: #FFF;
         position: absolute;
         top: 151px;
         right: 100px;
         width: 350px;
      }
      #search h3{
         font-size: 15px;
      }
      #search label{
         font-size: 13px;
         padding-left: 5px;
      }
      #search li{
         display: block;
      }
      #search input[type=button], #search input[type=submit]{
         background: #c72121;
         color: #FFF;
         border: none;
         padding: 1px 1px 1px 1px;
      }
      #search input[type=button]:hover, #search input[type=submit]:hover{
         cursor: pointer;
      }
   </style>

</head>

<body>
<!-- MENU / HEADER-->
      <div id="header-wrapper">
         <div id="header" class="container">
            <div id="logo">
               <h1><a href="index.html" title="Blood Bank">Blood Bank</a></h1>
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

<!-- BODY -->
      <div id="content"> 
         <div id="search"> 
            <form name="add" action="searchForClientByID.php" method="POST">
               <div class="search-form">
                  <ul class="keywords">
                     <h3>Search by ID Number</h3>
                     <li><label>ID Number:</label><input type = "number" name= "idnumber">
                     <input type="submit" name="submit" value="Search"></li>
                  </ul>
               </div>
            </form>
            <hr>
            <form name="add" action="searchForClientByName.php" method="POST">
               <div class="search-form">
                  <ul class="keywords">
                     <h3>Search by Name (First or Last)</h3>
                     <li><label>Name : </label><input type = "name" name= "name">
                     <input type="submit" name="submit" value="Search"></li>
                  </ul>
               </div>
            </form>
         </div>

         <div id="form-style">
               <h1>CLIENT INFORMATION</h1>
               <table width="600" border="2" cellspacing="1" cellpadding="1">
                              
                  <tr>
                     <th>ID Number</th>
                     <th>First Name</th>
                     <th>Middle Name</th>
                     <th>Last Name</th>
                     <th>Phone</th>
                     <th>Donor</th>
                  </tr>                                 

                  <?php
                  if(!$clients){
                     echo pg_last_error($db);
                        exit;
                  } 
                  while($records = pg_fetch_assoc($clients)){
                     echo "<tr>";
                     echo "<td>";
                        echo "<a href='UPDATE-C.php?action=view&id=".$records['idno']."'> ".$records['idno']." </a>";
                     echo "</td>";
                     echo "<td>" . $records['fname'] . "</td>";
                     echo "<td>" . $records['mname'] . "</td>";
                     echo "<td>" . $records['lname'] . "</td>";
                     echo "<td>" . $records['phone'] . "</td>";
                     echo "<td>" . $records['client_type'] . "</td>";
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
