<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$idno = (int)$_POST['idnumber'];
   $sql =<<<EOF
      SELECT * FROM Client WHERE idno = '$idno';
EOF;

$clients = pg_query($db, $sql);
//  $query = "SELECT * FROM Client where fname='$name' or mname='$name' or lname='$name'"; 
//         $res = pg_query($db, $query);
   
?>


<!DOCTYPE html>  
   <head> 
   <title>Donor Information</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <link href="default.css" rel="stylesheet" type="text/css" media="all" />
   <link href="bloodtype.css" rel="stylesheet" type="text/css" media="all" />
    <style>
      #form-style{
         position: absolute;
         left: -200px;
         top: 150px;
         min-height: 100px;
      }
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
         font-size: 11px;
      }
      #search li{
         display: block;
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
                      <li><a href="admin-addDonor.html" title="Add">Add</a></li>
                      <li><a href="admin-approveRequest.php" title="Requests">Requests</a></li>
                      <li><a href="admin-viewPage.html" title="View">View</a></li>
                      <li><a href="admin-search.html" class="currentpage" title="Search">Search</a></li>
                      <li><a href="index.html" title="Logout">Logout</a><li>
                  </ul>
                  
               </div>
            </div>
         </div>

         <!-- MENU / HEADER-->
      <div id="content">
        <div id="search"> 
            <form name="add" action="searchD.php" method="POST">
               <div class="search-form">
                  <ul class="keywords">
                     <h3>Search by ID Number</h3>
                     <li><label>ID Number:</label><input type = "number" name= "idnumber"></li>
                     <center><li><input type="submit" name="submit" value="Search"></li></center>
                  </ul>
               </div>
            </form>
            <hr>
            <form name="add" action="searchName.php" method="POST">
               <div class="search-form">
                  <ul class="keywords">
                     <h3>Search by Name</h3>
                     <li><label>Name (First/Last): </label><input type = "name" name= "name"></li>
                     <center><li><input type="submit" name="submit" value="Search"></li></center>
                  </ul>
               </div>
            </form>
        </div>
        <div id="form-style">
          <h1>Client Information</h1>
              <table width="600" border="2" cellspacing="1" cellpadding="1">
                <tr>
                   <th>ID Number</th>
                   <th>First Name</th>
                   <th>Middle Name</th>
                   <th>Last Name</th>
                   <th>Phone</th>
                </tr>
              
          <?php
              
            if(!$clients){
              echo pg_last_error($db);
              exit;
            }
            while($records = pg_fetch_assoc($clients)){
              echo "<tr>";
              echo "<td>";
                  echo "<a href='UPDATE-D.php?action=view&id=".$records['idno']."'> ". $records['idno'] ." </a>";
              echo "</td>";
              echo "<td>" . $records['fname'] . "</td>";
              echo "<td>" . $records['mname'] . "</td>";
              echo "<td>" . $records['lname'] . "</td>";
              echo "<td>" . $records['phone'] . "</td>";
              echo "</tr>";
           }
       ?> 
          </table>
      </div>
    </div>

</body>
</html>