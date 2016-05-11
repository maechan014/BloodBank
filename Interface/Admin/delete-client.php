<html> 
    <body>
        <?php 
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=admin'); 
		$id = $_GET['id']; 
		$query = "DELETE FROM client where idno='$id'"; 
		$result = pg_query($query); 
		if (!$result) { 
		    printf ("ERROR"); 
		    $errormessage = pg_errormessage($db); 
		    echo $errormessage; 
		    exit(); 
		} 
		pg_close(); 

        $query = "SELECT idno, fname, mname, lname, phone, client_type FROM Client"; 

        $result = pg_query($db, $query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        }
        else{
            echo "SUCCESS DELETION";
        }
    </body> 
</html>