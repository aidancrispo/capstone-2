<?php 


require_once 'config_admin.php';

require_once INCLUDES . 'header.inc.php';

//require_once INCLUDES . 'navbar.inc.php';

require_once ADMIN_CLASSES . 'Reports.php';

$current_day = date('d');
$current_month = date('F');
$current_year = date('Y');

$yearly_sales = Reports::get_yearly_sales();
$yearly_title = "$current_month " . ($current_year - 1) .  "-$current_year";

$monthly_sales = Reports::get_monthly_sales();
$monthly_title = $monthly_sales[0]['SalesMonth'] . " " . $monthly_sales[0]['SalesDay'] . " - " . end($monthly_sales)['SalesMonth'] . " " . end($monthly_sales)['SalesDay'];

$weekly_sales = Reports::get_weekly_sales();
$week_title =  $weekly_sales[0]['SalesDate'] . " - " . end($weekly_sales)['SalesDate'];


  session_start();
  if (! empty($_SESSION['logged_in']))
{


    

    $con=mysqli_connect("localhost","root","","orderingsystem");
    require ('../test.php');

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
            window.location.href='../employee.php'
            </SCRIPT>");
      }
      elseif ($row['ACNTS_Role'] == 'Customer'){
        echo  ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You cannot access this because you are a Customer!')
            window.location.href='../products.php'
            </SCRIPT>");
      }
    }
      ?>

<br>
<br>
<br>

<div class="container">
    <div id="year">
  <div class="row">
      
    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
      <canvas id="yearlyChart"></canvas>
    </div>
    
  </div>
        </div>
       <div id="month">
  <div class="row">
    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
      <canvas id="monthlyChart"></canvas>
    </div>
           </div>
   <div id="week">
    <div class="col-lg-12" style="margin-bottom:40px; border: 3px solid black; border-radius: 25px;">
      <canvas id="weeklyChart"></canvas>

    </div>
           </div>
     
  </div>
</div>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
 /* var per_product = document.getElementById('per_product').getContext('2d');
  var chart = new Chart(per_product, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
      labels: [<?php foreach($sales_per_product as $key => $item){echo '"' . $item['PROD_Name'] . '", ';} ?>],

      datasets: [{
        label: "Sales Per Product",
        borderColor: 'rgb(255, 99, 132)',
        backgroundColor: 'red',
        data: [<?php foreach($sales_per_product as $key => $item){echo '"' . $item['Quantity'] . '", ';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Sales Per Product',
        fontSize:35
      }
    }
  });*/


  var yearly_chart = document.getElementById('yearlyChart').getContext('2d');
  var chart = new Chart(yearly_chart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php foreach($yearly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' ('. $item['SalesYear'] . ')",';} ?>],

      datasets: [{
        label: "Profit",
        borderColor: 'grey',
        backgroundColor: 'black',
        data: [<?php foreach($yearly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Yearly Sales Report (<?php echo $yearly_title ?>)',
        fontSize:35
      }
    }
  });



  var monthly_chart = document.getElementById('monthlyChart').getContext('2d');
  var chart = new Chart(monthly_chart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php foreach($monthly_sales as $key => $item){echo '"' . $item['SalesMonth'] . ' '. $item['SalesDay'] . '",';} ?>],

      datasets: [{
        label: "Profit",
        borderColor: 'grey',
        backgroundColor: 'black',
        data: [<?php foreach($monthly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Monthly Sales Report (<?php echo $monthly_title ?>)',
        fontSize:25
      }
    }
  });


  var weekly_chart = document.getElementById('weeklyChart').getContext('2d');
  var chart = new Chart(weekly_chart, {
    // The type of chart we want to create
    type: 'line',
    // The data for our dataset
    data: {
      labels: [<?php foreach($weekly_sales as $key => $item){echo '"' . $item['SalesDay'] . ' '. $item['SalesDate'] . '",';} ?>],

      datasets: [{
        label: "Profit",
        borderColor: 'grey',
        backgroundColor: 'black',
        data: [<?php foreach($weekly_sales as $key => $item){echo $item['TotalPrice'] . ',';} ?>], 
      }]
    },

    // Configuration options go here
    options: {
      title:{
        display:true,
        text:'Weekly Sales Report (<?php echo $week_title ?>)',
        fontSize:25
      }
    }
  });
</script>
    <script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/inspinia.js"></script>
<script src="js/pace.min.js"></script>
<script src="js/login.js"></script>
    
<?php
  }
else
{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('You are not logged in!')
            window.location.href='../home.php'
            </SCRIPT>");
}
?>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>
   


    