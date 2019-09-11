<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Public Website">
    <meta name="author" content="Not Nice MNL">
    <!-- Add Your favicon here -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">

    <title>Orders</title>

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
                            <img src="img/nn_logo.png" alt="Not Nice MNL Logo">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-justified">
                        <li><a href="employee.php">Dashboard</a></li>
                          <li class="dropdown">
                            <a class="dropdown-toggle" href="home.php#features" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="active" href="productlist.php">Product List</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="product-inventory.php">Inventory</a></li>
                            </ul>
                        <li><a href="orders.php">Orders</a></li>
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
            <center>Order List - Completed</center>
        </h1>
        <div class="text-center">
            <p>Search by:</p>
            <label>&nbsp Order Number: &nbsp</label>
            <input style="width: 160px; border-radius: 25px; border: 2px solid #808080;" type="text" id="myInput5" onkeyup="myFunction5()" placeholder="&nbsp Search for Order Number">
            <label>&nbsp Name: &nbsp</label>
            <input style="width: 160px; border-radius: 25px; border: 2px solid #808080;" type="text" id="myInput" onkeyup="myFunction()" placeholder="&nbsp Search for Names">
            <label>&nbsp Address: &nbsp</label>
            <input style="width: 160px; border-radius: 25px; border: 2px solid #808080;" type="text" id="myInput4" onkeyup="myFunction4()" placeholder="&nbsp Search for Address">
            <label>&nbsp Product: &nbsp</label>
            <input style="width: 160px; border-radius: 25px; border: 2px solid #808080;" type="text" id="myInput3" onkeyup="myFunction3()" placeholder="&nbsp Search for Product">
            <label>&nbsp Status: &nbsp</label>
            <select style="width: 160px; border-radius: 25px; border: 2px solid #808080;" onchange="location = this.value;">
                <option value="" disabled selected>Select your option</option>
                <option value="orders.php">All</option>
                <option value="order-pending.php">Pending</option>
                <option value="order-processing.php">Processing</option>
                <option value="order-delivered.php">Delivered</option>
                <option value="order-complete.php">Completed</option>
                <option value="order-hold.php">On Hold</option>
                <option value="order-cancel.php">Cancelled</option>
            </select>
        </div>
        <br>
        <!-- Responsive table starts here -->
        <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
        <div style="overflow-y: scroll;" class="table-responsive-vertical shadow-z-1">
            <!-- Table starts here -->
            <table id="table" class="table table-striped table-bordered table-hover table-mc-amber">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Contact Number</th>
                        <th>Product Name </th>
                        <th>Qty Ordered</th>
                        <th>Date Ordered</th>
                        <th>Date Delivered</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
       $sql = "SELECT finalorders.PO_NO,customer.CUST_Name,customer.CUST_Address,customer.CUST_ContactNO,finalorders.PROD_Name,\n"
    . "finalorders.Quantity,finalorders.DatePurchased,finalorders.DateDelivered,finalorders.Status,finalorders.TotalPrice FROM accounts RIGHT OUTER JOIN customer ON accounts.ACNTS_ID = customer.ACNTS_ID RIGHT OUTER JOIN\n"
    . "finalorders ON accounts.ACNTS_ID = finalorders.ACNTS_ID WHERE finalorders.Status = 'Completed'";
        $stmt = mysqli_query( $con, $sql);
		?>
                    <?php
        while( $row = mysqli_fetch_array($stmt) ) {
           echo "<tr>\n";
           echo "  <td>" . $row[0]. "\n";
           echo "  <td>" . $row[1]. "\n";
           echo "  <td>" . $row[2]. "\n";
           echo "  <td>" . $row[3]. "\n";
           echo "  <td>" . $row[4]. "\n";
           echo "  <td>" . $row[5]. "\n";
           echo "  <td>" . $row[6]. "\n";
            echo "  <td>" . $row[7]. "\n";
           echo "  <td>" . $row[9]. "\n";
            echo "  <td>" . $row[8]. "\n";
           ?>
                    <form action="orderdb.php" method="POST" onsubmit="return confirm('Are you sure you want to change the status?');">
                        <td><select name="Status">
                                <option></option>
                                <option value="Processing">Processing</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Completed">Completed</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Cancelled">Cancelled</option>
                            </select></td>

                        <?php
		       echo "<td>" . "<button type='submit' name='Validate' class='btn btn_maroon'>" . "Change Status" . "</button></a></td>";
           ?>
                        <?php
           echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "' </td>";
           echo "</form>";
		   ?>
                        <form action="orderdb.php" method="post" enctype="multipart/form-data">
                            <?php
         echo "<td>" . "<input type=hidden name=hiddenv value='" . $row['PO_NO'] . "' </td>\n";
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
    <!-- <div style="background-color:grey">
        <?php
//Now select all from table
$query = "select * from finalorders";
$result = mysqli_query($con, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);
//Going to first page               
echo "<center><a href='orders.php'>"."[First Page] " . "</a>";

for ($i=1; $i<=$total_pages; $i++) {
echo "<a href='orders.php?page=".$i."'>".$i."</a>";
echo " ";
};
// Going to last page
echo "<a href='orders.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
?>
    </div> -->

    <div class="copyright">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <center>
                    <a href="https://www.facebook.com/NotNiceMnl/" target="_blank">
                        <img src="images/facebook.png" height="40px" width="40px">
                    </a>

                    <a href="https://www.instagram.com/notnicemnl/" target="_blank">
                        <img src="images/instagram.png" height="40px" width="40px">
                    </a>

                </center>
                <br />
                <strong>Capstone Project II - Aidan Crispo, Ralph Bill Reyes , Luis Buenaventura and Shem De Leon<br /></strong><br />
            </div>
        </div>
    </div>
    </section>

    <script src="js/search-order.js"></script>
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
