<!DOCTYPE html>
<html>
<head>
	<title>user register</title>
</head>
<body>
	<form action="./register.php" method="POST">
		username: <input type="text" name="username" />
		passwd: <input type="password" name="passwd" />
		<button type="submit" name="submit" value="submit">sign up</button>
		<a href="./login.php">go to login</a>
	</form>
</body>
</html>

<?php
	function alert($msg) {
		echo "<script type='text/javascript'>alert('$msg')</script>";
		exit;
	}

	$post = $_POST["submit"] ?? "";
	if ( !empty($post) ) {
		$username = $_POST["username"] ?? "";
		$passwd = $_POST["passwd"] ?? "";
		if ( empty($username) ) {
			alert("please enter username");
		}
		if ( empty($passwd) ) {
			alert("please enter passwd");
		}
		$passwd = md5($passwd);
		$con = mysqli_connect("localhost","root","","soft806assingment1"); 
		if (mysqli_connect_errno($con)) { 
		    alert(" connect db error");
		} 
	 	$sql = "SELECT * FROM users where `username` = '$username';";
	 	$ret = mysqli_query($con, $sql);
		$res = mysqli_fetch_assoc($ret);
		if ( !empty($res) ) {
			alert("user name has been taken! please try others");
		}
		$sql = "Insert into users (`username`, `passwd`) values ('$username', '$passwd')";
		$ret = mysqli_query($con, $sql);
		$row = mysqli_affected_rows($con); 
		if ( $row == 0 ) {
			alert("register failed");
		} else {
			alert("register success!");
			header("Location: ./login.php");
		}
	}