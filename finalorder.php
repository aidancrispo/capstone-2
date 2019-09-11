
<html>
<title></title>
<body>
<?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
$ID=$_SESSION['id'];
    
if (isset($_POST['final'])){
    
	$sql = "INSERT into finalorders (PROD_Name,ACNTS_ID,Quantity,TotalPrice) SELECT GROUP_CONCAT(products.PROD_Name SEPARATOR ' <br><br> '), orderdetails.ACNTS_ID,CAST(GROUP_CONCAT(orderdetails.Quantity SEPARATOR ' <br><br> ') as char),'$_POST[hiddentotal]'\n"
    . "FROM orderdetails LEFT OUTER JOIN\n"
    . " products ON orderdetails.PROD_ID = products.PROD_ID LEFT OUTER JOIN\n"
    . " accounts ON orderdetails.ACNTS_ID = accounts.ACNTS_ID\n"
    . " WHERE orderdetails.ACNTS_ID = '$ID' GROUP BY orderdetails.ACNTS_ID";
			mysqli_query($con,$sql);

			$delete = "DELETE FROM orderdetails\n"
     . "WHERE orderdetails.ACNTS_ID IN \n"
     . " ( SELECT finalorders.ACNTS_ID\n"
     . " FROM finalorders\n"
     . " WHERE finalorders.ACNTS_ID='$ID')";
			mysqli_query($con,$delete);
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Order Finalized!')
				window.location.href='checkout.php'
				</SCRIPT>");
		}
		?>
      
      

    

      
      
