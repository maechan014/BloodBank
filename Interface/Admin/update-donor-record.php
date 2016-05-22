<html> 
    <body> 
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td>Client ID</td> 
                <td>First Name</td> 
                <td>Middle Name</td> 
                <td>Last Name</td>
            </tr> 

        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
        $id = (int)$_POST['idno'];
        $query = "UPDATE CLIENT set fname='$_POST[fname_update]', mname='$_POST[mname_update]', lname='$_POST[lname_update]',
                phone='$_POST[phone_update]' where idno='$id'"; 
    
        $result = pg_query($db, $query); 
        
        $query = "UPDATE DONOR set 
                    houseno='$_POST[houseno_update]', 
                    street='$_POST[street_update]', 
                    barangay='$_POST[barangay_update]',
                    citymun='$_POST[citymun_update]',
                    province='$_POST[province_update]',
                    zipcode='$_POST[zipcode_update]',
                    ethnicity='$_POST[ethnicity_update]',
                    bloodtype='$_POST[bloodtype_update]',
                    bloodrh='$_POST[bloodrh_update]',
                    birthday='$_POST[birthday_update]',
                    weight='$_POST[weight_update]',
                    height='$_POST[height_update]'

                    where idno='$id'";
        $result2 = pg_query($db, $query); 

        if($result and $result2){
            header("Location: viewDonor.php");
            exit();
        }
        else{
            echo pg_last_error();
            exit();
        }   

    pg_close($db);
        ?> 
        </table>
    </body> 
</html>