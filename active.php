<?php
session_start();
include('test.php');
if (isset($_POST['Activate'])){
  $ResetQuery = "UPDATE accounts SET ACNTS_Status='Active' WHERE ACNTS_ID='$_POST[hidden]'";
  mysqli_query($con,$ResetQuery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Account Activated Successfully!')
        window.location.href='accounts.php'
        </SCRIPT>");
        include('test.php');
        $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Account activated FOR USER ID: $_POST[hidden]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
}

?>
