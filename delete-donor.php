<html> 
    <body> 
        <br><br>
        <h1>List of Donors</h1>
        <table border="2" cellspacing="3" cellpadding="4"> 
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
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=admin'); 

		$id = (int)$_POST['idno']; 

		$query = "DELETE FROM donor where idno='$id'"; 
		$result = pg_query($query); 
		if (!$result) { 
		    printf ("ERROR"); 
		    $errormessage = pg_errormessage($db); 
		    echo $errormessage; 
		    exit(); 
		} 
    printf("Deleted successfully.");
		pg_close(); 

    $query2 = "DELETE FROM client where idno='$id'"; 
    $result2 = pg_query($query2); 
    if (!$result2) { 
        echo "Problem with query " . $query1 . "<br/>"; 
        $errormessage = pg_errormessage($db); 
        echo $errormessage; 
        exit(); 
    } 
    printf("Deleted successfully.");
    pg_close(); 

        $query = "SELECT * FROM DONOR_VIEW"; 

        $result = pg_query($db, $query); 
        
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
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
        ?> 
        </table> 
    </body> 
</html>