<?php 
	$db = pg_connect("host=localhost port=5432 dbname=bloodbank user=requester password=requester");

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = <<<EOF
      SELECT * FROM users where username = '$username' and password = '$password' and usertype = 'a';
EOF;
//	$query = "SELECT * FROM users where username = '$username' and password = '$password'"; 
	$res = pg_query($db, $sql);

	if(!$res){
		echo pg_last_error($db);
   	}

   	$rows = pg_num_rows($res);
	if (pg_num_rows($res)>0){
		//the user is an admin
		header("Location: admin-homepage.html");
		exit();
	}else{
		//not an admin
		header("Location: admin-login-error.html");
		exit();
	}
?>