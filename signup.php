<?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');

if (isset($_POST['signup'])){
//	$encryptPass = md5 ($Password);
  $user_type = "Customer";
  $accountID = "1130";
  $Username=mysqli_escape_string($con,$_POST['username']);
  $Password=mysqli_escape_string($con,$_POST['password']);
   
 // $Name=mysqli_escape_string($con,$_POST['name']);
  
 
  
  $AddQuery = "INSERT  INTO accounts (ACNTS_UName,ACNTS_Password,ACNTS_Role) VALUES ('$Username','$Password','$user_type')";
  mysqli_query($con,$AddQuery);
  mysqli_close($con);
if ($user_type == 'Customer'){
  include('test.php');
  $InsertQuery = "INSERT INTO customer (ACNTS_ID) SELECT ACNTS_ID FROM accounts WHERE ACNTS_UName = '$Username'";
  mysqli_query($con,$InsertQuery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Registered Successfully!')
        window.location.href='home.php'
        </SCRIPT>");
    }
  $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('INSERTED NEW ACCOUNT USER: $Username','$accountID')";
  mysqli_query($con,$sql);
  mysqli_close($con);
    }

?>