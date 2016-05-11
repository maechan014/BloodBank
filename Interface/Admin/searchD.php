<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
$idno = (int)$_POST['idnumber'];
   $sql =<<<EOF
      SELECT * FROM DONOR_VIEW where idno='$idno';
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
      <h1>Donor Information</h1>
         <table width="600" border="2" cellspacing="1" cellpadding="1">
            <tr>

               <th>ID Number</th>
               <th>First Name</th>
               <th>Middle Name</th>
               <th>Last Name</th>
               <th>Phone</th>
               <th>Birthday</th>
               <th>Age</th>
               <th>Weight</th>
               <th>Height</th>
               <th>Ethnicity</th>
               <th>House No</th>
               <th>Street</th>
               <th>Barangay</th>
               <th>City/Municipality</th>
               <th>Province</th>
               <th>Zip Code</th>
               <th>Blood Type</th>
               <th>Blood RH</th>
               <th>Gallons</th>
               <th>Amount Donated</th>

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
      echo "<td>" . $records['birthday'] . "</td>";
      echo "<td>" . $records['age'] . "</td>";
      echo "<td>" . $records['weight'] . "</td>";
      echo "<td>" . $records['height'] . "</td>";
      echo "<td>" . $records['ethnicity'] . "</td>";
      echo "<td>" . $records['houseno'] . "</td>";
      echo "<td>" . $records['street'] . "</td>";
      echo "<td>" . $records['barangay'] . "</td>";
      echo "<td>" . $records['citymun'] . "</td>";
      echo "<td>" . $records['province'] . "</td>";
      echo "<td>" . $records['zipcode'] . "</td>";
      echo "<td>" . $records['bloodtype'] . "</td>";
      echo "<td>" . $records['bloodrh'] . "</td>";
      echo "<td>" . $records['gallons'] . "</td>";
      echo "<td>" . $records['amountdonated'] . "</td>";
      echo "</tr>";
      echo "<br>";
   }
   pg_close($db);
?>

</table>

</body>
</html>