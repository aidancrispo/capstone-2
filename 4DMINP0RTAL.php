<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
   <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
  <title>Admin Login</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/AdminPortal322ElGrande.css">
      <link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<style>
        body{
            background-image:url(img/not-nice-background.png);
              background-repeat: no-repeat;
           background-size:cover;

        }
    </style>
</head>

<body>
    <br>

 <!-- <div class="headerbg"><a href="AdminPortal322ElGrande.php"><button class="header">Admin Portal</button></a></div> -->
  <form class="adminlogin" action="adminlogin.php" method="post">

  <fieldset>

  	<legend class="legend"><center>Admin Login</center></legend>

    <div class="input">
    	<input type="text" placeholder="Username" name="Username" required />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>

    <div class="input">
    	<input type="password" placeholder="Password" name="Password" required />
      <span><i class="fa fa-lock"></i></span>
    </div>

    <button type="submit" class="submit" name="Submit">Login <i class="fa fa-long-arrow-right"></i></button>

  </fieldset>

  <div class="feedback">
  Welcome, Mr. Not Nice <br />
    redirecting...
  </div>

</form>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/AdminPortal322ElGrande.js"></script>

   

</body>
</html>
