<html>
<head>
	<link rel="stylesheet" href="http://localhost/retail/CSS/style.css" type="text/css" media="screen" />
<title>ADVANCED ONLINE RETAIL SYSTEM</title>
</head>
<body>
		 	<div class="bg-img" alt="me" style="width:100%;">
  			<div class="content" align="center"><h1>ONLINE MANAGEMENT SYSTEM</h1></div>
				<form  method="post" class="container" >
						<input class="btn" align="center" name="admin" value="Admin" style="width: 200px; height: 60px" onclick="login()">
						<p><a href="http://localhost/retail/retaillogin.php"><input class="btn" value="LOGIN" style="width: 200px; height: 60px" /></a></p>
						<p><a href="http://localhost/retail/retailsignup.php"><input class="btn" value="SIGN UP" style="width: 200px; height: 60px" /></a></p>
					  <!--<h2 style="text-align:center;"><a href="retaillogin.php" >Login</a></h2>
						<h2 style="text-align:center;"><a href="retailsignup.php">Sign up</a></h2>-->
				</form>
			</div>
</body>
</html>


<script type="text/javascript">
function login()
{
var username=prompt("Enter usename");
var password=prompt("Enter password");
if(username=="admin" && password=="admin123")
window.location="http://localhost/retail/retailproducts.php";
else
alert("Invalid username password");
}
</script>
