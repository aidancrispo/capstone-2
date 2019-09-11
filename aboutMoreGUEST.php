<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <title>About Us</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
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

        function clearText(field) {
            if (field.defaultValue == field.value) field.value = '';
            else if (field.value == '') field.value = field.defaultValue;
        }

    </script>
</head>

<body id="about">

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
                <h1>Contact Us</h1>
            </center>
        </div>

        <div class="cleaner h20"></div>
        <div id="templatemo_main_top"></div>
        <div id="templatemo_main">


            <div id="contabout">

                <center>
                    <img src="img/nn_oflogo.jpg" height="150px" width="150px">
                    <img src="assets/img/nn_logo.png" height="100px" width="200px">
                </center>
                <div class="cleaner h20"></div>
                <div class="cleaner"></div>
                <blockquote>
                    <hr>
                    <center>
                        <h3>Company Details</h3>
                    </center>
                    <hr>
                    <b><u>ADDRESS:</u></b>
                    <ul>
                        <li>10 Ventura Street, Inner Circle, BF Homes, Las Piñas City, Philippines</li>
                    </ul>
                    <b><u>CONTACT DETAILS:</u></b>
                    <ul>
                        <li><b>Landline:</b> (+000)000000</li>
                        <li><b>Fax:</b> (+000)000000</li>
                    </ul>
                    <b><u>EMAILL ADDRESS:</u></b>
                    <ul>
                        <li>notnicemanila@yahoo.com</li>
                    </ul>
                    <b><u>BUSINESS PERMITS</u></b>
                    <ul>
                        <li><b>TIN:</b> 007 000 000 000 VAT</li>
                        <li><b>SEC:</b> CS201019848</li>
                    </ul>
                    <hr>
                    <center>
                        <h3>Message Us</h3>
                    </center>
                    <hr> 
                    <form role="form" id="contactForm" data-toggle="validator" class="form-horizontal" action="contactus.php" method="post">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="h4 col-sm-4" for="name">Name:</label>
                                <div class="col-sm-8">
                                    <input type="name" class="form-control" placeholder="Enter name" name="CUName" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email" class="h4 col-sm-2">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" placeholder="Enter email" name="CUEmail" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="connumber" class="h4 col-sm-4">Contact Number:</label>
                                <div class="col-sm-8">
                                    <input type="number" maxlength="11" class="form-control" placeholder="Enter contact number" name="CUContactNo" required data-error="NEW ERROR MESSAGE">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="message" class="h4 col-sm-2">Message:</label>
                                <div class="col-sm-10">
                                    <textarea style="width:500px;" class="form-control" rows="5" placeholder="Enter your message" name="CUMessages" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <center><button type="submit" id="form-submit" class="btn btn-success btn-lg" name="submitcontactus">Submit</button></center>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </form>

                </blockquote>
            </div>
        </div>
            <div class="cleaner"></div>
        

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
            <div class="col col_16" style="color:white;">
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
                                <label>Username</label>
                                <input type="text" name="Username" required />
                                <br />

                                <label>Password</label>
                                <input type="password" name="Password" required />
                                <br />

                                <div class="action_btns">
                                    <div class="one_half last"><input type="submit" name="Submit" VALUE="Login" class="btn btn_red"></div>
                                </div>
                            </form>

                            <a href="modalforgot.php" class="forgot_password">Forgot password?</a>
                        </div>
                    </section>
                </div>
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
