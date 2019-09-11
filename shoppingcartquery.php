<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>Edit Quantity</title>
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

<body id="checkout">
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

        <div id="templatemo_middle">
            <center>
                <h1>Checkout - Edit Quantity</h1>
            </center>
        </div> <!-- END of middle -->

        <?php
		}

		if( $stmtacnt === false ) {
				 die( print_r( mysqli_connect_errno(), true));
		}
			?>

        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">
            <div id="contqua">
                <header class="popupHeader">
                    <center><span class="header_title">
                            <h1>Edit Quantity</h1>
                        </span></center>
                </header>
                <?php
          if (isset($_POST['RemoveItemFromCart'])){
            require ('test.php');
            $con=mysqli_connect("localhost","root","","orderingsystem");
            $DeleteQuery = "DELETE FROM orderdetails WHERE DET_ID ='$_POST[hidden]'";
            mysqli_query($con,$DeleteQuery);
						$UpdateQuery = "UPDATE products SET PROD_InStock=PROD_InStock + '$_POST[hiddenqty]' WHERE PROD_ID='$_POST[hiddenprodid]'";
			 			mysqli_query($con,$UpdateQuery);
            echo ("<SCRIPT LANGUAGE='JavaScript'>
              window.alert('Item Removed Successfully!')
              window.location.href='checkout.php'
              </SCRIPT>");
          }
          if (isset($_POST['ChangeQuantity'])){
          $con=mysqli_connect("localhost","root","","orderingsystem");
          require ('test.php');
          $query = mysqli_query($con,"SELECT orderdetails.DET_ID, products.PROD_Name, products.PROD_Price,accounts.ACNTS_ID,accounts.ACNTS_UName, orderdetails.DatePurchased, orderdetails.Quantity, products.PROD_ID, products.PROD_Img, products.PROD_InStock, orderdetails.Quantity * products.PROD_Price AS Qprice FROM orderdetails LEFT OUTER JOIN products ON orderdetails.PROD_ID = products.PROD_ID LEFT OUTER JOIN accounts ON orderdetails.ACNTS_ID = accounts.ACNTS_ID WHERE products.PROD_ID='$_POST[hidden]'");
          $row = mysqli_fetch_array($query);

          ?>
                <section class="popupBody">
                    <div class="user_login">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <?php echo "<center><img src=dbimg/".$row['PROD_Img']." alt='' border=3 height=80 width=80></img></center>'"; ?>
                            <center><label><b>Product Name:</b></label>
                                <?php echo $row['PROD_Name']; ?>
                                <br /><br />
                                <center><label><b>In Stock:</b></label>
                                    <?php echo $row['PROD_InStock']; ?>
                                    <br /><br />
                                    <label><b>Quantity:</b></label>
                                    <input type="hidden" name="origqty" value="<?php echo $row['Quantity']?>" />
                                    <input type="number" min="1" max="10" name="Quantity" style="text-align:right;" value="<?php echo $row['Quantity']; ?>" />
                                    <input type="hidden" name="hiddenid" value="<?php echo $row['DET_ID'] ?>" />
                                    <input type="hidden" name="hiddenprods" value="<?php echo $row['PROD_ID'] ?>" />
                                    <br /><br />
                                    <label><b>Price per unit:</b></label>
                                    <?php echo $row['PROD_Price']; ?>
                                    <br />
                                    <br />
                                    </table>
                                    <div class="action_btns">
                                        <div class="one_half last"><button type="submit" name="Editqty">Edit</button>
                        </form>
                        <a href="checkout.php"><button type="submit" name="CancelEditQty">Cancel</button>
                    </div>
                    </center>
            </div>
        </div>
        </section>
        <?php }
          ?>
        <script src="js/login.js"></script>

        <div class="cleaner"></div>

    </div> <!-- END of main -->

    <div id="templatemo_footer">
        <div class="col col_16">
            <h4>Categories</h4>
            <ul class="footer_menu">
                <li><a href="productMEN.php">Male</a></li>
                <li><a href="productFEMALE.php">Women</a></li>
                <li><a href="productACES.php">Accessories</a></li>
                <li><a href="products.php">All Products</a></li>
            </ul>
        </div>
        <div class="col col_16">
            <h4>Pages</h4>
            <ul class="footer_menu">
                <li><a href="home.php#page-top">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="aboutMore.php">About Us</a></li>
                <li><a href="home.php#contactus">Contact Us</a></li>
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
