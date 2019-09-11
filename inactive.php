
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

    <title>Inactive List</title>

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
<body id="inactive">

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
          window.alert('You cannot access this because you are an Admin!')
          window.location.href='admin.php'
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
                            <li><a class="page-scroll" href="Admin.php">Dashboard</a></li>
                            <li><a class="active" href="accounts.php">Accounts</a></li>
                            <li><a class="page-scroll" href="logs.php">Audit Logs</a></li>
                            <li><a class="page-scroll" href="../NNMNL/admin/report_page.php">Reports</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="editprofile(admin).php">Welcome, <font color=red><?php echo "$row[ACNTS_UName]"; ?></a></font></li>
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

<div class="productsbg">
<section  class="container features">

    <br>
</section>
</div>

<br><br><br><br>

<div class="container">
  <div class="col-md-2">
    <div class="list-group">
      <a href="accounts.php" class="list-group-item ">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Active
      </a>
      <a href="inactive.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Inactive Employee <span class='badge'></span></a>
      <a href="inactive(cust).php" class="list-group-item "><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Inactive Customers <span class='badge'></span></a>
    </div>


  </div>
  <div class="col-md-10">
    <div class="accounts">
        <br>

        <h1 class="accountstext">Inactive Employees</h1>

        <div id="table" class="table-editable">
            <table class="table">
                <tr>
                    <th>Accounts ID</th>
                    <th>UserName</th>
                    <th>Employee Name</th>
                    <th>Status</th>
                    <th>Date Inactivated</th>
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
                    $sql = "SELECT accounts.ACNTS_ID,accounts.ACNTS_UName,employee.EMP_Name,accounts.ACNTS_Status,accounts.Date_Inactive FROM employee LEFT JOIN accounts on employee.ACNTS_ID = accounts.ACNTS_ID \n"
                    . " WHERE (accounts.ACNTS_Role = 'Employee' or accounts.ACNTS_Role = 'Admin') and accounts.ACNTS_Status = 'Inactive' LIMIT $start_from,$per_page";
                    $stmt = mysqli_query( $con, $sql);
                    while( $row = mysqli_fetch_array($stmt) ) { ?>

                      <?php
                    	  echo "  <tr>\n";
                        echo "  <td>" . $row[0]. "\n";
                    	  echo "  <td>" . $row[1]. "\n";
                    	  echo "  <td>" . $row[2]. "\n";
                    	  echo "  <td>" . $row[3]. "\n";
                        echo "  <td>" . $row[4]. "\n";
                        echo "	<td>\n";
                      ?>
                      <form action="active.php" method="POST" onsubmit="return confirm('Are you sure you want to activate this account?');">
                      <?php
                        echo "<td>" . "<button type='submit' name='Activate' class='btn btn_maroon'>" . "Activate" . "</button>"."</td>\n";
                        echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "'"."</td>";
                        echo "</form>";
                      ?>
                      <?php

                    }
                  if( $stmt === false ) {
                         die( print_r( mysqli_connect_errno(), true));
                    }

                    ?>

                    </td>
            </table>
  

        <?php
        //Now select all from table
        $query = "select * from employee";
        $result = mysqli_query($con, $query);

        // Count the total records
        $total_records = mysqli_num_rows($result);

        //Using ceil function to divide the total records on per page
        $total_pages = ceil($total_records / $per_page);
        //Going to first page
        echo "<center><a href='inactive.php'>"."[First Page] " . "</a>";

        for ($i=1; $i<=$total_pages; $i++) {
        echo "<a href='inactive.php?page=".$i."'>".$i."</a>";
        echo " ";
        };
        // Going to last page
        echo "<a href='inactive.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
        ?>
</div>
        </div>

  <script type="text/javascript">
      $("#modal_trigger2").leanModal({top : 120, overlay : 0.6, closeButton: ".modal_close" });
  </script>
  <script type="text/javascript">
      $("#modal_trigger1").leanModal({top : 120, overlay : 0.6, closeButton: ".modal_close" });
  </script>

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
