<html>
<title></title>

<body>
    <?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
$ID=$_SESSION['id'];
if (isset($_POST['Add'])){
	$sql= ("SELECT PROD_InStock FROM `products` WHERE PROD_ID='$_POST[PROD_ID]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ( $Status == '0')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('No stock available')
					window.location.href='products.php'
					</SCRIPT>");
		}
		$qty = $_POST['product_qty'];
		if (($Status >= $qty) && ($qty > 0)) {
$AddQuery = "INSERT  INTO orderdetails (PROD_ID,ACNTS_ID,Quantity) VALUES ('$_POST[PROD_ID]','$ID','$qty')";
			
			mysqli_query($con,$AddQuery);
		 $UpdateQuery = "UPDATE products SET PROD_InStock=PROD_InStock - '$qty' WHERE PROD_ID='$_POST[PROD_ID]'";
			mysqli_query($con,$UpdateQuery);
			echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Order Added')
				window.location.href='checkout.php'
				</SCRIPT>");
		}
		if ($qty == ''){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Please add quantity!')
				window.location.href='products.php'
				</SCRIPT>");
		}
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Quantity is more than the Stock. Please Change!')
				window.location.href='products.php'
				</SCRIPT>");
		}
	}
}
if (isset($_POST['AddFromViewItem'])){
	$sql= ("SELECT PROD_InStock FROM `products` WHERE PROD_ID='$_POST[PROD_ID]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ( $Status == '0')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('No stock available')
					window.location.href='products.php'
					</SCRIPT>");
		}
		$qty = $_POST['product_qty'];
		if (($Status >= $qty) && ($qty > 0)) {
		 $AddQuery = "INSERT  INTO orderdetails (PROD_ID,ACNTS_ID,Quantity) VALUES ('$_POST[PROD_ID]','$ID','$qty')";
			mysqli_query($con,$AddQuery);
		 $UpdateQuery = "UPDATE products SET PROD_InStock=PROD_InStock - '$qty' WHERE PROD_ID='$_POST[PROD_ID]'";
			mysqli_query($con,$UpdateQuery);
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Order Added!')
				window.location.href='checkout.php'
				</SCRIPT>");
		}
		if ($qty == ''){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Please add quantity!')
				window.location.href='products.php'
				</SCRIPT>");
		}
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Quantity is more than the Stock. Please Change!')
				window.location.href='products.php'
				</SCRIPT>");
		}
	}
}
if (isset($_POST['ConfirmQty'])){
	$sql= ("SELECT PROD_InStock FROM `products` WHERE PROD_Name='$_POST[hiddenname]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ( $Status == '0')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('No stock available')
					window.location.href='orderdb.php'
					</SCRIPT>");
		}
		$qty = $_POST['qty'];
		if (($Status >= $qty) && ($qty > 0)) {
		 $UpdateQuery = "UPDATE products SET PROD_InStock=PROD_InStock - '$qty' WHERE PROD_Name='$_POST[hiddenname]'";
			mysqli_query($con,$UpdateQuery);
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Qty Confirmed!')
				window.location.href='orderdb.php'
				</SCRIPT>");
		}
		if ($qty == ''){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Please add quantity!')
				window.location.href='orderdb.php'
				</SCRIPT>");
		}
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Quantity is more than the Stock. Please Change!')
				window.location.href='orderdb.php'
				</SCRIPT>");
		}
	}
}