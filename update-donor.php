<html> 
    <body> 
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td>ID Number</td>
                <td>First Name</td>
                <td>Middle Name</td> 
                <td>Last Name</td>
                <td>Phone</td>
                <td>Birthday</td>
                <td>Age</td>
                <td>Weight</td>
                <td>Height</td>
                <td>Ethnicity</td>
                <td>House Number</td>
                <td>Street</td>
                <td>Barangay</td>
                <td>City/Municipality</td>
                <td>Province</td>
                <td>ZIP Code</td>
                <td>Blood Type</td>
                <td>Blood RH</td>
                <td>Gallons</td>
                <td>Total Amount Donated</td>
            </tr> 

        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
        $id = (int)$_POST['idnumber'];
        $query1 = "UPDATE Client set fname='$_POST[fname_update]', mname='$_POST[mname_update]',
             lname='$_POST[lname_update]', phone='$_POST[phone_update]' where idno='$id'";

        $clientresult = pg_query($db, $query1);
        if (!$clientresult) { 
            echo "Problem with query " . $query1 . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
        printf("Updated Successfully.");
        pg_close(); 

        $query2 .= "UPDATE Donor set houseno='$_POST[houseno_update]', 
        	 street='$_POST[street_update]', barangay='$_POST[barangay_update]', citymun='$_POST[citymun_update]',
             province='$_POST[province_update]', zipcode='$_POST[zipcode_update]', ethnicity='$_POST[ethnicity_update]',
             bloodtype='$_POST[bloodtype_update]', bloodrh='$_POST[bloodrh_update]', birthday='$_POST[birthday_update]',
             weight='$_POST[weight_update]', height='$_POST[height_update]' where idno='$id'"; 
    
        $donorresult = pg_query($db, $query2);
        if (!$donorresult) { 
            echo "Problem with query " . $query2 . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
        printf("Updated Successfully.");
        pg_close(); 
        

        $query = "SELECT * FROM DONOR_VIEW"; 
        $clients = pg_query($db, $query);

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