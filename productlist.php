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

    <title>Products</title>

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

<body id="productlist">

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
                                <li><a class="active" href="#productlist.php">Product List</a></li>
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

    <div class="productsbg">
        <section class="container features">

            <br>
        </section>
    </div>

    <br><br>
    <div class="container">
        <div class="accounts">
            <br>
            <h1 class="accountstext">Product List</h1>
            <div class="text-center">
                <label>&nbsp Product Name: &nbsp</label>
                <input style="width: 160px; border-radius: 25px; border: 2px solid #808080;" type="text" id="myInput6" onkeyup="myFunction6()" placeholder="&nbsp Search for Product Name">
            </div>
            <br>

            <div id="table" class="table-editable">

                <table class="table">

                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>InStock</th>
                        <th>Product Image</th>
                    </tr>
                    <?php
                    $con=mysqli_connect("localhost","root","","orderingsystem");
                    require ('test.php');
                    $per_page=10;

                    if (isset($_GET["page"])) {

                    $page = $_GET["page"];

                    }

                    else {

                    $page=1;

                    }

                    // Page will start from 0 and Multiple by Per Page
                    $start_from = ($page-1) * $per_page;

                    $sql = "SELECT * from products ORDER BY PROD_ID DESC LIMIT $start_from,$per_page ";
                    $stmt = mysqli_query( $con, $sql);
                    while( $row = mysqli_fetch_array($stmt) ) { ?>

                    <?php
                    	  echo "  <tr>\n";
                        echo "  <td>" . $row['PROD_ID']. "\n";
                    	  echo "  <td>" . $row['PROD_Name']. "\n";
                        echo "  <td>" . $row['PROD_Description']. "\n";
                    	  echo "  <td>" . $row['PROD_Price']. "\n";
                    	  echo "  <td>" . $row['PROD_Category']. "\n";
                        echo "  <td>" . $row['PROD_InStock']. "\n";
                        echo "  <td> <img src=dbimg/".$row['PROD_Img'] ." alt='' border=3 height=80 width=80></img>\n";
                        echo "	<td>\n";
                      ?>
                    <form action="edit.php" method="POST" onsubmit="return confirm('Are you sure you want to replace the image of this product?');">
                        <?php
                        echo "<td>" . "<button type='submit' name='UpdateImage' class='btn btn_maroon'>" . "Update Image" . "</button>"."</td>\n";
                        echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "'"."</td>";
                        echo "</form>";
                      ?>
                        <form action="edit.php" method="POST" onsubmit="return confirm('Are you sure you want to edit this product?');">
                            <?php
                        echo "<td>" . "<button type='submit' name='Edit' class='btn btn_green'>" . "Edit" . "</button>"."</td>\n";
                        echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "'"."</td>";
                        echo "</form>"
                      ?>
                            <form action="upload.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                <?php
                        echo "<td>" . "<button type='submit' name='Delete' class='btn btn_red'>" . "Delete" . "</button>"."</td>\n";
                        echo "<td>" . "<input type=hidden name=hidden value='" . $row[0] . "'". "</td>";
                        echo "</form>";
                    }
                  if( $stmt === false ) {
                         die( print_r( mysqli_connect_errno(), true));
                    }

                    ?>

                                </td>
                </table>
            </div>
        </div>

        <div style="background-color: grey;">
            <?php

        //Now select all from table
        $query = "select * from products";
        $result = mysqli_query($con, $query);

        // Count the total records
        $total_records = mysqli_num_rows($result);

        //Using ceil function to divide the total records on per page
        $total_pages = ceil($total_records / $per_page);
        //Going to first page
        echo "<center><a href='productlist.php'>"."[First Page] " . "</a>";

        for ($i=1; $i<=$total_pages; $i++) {
        echo "<a href='productlist.php?page=".$i."'>".$i."</a>";
        echo " ";
        };
        // Going to last page
        echo "<a href='productlist.php?page=$total_pages'>".' [Last Page]'."</a></center> ";
        ?>

        </div>

        <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">

            <a id="modal_trigger2" href="#modal" class="moreinfo"><button type="submit" class="btn btn_maroon btn-lg">Add Product</button></a>

            <div id="modal" class="popupContainer" style="display:none;">
                <header class="popupHeader">
                    <span class="header_title">Add Product</span>
                    <span class="modal_close"><i class="fa fa-times"></i></span>
                </header>

                <section class="popupBody">
                    <div class="user_login">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <label>Product Name</label>
                            <input type="text" name="Name" required />
                            <br />
                            <label>Product Description</label>
                            <input type="text" name="Desc" required />
                            <br />
                            <label>Price</label>
                            <input type="number" name="Price" min="1" required />
                            <br />
                            <br />
                            <label> Category </label>
                            <select name="Category">
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="Accessories">Accessories</option>
                            </select>
                            <br />
                            <br />
                            <label> Upload Image </label>
                            <center><input type="file" name="image" style="margin-left: 100px" /></center>
                            <br />
                            <hr>
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="current" required placeholder="Confirm Password">
                            <br />
                            <div class="action_btns">
                                <div class="one_half last"><button type="submit" name="Add" class="btn btn_red">Add</button></div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <script type="text/javascript">
            $("#modal_trigger2").leanModal({
                top: 120,
                overlay: 0.6,
                closeButton: ".modal_close"
            });

        </script>
        <script type="text/javascript">
            $("#modal_trigger1").leanModal({
                top: 120,
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
        </section>
        <script src="js/search-order.js"></script>
        <script src="js/jquery-2.1.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/inspinia.js"></script>
        <script src="js/pace.min.js"></script>
        <script src="js/login.js"></script>
        <script src="js/accountstable.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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
