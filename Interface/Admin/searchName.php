<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$name = (string)$_POST['name'];

?>

<!DOCTYPE html>  
   <head> 
   <title>Client Information</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
   <link href="default.css" rel="stylesheet" type="text/css" media="all" />
   <link href="bloodtype.css" rel="stylesheet" type="text/css" media="all" />
   <style>
      table{
        background: #FFF;
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


    <div id="content">
       <div id="form-style">
          <h1>Client Information</h1>
          <table width="600" border="2" cellspacing="1" cellpadding="1">
          <tr>
             <td>Client ID</td> 
             <td>First Name</td> 
             <td>Middle Name</td> 
             <td>Last Name</td>
             <td>Phone</td>
          </tr>
      <?php

        $query = "SELECT * FROM Client where fname='$name' or mname='$name' or lname='$name'"; 
        $res = pg_query($db, $query);
          if(!$res){
            echo pg_last_error($db);
            exit;
          }

          while($records = pg_fetch_assoc($res)){
            echo "<tr>";
            echo "<td>" . $records['idno'] . "</td>";
            echo "<td>" . $records['fname'] . "</td>";
            echo "<td>" . $records['mname'] . "</td>";
            echo "<td>" . $records['lname'] . "</td>";
            echo "<td>" . $records['phone'] . "</td>";
            echo "</tr>";

         }
       pg_close($db);
      ?>
      </table>
      </div>
    </div>
</body>
</html>