<html> 
    <body>
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
                    Phone
                </td> 
                <td> 
                    Client Type
                </td> 
            </tr> 
        <?php 
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=9718'); 
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

        $query = "SELECT idno, fname, mname, lname, phone, client_type FROM Client"; 

        $result = pg_query($db, $query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($records = pg_fetch_assoc($result)) { 
          echo "<tr>";
          echo "<td>" . $records['idno'] . "</td>";
          echo "<td>" . $records['fname'] . "</td>";
          echo "<td>" . $records['mname'] . "</td>";
          echo "<td>" . $records['lname'] . "</td>";
          echo "<td>" . $records['phone'] . "</td>";
          echo "<td>" . $records['client_type'] . "</td>";
          echo "</tr>";
          echo "<br>";
        } 
        ?> 
        </table> 
    </body> 
</html>