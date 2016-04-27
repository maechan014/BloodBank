<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=blooddb user=postgres password=qwerty123");  

$result = pg_query($db, "SELECT * FROM BLOOD where trackingnum = '$_POST[trackingnum]'");  
$row = pg_fetch_assoc($result);  
if (isset($_POST['submit'])){  
echo "<ul><form name='update_blood_record' action='update-blood-record.php' method='POST' > 

<li>ID Number:</li>
<li><input type="text" name="idnumber_updated" value='$row[IDNumber]' /></li>

<li>Tracking Number:</li>
<li><input type="text" name="trackingnum_updated" value='$row[trackingnum]' /></li>

<li>Blood Type:</li>
<li><input type="text" name="bloodtype_updated" value='$row[bloodtype]' /></li>

<li>Blood RH:</li>
<li><input type="text" name="bloodrh_updated" value='$row[bloodrh]' /></li>

<li>Date:</li>
<li><input type="date" name="date_updated" value='$row[date]' /></li>

<li>Time:</li>
<li><input type="time" name="time_updated" value='$row[time]' /></li>

<li>Amount:</li>
<li><input type="number" name="amount_updated" value='$row[amount]' /></li>

<li>Status:</li>
<li><input type="text" name="status_updated" value='$row[status]' /></li>

</form>  
</ul>";}  

if (isset($_POST['new'])){  
$result = pg_query($db, "UPDATE BLOOD SET IDNumber='$_POST[idnumber]',
					bloodtype='$_POST[bloodtype]',
					bloodrh='$_POST[bloodrh]',
					trackingnum='$_POST[trackingnum]',
					date='$_POST[date]',
					time='$_POST[time]',
					amount='$_POST[amount]',
					status='[status_updated]')

if (!$result){  
echo "Update failed!!";  
}  
else  
{  
echo "Update successful;";  
}

?>
