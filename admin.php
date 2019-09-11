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

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.min.css" rel="stylesheet">

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- Script for Popup Login -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/login.css" />
</head>
<style>
    body{
            background-image:url(img/not-nice-background.png);
              background-repeat: no-repeat;
           background-size:cover;
            color: #000;

        }
    </style>

<body id="page-top">

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
      }
      elseif ($row['ACNTS_Role'] == 'Employee'){
        echo  ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You cannot access this because you are an Employee!')
            window.location.href='employee.php'
            </SCRIPT>");
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
                        <a href="admin.php#page-top" class="image-icon">
                            <img src="img/nn_logo.png" alt="Not Nice MNL Logo">
                        </a>
                    </div>
                    <ul class="nav navbar-nav navbar-justified">
                        <li class="active"><a class="active" href="#page-top">Dashboard</a></li>
                        <li><a class="page-scroll" href="Accounts.php">Accounts</a></li>
                        <li><a class="page-scroll" href="logs.php">Audit Logs</a></li>
                        <li><a class="page-scroll" href="../NNMNL/admin/report_page.php">Reports</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="admin.php">Welcome, <font color="red">
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
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin - Dashboard</h1>
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
                        <a href="admin.php" class="list-group-item active main-color-bg">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                        </a>
                        <?php
              include('test.php');
              $sql = "SELECT COUNT(ACNTS_ID) AS Users FROM `accounts`";
              $stmt = mysqli_query($con,$sql);
              while ($row = mysqli_fetch_array($stmt)){
              ?>
                        <a href="accounts.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class='badge'>
                                <?php echo $row[0]; ?></span></a>
                    </div>
                    <div class="well">
                        <h4>Options</h4>
                        <div class="container">
                            <div class="container">
                                <li><a href="editprofile(admin).php">Edit Profile<font color="4077DE"></a></font>
                                </li>
                                <li><a href="changepassword(admin).php">Change Password<font color="4077DE"></a></font>
                                </li>
                                <li><a href="assets/pdf/Admin%20Manual.pdf" target="_blank">User Manual<font color="4077DE"></a></font>
                                </li>
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
                            <h3 class="panel-title">Overview</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="well dash-box">

                                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <?php echo $row[0]; ?>
                                    </h2>
                                    <h4>Users</h4>
                                    <?php }
                    mysqli_close($con) ?>
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <?php
                    include('test.php');
                    $sql = "SELECT COUNT(logID) AS logs FROM logs";
                    $stmt = mysqli_query($con,$sql);
                    while ($row = mysqli_fetch_array($stmt)){
                    ?>
                                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        <?php echo $row[0]; ?>
                                    </h2>
                                    <h4>Edits</h4>
                                    <?php }
                    mysqli_close($con); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 4204 </h2>
                                    <h4>Visitors</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Users -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Latest Logs</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table2 table-striped table-hover">
                                <tr>
                                    <th>Username</th>
                                    <th>Action</th>
                                    <th>Date Modified</th>
                                </tr>
                                <?php
                      $con=mysqli_connect("localhost","root","","orderingsystem");
                      require ('test.php');
                      $sql = "SELECT accounts.ACNTS_UName, logs.logdesc , logs.DateModified FROM logs LEFT OUTER JOIN accounts ON logs.ACNTS_ID = accounts.ACNTS_ID ORDER BY logID DESC LIMIT 10  ";
                      $stmt = mysqli_query($con,$sql);
                      while( $row = mysqli_fetch_array($stmt) ) {
                         echo "<tr>\n";
                         echo "  <td>" . $row[0]. "\n";
                         echo "  <td>" . $row[1]. "\n";
                         echo "  <td>" . $row[2]. "\n";
                         echo "</tr>"; }
                      mysqli_close($con);
                      ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <br><br>

    </section>

    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/login.js"></script>
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
