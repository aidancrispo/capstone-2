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

    <!-- Script for Popup Login -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/login.css" />
</head>

<body id="messages">

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

    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>


    <section id="features" class="container services">
    </section>

    <!--
Table Codes
 !-->

    <div>
        <h1>
            <center>Messages</center>
        </h1>

        <!-- Responsive table starts here -->
        <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
        <div class="table-responsive-vertical shadow-z-1">
            <!-- Table starts here -->
            <table id="table" class="table table-striped table-bordered table-hover table-mc-amber">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Concern</th>
                        <th>Order Number</th>
                        <th>Message</th>
                        <th>Date/Time Received</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
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
        // Since UID and PWD are not specified in the $connectionInfo array,
        // The connection will be attempted using Windows Authentication.

        $sql = "SELECT CU_ID, CU_Name, CU_Email, CU_ContactNo, CU_concern, CU_ordrnum, CU_Message, CU_DateTimeR, CU_Status from contactusmessages order by CU_ID DESC LIMIT $start_from,$per_page ";
        $stmt = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($stmt)) {
            echo "<tr>\n";
            echo "  <td>" . $row[0]. "\n";
            echo "  <td>" . $row[1]. "\n";
            echo "  <td>" . $row[2]. "\n";
            echo "  <td>" . $row[3]. "\n";
            echo "  <td>" . $row[4]. "\n";
            echo "  <td>" . $row[5]. "\n";
            echo "  <td>" . $row[6]. "\n";
            echo "  <td>" . $row[7]. "\n";
            echo "  <td>" . $row[8]. "\n";

        ?>
                    <form action="contactus.php" method="POST" onsubmit="return confirm('Resolved Status?');">
                        <?php
            echo "<td>" . "<button type='submit' name='ResolveCUMessages' class='btn btn_green'>" . "Resolve" . "</button>". "\n";
        ?>
                        <form action="contactus.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this Message?');">
                            <?php
            echo "<td>" . "<button type='submit' name='DeleteCUMessages' class='btn btn_red'>" . "Delete" . "</button>". "\n";
            echo "<input type=hidden name=hidden value='" . $row[0] . "'>";
            echo "</form>";

        }

        if( $stmt === false ) {
             die( print_r( mysqli_connect_errno(), true));
        }
        ?>
                            </td>
                </tbody>
            </table>
        </div>
    </div>
    <div style="background-color:grey">
        <?php
//Now select all from table
$query = "select * from contactusmessages";
$result = mysqli_query($con, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);
//Going to first page
echo "<center><a href='messages.php'>"."[First Page] " . "</a>";

for ($i=1; $i<=$total_pages; $i++) {
echo "<a href='messages.php?page=".$i."'>".$i."</a>";
echo " ";
};
// Going to last page
echo "<a href='messages.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
?>

    </div>
    <!-- End Code for Table !-->

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
    <script src="js/orderstable.js"></script>

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
