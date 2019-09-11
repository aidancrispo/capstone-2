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

    <title>Forgot Password</title>

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

<body id="forgotpassword">
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
    <br><br><br>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">
                        <center>Forgot Password</center>
                    </h4>
                    <hr>
                </div>
                <div class="content">
                    <form method="post" action="homelogin.php">
                        <div class="row">
                            <div class="text-center">
                                <div class="form-group">
                                    <label>Username
                                        <input type="texts" class="form-control" name="username" required placeholder="Username"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center">
                                <div class="form-group">
                                    <label>Account ID
                                        <input type="number" min="0" class="form-control" name="id" required placeholder="Account ID"></label>
                                </div>
                            </div>
                        </div>

                        <center><button type="submit" class="btn btn-info btn-fill" name="Checkpassword">Send</button></center>
                        <div class="clearfix"></div>
                        <hr>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <br>

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
                        <center>
                            <div class="one_half last"><input type="submit" name="Submit" VALUE="Login" class="btn btn_red"></div>
                        </center>
                        <center><a href="home.php#contactus" id="modal_trigger" class="forgot_password">Forgot password?</a></center>
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

                <a href="home.php#contactus" id="modal_trigger" class="forgot_password">Forgot password?</a>
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

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/accountstable.js"></script>
</body>

</html>
