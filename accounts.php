
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

    <title>Accounts</title>

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
<style>
        body{
            background-image:url(img/not-nice-background.png);
              background-repeat: no-repeat;
           background-size:cover;

        }
    </style>
<body id="Accounts">
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
                        <li class = "active"><a class="active" href="admin.php"#page-top>Dashboard</a></li>
                        <li><a class="page-scroll" href="Accounts.php">Accounts</a></li>
                        <li><a class="page-scroll" href="logs.php">Audit Logs</a></li>
                           <li><a class="page-scroll" href="../NNMNL/admin/report_page.php">Reports</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="editprofile(admin).php">Welcome, <font color="red"><?php echo "$row[ACNTS_UName]"; ?></a></font></li>
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
  <div class="col-md-2">
    <div class="list-group">
      <a href="accounts.php" class="list-group-item active main-color-bg">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Active
      </a>
      <a href="inactive.php" class="list-group-item "><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Inactive Employee<span class='badge'></span></a>
      <a href="inactive(cust).php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>   Inactive Customers <span class='badge'></span></a>
    </div>


  </div>
  <div class="col-md-10">
    <div class="accounts">
        <br>
        <h1 class="accountstext">Manage Accounts</h1>
        <div id="table" class="table-editable">
            <table class="table">
                <tr>
                    <th>Accounts ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th></th>
                    <form action="tableaccounts.php" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
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
                    $sql = "SELECT * from accounts WHERE ACNTS_Status = 'Active' LIMIT $start_from,$per_page";
                    $stmt = mysqli_query( $con, $sql);
                    while( $row = mysqli_fetch_array($stmt) ) { ?>

                      <?php
                    	  echo "<tr>";
                        echo "  <td>" . $row[0]. "\n</td>";
                    	  echo "  <td>" . $row[1]. "\n</td>";
                    	  echo "  <td>" . $row[3]. "\n</td>";
                        echo "</form>";
                      ?>
                        <form action="passwordconfirm.php"method="POST" onsubmit="return confirm('Are you sure you want to reset the password?');">
                      <?php
                      echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "' </td>";
                        echo "<td style='width:1px'>" . "<button type='submit' name='Reset' class='btn btn_yellow'>" . "Reset Password" . "</button></td>";
                      ?>
                        </form>
                        <form action="passwordconfirmdelete.php"method="POST" onsubmit="return confirm('Are you sure you want to deactivate this account?');">
                      <?php
                        echo "<td style='width:1px'>" . "<button type='submit' name='Delete' class='btn btn_red'>" . "Deactivate" . "</button></td>";
                        echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "' </td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                  if( $stmt === false ) {
                         die( print_r( mysqli_connect_errno(), true));
                    }
                    $query = "select * from accounts";
                    $result = mysqli_query($con, $query);

                    // Count the total records
                    $total_records = mysqli_num_rows($result);

                    //Using ceil function to divide the total records on per page
                    $total_pages = ceil($total_records / $per_page);
                    //Going to first page
                    echo "<center><a href='accounts.php'>"."[First Page] " . "</a>";

                    for ($i=1; $i<=$total_pages; $i++) {
                    echo "<a href='accounts.php?page=".$i."'>".$i."</a>";
                    echo " ";
                    };
                    // Going to last page
                    echo "<a href='accounts.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
                    mysqli_close($con);
                    ?>
                    </td>
            </table>
        </div>
        </div>
      </div>
<!-- End Code for Table !-->
<!--            <div class="accountstext">
                <button id="export-btn" class="btn btn-primary">Export Data</button>
                <p id="export"></p>
                <br>
            </div> !-->
            <div class="col-lg-8 col-lg-offset-3 text-center m-t-lg m-b-lg">
            <a id="modal_trigger1" href="#modal" class="moreinfo"><button type="submit" class="btn btn_maroon btn-lg">Add Account</button></a>
            <div id="modal" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                    <span class="header_title">Add Account</span>
                    <span class="modal_close"><i class="fa fa-times"></i></span>
                </header>

                <section class="popupBody">
                    <!-- Username & Password Login form -->
                    <div class="user_login">
                        <form action="tableaccounts.php" method="post">
                            <label>Username</label>
                            <input type="text" name="Username"/>
                            <br />
                            <label>Password</label>
                            <input type="password" name="Password" />
                            <br />
                            <label>Name</label>
                            <input type="text" name="name" />
                            <br />
                            <label> Role </label>
                            <select name="Role">
                              <option value="Admin">Admin</option>
                              <option value="Employee">Employee</option>
                              <option value="Customer">Customer</option>
                            </select>
                            <br />
                            <br>
                            <div class="action_btns">
                                <div class="one_half last"><button type="submit" name="Add" class="btn btn_red">Add</button></div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
    </div>
  </div>

  <script type="text/javascript">
      $("#modal_trigger1").leanModal({top : 120, overlay : 0.6, closeButton: ".modal_close" });
  </script>

<br>

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
}
?>
