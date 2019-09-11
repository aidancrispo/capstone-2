<?php
session_start();
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
if (isset($_POST['Validate'])){
if ($_POST['Status'] == 'Delivered'){
	$sql= ("SELECT Status FROM `finalorders` WHERE PO_NO='$_POST[hidden]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ( $Status == '')
		{
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Please validate first.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Completed'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already completed!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Pending'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order Still in Pending Status!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Delivered'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already in delivery!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Cancelled'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Cancelled!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Processing'){
			$ResetQuery = "UPDATE finalorders SET Status='Delivered', DateDelivered=Now() WHERE PO_NO='$_POST[hidden]'";
			mysqli_query($con,$ResetQuery);
			mysqli_close($con);
            
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Status updated to Delivered Successfully!')
				window.location.href='orders.php'
				</SCRIPT>");
				include('test.php');
				$sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Order Status Delivered ORDER ID: $_POST[hidden]','$_SESSION[id]')";
				mysqli_query($con,$sql);
				mysqli_close($con);
		}
        if ($Status == 'On Hold'){
			$ResetQuery = "UPDATE finalorders SET Status='Delivered' WHERE PO_NO='$_POST[hidden]'";
			mysqli_query($con,$ResetQuery);
			mysqli_close($con);
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Status updated to Delivered Successfully!')
				window.location.href='orders.php'
				</SCRIPT>");
				include('test.php');
				$sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Order Status Delivered ORDER ID: $_POST[hidden]','$_SESSION[id]')";
				mysqli_query($con,$sql);
				mysqli_close($con);
		}
	}
}
if ($_POST['Status'] == 'Completed'){
	$sql= ("SELECT Status FROM `finalorders` WHERE PO_NO='$_POST[hidden]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
        if ($Status == 'Completed'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already completed!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Processing'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Delivered Status needed before completion.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Pending'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order Still in Pending Status!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Cancelled'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Cancelled!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Pending'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order Still in Pending Status!.')
					window.location.href='orders.php'
					</SCRIPT>");
        }
        if ($Status == 'On Hold'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Status on hold!.')
					window.location.href='orders.php'
					</SCRIPT>");
        }
		else {
        if ($Status == 'Delivered')
  		$ResetQuery = "UPDATE finalorders SET Status='Completed' WHERE PO_NO='$_POST[hidden]'";
  		mysqli_query($con,$ResetQuery);
  		mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Status updated to completed Successfully!')
        window.location.href='orders.php'
        </SCRIPT>");
				include('test.php');
				$sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Order Status Completed ORDER ID: $_POST[hidden]','$_SESSION[id]')";
				mysqli_query($con,$sql);
				mysqli_close($con);
		}
}
}
if ($_POST['Status'] == 'Processing'){
	$sql= ("SELECT Status FROM `finalorders` WHERE PO_NO='$_POST[hidden]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ($Status == 'Completed'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already completed!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Processing'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already in process!')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Cancelled'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Cancelled!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Delivered'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order need  to Delivered first!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'On Hold'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					  window.alert('Status On Hold!')
        window.location.href='orders.php'
					</SCRIPT>");
		}
		if ($Status == 'Pending'){
  		$ResetQuery = "UPDATE finalorders SET Status='Processing' WHERE PO_NO='$_POST[hidden]'";
  		mysqli_query($con,$ResetQuery);
  		mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Status updated to Processing Successfully!')
        window.location.href='orders.php'
        </SCRIPT>");
				include('test.php');
				$sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Order Status Processed ORDER ID: $_POST[hidden]','$_SESSION[id]')";
				mysqli_query($con,$sql);
				mysqli_close($con);
		}
	}
}
if ($_POST['Status'] == 'On Hold'){
	$sql= ("SELECT Status FROM `finalorders` WHERE PO_NO='$_POST[hidden]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ($Status == 'Delivered'){
  		$ResetQuery = "UPDATE finalorders SET Status='On Hold' WHERE PO_NO='$_POST[hidden]'";
  		mysqli_query($con,$ResetQuery);
  		mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Status On Hold!')
        window.location.href='orders.php'
        </SCRIPT>");
				include('test.php');
				$sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Order Status On Hold ORDER ID: $_POST[hidden]','$_SESSION[id]')";
				mysqli_query($con,$sql);
				mysqli_close($con);
		}
        if ($Status == 'Cancelled'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Cancelled!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
         if ($Status == 'Completed'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Completed!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Pending'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order Still in Pending Status!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Order needed to be delivered first!')
        window.location.href='orders.php'
        </SCRIPT>");
		}
	}
}

