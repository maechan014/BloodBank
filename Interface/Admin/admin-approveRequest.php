<?php
$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");

   $sql ="SELECT * FROM Request where status = 'f'";
   $clients = pg_query($sql);
?>

<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Blood Bank</title>
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
   <link href="default.css" rel="stylesheet" type="text/css" media="all" />
   <!-- <link href="view.css" rel="stylesheet" type="text/css" media="all" /> -->
   <style>
      #content{
         background: #c72121;
         padding: 0em 7em;
      }
      table{
         position: relative;
         top: 10px;
         background: #FFF;
      }     
      #content h1{
         margin: 0 auto;
         position: relative;
         top: 10px;
         color: #FFF;
      }
      #style1 input[type=submit], #style1 input[type=button]{
         border: none;
         background: #FFF;
         color: #c72121;
         padding: 8px 15px 8px 15px;
         position: relative;
         right: 0;
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
                        <li><a href="admin-approveRequest.php" class="currentpage" title="Requests">Requests</a></li>
                        <li><a href="admin-viewPage.html" title="View">View</a></li>
                        <li><a href="admin-search.html" title="Search">Search</a></li>
                        <li><a href="index.html" title="Logout">Logout</a><li>
                     </ul>
            			
            		</div>
            	</div>
            </div>

            <!-- MENU / HEADER-->

            <!-- BODY -->
            <div id="content"> 
               <div id="style1">  
                     <h1>APPROVE REQUESTS</h1>
               	  <table width="600" border="2" cellspacing="3" cellpadding="3">
                     <tr>
                        <th>Request No</th>
                        <th>ID No</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Date Needed</th>
                        <th>Recipient Name</th>
                        <th>Approve/Disapprove</th>
                     </tr>
                  
               <!-- Displays the request table together with a button on each record-->
               <?php
                  if(!$clients){
                     echo pg_last_error($db);
                     exit;
                  }
                  $i=1;

                  echo "<form action='approve123.php' method='post'>";
                     while($records = pg_fetch_array($clients)){
                        echo "<tr>";
                        echo "<td>" . $records['requestno'] . "</td>";
                        echo "<td>" . $records['idno'] . "</td>";
                        echo "<td>" . $records['status'] . "</td>";
                        echo "<td>" . $records['date'] . "</td>";
                        echo "<td>" . $records['time'] . "</td>";
                        echo "<td>" . $records['dateneeded'] . "</td>";
                        echo "<td>" . $records['recipientname'] . "</td>";
                        echo "<td><input type='checkbox' name='check[$i]' value = '".$records['requestno']."'></td>";
                        echo "<br>";
                        $i++;
                     }
                     echo "<input type='submit' name='approve' value = 'Approve'></td>";
                     echo "</form>";   
                  

                  pg_close($db);
               ?>
               </table>
               </div> 
            </div>
            <!-- BODY -->
</body>
</html>
