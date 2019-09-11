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
    <script>
        location.hash = (location.hash) ? location.hash : " ";

    </script>
    <title>Not Nice MNL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />

    <link type="text/css" rel="stylesheet" href="css/login.css" />
</head>
<style>

    * {
  box-sizing: border-box;
}

.zoom {
  padding: 50px;
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.2);
  -webkit-transform: scale(1.2); 
  transform: scale(1.2); 
}
.imghover {
  -webkit-filter: brightness(70%) contrast(90%); 
}
.imghover:hover {
  -webkit-filter: contrast(120%); 
}  
</style>

<body id="page-top">
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
                            <a class="dropdown-toggle" href="home.php#features" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
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

    <div>
        <div class="header-blue">
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">

                        <h1> Party apparel to desire</h1>
                        <p>Sign up for free and join the <b>Not Nice Community</b></p><a href="registerpage.php"><button class="btn btn-light btn-lg action-button" type="button">SHOP NOW</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="aboutus" class="gray-section team">
        <div class="features-boxed">
            <div class="container">
                <div class="intro">
                    <h2 class="text-center"><u>ABOUT US</u></h2>
                </div>
                <div class="row justify-content-center features">
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box" style="background-image: url(assets/img/image_part_001.jpg); background-repeat: no-repeat; background-size: cover;"><i>
                                <img class="zoom" src="assets/img/nn_icon.png" width="300px" height="300px"></i>
                            <br><br>
                            <h3 class="name">WHAT ARE WE</h3>

                            <p class="description text">We love clothing and we want convenience for our customers so we started so we started up our online shoppping business. Our business started with pre love clothing and dri fit clothing. But we will soon be having our very own products.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box" style="background-image: url(assets/img/image_part_002.jpg); background-repeat: no-repeat; background-size: cover;"><i><img class="zoom" src="assets/img/doit_icon.png" width="300px" height="300px"></i>
                            <br><br>
                            <h3 class="name">HOW WE DO IT</h3>
                            <p class="description">We want to make fashion sustainable and sustainability fashionable. The commitment of our employees is key to our success. We are dedicated to creating a better fashion future and we use our size and scale to drive development towards a more circular, fair and equal fashion industry.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4 item">
                        <div class="box" style="background-image: url(assets/img/image_part_003.jpg); background-repeat: no-repeat; background-size: cover;"><i><img class="zoom" src="assets/img/strat_icon.png" width="300px" height="300px"></i>
                            <br><br>
                            <h3 class="name">VISION AND STRATEGY</h3>
                            <p class="description">Looking good should do good too. That’s what our sustainability work is all about. To make sure our customers wear our products with pride we have to be conscious in all our actions.</p><br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- GALLERY -->
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><u>NOT NICE GALLERY</u></h2>
                <p class="text-center">Wear and Share your Not Nice Apparel online and use the hashtag <b>#JoinTheMovement #Qualitee and #NotNiceMNL.</b></p>
            </div>
            <div class="row photos">
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo1.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo2.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo3.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo4.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo9.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo6.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo7.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo10.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo8.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo5.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo12.jpg"></div>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><img class="img-fluid imghover" src="assets/img/photo11.jpg"></div>

            </div>
        </div>
    </div>
    <div class="productsbg">
        <section class="container features">
            <div class="row">
                <div id="features" class="col-md-12 text-center">
                    <div class="navy-line"></div>
                    <h1><u>PRODUCTS</u><br /> <span class="navy"></span> </h1>

                    <div class="col-md-6 text-center wow fadeInLeft">
                        <a href="productMENGUEST.php"><img class="productsicons zoom" src="img/man.png" alt="Mens Clothes" class="image-order">
                           <a href="productMENGUEST.php"><button class="btn btn-light btn-lg action-button" type="button">SHOP FOR MEN</button></a>
                        </a>
                    </div>

                    <div class="col-md-6 text-center wow fadeInRight">

                        <a href="productFEMALEGUEST.php"><img class="productsicons zoom" src="img/woman.png" alt="Womens Clothes" class="image-order">
                            <a href="productFEMALEGUEST.php"><button class="btn btn-light btn-lg action-button" type="button">SHOP FOR WOMEN</button></a>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>


    <br>

    <div class="copyright">


        <div class="row">

            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <center>
                    <a href="https://www.facebook.com/NotNiceMnl/" target="_blank" title="Facebook">
                        <img src="images/facebook.png" height="40px" width="40px">
                    </a>

                    <a href="https://www.instagram.com/notnicemnl/" target="_blank" title="Instagram">
                        <img src="images/instagram.png" height="40px" width="40px">
                    </a>
                    <a href="assets/pdf/Customer%20Manual.pdf" target="_blank" title="User Manual">
                        <img src="images/manual.png" height="40px" width="40px">
                    </a>

                </center>
                <br />
                <strong>Capstone Project II - Aidan Crispo, Ralph Bill Reyes , Luis Buenaventura and Shem De Leon<br /></strong><br />


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
                                        <div class="one_half last"><input type="submit" name="Submit" VALUE="Login" class="btn btn_red"></div>
                                    </div>
                                </center>
                            </form>

                            <a href="modalforgot.php" class="forgot_password">Forgot password?</a>
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
                <div id="modalforgot" class="popupContainer" style="display:none;">
                    <header class="popupHeader">
                        <span class="header_title">Forgot Password</span>
                        <span class="modal_close"><i class="fa fa-times"></i></span>
                    </header>

                    <section class="popupBody">
                        <!-- Username & Password Login form -->
                        <div class="user_login">
                            <form action="forgot.php" method="post">
                                <label>Username</label>
                                <input type="text" name="Username" required />
                                <br />

                                <label>Email</label>
                                <input type="email" name="email" required />
                                <br />
                                <div class="action_btns">
                                    <div class="one_half last"><input type="submit" name="Submit" VALUE="Login" class="btn btn_red"></div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>

                <script type="text/javascript">
                    $("#modal_trigger").leanModal({
                        top: 200,
                        overlay: 0.6,
                        closeButton: ".modal_close"
                    });

                </script>

            </div>
        </div>
        <script>
            $('.dropdown-toggle').click(function(e) {
                if ($(document).width() > 768) {
                    e.preventDefault();

                    var url = $(this).attr('href');


                    if (url !== '#') {

                        window.location.href = url;
                    }

                }
            });

        </script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/inspinia.js"></script>
        <script src="js/pace.min.js"></script>
    </div>
</body>

</html>