if ($_POST['Status'] == 'Cancelled'){
	$sql= ("SELECT Status FROM `finalorders` WHERE PO_NO='$_POST[hidden]'");
	$myData = mysqli_query($con,$sql);
	while($record = mysqli_fetch_array($myData)){
	$Status= $record[0];
		if ($Status == 'Processing'){
  		$ResetQuery = "UPDATE finalorders SET Status='Cancelled' WHERE PO_NO='$_POST[hidden]'";
  		mysqli_query($con,$ResetQuery);
  		mysqli_close($con);
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Status updated to Cancelled!')
        window.location.href='orders.php'
        </SCRIPT>");
				include('test.php');
				$sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Order Status Cancelled ORDER ID: $_POST[hidden]','$_SESSION[id]')";
				mysqli_query($con,$sql);
				mysqli_close($con);
		}
        if ($Status == 'Cancelled'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Cancelled!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'Delivered'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Delivered!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
         if ($Status == 'Completed'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already Completed!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
        if ($Status == 'On Hold'){
			echo  ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Order already On Hold!.')
					window.location.href='orders.php'
					</SCRIPT>");
		}
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Order needed to be Processing first!')
        window.location.href='orders.php'
        </SCRIPT>");
		}
	}
}
    if ($_POST['Status'] == ''){
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Please Select Status!')
        window.location.href='orders.php'
        </SCRIPT>");
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> - Returns (Employee)</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <!-- Script for Popup Login -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/login.css" />
</head>

<body id="orders">

    <?php
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
          echo  ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('You cannot access this because you are an Admin!')
              window.location.href='admin.php'
              </SCRIPT>");
        }
        elseif ($row['ACNTS_Role'] == 'Employee'){
        }
        elseif ($row['ACNTS_Role'] == 'Customer'){
          echo  ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('You cannot access this because you are a Customer!')
              window.location.href='products.php'
              </SCRIPT>");
        }
        ?>

    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>s
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="nav navbar-left">
                        <a href="employee.php#page-top" class="image-icon">
                            <img src="img/loginlogo.png" alt="Not Nice MNL Logo">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-justified">
                        <li><a href="employee.php#page-top">Home</a></li>
                        <li><a href="productlist.php">Products</a></li>
                        <li><a class="active" href="#orders">Orders</a></li>
                        <li><a href="messages.php">Messages</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="editprofile(emp).php">Welcome, <font color="4077DE">
                                    <?php echo "$row[ACNTS_UName]"; ?></a></font>
                        </li>
                        <li><a href="logout.php">Signout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <?php
}

if( $stmtacnt === false ) {
   die( print_r( mysqli_connect_errno(), true));
}
?>

    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>


    <section id="features" class="container services">
    </section>

    <!--
Table Codes
 !-->

    <div>
        <h1>
            <center>Order List</center>
        </h1>

        <!-- Responsive table starts here -->
        <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
        <div class="table-responsive-vertical shadow-z-1">
            <!-- Table starts here -->
            <table id="table" class="table table-striped table-bordered table-hover table-mc-amber">
                <thead>
                    <tr>
                        <th>PO Number</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        $con=mysqli_connect("localhost","root","","orderingsystem");
        require ('test.php');
        $per_page=5;

        if (isset($_GET["page"])) {

        $page = $_GET["page"];

        }

        else {

        $page=1;

        }

        // Page will start from 0 and Multiple by Per Page
        $start_from = ($page-1) * $per_page;
        // Since UID and PWD are not specified in the $connectionInfo array,
        // The connection will be attempted using Windows Authentication.


        /*if( $conn ) {
             echo "Connection established.<br />";
        }else{
             echo "Connection could not be established.<br />";
             die( print_r( sqlsrv_errors(), true));
        } */
        $sql = "SELECT * FROM returndb WHERE PO_NO = '$_POST[hidden]' ORDER BY PO_NO  DESC LIMIT $start_from,$per_page";
        $stmt = mysqli_query( $con, $sql);
		?>
                    <form action="addorder.php" method="POST" onsubmit="return confirm('Are you sure you want to confirm the quantity?');">
                        <?php
        while( $row = mysqli_fetch_array($stmt) ) {
           echo "<tr>\n";
           echo "  <td>" . $row[0]. "\n";
           echo "  <td>" . $row[1]. "\n";
           echo "  <td> <input type=number min='0' name='qty' value='" . $row[2]. "'\n</td>";
           ?>

                        <?php
		       echo "<td>" . "<button type='submit' name='ConfirmQty' class='btn btn_maroon'>" . "Confirm Qty" . "</button></a></td>";
           ?>
                        <?php
           echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "' </td>";
					 echo "<td>" . "<input type=hidden name=hiddenname value='" . $row[1] . "' </td>";
           echo "</form>";
		   ?>
                        <?php
       echo "</tr>\n";
     }
        if( $stmt === false ) {
             die( print_r( mysqli_connect_errno(), true));
        }
        ?>
                        </td>
                </tbody>
            </table>
        </div>
    </div>


    <?php
//Now select all from table
$query = "select * from returndb";
$result = mysqli_query($con, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);
//Going to first page
echo "<center><a href='orderdb.php'>"."[First Page] " . "</a>";

for ($i=1; $i<=$total_pages; $i++) {
echo "<a href='orderdb.php?page=".$i."'>".$i."</a>";
echo " ";
};
// Going to last page
echo "<a href='orderdb.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
?>

    </section>
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/accountstable.js"></script>
    <script src="js/orderstable.js"></script>

</body>

</html>

<?php
}
else
{
    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You are not logged in!')
            window.location.href='home.php#loginbtn'
            </SCRIPT>");
}
?>

<?php

 ?>
