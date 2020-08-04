<html>
<head>
<link rel="stylesheet" href="http://localhost/retail/CSS/style.css" type="text/css" media="screen" />
<title>ONLINE RETAIL MANAGEMENT SYSTEM</title>
</head>
<body>
	<div class="bg-img" alt="me" style="width:100%;">
	 <div class="content" align="center"><h1>ONLINE MANAGEMENT SYSTEM</h1>
	 <h2>ADD PRODUCT</h2></div>
</table>
<br>



<form method='post' id="productform">
<?php

	$pid=$pname=$cost=$category=$quantity="";
	if(isset($_POST['pid']))
	{$pid= $_POST['pid'];}
	if(isset($_POST['pname']))
	{$pname= $_POST['pname'];}
	if(isset($_POST['cost']))
	{$cost= $_POST['cost'];}
	if(isset($_POST['category']))
	{$category= $_POST['category'];}
	if(isset($_POST['pquantity']))
	{$quantity= $_POST['quantity'];}




echo "
<div class='container'>
<table align='center' border='4' cellpadding='10'>


<tr><td><strong>Product ID: </strong></td><td><input type='text' name='pid' value='$pid' /></td></tr>
<tr><td><strong>Product Name: </strong></td><td><input type='text' name='pname' value='$pname' /></td></tr>

<tr><td><strong>Cost:</strong></td><td><input type='text' name='cost' value='$cost'/></td> </tr>

<tr><td><strong>Categorty:</strong></td><td>
<select name='category'>
	<option  value='nil'>Select</option>
  <option value='Fruits&Vegetables'>Fruits&Vegetables</option>
  <option value='grocery'>Grocery</option>
  <option value='beverages'>Beverages</option>
  <option value='snacks'>Snacks</option>
  <option value='others'>Others</option>

</select></td></tr>
<tr><td><strong>Quantity:</strong></td><td><input type='text' name='quantity' value='$quantity'/></td> </tr>
<tr><td colspan='2' align='right'><input type='submit' name='submitvalue' value='submit' /></td></tr>

</table>
<p align='center'><input type='submit' name='Exit' value='Exit'>
</div>";
?>
</form>



<?php

if(isset($_POST['Exit']))
{
	$exit = header("location: retailproducts.php");
}

if(isset($_POST['submitvalue']))
{
		if(!empty($_POST['pid'])&&!empty($_POST['quantity']) && !empty($_POST['pname']) && !empty($_POST['cost']) && !empty($_POST['category']))
			{
				$pid=$_POST['pid'];
				$pname= $_POST['pname'];
				$cost= $_POST['cost'];
				$category= $_POST['category'];
				$quantity= $_POST['quantity'];

				if (!preg_match("/^[a-zA-Z ]*$/",$pname))
				{echo "<p align='center'> Only letters and white space allowed in Name!!</p>";exit();}
				if (!preg_match("/^[0-9]*$/",$quantity))
				{echo "<p align='center'> Only Numbers allowed in Quantity!!</p>";exit();}
				else
				{
					//DATABASE CONNECT AFTER VALIDIATION.....
					$flag=0;
					$host="localhost";
					$user="root";
					$password="";
					$database="mydb";

					$connect=mysqli_connect($host,$user,$password,$database);
					if($connect)
					{echo "Connected to the server...!!";}
					else
					die(mysqli_error());

					if (mysqli_connect_errno())
  					{
  						echo "Failed to connect to MySQL: " . mysqli_connect_error();
  					}

					$select = mysqli_select_db($connect,$database);
					if($select)
					{echo "Selected Database...!!";}
					else
					die(mysqli_error($select));



		$data = "INSERT INTO product VALUES ('$pid','$pname', '$cost', '$category','$quantity' )";
		$result = mysqli_query($connect,$data);
		if($result)
		echo " Your data is entered into the database...!!";
		else
		{
		  echo "Enter a unique Product ID";
			exit();
			die(mysqli_error($connect));
		}

		}
		$new = header("location: productadd.php");


}
else
{
	echo "<p align='center'>Please enter all fields!!</p>";
}
}
error_reporting(E_ALL ^ E_DEPRECATED);
?>

</body>
</html>
