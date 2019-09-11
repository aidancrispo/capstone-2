<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>Women</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/login.css" />
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
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
</head>

<body id="products">

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
                        <a href="home.php#page-top" class="image-icon">
                            <img src="img/nn_logo.png" alt="Not Nice logo Logo">
                        </a>
                    </div>

                    <ul class="nav navbar-nav navbar-justified">
                        <li><a class="page-scroll" href="home.php#page-top">Home</a></li>


                        <li class="dropdown">
                            <a class="dropdown-toggle" href="productsGUEST.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="productMENGUEST.php">Men</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="productFEMALEGUEST.php">Women</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="productACESGUEST.php">Accessories</a></li>
                            </ul>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="home.php#aboutus" #aboutus data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About US
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="aboutMoreGUEST.php">Contact Us</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="termsandconditionsGUEST.php">Terms and Conditions</a></li>
                            </ul>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a id="modal_trigger" href="#modal">Login</a></li>
                        <li><a id="modal_trigger" href="registerpage.php">Signup</a></li>
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
                <h1>For Her</h1>
            </center>
        </div>
        <br>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">

            <div id="content">
                <!-- Products List Start -->
                <?php
include_once("config.php");
$per_page=6;

                    if (isset($_GET["page"])) {

                    $page = $_GET["page"];

                    }

                    else {

                    $page=1;

                    }

                    // Page will start from 0 and Multiple by Per Page
                    $start_from = ($page-1) * $per_page;
                
$results = $mysqli->query("SELECT  PROD_ID, PROD_Name, PROD_Price, PROD_InStock, PROD_Img FROM products  WHERE PROD_Category='Women' ORDER BY PROD_ID ASC LIMIT $start_from,$per_page");
if($results){
$products_item = '<ul class="products">';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
<li class="product">
<form method="post" action="addorder.php" onsubmit="return confirm('Add product?')";>
<div class="product-content"><h3><b>{$obj->PROD_Name}</b></h3>
<div class="product-thumb"><img border=3 height=250 width=200 src="dbimg/{$obj->PROD_Img}"></div>
<div class="product-info">InStock: {$obj->PROD_InStock}</div>
<div class="product-info">
Price {$currency}{$obj->PROD_Price}

</div></div>
</form>
<form method="post" action="viewitemGUEST.php">
	<br>
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
        $query = "select * from products WHERE PROD_Category='Women'";
        $result = mysqli_query($con, $query);

        // Count the total records
        $total_records = mysqli_num_rows($result);

        //Using ceil function to divide the total records on per page
        $total_pages = ceil($total_records / $per_page);
        //Going to first page
        echo "<center><a href='productFEMALEGUEST.php'>"."[First Page] " . "</a>";

        for ($i=1; $i<=$total_pages; $i++) {
        echo "<a href='productFEMALEGUEST.php?page=".$i."'>".$i."</a>";
        echo " ";
        };
        // Going to last page
        echo "<a href='productFEMALEGUEST.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
        ?>
                </div>
                <!-- Products List End -->

            </div> <!-- END of content -->
            <div class="cleaner"></div>
        </div> <!-- END of main -->

        <div id="templatemo_footer">
            <div class="col col_16">
                <h4>Categories</h4>
                <ul class="footer_menu">
                    <li><a href="productMENGUEST.php">Men</a></li>
                    <li><a href="productFEMALEGUEST.php">Women</a></li>
                    <li><a href="productACESGUEST.php">Accessories</a></li>
                    <li><a href="productsGUEST.php">All Products</a></li>
                </ul>
            </div>
            <div class="col col_16">
                <h4>Pages</h4>
                <ul class="footer_menu">
                    <li><a href="home.php#page-top">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="aboutMoreGUEST.php">About Us</a></li>
                    <li><a href="termsandconditionsGUEST.php">Terms and Conditions</a>
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

            </center>
            <br />
            <center>
                <strong>Capstone Project II - Aidan Crispo, Ralph Bill Reyes , Luis Buenaventura and Shem De Leon<br /></strong><br />
            </center>
        </div> <!-- END of footer -->

    </div>

    <!-- Login -->
    <div id="modal" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">
            <!-- Username & Password Login form -->
            <div class="user_login">
                <form action="homelogin.php" method="post">
                    <center>
                        <label>Username</label>
                        <input type="text" name="Username" required />
                        <br />

                        <label>Password</label>
                        <input type="password" name="Password" required />
                        <br />

                        <div class="action_btns">
                            <center>
                                <div class="one_half last"><input type="submit" name="LoginTandCGuest" VALUE="Login" class="btn btn_red"></div>
                        </div>
                    </center>
                </form>

                <center><a href="modalforgot.php" id="modal_trigger" class="forgot_password">Forgot password?</a>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        $("#modal_trigger").leanModal({
            top: 150,
            overlay: 0.6,
            closeButton: ".modal_close"
        });

    </script>

</body>

</html>
