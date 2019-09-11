<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Public Website">
    <meta name="author" content="Not Nice MNL">
    <!-- Add Your favicon here -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">>

    <title>Not Nice MNL - Edit</title>

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

<body>

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
                        <li><a href="employee.php#page-top">Dashboard</a></li>
                        <li><a href="productlist.php">Product List</a></li>
                        <li><a class="active" href="orders.php">Order List</a></li>
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
    <header class="popupHeader">
        <center><span class="header_title">Edit Product</span></center>
    </header>
    <?php
if (isset($_POST['Delete'])){
  $con=mysqli_connect("localhost","root","","orderingsystem");
  require ('test.php');
  $DeleteQuery = "DELETE FROM products WHERE PROD_ID ='$_POST[hidden]'";
  mysqli_query($con,$DeleteQuery);
  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Deleted Successfully!')
    window.location.href='productlist.php'
    </SCRIPT>");
    $sql = "INSERT INTO logs(logdesc,ACNTS_ID) VALUES ('Product Deleted PRODUCT ID: $_POST[hidden]','$_SESSION[id]')";
    mysqli_query($con,$sql);
    mysqli_close($con);
}
if (isset($_POST['Edit'])){
$con=mysqli_connect("localhost","root","","orderingsystem");
require ('test.php');
$query = mysqli_query($con,"select * from products where PROD_ID='$_POST[hidden]'");
$row = mysqli_fetch_array($query);

?>
    <section class="popupBody">
        <!-- Username & Password Login form -->
        <div class="user_login">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <center><label>Product Name</label>
                    <input type="text" name="Name" style="text-align:center;" value="<?php echo $row['PROD_Name']; ?>" required />
                    <?php echo "<input type='hidden' name='hidden' value='$_POST[hidden]'"; ?>
                    <br />
                    <br />
                    <label>Product Description</label>
                    <input type="text" name="Desc" style="text-align:center;" value="<?php echo $row['PROD_Description']; ?>" required />
                    <br />
                    <br />
                    <label>Price</label>
                    <input type="number" name="Price" style="text-align:center;" required min="1" value="<?php echo $row['PROD_Price']; ?>" />
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
                    <hr>
                    <label>Confirm Password: </label>
                    <input type="password" class="form-control" name="current" required placeholder="Confirm Password">
                    <br />
                    <div class="action_btns">
                        <div class="one_half last"><button type="submit" name="Edit" class="btn btn_red btn-lg">Edit</button>

            </form>
            <a href="productlist.php"><button type="submit" name="Cancel" class="btn btn_red btn-lg" formnovalidate>Cancel</button></a>
        </div>
        </center>
        </div>
        </div>
    </section>
    <?php }
if (isset($_POST['UpdateImage'])){
  $con=mysqli_connect("localhost","root","","orderingsystem");
  require ('test.php');
  $query = mysqli_query($con,"select * from products where PROD_ID='$_POST[hidden]'");
  $row = mysqli_fetch_array($query);
  ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <center>
            <?php echo "<input type='hidden' name='hidden' value='$_POST[hidden]'"; ?>
            <br><br>
            <label> Upload Image </label><br><br>
            <input type="file" name="image" />
            <br><br>
            <br />
            <hr />
            <label>Confirm Password: </label>
            <br>
            <input type="password" class="form-control" name="current" required placeholder="Confirm Password">
            <br />
            <div class="action_btns">
                <div class="one_half last"><button type="submit" name="UpdateImage" class="btn btn_red btn-lg">Edit</button>
    </form>
    <a href="productlist.php"><button type="submit" name="Cancelimg" class="btn btn_red btn-lg" formnovalidate>Cancel</button></a></div>
    </center>
    </div>
    </center>
    <?php } ?>
    <script src="js/login.js"></script>
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
