<html> 
    <body> 
        <br><br>
        <h1>List of Donors and Their Illnesses</h1>
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                 <th>ID Number</th>
                 <th>First Name</th>
                 <th>Middle Name</th>
                 <th>Last Name</th>
                 <th>Illness</th>
            </tr> 

        <?php 
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=admin'); 
        $id = (int)$_POST['idno']; 
        $illness = (String)$_POST['illness'];
        $query = "DELETE FROM donor_illness where idno='$id' AND illness='$illness'"; 
        $result = pg_query($db, $query); 
        if (!$result) { 
            printf ("ERROR"); 
            $errormessage = pg_errormessage($db); 
            echo $errormessage; 
            exit(); 
        }

        $query = "SELECT * FROM DONORILLNESS_VIEW"; 

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
          echo "<td>" . $records['illness'] . "</td>";
          echo "</tr>";
          echo "<br>";
        } 
        ?> 
        </table> 
    </body> 
</html>