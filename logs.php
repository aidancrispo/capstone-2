
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

    <title>Logs</title>

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
                        <li class = "active"><a class="active" href="#page-top">Dashboard</a></li>
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

  <div class="col-md-12">
    <div class="accounts">
        <br>
        <h1 class="accountstext">Logs</h1>
        <div id="table" class="table-editable">
            <table class="table">
                <tr>
                    <th>Account Name</th>
                    <th>Description</th>
                    <th>Date Modified</th>
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
              $sql = "SELECT accounts.ACNTS_UName, logs.logdesc , logs.DateModified FROM logs LEFT OUTER JOIN accounts ON logs.ACNTS_ID = accounts.ACNTS_ID ORDER BY logs.logID DESC LIMIT $start_from,$per_page";
                $stmt = mysqli_query( $con, $sql);
                while( $row = mysqli_fetch_array($stmt) ) { ?>

                  <?php
                    echo "  <tr>\n";
                    echo "  <td>" . $row[0]. "\n";
                    echo "  <td>" . $row[1]. "\n";
                    echo "  <td>" . $row[2]. "\n";
                    echo "	<td>\n";

                }
              if( $stmt === false ) {
                     die( print_r( mysqli_connect_errno(), true));
                }

                ?>

                </td>
        </table>
        
            <?php

    //Now select all from table
    $query = "select * from logs";
    $result = mysqli_query($con, $query);

    // Count the total records
    $total_records = mysqli_num_rows($result);

    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);
    //Going to first page
    echo "<center><a href='logs.php'>"."[First Page] " . "</a>";

    for ($i=1; $i<=$total_pages; $i++) {
    echo "<a href='logs.php?page=".$i."'>".$i."</a>";
    echo " ";
    };
    // Going to last page
    echo "<a href='logs.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
    ?>
        
    </div>
</div>



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
