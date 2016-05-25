        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
        $requestno = (int)$_POST['requestnumber'];
        $query = "UPDATE REQUEST set 
            date='$_POST[date_update]', 
            time='$_POST[time_update]', 
            dateneeded='$_POST[dateneeded_update]',
            recipientname='$_POST[recipientname_update]',
            bloodtype='$_POST[bloodtype_update]',
            bloodrh='$_POST[bloodrh_update]',
            illness='$_POST[illness_update]'

            where requestno='$requestno'"; 
    
        $result = pg_query($db, $query); 
        if($result){
            header("Location: viewRequest.php");
            exit();
        }
        else{
            echo pg_last_error();
            exit();
        }   
        ?>