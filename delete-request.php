<html> 
    <body>
        <br><br>
        <h1>List of Requests</h1>
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td>Request Number</td> 
                <td>Client ID Number</td> 
                <td>Client Name</td> 
                <td>Blood Type</td> 
                <td>Blood RH</td> 
                <td>Date</td> 
                <td>Time</td> 
                <td>Date Needed</td> 
                <td>Recipient Name</td> 
                <td>Status</td> 
            </tr> 

        <?php 
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=9718'); 
		$requestno = (int)$_POST['rno']; 
		$query = "DELETE FROM request where requestno='$requestno'"; 
		$result = pg_query($query); 
		if (!$result) { 
		    printf ("ERROR"); 
		    $errormessage = pg_errormessage($db); 
		    echo $errormessage; 
		    exit(); 
		} 
		pg_close(); 

        $query = "SELECT * FROM Request_View"; 
        $query2 = "SELECT * FROM Request where idno IS NULL"; 

        $result = pg_query($db, $query);

        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($records = pg_fetch_assoc($result)) { 
          echo "<tr>";
          echo "<td>" . $records['requestno'] . "</td>";
          echo "<td>" . $records['idno'] . "</td>";
          echo "<td>" . $records['fname'] . " " . $records['mname'] . " " . $records['lname'] . "</td>";
          echo "<td>" . $records['bloodtype'] . "</td>";
          echo "<td>" . $records['bloodrh'] . "</td>";
          echo "<td>" . $records['date'] . "</td>";
          echo "<td>" . $records['time'] . "</td>";
          echo "<td>" . $records['dateneeded'] . "</td>";
          echo "<td>" . $records['recipientname'] . "</td>";
          echo "<td>" . $records['status'] . "</td>";
          echo "</tr>";
          echo "<br>";
        } 
        
        $result = pg_query($db, $query2);
         
        if (!$result) { 
            echo "Problem with query " . $query2 . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($records = pg_fetch_assoc($result)) { 
          echo "<tr>";
          echo "<td>" . $records['requestno'] . "</td>";
          echo "<td>" . $records['idno'] . "</td>";
          echo "<td>" . $records['fname'] . " " . $records['mname'] . " " . $records['lname'] . "</td>";
          echo "<td>" . $records['bloodtype'] . "</td>";
          echo "<td>" . $records['bloodrh'] . "</td>";
          echo "<td>" . $records['date'] . "</td>";
          echo "<td>" . $records['time'] . "</td>";
          echo "<td>" . $records['dateneeded'] . "</td>";
          echo "<td>" . $records['recipientname'] . "</td>";
          echo "<td>" . $records['status'] . "</td>";
          echo "</tr>";
          echo "<br>";
        } 

        ?> 
        </table> 
    </body> 
</html>