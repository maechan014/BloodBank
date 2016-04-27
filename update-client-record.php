<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");  
$result = pg_query($db, "SELECT * FROM client where IDNumber = $_POST['idnumber']");  
$row = pg_fetch_assoc($result);  
if (isset($_POST['submit'])){  
echo "<ul><form name='update' action='update-client-record.php' method='POST' > 

<li>ID Number:</li>
<li><input type="text" name="idnumber_updated" value=$row['IDNumber'] /></li>

<li>First Name:</li><li>
<input type="text" name="fname_updated" value=$_row['fname'] /></li>

<li>Middle Name:</li><li>
<input type="text" name="mname_updated" value=$_row['mname'] /></li>  

<li>Last Name:</li><li>
<input type="text" name="lname_updated" value=$_row['lname'] /></li> 

<li>Birthday:</li><li>
<input type="date" name="birthday_updated" value=$row['bdate'] /></li>

<li>Phone:</li><li>
<input type="text" name="phone_updated" value=$row['phone'] /></li>

<li>Ethnicity:</li>
<li><input type="text" name="ethnicity_updated" value=$row['ethnicity']/></li>

<li>Height:</li>
<li><input type="number" name="height_updated" value=$row['height']/></li>

<li>Weight:</li>
<li><input type="number" name="weight_updated" value=$row['weight']/></li>

<li>Blood Type:</li>
<li><input type="text" name="bloodtype_updated" value=$row['bloodtype']/></li>

<li>Blood RH:</li>
<li><input type="text" name="bloodrh_updated" value=$row['bloodrh']/></li>

<li>Address:</li>
<li>Street:</li><li>
<input type="text" name="street_updated" value=$row['street']/></li>
<li>Barangay:</li><li>
<input type="text" name="brgy_updated" value=$row['brgy']/></li>
<li>City/Municipality:</li>
<li><input type="text" name="citymun_updated" value=$row['citymun']/></li>
<li>Province:</li>
<li><input type="text" name="province_updated" value=$row['province']/></li>
<li>ZIP Code:</li>
<li><input type="number" name="zip_updated" value=$row['zip']/></li>
<li>Type:</li>
<li><input type="boolean" name="type_updated" value=$row['type'] /></li>

<li><input type='submit' name='new' /></li>  
</form>  
</ul>";}  

if (isset($_POST['new'])){  
$result = pg_query($db, "UPDATE CLIENT SET IDNumber='$_POST[idnumber_updated]', FName='$_POST[fname_updated]', MName='$_POST[mname_updated]', LName='$_POST[lname_updated]', Bdate='$_POST[bdate_updated]', Phone='$_POST[phone_updated]', 
				Ethnicity='$_POST[ethnicity_updated]', Height='$_POST[height_updated]', Weight='$_POST[weight_updated]', Bloodtype='$_POST[bloodtype_updated]', 
				BloodRH='$_POST[bloodrh_updated]', Street='$_POST[street_updated]', Brgy='$_POST[brgy_updated]', CityMun='$_POST[citymun_updated]', Province='$_POST[province_updated]', 
				Zip='$_POST[zip_updated]', isDonor='$_POST[type_updated]'")

if (!$result){  
echo "Update failed!!";  
}  
else  
{  
echo "Update successful;";  
}

?>
