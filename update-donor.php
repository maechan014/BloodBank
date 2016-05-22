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
        else{
            header("Location: viewDonor.php");
        }
        
		    pg_close($db);

        ?>