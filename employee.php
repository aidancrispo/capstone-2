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

    <title>Home - Employee</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/dashboardemp.css" rel="stylesheet">
    <!-- Script for Popup Login -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <style>
        body{
            background-color: black;
              background-repeat: no-repeat;
           background-size:cover;

        }
    </style>
</head>

<body id="Employee">

    <?php
    session_start();
    if (! empty($_SESSION['logged_in']))
  {
      ?>

    <?php
      $con=mysqli_connect("localhost","root","","orderingsystem");
      require ('test.php');

      $sqlacnt = "SELECT * \n"
            . "FROM accounts\n"
            . " WHERE ACNTS_ID = '$_SESSION[id]'";

      $stmtacnt = mysqli_query( $con, $sqlacnt);
      while( $row = mysqli_fetch_array($stmtacnt) ) {
        if($row['ACNTS_Role'] == 'Admin'){
          echo  ("<SCRIPT LANGUAGE='JavaScript'>
					    window.alert('You cannot access this because you are an Admin!')
							window.location.href='admin.php'
					    </SCRIPT>");
				}
				elseif ($row['ACNTS_Role'] == 'Employee'){
				}
				elseif ($row['ACNTS_Role'] == 'Customer'){
          echo  ("<SCRIPT LANGUAGE='JavaScript'>
					    window.alert('You cannot access this because you are a Customer!')
							window.location.href='products.php'
					    </SCRIPT>");
				}
        ?>

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
                        <a href="employee.php#page-top" class="image-icon">
                            <img src="img/nn_logo.png" alt="Not Nice MNL Logo">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-justified">
                        <li><a href="employee.php">Dashboard</a></li>
                          <li class="dropdown">
                            <a class="dropdown-toggle" href="home.php#features" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="active" href="productlist.php">Product List</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="product-inventory.php">Inventory</a></li>
                            </ul>
                        <li><a href="orders.php">Orders</a></li>
                        <li><a href="messages.php">Messages</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="editprofile(emp).php">Welcome, <font color="4077DE">
                                    <?php echo "$row[ACNTS_UName]"; ?></a></font>
                        </li>
                        <li><a href="logout.php">Signout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <?php
}

if( $stmtacnt === false ) {
   die( print_r( mysqli_connect_errno(), true));
}
?>

    <br><br><br>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Employee - Dashboard</h1>
                </div>
            </div>
        </div>
        </div>
    </header>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="employee.php" class="list-group-item active main-color-bg">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                        </a>
                        <?php
		  include('test.php');
		  $sql = "SELECT COUNT(PROD_ID) AS products From products";
		  $stmt = mysqli_query($con,$sql);
		  while ($row = mysqli_fetch_array($stmt)){
		  ?>
                        <a href="productlist.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Product List <span class="badge">
                                <?php echo $row[0] ?></span></a>

                        <?php }
		  mysqli_close($con);?>
                        <?php
		  include('test.php');
		  $sql = "SELECT COUNT(CU_ID) AS messages From contactusmessages";
		  $stmt = mysqli_query($con,$sql);
		  while ($row = mysqli_fetch_array($stmt)){
		  ?>
                        <a href="messages.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Messages <span class="badge">
                                <?php echo $row[0] ?></span></a>

                        <?php }
		  mysqli_close($con);?>
                        <?php
		  include('test.php');
		  $sql = "SELECT COUNT(PO_NO) AS orders From finalorders";
		  $stmt = mysqli_query($con,$sql);
		  while ($row = mysqli_fetch_array($stmt)){
		  ?>
                        <a href="orders.php" class="list-group-item"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Order List <span class="badge">
                                <?php echo $row[0] ?></span></a>
                    </div>
                    <?php }

		  mysqli_close($con);?>

                    <div class="well">
                        <h4>Options</h4>
                        <div class="container">
                            <div class="container">
                                <li><a href="editprofile(emp).php" font color="#ff0000">Edit Profile</a></li>
                                <li><a href="changepassword(emp).php" font color="#ff0000">Change Password</a></li>
                                <li><a href="assets/pdf/Employee%20Manual.pdf" font color="#ff0000" target="_blank">User Manual</a></li>
                            </div>
                        </div>
                        <h4></h4>
                        <div class="container">
                            <div class="progress-bar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Website Overview -->
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3 class="panel-title"> Overview</h3>
                        </div>
                        <div class="panel-body">

                            <div class="col-md-4">
                                <div class="well dash-box">
                                    <?php
                include('test.php');
                $sql = "SELECT COUNT(PO_NO) AS Orders FROM `finalorders`";
                $stmt = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_array($stmt)){
                ?>
                                    <h2><span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                                        <?php echo $row[0]; ?>
                                    </h2>
                                    <h4>Orders</h4>
                                    <?php
                }
                mysqli_close($con);
                 ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well dash-box">
                                    <?php
                include('test.php');
                $sql = "SELECT COUNT(CU_ID) AS logs FROM contactusmessages";
                $stmt = mysqli_query($con,$sql);
                while ($row = mysqli_fetch_array($stmt)){
                ?>
                                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        <?php echo $row[0]; ?>
                                    </h2>
                                    <h4>Messages</h4>
                                    <?php }
                mysqli_close($con); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 4,204</h2>
                                    <h4>Visitors</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Users
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Charts</h3>
            </div>
            <div class="panel-body">
					<dl>
				  <dt>
					Sold Products
				  </dt>
				  <?php
				  include('test.php');
				  $sql = "SELECT products.PROD_Category,ROUND(COUNT(finalorders.PO_NO) * 100 / (SELECT COUNT(*) AS count from finalorders)) AS roundedpercentage,(COUNT(finalorders.PO_NO) * 100 / (SELECT COUNT(*) AS count from finalorders)) AS percentage FROM finalorders LEFT OUTER JOIN products ON finalorders.PROD_ID = products.PROD_ID GROUP BY products.PROD_Category";
				  $stmt = mysqli_query($con,$sql);
				  while ($row = mysqli_fetch_array($stmt)) {
				  ?>
				  <dd class="percentage percentage-<?php echo $row[1] ?>"><span class="text"><?php echo $row[0] ?>: <?php echo $row[2] ?></span></dd>

				  <?php }
				  mysqli_close($con);
				  ?>
				  </dl>
            </div>
          </div> -->
                </div>
            </div>
        </div>
    </section>


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
    </section>

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

<?php
}
else
{
    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You are not logged in!')
            window.location.href='home.php#loginbtn'
            </SCRIPT>");
}
?>
