<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>Ordered History</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js"></script>
    <script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "templatemo_menu", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>

    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2.1-core.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/mootools-1.2-more.js"></script>
    <script language="javascript" type="text/javascript" src="scripts/slideitmoo-1.1.js"></script>
    <script language="javascript" type="text/javascript">
        window.addEvents({
            'domready': function() {
                /* thumbnails example , div containers */
                new SlideItMoo({
                    overallContainer: 'SlideItMoo_outer',
                    elementScrolled: 'SlideItMoo_inner',
                    thumbsContainer: 'SlideItMoo_items',
                    itemsVisible: 5,
                    elemsSlide: 2,
                    duration: 200,
                    itemsSelector: '.SlideItMoo_element',
                    itemWidth: 171,
                    showControls: 1
                });
            },

        });

        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

    </script>

</head>

<body id="orderedhistory">

    <?php
	  session_start();
	  if (! empty($_SESSION['logged_in']))
	{
	    ?>

    <?php

			$con=mysqli_connect("localhost","root","","orderingsystem");
			require ('test.php');

			$sql = "SELECT * \n"
			      . "FROM accounts\n"
			      . " WHERE ACNTS_ID = '$_SESSION[id]'";

			$stmtacnt = mysqli_query( $con, $sql);
			while( $row = mysqli_fetch_array($stmtacnt) ) {
				if($row['ACNTS_Role'] == 'Admin'){
					echo  ("<SCRIPT LANGUAGE='JavaScript'>
					    window.alert('You cannot access this because you are an Admin!')
							window.location.href='admin.php'
					    </SCRIPT>");
				}
				elseif ($row['ACNTS_Role'] == 'Employee'){
					echo  ("<SCRIPT LANGUAGE='JavaScript'>
					    window.alert('You cannot access this because you are an Employee!')
							window.location.href='employee.php'
					    </SCRIPT>");
				}
				elseif ($row['ACNTS_Role'] == 'Customer'){
				}
				?>
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="nav navbar-left">
                        <a href="products.php" class="image-icon">
                            <img src="img/nn_logo.png" alt="Not Nice logo Logo">
                        </a>
                    </div>

                    <ul class="nav navbar-nav navbar-justified">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="products.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="productMEN.php">Men/Boys</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="productFEMALE.php">Women</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="productACES.php">Accessories</a></li>
                            </ul>

                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About US
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="aboutMore.php">Contact Us</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="termsandconditions.php">Terms and Conditions</a></li>
                            </ul>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="checkout.php"><img src="images/shopping-cart.png" height="23px" width="23px"> Checkout</a></li>

                        <li class="dropdown">
                         <a class="dropdown-toggle" href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <font color="4077DE">
                                <?php echo "$row[ACNTS_UName]"; ?>&nbsp;|&nbsp;<?php echo "$row[ACNTS_ID]"; ?></a></font>
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="editprofile.php">Edit Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="contactusform.php">Message</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="orderhistory.php">Ordered History</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="logout.php">Signout</a></li>
                            </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="templatemo_wrapper">
        <div id="templatemo_header">
        </div>
        <?php
	}

	if( $stmtacnt === false ) {
			 die( print_r( mysqli_connect_errno(), true));
	}
		?>

        <div id="templatemo_middle">
            <center>
                <h1>Ordered History</h1>
            </center>
        </div> <!-- END of middle -->
        <br>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">

            <div id="conthis">
                <div>
                    <h1 style="color:black;">
                        <center>Order List</center>
                    </h1>
                    <div style="overflow-y: scroll;" class="table-responsive-vertical shadow-z-1">
                        <!-- Table starts here -->
                        <table id="table" class="table table-striped table-bordered table-hover table-mc-amber">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Product Name </th>
                                    <th>Qty Ordered</th>
                                    <th>Date Ordered</th>
                                    <th>Date Delivered</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
        $con=mysqli_connect("localhost","root","","orderingsystem");
        require ('test.php');
        $per_page=10;

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
        $sql = "SELECT finalorders.ACNTS_ID,finalorders.PO_NO,finalorders.PROD_Name,\n"
    . "finalorders.Quantity,finalorders.DatePurchased,finalorders.DateDelivered,finalorders.Status,finalorders.TotalPrice FROM accounts RIGHT OUTER JOIN customer ON accounts.ACNTS_ID = customer.ACNTS_ID RIGHT OUTER JOIN\n"   
    . "finalorders ON accounts.ACNTS_ID = finalorders.ACNTS_ID\n" . "WHERE finalorders.ACNTS_ID = '$_SESSION[id]' ORDER BY PO_NO DESC LIMIT $start_from,$per_page";
        $stmt = mysqli_query( $con, $sql);
		?>
                                <?php
        while( $row = mysqli_fetch_array($stmt) ) {
           echo "<tr>\n";
        
            echo "  <td>" . $row[1]. "\n";
           echo "  <td>" . $row[2]. "\n";
           echo "  <td>" . $row[3]. "\n";
           echo "  <td>" . $row[4]. "\n";
            echo "  <td>" . $row[5]. "\n";
           echo "  <td>" . $row[7]. "\n";
            echo "  <td>" . $row[6]. "\n";
           
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

                <div style="background-color:#000;">
                    <?php
//Now select all from table
$query = "select * from finalorders";
$result = mysqli_query($con, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);
//Going to first page               
echo "<center><a href='orderhistory.php'>"."[First Page] " . "</a>";

for ($i=1; $i<=$total_pages; $i++) {
echo "<a href='orderhistory.php?page=".$i."'>".$i."</a>";
echo " ";
};
// Going to last page
echo "<a href='orderhistory.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
?>

                </div>

                <!-- Ordered List End -->
            </div>

            <!-- END of content -->
            <div class="cleaner"></div>
        </div> <!-- END of main -->

        <div id="templatemo_footer">
            <div class="col col_16">
                <h4>Categories</h4>
                <ul class="footer_menu">
                    <li><a href="productMEN.php">Men</a></li>
                    <li><a href="productFEMALE.php">Women</a></li>
                    <li><a href="productACES.php">Accessories</a></li>
                    <li><a href="products.php">All Products</a></li>
                </ul>
            </div>
            <div class="col col_16">
                <h4>Pages</h4>
                <ul class="footer_menu">
                    <li><a href="#products">Products</a></li>
                    <li><a href="aboutMore.php">About Us</a></li>
                    <li><a href="contactusform.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col col_16">

            </div>

            <div class="col col_16"><br></div>

            <div class="col col_13 no_margin_right">
                <h4>About Us</h4>
                <p>We love clothing and we want convenience for our customers so we started so we started up our online shoppping business. Our business started with pre love clothing and dri fit clothing. But we will soon be having our very own products.<br>
            </div>

            <div class="cleaner h40"></div>
            <center>
                <a href="https://www.facebook.com/NotNiceMnl/" target="_blank">
                    <img src="images/facebook.png" height="40px" width="40px">
                </a>

                <a href="https://www.instagram.com/notnicemnl/" target="_blank">
                    <img src="images/instagram.png" height="40px" width="40px">
                </a>
                <a href="assets/pdf/Customer%20Manual.pdf" target="_blank" title="User Manual">
                    <img src="images/manual.png" height="40px" width="40px">
                </a>

            </center>
            <br />
            <center>
                <strong>Capstone Project II - Aidan Crispo, Ralph Bill Reyes , Luis Buenaventura and Shem De Leon</strong><br />
            </center>
        </div> <!-- END of footer -->

    </div>
</body>

</html>

<?php
}
else
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You are not logged in!')
            window.location.href='home.php#loginbtn'
            </SCRIPT>");
}
?>
