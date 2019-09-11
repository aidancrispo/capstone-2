<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>Products</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
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

<body id="products">

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
                                <li><a href="productMEN.php">Men</a></li>
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
                <h1>Products</h1>
            </center>
        </div>
        <!-- END of middle -->
        <br>
        <div id="templatemo_main_top"></div>

        <div id="templatemo_main">
            <div id="content">

                <!-- Products List Start -->
                <?php
        
              $per_page=6;

                    if (isset($_GET["page"])) {

                    $page = $_GET["page"];

                    }

                    else {

                    $page=1;

                    }

                    // Page will start from 0 and Multiple by Per Page
                    $start_from = ($page-1) * $per_page;
include_once("config.php");
$results = $mysqli->query("SELECT  PROD_ID, PROD_Name, PROD_Price, PROD_InStock, PROD_Img FROM products ORDER BY PROD_ID ASC LIMIT $start_from,$per_page");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product" id="table">
	<form method="post" action="addorder.php" onsubmit="return confirm('Add product?')";>
	<div class="product-content"><h3>{$obj->PROD_Name}</h3>
	<div class="product-thumb"><img border=3 height=250 width=200 src="dbimg/{$obj->PROD_Img}"></div>
	<div class="product-info">InStock: {$obj->PROD_InStock}</div>
	<div class="product-info">
	Price {$currency}{$obj->PROD_Price}
	<fieldset>

	<label>
		Quantity
		<input type="number" min="1" max="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' size="2" maxlength="2" name="product_qty"/>
</label>

	</fieldset>
	<input type="hidden" name="PROD_ID" value="{$obj->PROD_ID}" />
	<input type="hidden" name="type" value="add" />
	<div align="center"><button type="submit" class="add_to_cart" name="Add">Add</button></div>
	</div></div>
	</form>
	<form method="post" action="viewitem.php">
		<div align="center"><button type="submit"  name="View">View Item</button></div>
		<input type="hidden" name="PROD_ID" value="{$obj->PROD_ID}" />
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
                <div style="color: #000;">
                    <?php
$con=mysqli_connect("localhost","root","","orderingsystem");
        //Now select all from table
        $query = "select * from products";
        $result = mysqli_query($con, $query);

        // Count the total records
        $total_records = mysqli_num_rows($result);

        //Using ceil function to divide the total records on per page
        $total_pages = ceil($total_records / $per_page);
        //Going to first page
        echo "<center><a href='products.php'>"."[First Page] " . "</a>";

        for ($i=1; $i<=$total_pages; $i++) {
        echo "<a href='products.php?page=".$i."'>".$i."</a>";
        echo " ";
        };
        // Going to last page
        echo "<a href='products.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
        ?>
                </div>
                <!-- Products List End -->
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
