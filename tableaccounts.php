<html>
<title></title>
<body>

<?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
if (isset($_POST['Add'])){
  $Username=mysqli_escape_string($con,$_POST['Username']);
  $Password=mysqli_escape_string($con,$_POST['Password']);
  $AddQuery = "INSERT  INTO accounts (ACNTS_UName,ACNTS_Password,ACNTS_Role) VALUES ('$Username','$Password','$_POST[Role]')";
  mysqli_query($con,$AddQuery);
  mysqli_close($con);
  if ($_POST['Role'] == 'Customer'){
  include('test.php');
  $InsertQuery = "INSERT INTO customer (ACNTS_ID) SELECT ACNTS_ID FROM accounts WHERE ACNTS_UName = '$Username'";
  mysqli_query($con,$InsertQuery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Added Successfully!')
        window.location.href='accounts.php'
        </SCRIPT>");
    }
  if ($_POST['Role'] == 'Admin' || $_POST['Role'] == 'Employee'){
    include('test.php');
    $InsertQuery = "INSERT INTO employee(ACNTS_ID,EMP_Name) SELECT ACNTS_ID,'$_POST[name]' FROM accounts WHERE ACNTS_UName = '$Username'";
    mysqli_query($con,$InsertQuery);
    mysqli_close($con);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Added Successfully!')
      window.location.href='accounts.php'
      </SCRIPT>");
  }
  include('test.php');
  $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('INSERTED NEW ACCOUNT USER: $Username','$_SESSION[id]')";
  mysqli_query($con,$sql);
  mysqli_close($con);
}

if (isset($_POST['ConfirmDelete'])){
  $con=mysqli_connect("localhost","root","","orderingsystem");
  require ('test.php');
  $sql = "SELECT ACNTS_Password from accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $mydat = mysqli_query($con,$sql);
  while ($pass = mysqli_fetch_array($mydat)){
  if ($_POST['current'] == $pass[0]) {
  $sql = "SELECT ACNTS_ID,ACNTS_Role FROM accounts WHERE ACNTS_ID = '$_POST[hidden]'";
  $myData = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($myData)){
    if ($row[1] == 'Customer'){
      $DeleteQuery = "UPDATE accounts SET ACNTS_Status='Inactive' ,Date_Inactive=now() WHERE ACNTS_ID='$_POST[hidden]'";
      mysqli_query($con,$DeleteQuery);
      $UpdateQuery = "UPDATE customer SET CUST_Status='Inactive' WHERE ACNTS_ID='$_POST[hidden]'";
      mysqli_query($con,$UpdateQuery);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Deleted Successfully!')
        window.location.href='accounts.php'
        </SCRIPT>");
    }
    if ($row[1] == 'Admin'){
      $DeleteQuery = "UPDATE accounts SET ACNTS_Status='Inactive',Date_Inactive=now() WHERE ACNTS_ID='$_POST[hidden]'";
      mysqli_query($con,$DeleteQuery);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Deleted Successfully!')
        window.location.href='accounts.php'
        </SCRIPT>");
    }
    if ($row[1] == 'Employee'){
      $DeleteQuery = "UPDATE accounts SET ACNTS_Status='Inactive',Date_Inactive=now() WHERE ACNTS_ID='$_POST[hidden]'";
      mysqli_query($con,$DeleteQuery);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Deleted Successfully!')
        window.location.href='accounts.php'
        </SCRIPT>");
    }
  }
  include('test.php');
  $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('ACCOUNT DE-ACTIVATED USER ID: $_POST[hidden]','$_SESSION[id]')";
  mysqli_query($con,$sql);
  mysqli_close($con);
  }
  else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password Do not Match!')
      window.location.href='accounts.php'
      </SCRIPT>");
  }
}
}

if (isset($_POST['ConfirmReset'])){
  $sql = "SELECT ACNTS_Password from accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $myData = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($myData)){
  if ($_POST['current'] == $row[0]) {
  $ResetQuery = "UPDATE accounts SET ACNTS_Password='12345' WHERE ACNTS_ID='$_POST[hidden]'";
  mysqli_query($con,$ResetQuery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Password Reset Successfully!')
        window.location.href='accounts.php'
        </SCRIPT>");
        include('test.php');
        $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('PASSWORD RESSETED FOR USER ID: $_POST[hidden]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
      }
  else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password Do not Match!')
      window.location.href='accounts.php'
      </SCRIPT>");
  }
}
}
?>
</body>
</html>
