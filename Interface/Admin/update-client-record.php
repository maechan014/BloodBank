<html> 
    <body> 
        <table border="2" cellspacing="3" cellpadding="4"> 
            <tr> 
                <td> 
                    Client ID
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
            </tr> 

        <?php  
        $db = pg_connect("host=localhost port=5432 dbname=bloodbank user=postgres password=admin");
        $id = (int)$_POST['idno'];
        $query = "UPDATE CLIENT set fname='$_POST[fname_update]', mname='$_POST[mname_update]', lname='$_POST[lname_update]',
                phone='$_POST[phone_update]' where idno='$id'"; 
    
        $result = pg_query($db, $query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
        printf("Updated Successfully.");
        pg_close(); 

        $query = "SELECT * FROM Client"; 
        $res = pg_query($db, $query);

        while($myrow = pg_fetch_assoc($res)) { 
            printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", 
            $myrow['idno'], 
            htmlspecialchars($myrow['fname']),
            htmlspecialchars($myrow['mname']), 
            htmlspecialchars($myrow['lname']))
            ; 
        } 
        ?> 
        </table>
    </body> 
</html>