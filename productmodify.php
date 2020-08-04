<html>
<head>
<title>PRODUCT MODIFY</title>
<link rel="stylesheet" href="http://localhost/retail/CSS/style.css" type="text/css" media="screen" />
</head>
<body>
	<div class="bg-img" alt="me" style="width:100%;">
	 <div class="content" align="center"><h1>ONLINE MANAGEMENT SYSTEM</h1></div>
<div class="container">
<form method="post">
<?php

	$mpid="";
	if(isset($_POST['mpid']))
	{$mpid= $_POST['mpid'];}
	echo"<p align='center'><strong>Welcome to Product Modification!!</strong></p>";
	echo"
	<p align='center'><strong>Enter the ProductID:<input type='text' name='mpid' value='$mpid'>
	<input type='submit' name='ok' value='OK'><strong></p>
	";
?>




<?php
if(isset($_POST['ok']))
{

		if(!empty($_POST['mpid']) )
		{
			$mpid1 = $_POST['mpid'];

			//validation

			$mpname=$mcost=$mcategory=$mquantity="";

			$row_count=0;
			$host="localhost";
			$user="root";
			$password="";
			$database="mydb";
			$connect=mysqli_connect($host,$user,$password,$database);
			if($connect)
					{//echo "<p align='center'>Connected to the server...!!";
					}
			else
			die(mysqli_error($connect));

			$select = mysqli_select_db($connect,$database);
			if($select)
					{//echo "<p align='center'>Selected Database...!!";
					}
			else
			die(mysql_error($select));

			$query = "SELECT*
						FROM product
						WHERE p_id='$mpid'";

			$result = mysqli_query($connect,$query) or die(mysqli_error($result));

			while($rows = mysqli_fetch_assoc($result))
			{
				$row_count++;
				extract($rows);
				echo "	<form method='post'>
					<table align='center' border='4' cellpadding='10'>

					<tr><td><strong>Product ID:</strong></td><td> <input type='text' name='mpid2' value='$p_id' /></td></tr>

					<tr><td><strong>Name:7 </strong></td><td><input type='text' name='mpname' value='$p_name' /></td></tr>

					<tr><td><strong>Cost:</strong></td><td><input type='text' name='mcost' value='$p_cost'/></td> </tr>";


					echo"<tr><td><strong>category:</strong></td><td>
					<select name='mcategory'>
					   <option  value='nil'>Select</option>
 					<option value='Fruits&Vegetables'>Fruits&Vegetables</option>
  					<option value='grocery'>Grocery</option>
  					<option value='beverages'>Beverages</option>
  					<option value='snacks'>Snacks</option>
  					<option value='others'>Others</option>
					</select></td></tr>
					<tr><td><strong>Quantity:</strong></td><td><input type='text' name='mquantity' value='$p_quantity'/></td> </tr>

					";
					echo "<tr><td colspan='2' align='right'><input type='submit' name='msubmitvalue' value='submit' /></td></tr>

					</table>";
			echo "<p align='center'><input type='submit' name='mexit' value='Exit'></form>";

			}
			echo "</table>";

			//mysql_close($connect);
			if($row_count==0)
			{echo"<p align='center'><strong>Sorry!!! No Product with Product ID: '$mpid'</strong></p>";}



		}
		else
		{echo " <p align='center'>Please enter a Product ID";}


}



if(isset($_POST['msubmitvalue']))
{
		$mpid = $_POST['mpid'];
	if(!empty($_POST['mpid']) && !empty($_POST['mpname']) && !empty($_POST['mquantity']) && !empty($_POST['mcost']) && !empty($_POST['mcategory']))
			{
				$mpid2= $_POST['mpid'];
				$mpname= $_POST['mpname'];
				$mcost= $_POST['mcost'];
				$mcategory= $_POST['mcategory'];
				$mquantity= $_POST['mquantity'];


				if (!preg_match("/^[a-zA-Z ]*$/",$mpname))
				{echo "<p align='center'> Only letters and white space allowed in Name!!</p>";exit();}
				elseif (!preg_match("/^[0-9]*$/",$mquantity))
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
					{echo "<p align='center'>Connected to the server...!!";}
					else
					die(mysqli_error($connect));

					$select = mysqli_select_db($connect,$database);
					if($select)
					{echo "<p align='center'>Selected Database...!!";}
					else
					die(mysql_error());


					$update="UPDATE product
							 SET p_id='$mpid',
							 	 p_name ='$mpname' ,
								 p_cost ='$mcost' ,
								 p_category ='$mcategory' ,
								 p_quantity ='$mquantity'
							 WHERE p_id='$mpid' ";
					$result=mysqli_query($connect,$update) or die(mysqli_error($connect));
					if($result)
					echo " <p align='center'>Your data is modified into the database...!!";
					else
					die(mysqli_error($result));
					}
			}
			echo "<p align='center'><input type='submit' name='mexit' value='Exit'></form>";
}
if(isset($_POST['mexit']))
{
	$exit = header("location: retailproducts.php");
}

?>

</form>
</body>
</html>
