<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$idno = (int)$_POST['idnumber'];
   $sql =<<<EOF
      SELECT * FROM Client;
EOF;

   $clients = pg_query($db, $sql);
?>


<!DOCTYPE html>  
   <head> 
   <title>Donor Information</title>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <link href="default.css" rel="stylesheet" type="text/css" media="all" />
   <style>  
      li {
         listt-style: none;
      }
      table{
         background: #FFF;
      }
      #content{
         position: absolute;
         top: 100px;

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
                     <li><a href="admin-addPage.html" title="Add">Add</a></li>
                     <li><a href="admin-viewPage.html" title="View">View</a></li>
                     <li><a href="admin-search.html" title="Search">Search</a><li>
                     
                  </ul>
                  
               </div>
            </div>
         </div>

         <!-- MENU / HEADER-->
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
          echo "<td>" . $records['idno'] . "</td>";
          echo "<td>" . $records['fname'] . "</td>";
          echo "<td>" . $records['mname'] . "</td>";
          echo "<td>" . $records['lname'] . "</td>";
          echo "<td>" . $records['phone'] . "</td>";
          echo "</tr>";
          echo "<br>";
       }
   pg_close($db);
   ?>

</table>

</body>
</html>