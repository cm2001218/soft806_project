<!DOCTYPE html>

<html>

<head>
	<title>user login</title>
</head>
<body>
	<form action="./login.php" method="POST">
		username: <input type="text" name="username" />
		<br />
		passwd: <input type="password" name="passwd" />
		<br />
		<input type="hidden" name="issubmit" />
		<button type="submit" name="submit" value="submit">login</button>
		<a href="./register.php"'>register</a>
	</form>
	
</body>
</html>
<?php
	session_start();
	function alert($msg, $exit = true) {
		echo "<script type='text/javascript'>alert('$msg')</script>";
		if ( $exit ) {
			exit;
		}
	}


	$post = $_POST["submit"] ?? "";
	$username = $_POST["username"] ?? "";
	$passwd = $_POST["passwd"] ?? "";
	if ( strlen($post) > 0 ) {
		if ( empty($username) ) {
			alert("please enter username");
		}
		if ( empty($passwd) ) {
			alert("please enter passwd");
		}
		$passwd = md5($passwd);
		$con=mysqli_connect("localhost","root","","soft806assingment1"); 
		if (mysqli_connect_errno($con)) 
		{ 
		    alert(" connect db error");
		} 
	 
		$sql = "select * from users where `username` = '$username' and `passwd` = '$passwd' limit 1";
		$ret = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($ret);
		if ( empty($row) ) {
			alert("invalid login");
		} else {
			alert("login success!", false);
			$_SESSION['username'] = $username;
			$_SESSION['passwd'] = $passwd;
			header("Location: ./userform.php");
		}
	}
?>
