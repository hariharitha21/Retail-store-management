<?php
session_start();
?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="http://localhost/retail/CSS/style.css" type="text/css" media="screen" />
<title>ADVANCED ONLINE RETAIL SYSTEM</title>
</head>
<body>
		<div class="bg-img" alt="me" style="width:100%;">
			<div class="content" align="center"><h1>ONLINE MANAGEMENT SYSTEM</h1>
<form method='post'>
<?php

	$username=$email="";
	if(isset($_SESSION["username"]) && isset($_SESSION["email"]))
	{
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
	}
if(isset($_POST['logout']))
{
	session_destroy();
	header("location: http://localhost/retail/retailindex.php");
	exit();
}
echo "<div align='left'><input type='submit' name='logout' value='Logout'></div>"
	."<div align='right'>Welcome ".$username." <br>". $email."</div></div>";



?>
</form>
	<div class="container">
	<h2 align="center">Connecting to Online Transaction Portal . . .</h2>
