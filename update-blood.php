<html> 
    <body> 
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td>Tracking No</td>
                <td>ID No</td>
                <td>First Name</td>
                <td>Middle Name</td> 
                <td>Last Name</td>
                <td>Blood Type</td>
                <td>Blood RH</td>
                <td>Amount</td>
                <td>Date</td>
                <td>Time</td>
                <td>Status</td>
            </tr> 

        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
        $tno = (int)$_POST['trackingno'];

        $query = "UPDATE BLOOD SET
                  amount='$_POST[amount_update]',
                  time='$_POST[time_update]',
                  date='$_POST[date_update]' where trackingno=$tno";

        $result = pg_query($db, $query);
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
        printf("Updated Successfully.");
        pg_close();         

        $query = "SELECT * FROM BLOODTYPE_VIEW"; 
        $clients = pg_query($db, $query);

        if(!$clients){
	      echo pg_last_error($db);
	      exit;
		} 
		   
		while($records = pg_fetch_assoc($clients)){
		      echo "<tr>";
		      echo "<td>" . $records['trackingno'] . "</td>";
          echo "<td>" . $records['idno'] . "</td>";
		      echo "<td>" . $records['fname'] . "</td>";
		      echo "<td>" . $records['mname'] . "</td>";
		      echo "<td>" . $records['lname'] . "</td>";
          echo "<td>" . $records['bloodtype'] . "</td>";
          echo "<td>" . $records['bloodrh'] . "</td>";
          echo "<td>" . $records['amount'] . "</td>";
          echo "<td>" . $records['date'] . "</td>";
          echo "<td>" . $records['time'] . "</td>";
          echo "<td>" . $records['withdrawalstatus'] . "</td>";
		      echo "</tr>";
		      echo "<br>";
		}
		   pg_close($db);
        ?> 
        </table>
    </body> 
</html>