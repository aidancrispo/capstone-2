<html>
<title></title>
<?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
if (isset($_POST['Submit'])){
$Username=mysqli_escape_string($con,$_POST['Username']);
$Password=mysqli_escape_string($con,$_POST['Password']);

if (!$_POST['Username'] | !$_POST['Password'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields.')
        window.location.href='home.php#loginbtn'
        </SCRIPT>");
     }
$sql= ("SELECT * FROM `accounts` WHERE `ACNTS_UName` = '$Username' AND `ACNTS_Password` = '$Password' ");
$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$_SESSION['id'] = $record[0];
  $_SESSION['username'] = $record[1];
	$Role= $record['ACNTS_Role'];
	$Username = $record['ACNTS_UName'];
	$Password = $record['ACNTS_Password'];
  $Status = $record['ACNTS_Status'];
		if ( $Role == 'Admin' && $Status =='Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
    	 window.alert('Login Succesfully!.')
    	 window.location.href='admin.php'
    	 </SCRIPT>");
       $_SESSION['logged_in'] = true;
		}
		elseif( $Role == 'Employee' && $Status == 'Active')
		{
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('You cannot use an Employee Account in this Login Portal!')
					window.location.href='4DMINP0RTAL.php'
					</SCRIPT>");
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '1' && $Status == 'Active')
		{
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('You cannot use a Customer Account in this Login Portal!')
					window.location.href='4DMINP0RTAL.php'
					</SCRIPT>");
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '0' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('You cannot use a Customer Account in this Login Portal!')
				window.location.href='4DMINP0RTAL.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif($Status == 'Inactive'){
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Account Inactive!')
				window.location.href='4DMINP0RTAL.php'
				</SCRIPT>");
    }
		else{
		echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Wrong username password combination. Please re-enter.')
				window.location.href='4DMINP0RTAL.php#loginbtn'
				</SCRIPT>");
		}
}
echo  ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong username password combination. Please re-enter.')
    window.location.href='4DMINP0RTAL.php#loginbtn'
    </SCRIPT>");
}
else{
echo  ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong username password combination. Please re-enter.')
    window.location.href='home.php#loginbtn'
    </SCRIPT>");
}
?>

</body>
</html>
