<!DOCTYPE html>
<html>
<head>
	<title>Add Request Form</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
</head>
<body>
	<h2>Fill up request form</h2>
	<form name="request" action="add_requestform2.php" method="POST">
		<input type="hidden" name="idnumber"
		value = "<?php echo htmlspecialchars($_GET['idnumber']); ?>" />

		<input type="hidden" name="fname"
		value = "<?php echo htmlspecialchars($_GET['fname']); ?>" />

		<input type="hidden" name="lname"
		value = "<?php echo htmlspecialchars($_GET['lname']); ?>" />

		<input type="hidden" name="bloodtype"
		value = "<?php echo htmlspecialchars($_GET['bloodtype']); ?>" />

		<input type="hidden" name="bloodrh"
		value = "<?php echo htmlspecialchars($_GET['bloodrh']); ?>" />

		Status:<input type="text" name="status"><br>
		Request Number:<input type="text" name="requestno"><br>
		Illness: <input type="text" name="illness"><br>
		Date Requested: <input type="date" name="date"><br>
		Time Requested: <input type="time" name="time"><br>
		Date Needed: <input type="date" name="date_needed"><br>
		Amount Needed: <input type="text" name="amount"><br>
		Tracking Number: <input type="text" name="trackingnumber"><br>
		<input type="submit">


	</form>
</body>
</html>