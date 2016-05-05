<html> 
    <body> 
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td>Request Number</td> 
                <td>ID Number</td>
                <td>Client's First Name</td>
                <td>Client's Middle Name</td> 
                <td>Client's Last Name</td>
                <td>Blood Type</td>
                <td>Blood RH</td>
                <td>Date</td>
                <td>Time</td>
                <td>Date Needed</td> 
                <td>Recipient Name</td> 
                <td>Status</td>
            </tr> 

        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=9718");
        $rno = (int)$_POST['requestno'];
        $query = "UPDATE Request set idno='$_POST[idno_update]', status='$_POST[status_update]',
        	 date='$_POST[date_update]', time='$_POST[time_update]', dateneeded='$_POST[dateneeded_update]', 
        	 recipientname='$_POST[recipientname_update]' where requestno='$rno'"; 
    
        $result = pg_query($db, $query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
        printf("Updated Successfully.");
        pg_close(); 

        $query = "SELECT * FROM REQUEST_VIEW"; 
        $clients = pg_query($db, $query);

        if(!$clients){
	      echo pg_last_error($db);
	      exit;
		} 
		   
		while($records = pg_fetch_assoc($clients)){
		      echo "<tr>";
		      echo "<td>" . $records['requestno'] . "</td>";
		      echo "<td>" . $records['idno'] . "</td>";
		      echo "<td>" . $records['fname'] . "</td>";
		      echo "<td>" . $records['mname'] . "</td>";
		      echo "<td>" . $records['lname'] . "</td>";
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
		   pg_close($db);
        ?> 
        </table>
    </body> 
</html>