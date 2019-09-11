<?php
session_start();
include('test.php');
if (isset($_POST['Update'])){
  $sql = "SELECT ACNTS_LoginFirst FROM accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $data=mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($data)){
    if ($row[0] == '0') {
      $name = mysqli_escape_string($con,$_POST['name']);
      $UpdateQuery = "UPDATE customer SET CUST_Email='$_POST[email]', CUST_Name='$name' , CUST_Address='$_POST[Address]', CUST_ContactNO='$_POST[contactno]' WHERE ACNTS_ID='$_SESSION[id]'";
      mysqli_query($con,$UpdateQuery);
      mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Profile Updated Successfully!')
        window.location.href='products.php'
        </SCRIPT>");
      }
    if ($row[0] == '1'){
      $name = mysqli_escape_string($con,$_POST['name']);
      $UpdateQuery = "UPDATE customer SET CUST_Email='$_POST[email]', CUST_Name='$name' , CUST_Address='$_POST[Address]', CUST_ContactNO='$_POST[contactno]' WHERE ACNTS_ID='$_SESSION[id]'";
      mysqli_query($con,$UpdateQuery);
      mysqli_close($con);
      include('test.php');
      $update = "UPDATE accounts SET ACNTS_LoginFirst= b'0' WHERE ACNTS_ID='$_SESSION[id]'";
      mysqli_query($con,$update);
      mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Profile Updated Successfully!')
        window.location.href='products.php'
        </SCRIPT>");
    }
  }
}
if (isset($_POST['UpdateAdmin'])){
  $UpdateQuery = "UPDATE employee SET EMP_Name='$_POST[name]', EMP_Gender='$_POST[gender]', EMP_ContactNO='$_POST[contactno]' , EMP_Email='$_POST[email]',EMP_Address='$_POST[Address]',EMP_BDate='$_POST[bdate]' WHERE ACNTS_ID='$_SESSION[id]'";
  mysqli_query($con,$UpdateQuery);
  mysqli_close($con);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Profile Updated Successfully!')
    window.location.href='editprofile(admin).php'
    </SCRIPT>");
}
if (isset($_POST['UpdateCustPw'])){
  $sql = "SELECT ACNTS_Password FROM accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $data = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($data)){
  if ($row[0] == $_POST['current']){
    if ($_POST['new'] == $_POST['confirm']){
      $UpdateQuery = "UPDATE accounts SET ACNTS_Password='$_POST[confirm]' WHERE ACNTS_ID='$_SESSION[id]'";
      mysqli_query($con,$UpdateQuery);
      mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Password Changed Successfully!')
        window.location.href='products.php'
        </SCRIPT>");
    }
    else {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('New Password and Confirm Password do not match')
        window.location.href='changepassword.php'
        </SCRIPT>");
    }
  }
  else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong current password')
      window.location.href='changepassword.php'
      </SCRIPT>");
  }

}
}
if (isset($_POST['UpdateAdminPw'])){
  $sql = "SELECT ACNTS_Password FROM accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $data = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($data)){
  if ($row[0] == $_POST['current']){
    if ($_POST['new'] == $_POST['confirm']){
      $UpdateQuery = "UPDATE accounts SET ACNTS_Password='$_POST[confirm]' WHERE ACNTS_ID='$_SESSION[id]'";
      mysqli_query($con,$UpdateQuery);
      mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Password Changed Successfully!')
        window.location.href='products.php'
        </SCRIPT>");
    }
    else {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('New Password and Confirm Password do not match')
        window.location.href='changepassword(admin).php'
        </SCRIPT>");
    }
  }
  else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong current password')
      window.location.href='changepassword(admin).php'
      </SCRIPT>");
  }

}
}
/* UPDATE EMP PROFILE*/
if (isset($_POST['UpdateEMP'])){
  $UpdateQuery = "UPDATE employee SET EMP_Name='$_POST[name]', EMP_Gender='$_POST[gender]', EMP_ContactNO='$_POST[contactno]' , EMP_Email='$_POST[email]',EMP_Address='$_POST[Address]',EMP_BDate='$_POST[bdate]' WHERE ACNTS_ID='$_SESSION[id]'";
  mysqli_query($con,$UpdateQuery);
  mysqli_close($con);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Profile Updated Successfully!')
    window.location.href='editprofile(emp).php'
    </SCRIPT>");
}
if (isset($_POST['UpdateEMPPw'])){
  $sql = "SELECT ACNTS_Password FROM accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $data = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($data)){
  if ($row[0] == $_POST['current']){
    if ($_POST['new'] == $_POST['confirm']){
      $UpdateQuery = "UPDATE accounts SET ACNTS_Password='$_POST[confirm]' WHERE ACNTS_ID='$_SESSION[id]'";
      mysqli_query($con,$UpdateQuery);
      mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Password Changed Successfully! Login again!')
        window.location.href='home.php'
        </SCRIPT>");
    }
    else {
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('New Password and Confirm Password do not match')
        window.location.href='changepassword(emp).php'
        </SCRIPT>");
    }
  }
  else {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong current password')
      window.location.href='changepassword(emp).php'
      </SCRIPT>");
  }

}
}
?>
