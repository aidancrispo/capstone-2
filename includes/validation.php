<?php
  session_start();
  if (! empty($_SESSION['logged_in']))
{
    ?>

    <?php

    $con=mysqli_connect("localhost","root","","orderingsystem");
    require ('test.php');

    $sqlacnt = "SELECT * \n"
          . "FROM accounts\n"
          . " WHERE ACNTS_ID = '$_SESSION[id]'";

    $stmtacnt = mysqli_query( $con, $sqlacnt);
    while( $row = mysqli_fetch_array($stmtacnt) ) {
      if($row['ACNTS_Role'] == 'Admin'){
      }
      elseif ($row['ACNTS_Role'] == 'Employee'){
        echo  ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You cannot access this because you are an Employee!')
            window.location.href='employee.php'
            </SCRIPT>");
      }
      elseif ($row['ACNTS_Role'] == 'Customer'){
        echo  ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You cannot access this because you are a Customer!')
            window.location.href='products.php'
            </SCRIPT>");
      }
      ?>