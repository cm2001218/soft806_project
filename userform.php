<!DOCTYPE html>
<html>
<head>
	<title>user login</title>
</head>
<body>
	<?php
		session_start();
		$username = $_SESSION["username"] ?? "";
		if ( !empty($username) ) {
	?>
		<h1 >hello <?php echo $username . ", WELCOME!"?> </h1>
	<?php
		} else {
	?>	
		<h1> you are not login</h1>
		<h1> please <a href="./login.php"> log in </a> or <a href="./register.php">register</a> </h1>	
	<?php
		}
	?>
</body>
</html>