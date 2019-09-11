<!DOCTYPE html>
<?php include ('signup.php') ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Public Website">
    <meta name="author" content="Not Nice MNL">
    <!-- Add Your favicon here -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">

    <title>Sign-Up</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.min.css">
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
                            <span class="sr-only">Toggle navigation</span>s
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="nav navbar-left">
                        <a href="home.php#page-top" class="image-icon">
                            <img src="img/nn_logo.png" alt="Not Nice MNL Logo">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-justified">
                        <li><a href="home.php#page-top">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#features" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="signup.php" method="post">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <h1 class="text-center" style="font-family: New Times Roman;">BE A MEMBER OF THE <strong>NOT NICE</strong> SOCIETY</h1>
                <br>
                <p>Username:</p>
                <div class="form-group"><input class="form-control" type="texts" name="username" placeholder="Username" maxlength="6" required></div>
                <p>Password:</p>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" maxlength="25" required></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="signup">Sign Up</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Login -->
    <div id="modal" class="popupContainer" style="display:none;">
        <header class="popupHeader2">
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
                                <div class="one_half last"><input type="submit" name="Submit" VALUE="Login" class="btn btn_red"></div>
                            </center>
                            <center><a href="modalforgot.php" id="modal_trigger" class="forgot_password">Forgot password?</a></center>
                        </div>
                    </center>
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
        <header class="popupHeader2">
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

                <a href="modalforgot.php" id="modal_trigger" class="forgot_password">Forgot password?</a>

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
