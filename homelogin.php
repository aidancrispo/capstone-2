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
					window.alert('Wrong username password combination. Please re-enter!')
					window.location.href='home.php'
					</SCRIPT>");
          $_SESSION['logged_in'] = true;
		}
		elseif( $Role == 'Employee' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!.')
				window.location.href='employee.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '1' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully! First Time Login Please Edit your profile first.')
				window.location.href='editprofile.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '0' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!')
				window.location.href='products.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif($Status == 'Inactive'){
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Account Inactive!')
				window.location.href='home.php'
				</SCRIPT>");
    }
		else{
		echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Wrong username password combination. Please re-enter.')
				window.location.href='home.php#loginbtn'
				</SCRIPT>");
		}
}
echo  ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong username password combination. Please re-enter.')
    window.location.href='home.php#loginbtn'
    </SCRIPT>");
}
if (isset($_POST['LoginProductsGUEST'])){
$Username=mysqli_escape_string($con,$_POST['Username']);
$Password=mysqli_escape_string($con,$_POST['Password']);

if (!$_POST['Username'] | !$_POST['Password'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields.')
        window.location.href='aboutMoreGUEST.php'
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
					window.alert('Wrong username password combination. Please re-enter!')
					window.location.href='productsGUEST.php'
					</SCRIPT>");
          $_SESSION['logged_in'] = true;
		}
		elseif( $Role == 'Employee' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!.')
				window.location.href='employee.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '1' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully! First Time Login Please Edit your profile first.')
				window.location.href='editprofile.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '0' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!')
				window.location.href='products.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif($Status == 'Inactive'){
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Account Inactive!')
				window.location.href='productsGUEST.php'
				</SCRIPT>");
    }
		else{
		echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Wrong username password combination. Please re-enter.')
				window.location.href='productsGUEST.php'
				</SCRIPT>");
		}
}
echo  ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong username password combination. Please re-enter.')
    window.location.href='productsGUEST.php'
    </SCRIPT>");
}
if (isset($_POST['LoginAboutMoreGuest'])){
$Username=mysqli_escape_string($con,$_POST['Username']);
$Password=mysqli_escape_string($con,$_POST['Password']);

if (!$_POST['Username'] | !$_POST['Password'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields.')
        window.location.href='aboutMoreGUEST.php'
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
					window.alert('Wrong username password combination. Please re-enter!')
					window.location.href='aboutMoreGUEST.php'
					</SCRIPT>");
          $_SESSION['logged_in'] = true;
		}
		elseif( $Role == 'Employee' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!.')
				window.location.href='employee.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '1' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully! First Time Login Please Edit your profile first.')
				window.location.href='editprofile.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '0' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!')
				window.location.href='products.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif($Status == 'Inactive'){
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Account Inactive!')
				window.location.href='aboutMoreGUEST.php'
				</SCRIPT>");
    }
		else{
		echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Wrong username password combination. Please re-enter.')
				window.location.href='aboutMoreGUEST.php'
				</SCRIPT>");
		}
}
echo  ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong username password combination. Please re-enter.')
    window.location.href='aboutMoreGUEST.php'
    </SCRIPT>");
}
if (isset($_POST['LoginTandCGuest'])){
$Username=mysqli_escape_string($con,$_POST['Username']);
$Password=mysqli_escape_string($con,$_POST['Password']);

if (!$_POST['Username'] | !$_POST['Password'])
 {
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You did not complete all of the required fields.')
        window.location.href='aboutMoreGUEST.php'
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
					window.alert('Wrong username password combination. Please re-enter!')
					window.location.href='termsandconditionsGUEST.php'
					</SCRIPT>");
          $_SESSION['logged_in'] = true;
		}
		elseif( $Role == 'Employee' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!.')
				window.location.href='employee.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '1' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully! First Time Login Please Edit your profile first.')
				window.location.href='editprofile.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif( $Role == 'Customer' && $record['ACNTS_LoginFirst'] == '0' && $Status == 'Active')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login Succesfully!')
				window.location.href='products.php'
				</SCRIPT>");
        $_SESSION['logged_in'] = true;
		}
    elseif($Status == 'Inactive'){
      echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Account Inactive!')
				window.location.href='termsandconditionsGUEST.php'
				</SCRIPT>");
    }
		else{
		echo  ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Wrong username password combination. Please re-enter.')
				window.location.href='termsandconditionsGUEST.php'
				</SCRIPT>");
		}
}
echo  ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Wrong username password combination. Please re-enter.')
    window.location.href='termsandconditionsGUEST.php'
    </SCRIPT>");
}
if (isset($_POST['Checkpassword'])){
  include('test.php');
  $sql = ("SELECT ACNTS_UName, ACNTS_ID FROM accounts WHERE ACNTS_UName = '$_POST[username]'");
  $data = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($data)){
    if ($row[0] == $_POST['username'] && $row[1] == $_POST['id']){
      $token = bin2hex(openssl_random_pseudo_bytes(4));
      $ResetQuery = "UPDATE accounts SET ACNTS_Password='$token' WHERE ACNTS_ID='$_POST[id]'";
      mysqli_query($con,$ResetQuery);
      mysqli_close($con);
      $_SESSION['password']= $token;
          echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Password Reset Successfully!')
            window.location.href='password.php'
            </SCRIPT>");
    }
    else {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Username and ID do not match!')
        window.location.href='modalforgot.php'
        </SCRIPT>");
    }
  }
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Username and ID do not match!')
    window.location.href='modalforgot.php'
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
