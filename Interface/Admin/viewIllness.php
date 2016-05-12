<html> 
    <body> 
        <br><br>
        <h1>List of Donors and Their Illnesses</h1>
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                 <th>ID Number</th>
                 <th>Donor First Name</th>
                 <th>Donor Middle Name</th>
                 <th>Donor Last Name</th>
                 <th>Illness</th>
            </tr>

        <?php 
        $db = pg_connect('host=localhost dbname=bloodbank user=postgres password=admin'); 

        $query = "SELECT * FROM DonorIllness_View"; 

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