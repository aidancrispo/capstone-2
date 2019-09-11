<html>
<title></title>
<body>

<?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
if (isset($_POST['Add'])){
  $msg="";
  //target folder for the uploaded image
  $target = "dbimg/".basename($_FILES["image"]["name"]);
  //get image name
  $image = $_FILES["image"]["name"];
 $sql = "SELECT ACNTS_Password from accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $myDatas = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($myDatas)){
      if ($_POST['current'] == $row[0]) {
  $AddQuery = "INSERT  INTO products (PROD_Name,PROD_Description,PROD_Price,Prod_Category,Prod_Img) VALUES ('$_POST[Name]','$_POST[Desc]','$_POST[Price]','$_POST[Category]','$image')";
  mysqli_query($con,$AddQuery);
  mysqli_close($con);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Added Successfully! ".$msg."')
        window.location.href='productlist.php'
        </SCRIPT>");
          
       include('test.php');
        $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Product Added PRODUCT NAME: $_POST[Name]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
      }
          else {
              echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password Do not Match!')
      window.location.href='productlist.php'
      </SCRIPT>");
          }
  //move image to folder dbimg
  if (move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
    $msg= "Image uploaded Successfully";
  }
  else {
    $msg ="Something went wrong in uploading the image";
  }
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Added Successfully! ".$msg."')
        window.location.href='productlist.php'
        </SCRIPT>");
          
}}
if (isset($_POST['Delete'])){
  $con=mysqli_connect("localhost","root","","orderingsystem");
  require ('test.php');
  $DeleteQuery = "DELETE FROM products WHERE PROD_ID ='$_POST[hidden]'";
  mysqli_query($con,$DeleteQuery);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Deleted Successfully!')
    window.location.href='productlist.php'
    </SCRIPT>");
    $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Product Deleted PRODUCT ID: $_POST[hidden]','$_SESSION[id]')";
    mysqli_query($con,$sql);
    mysqli_close($con);
}
if (isset($_POST['Edit'])){
     $sql = "SELECT ACNTS_Password from accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $myDatas = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($myDatas)){
      if ($_POST['current'] == $row[0]) {
  $ResetQuery = "UPDATE products SET PROD_Name='$_POST[Name]',PROD_Description='$_POST[Desc]',PROD_Price='$_POST[Price]',PROD_Category='$_POST[Category]' WHERE PROD_ID='$_POST[hidden]'";
  mysqli_query($con,$ResetQuery);
  mysqli_close($con);
          
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Edited Successfully!')
        window.location.href='productlist.php'
        </SCRIPT>");
          
        include('test.php');
       $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Product Edited PRODUCT ID: $_POST[hidden]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
        
      }
      else 
        {
        
          echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password Do not Match!')
      window.location.href='productlist.php'
      </SCRIPT>");
       }
      
}}
if (isset($_POST['Cancel'])){
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Editing is cancelled')
        window.location.href='productlist.php'
        </SCRIPT>");
}
if (isset($_POST['CancelEditQty'])){
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Editing is cancelled')
        window.location.href='checkout.php'
        </SCRIPT>");
}
if (isset($_POST['Editqty'])){
  $qty = $_POST['Quantity'];
  $qgo = $_POST['Quantity'] - $_POST['origqty'];
  $ogq = $_POST['origqty'] - $_POST['Quantity'];
  $EditQuery = "UPDATE orderdetails SET Quantity='$_POST[Quantity]' WHERE orderdetails.DET_ID='$_POST[hiddenid]'";
  mysqli_query($con,$EditQuery);
  if ($_POST['Quantity'] > $_POST['origqty']){
    $UpdateQuery = "UPDATE products SET PROD_InStock=PROD_InStock - '$qgo' WHERE PROD_ID='$_POST[hiddenprods]'";
    mysqli_query($con,$UpdateQuery);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Qty Edited Successfully!')
          window.location.href='shoppingcart.php'
          </SCRIPT>");
  }
  elseif ($_POST['Quantity'] < $_POST['origqty']){
    $UpdateQuery = "UPDATE products SET PROD_InStock=PROD_InStock + '$ogq' WHERE PROD_ID='$_POST[hiddenprods]'";
    mysqli_query($con,$UpdateQuery);
    echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Qty Edited Successfully!')
          window.location.href='shoppingcart.php'
          </SCRIPT>");
  }
  elseif ($_POST['Quantity'] = $_POST['origqty']){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
          window.alert('Qty Edited Successfully!')
          window.location.href='shoppingcart.php'
          </SCRIPT>");
  }
}
if (isset($_POST['AddStock'])){
    $sql = "SELECT ACNTS_Password from accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $myDatas = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($myDatas)){
      if ($_POST['current'] == $row[0]) {
  $AddStockQuery = "UPDATE products SET PROD_InStock= PROD_InStock + ' $_POST[Stock]' WHERE PROD_ID='$_POST[ProductID]'";
  mysqli_query($con,$AddStockQuery);
  mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Stock Added Successfully!')
        window.location.href='product-inventory.php'
        </SCRIPT>");
           
        include('test.php');
       $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Product Stock Added $_POST[Stock] PRODUCT ID: $_POST[ProductID]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
      }
          else {
               echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password Do not Match!')
      window.location.href='product-inventory.php'
      </SCRIPT>");
          }
      
}}
if (isset($_POST['Cancelimg'])){
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Changing the image is cancelled')
        window.location.href='productlist.php'
        </SCRIPT>");
}
if (isset($_POST['UpdateImage'])){
  $msg="";
  //target folder for the uploaded image
  $target = "dbimg/".basename($_FILES["image"]["name"]);
  //get image name
  $image = $_FILES["image"]["name"];
    $sql = "SELECT ACNTS_Password from accounts WHERE ACNTS_ID='$_SESSION[id]'";
  $myDatas = mysqli_query($con,$sql);
  while ($row = mysqli_fetch_array($myDatas)){
      if ($_POST['current'] == $row[0]) {
  $UpdateQuery = "UPDATE products SET PROD_Img='$image' WHERE PROD_ID='$_POST[hidden]'";
  mysqli_query($con,$UpdateQuery);
  mysqli_close($con);
           echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Edited Successfully!')
        window.location.href='productlist.php'
        </SCRIPT>");
          
           include('test.php');
         $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Product Image Edited PRODUCT ID: $_POST[hidden]','$_SESSION[id]')";
        mysqli_query($con,$sql);
        mysqli_close($con);
          }
      else
           {
              echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Password Do not Match!')
      window.location.href='productlist.php'
      </SCRIPT>");
          }
  //move image to folder dbimg
  if (move_uploaded_file($_FILES["image"]["tmp_name"],$target)){
    $msg= "Image uploaded Successfully";
  }
  else {
    $msg ="Something went wrong in uploading the image";
  }
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Edited Successfully!')
        window.location.href='productlist.php'
        </SCRIPT>");
       
}}

?>
</body>
</html>