<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>Terms and Conditions</title>
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

        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

    </script>

</head>

<body id="terms">

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
                <h1>Terms And Conditions</h1>
            </center>
        </div> <!-- END of middle -->

        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">

            <div id="conterms">
                <!-- Credits to http://www.css3templates.co.uk/terms.html and https://creativecommons.org/licenses/by/3.0/-->
                <h2>Terms and Conditions</h2>
                <h4>By using NOT NICE MNL and/or placing an order, you agree to be bound by the terms and conditions set out herein. Please make sure you have read and understood the Terms before placing your order.

                    Only persons of legal age, 18 or 20 years, or older depending on your place of recidency, who are not under guardianship, and are not acting in capacity as a company, with a physical address in one of the countries that NOT NICE MNL provides deliveries to can place an order. More information can be found on our customer service pages.
                    <ul>
                        <li><b>Prices and delivery charges:</b> The price does not include import taxes or custom duties. Import taxes/custom duties will be charged by your carrier at delivery and NOT NICE MNL does not compensate these charges. The delivery charge for each order will be the same, regardless of the size or weight of your order. The cost for each delivery method is clearly indicated during the check-out process.</li><br>
                        <li><b>Colours:</b> We make all reasonable efforts to accurately display the attributes of our products, including composition and colours. The colour you see will depend on your computer system, and we cannot guarantee that your computer will accurately display such colours.</li><br>
                        <li><b>Guarantee:</b> If there are defects in the goods you have purchased, NOT NICE MNL abides by all statutory guarantee regulations. If you have a complaint regarding obvious material or manufacturing faults in goods that we have supplied, including damage incurred in transit, please let us know by returning the goods to us without delay by using the provided pre-printed return form.</li><br>
                        <li><b>Payment methods:</b> You can enter your payment details at the time you place your order using COD or Cash on Delivery</li>
                    </ul>
                </h4>
                <hr>
                <div class="cleaner h20"></div>

            </div> <!-- END of content -->
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
                    <li><a href="products.php">Products</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="contactusform.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="col col_16">

            </div>

            <div class="col col_16"><br></div>

            <div class="col col_13 no_margin_right">
                <h4>About Us</h4>
                <p>We love clothing and we want convenience for our customers so we started so we started up our online shoppping business. Our business started with pre love clothing and dri fit clothing. But we will soon be having our very own products. <br>
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
                <strong>Capstone Project II - Aidan Crispo, Ralph Bill Reyes , Luis Buenaventura and Shem De Leon<br /></strong><br />
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
