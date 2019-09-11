<?php/*	session_start();*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>Checkout</title>
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

    <script language="javascript" type="text/javascript">
        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

    </script>

</head>

<body id="shoppingcart">

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
                <h1>Checkout</h1>
            </center>
        </div> <!-- END of middle -->

        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">
            <div id="contout">
                <table class="table2">
                    <tr>
                        <th width="160" align="center"></th>
                        <th width="160" align="center">&nbsp Product Name</th> 
                        <th width="160" align="center">&nbsp Quantity</th>
                        <th width="160" align="right">&nbsp Price per unit</th>
                        <th width="160" align="right">&nbsp Total Price</th>
                    </tr>
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

									$sql = "SELECT orderdetails.DET_ID, products.PROD_Name, products.PROD_Price,accounts.ACNTS_UName, orderdetails.DatePurchased, orderdetails.Quantity, products.PROD_ID, products.PROD_Img, orderdetails.Quantity * products.PROD_Price AS Qprice, orderdetails.ACNTS_ID\n"
									      . "FROM orderdetails LEFT OUTER JOIN\n"
									      . " products ON orderdetails.PROD_ID = products.PROD_ID LEFT OUTER JOIN\n"
									      . " accounts ON orderdetails.ACNTS_ID = accounts.ACNTS_ID\n"
									      . " WHERE orderdetails.DatePurchased >= CURDATE() - INTERVAL 1 DAY AND orderdetails.ACNTS_ID = '$_SESSION[id]'";

									$stmt = mysqli_query( $con, $sql);
									while( $row = mysqli_fetch_array($stmt) ) { ?>

                    <?php
										echo "	<tr>\n";
										echo "	<td hidden>".$row['DET_ID']. "\n";
										echo "  <td align='center'> <img src=dbimg/".$row['PROD_Img'] ." alt='' border=3 height=150 width=150></img> &nbsp \n";
										echo "  <td align='center'>" . $row['PROD_Name']. "&nbsp \n";
										echo "  <td align='center'>" . $row['Quantity']. "&nbsp \n";
										echo "  <td align='right'>" . 'PHP' . $row['PROD_Price']. "&nbsp \n";
										echo "  <td align='right'>" . 'PHP' . $row['Qprice']. "&nbsp \n";
										echo "	<td>";
										?>

                    <form action="shoppingcartquery.php" method="POST" onsubmit="return confirm('Are you sure you want to change the quantity?')" ;>
                        <?php
								        	  echo "<td>" . "<input type=hidden name=hidden value='" . $row[6] . "' </td>";  
                                        echo "<td>" . "<button type='submit' name='ChangeQuantity'>" . "QTY" . "</button></td>";
									
										?>
                    </form>

                    <form action="shoppingcartquery.php" method="POST" onsubmit="return confirm('Are you sure you want to remove this item from the cart?');">
                        <?php
										  echo "<td>" . "<button type='submit' name='RemoveItemFromCart'>" . "Remove" . "</button></td>";
										  echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "' </td>";
								        echo "<td>" . "<input type=hidden name=hiddenqty value='" . $row[5] . "' </td>";
											echo "<td>" . "<input type=hidden name=hiddenprodid value='" . $row[6] . "' </td>";
										  echo "</form>";
										  echo "</tr>";
										}
										if( $stmt === false ) {
										   die( print_r( mysqli_connect_errno(), true));
										}
										mysqli_close($con);
										?>

                        </td>

                        <?php
									$con2=mysqli_connect("localhost","root","","orderingsystem");
									require ('test.php');
									$sum = "SELECT sum(orderdetails.Quantity * products.PROD_Price) as sum\n"
									. "FROM orderdetails LEFT OUTER JOIN\n"
									. " products ON orderdetails.PROD_ID = products.PROD_ID LEFT OUTER JOIN\n"
									. " accounts ON orderdetails.ACNTS_ID = accounts.ACNTS_ID\n"
									. " WHERE orderdetails.DatePurchased >= CURDATE() - INTERVAL 1 DAY AND orderdetails.ACNTS_ID = '$_SESSION[id]'";

									$sumstmt = mysqli_query( $con2, $sum);
									while( $row = mysqli_fetch_array($sumstmt) ) { ?>

                        <?php
									echo "	<tr>\n";
									echo "	<td colspan='3' align='right'  height='40px'>&nbsp;&nbsp;</td>";
									echo "	<td align='right'><strong>Total:</strong></td>";
									echo "	<td align='right' style='background:#ccc; font-weight:bold'>". 'PHP' . $row['sum'] . "</td>\n";
									echo "	<td></td><td></td>";
									?>
                        <form action="finalorder.php" method="POST" onsubmit="return confirm('Are you sure you want to Finalized the order?')" ;>
                            <td><input type="hidden" name="hiddentotal" value="<?php echo $row['sum'] ?>"></input></td>
                            <?php
									echo " 	<td><div class='checkout'><button type='submit' name='final' class='more'>Finalize Order</button></div></td>";
									echo "	</form>";
									echo "	</tr>\n";
									?>
                            <?php
								}
							if( $sumstmt === false ) {
										 die( print_r( mysqli_connect_errno(), true));
								}
								?>
                </table>

                <div style="float:right; width: 215px; margin-top: 20px;">
                    <!--<form action="finalorder.php" method="POST" onsubmit="return confirm('Are you sure you want to Finalized the order?')";>
              <div class="checkout"><button type="submit" name="final" class="more">Finalize Order</button></div>-->
                    <div class="cleaner h20"></div>
                    <div class="continueshopping"><a href="products.php"><button>Continue Shopping</button></a></div>
                </div>

            </div>
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
?>
