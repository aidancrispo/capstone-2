<html>
<title></title>

<body>

    <?php
/* ADD MESSAGES*/
session_start();
if (isset($_POST['submitcontactus'])){
$con=mysqli_connect("localhost","root","","orderingsystem");
 $Email=mysqli_escape_string($con,$_POST['CUEmail']);
 $messagequery = "INSERT INTO contactusmessages (CU_Name,CU_Email,CU_ContactNo,CU_Message,CU_DateTimeR) VALUES ('$_POST[CUName]','$Email','$_POST[CUContactNo]','$_POST[CUMessages]',NOW())";
 mysqli_query($con,$messagequery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Message Sent Successfully!')
        window.location.href='aboutMoreGUEST.php'
        </SCRIPT>");
}
/* INSERT MESSAGE CUSTOMER*/
if (isset($_POST['sendmessageS'])){
 $con=mysqli_connect("localhost","root","","orderingsystem");
 $messagequerycust = "INSERT INTO contactusmessages (CU_Name,CU_Email,CU_ContactNo,CU_concern,CU_ordrnum,CU_Message,CU_DateTimeR) VALUES ('$_POST[CUSTName]','$_POST[CUSTEmail]','$_POST[CUSTContactNo]','$_POST[concern]','$_POST[CUSTOrdrNum]','$_POST[CUSTMessages]',NOW())";
 mysqli_query($con,$messagequerycust);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Message Sent Successfully!')
        window.location.href='contactusform.php#contactus'
        </SCRIPT>");
}
/* DELETE MESSAGES*/
if (isset($_POST['DeleteCUMessages'])){
  $con=mysqli_connect("localhost","root","","orderingsystem");
  $deletemsgquery= "DELETE FROM contactusmessages WHERE CU_ID ='$_POST[hidden]'";
  mysqli_query($con,$deletemsgquery);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Deleted Successfully!')
    window.location.href='messages.php'
    </SCRIPT>");
    $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Message Deleted CU_ID: $_POST[hidden]','$_SESSION[id]')";
    mysqli_query($con,$sql);
    mysqli_close($con);
}

/* RESOLVE STATUS FROM PENDING TO RESOLVED*/
if (isset($_POST['ResolveCUMessages'])){
    $con=mysqli_connect("localhost","root","","orderingsystem");
  $ResolveQuery = "UPDATE contactusmessages SET CU_Status='Resolved' WHERE CU_ID='$_POST[hidden]'";
  mysqli_query($con,$ResolveQuery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Message Status Resolved!')
        window.location.href='messages.php'
        </SCRIPT>");
        $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Message Resolved CU_ID: $_POST[hidden]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
}

?>

</body>

</html>
