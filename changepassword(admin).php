
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

    <title>Change Password </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
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
<body id="Welcome">
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
                       <li class = "active"><a class="active" href="#page-top">Dashboard</a></li>
                        <li><a class="page-scroll" href="Accounts.php">Accounts</a></li>
                        <li><a class="page-scroll" href="logs.php">Audit Logs</a></li>
                           <li><a class="page-scroll" href="../NNMNL/admin/report_page.php">Reports</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="editprofile(admin).php" class="active">Welcome, <font color="red"><?php echo "$row[ACNTS_UName]"; ?></a></font></li>
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

<br><br><br><br>

<!--
Table Codes
 !-->
<div class="container">
<div class="row">

  <div class="col-md-2">
    <div class="list-group">
      <a href="editprofile(admin).php" class="list-group-item ">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Edit Profile
      </a>
      <a href="changepassword(admin).php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Change Password <span class='badge'></span></a>
    </div>
  </div>

      <div class="col-md-8">
          <div class="card">
              <div class="header">
                  <h4 class="title">Change Password</h4>
              </div>
              <div class="content">
                  <form  method="post" action="profile.php">
                      <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Current Password</label>
                                  <input type="password" class="form-control" name="current" required placeholder="Current Password" >
                              </div>
                          </div>
                      </div>
                      <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>New Password</label>
                                  <input type="password" class="form-control" name="new" required placeholder="New Password" >
                              </div>
                          </div>
                      </div>
                      <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                  <label>Confirm Password</label>
                                  <input type="password" class="form-control" name="confirm" required placeholder="Confirm Password" >
                              </div>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-info btn-fill pull-left" name="UpdateAdminPw">Change Password</button>
                      <div class="clearfix"></div>
                  </form>
              </div>
          </div>
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

<?php
}
else
{
    echo 'You are not logged in. <a href="login.php">Click here</a> to log in.';
}
?>
