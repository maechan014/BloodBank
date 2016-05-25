<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$name = (string)$_POST['name'];

?>

<!DOCTYPE html>  
   <head> 
   <title>Client Information</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
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


    <div id="content">
        <div id="search"> 
            <form name="add" action="searchForDonorByID.php" method="POST">
               <div class="search-form">
                  <ul class="keywords">
                     <h3>Search by ID Number</h3>
                     <li><label>ID Number:</label><input type = "number" name= "idnumber">
                      <input type="submit" name="submit" value="Search"></li></center>
                  </ul>
               </div>
            </form>
            <hr>
            <form name="add" action="searchForDonorByName.php" method="POST">
               <div class="search-form">
                  <ul class="keywords">
                     <h3>Search by Name</h3>
                     <li><label>Name (First/Last): </label><input type = "name" name= "name">
                      <input type="submit" name="submit" value="Search"></li></center>
                  </ul>
               </div>
            </form>
        </div>
       <div id="form-style">
          <h1>CLIENT INFORMATION</h1>
          <table width="600" border="2" cellspacing="1" cellpadding="1">
          <tr>
             <th>Client ID</th> 
             <th>First Name</th> 
             <th>Middle Name</th> 
             <th>Last Name</th>
             <th>Phone</th>
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