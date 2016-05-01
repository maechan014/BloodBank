<html> 
    <body> 
        Deleted successfully
        <br><br>
        <h1>List of Clients</h1>
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td> 
                    ID Number
                </td> 
                <td> 
                    First Name 
                </td> 
                <td> 
                    Middle Name 
                </td> 
                <td> 
                    Last Name
                </td> 
                <td> 
                    Client Type
                </td> 
            </tr> 
        <?php 
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=123'); 
		$id = (int)$_POST['id']; 
		$query = "DELETE FROM client where idno='$id'"; 
		$result = pg_query($query); 
		if (!$result) { 
		    printf ("ERROR"); 
		    $errormessage = pg_errormessage($db); 
		    echo $errormessage; 
		    exit(); 
		} 
		pg_close(); 

        $query = "SELECT idno, fname, mname, lname, client_type FROM Client"; 

        $result = pg_query($db, $query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($myrow = pg_fetch_assoc($result)) { 
            printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
                $myrow['idno'], 
                htmlspecialchars($myrow['fname']), 
                htmlspecialchars($myrow['mname']), 
                htmlspecialchars($myrow['lname']), 
                htmlspecialchars($myrow['client_type']))
            ; 
        } 
        ?> 
        </table> 
    </body> 
</html>