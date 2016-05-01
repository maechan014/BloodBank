<!DOCTYPE html>  
<head> 
<title>Add Blood Donation</title>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<style>  
li {listt-style: none;}  
</style>  
</head>  
<body> 	
<h2>Enter Donation Information</h2>

<ul>
<form name="insert" action="add_donation.php" method="POST" >

<input type="hidden" name="idnumber"
 value= "<?php echo htmlspecialchars($_GET['id']); ?>" />

 <input type="hidden" name="bloodtype"
 value= "<?php echo htmlspecialchars($_GET['btype']); ?>" />

 <input type="hidden" name="bloodrh"
 value= "<?php echo htmlspecialchars($_GET['brh']); ?>" />

<li>Tracking Number:</li><li><input type="number" name="trackingnum" /></li>  
<li>Date of donation:</li><li><input type="date" name="date" /></li>
<li>Time of Donation:</li><li><input type="time" name="time" /></li>  
<li>Amount (in cc):</li><li><input type="number" step="1"  name="amount" /></li>  

<li><input type="submit" /></li>
</form>  
</ul>  
</body>  
</html>