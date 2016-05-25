        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
        $trackingno = (int)$_POST['trackingnumber'];
        $query = "UPDATE BLOOD set 
            date='$_POST[date_update]', 
            time='$_POST[time_update]', 
            amount='$_POST[amount_update]'

            where trackingno='$trackingno'"; 
    
        $result = pg_query($db, $query); 
        if($result){
            header("Location: viewBlood.php");
            exit();
        }
        else{
            echo pg_last_error();
            exit();
        }   
        ?>