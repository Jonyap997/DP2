<?php session_start() ?>
<!DOCTYPE html>
<html lang ="en" data-ng-app="">
<head>
<title>Smile and Style</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- Bootstrap -->
<link href="framework/css/bootstrap.min.css" rel="stylesheet" />
<link href="framework/css/styles.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Monsieur La Doulaise' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="outsource/css/ionicons.min.css"/>
    
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
 <script src="framework/js/html5shiv.js"></script>
 <script src="framework/js/respond.min.js"></script>
 <![endif]-->
 
 <!-- Media Queries-->
<link href="framework/css/mediaqueries.css" rel="stylesheet" />

<script src="framework/js/navBarActive.js"></script>
<script src="framework/js/Chart.min.js"></script>
<script src="framework/js/html2canvas.min.js"></script>
<script src="framework/js/jquery.min.js"></script>
<script src="framework/js/displayPerformanceChart.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
    
<script>
    function displayPerformanceChart(){
  $.ajax({
    url: "https://demosalon.000webhostapp.com/fetchPerformanceChartData.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var hairdressers = [];
      var customerCount = [];

      for(var i in data) {
        hairdressers.push(data[i].hairdressers);
        customerCount.push(data[i].customers);
      }
        
    document.getElementById("generate_PDF").disabled = false;

      var chartdata = {
        labels: hairdressers,
        datasets : [
          {
            label: 'Daily Customer',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: customerCount
          }
        ]
      };

      var ctx = $("#performanceChart");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
}

</script>
    
</head>
<body>
   <div class="row">
            
        <div class="nav col-md-12 col-sm-12 col-xs-12">
            <ul>
                <li class="home_icon"><a href="index.php">Home</a></li>
                <li><a href="loginPage.php">Log out</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="vertical_nav col-md-3 col-sm-3 col-xs-3">
            <ul>
                <li class="tab"><a href="booking.php">Make/Cancel Booking</a></li>
                <li class="tab"><a href="addCustomer.php">Add Customer Profile</a></li>
                <li class="tab"><a href="editCustomer.php">Edit Customer Profile</a></li>
                <li class="tab"><a href="adminStockAndInventories.php">Stock &amp; Inventory</a></li>
                <li class="tab"><a href="hairdresserPerformance.php" class="vactive">View Hairdressers' Performance</a></li>
                <li><a href="salesReport.php">View Sales Report</a></li>
                <li id="vertical_nav_last_item" class="tab"><a href="dailyCustomerReport.php">View Daily Customer Count Report</a></li>
            </ul>
        </div>
        
        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="pageContent">
            <div class="adminHeading">
                <h2>Hairdressers' Performance</h2>
                <p>View how well each hairdresser did</p>
            </div>
            
            <div class="center">
                

                <form id="hairdresser_performance" class="hairdresser_performance" method="POST"
                      action="hairdresserPerformance.php">
                    
                <label for="report_year_select">Select a year:</label>
                <select class="performance_report_year" name="performance_report_year">
                    <option name="report_year" value="2019">2019</option>
                    <option name="report_year" value="2018">2018</option>
                    <option name="report_year" value="2017">2017</option>
                </select>
                    
                <?php
                
                $_SESSION['performance_year'] = $_POST['performance_report_year'];
                ?>
                    
                <label for="performance_report_month">Select a month:</label>
                <select class="performance_report_month" name="performance_report_month">
                    <option name="report_month" value="1">January</option>
                    <option name="report_month" value="2">February</option>
                    <option name="report_month" value="3">March</option>
                    <option name="report_month" value="4">April</option>
                    <option name="report_month" value="5">May</option>
                    <option name="report_month" value="6">June</option>
                    <option name="report_month" value="7">July</option>
                    <option name="report_month" value="8">August</option>
                    <option name="report_month" value="9">September</option>
                    <option name="report_month" value="10">October</option>
                    <option name="report_month" value="11">November</option>
                    <option name="report_month" value="12">December</option>
                </select>
                    
                <?php
                
                $_SESSION['performance_month'] = $_POST['performance_report_month'];
                ?>
                    
                <br/>
                    <input type="submit" name="generate_performance_report" class="generate_report_button" value="Generate Monthly Report" onsubmit="displayPerformanceChart"/>
                    <button  id="generate_PDF" class="generate_report_button disabled_button" onclick="downloadPDF()" disabled="disabled" >Export as PDF</button>
                </form>
                
                <?php
                    if (isset($_POST['generate_performance_report'])) 
                    {
                        echo "<script> displayPerformanceChart();</script>";
                    }
                ?>

            </div>
            
            <canvas id="performanceChart" width="400" height="170"></canvas>
            
        </div>
        </div>
    </div>

    <div class="row footer">
        <div class="col-md-6 col-sm-6 col-xs-6"> 
            <ul>
                <li><a href="about.php">About Us</a></li>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="products.php">Products</a></li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6"> 
            <ul>
                <li>Be our <b>V.I.P</b></li>
                <li>Jalan Sotong 1, Taman Monyet</li>
                <li>10000 Kuching, Sarawak</li>
                <li><b>Follow us on social media</b></li>
                <br/>
                <div class="footer_container">
                    <div class="footer_left">
                        <a href="https://www.facebook.com"><i class="ion-social-facebook"></i></a>
                    </div>
                    
                    <div class="footer_center">
                        <a href="https://www.instagram.com"><i class="ion-social-instagram-outline"></i></a>
                    </div>
                    
                    <div class="footer_right">
                        <a href="https://www.twitter.com"><i class="ion-social-twitter"></i></a>
                    </div>
                </div> 
            </ul>
        </div>
        
    </div>

   
   
 
 <!-- jQuery – required for Bootstrap's JavaScript plugins) -->
 <script src="framework/js/jquery.min.js"></script>
<!--  All Bootstrap plug-ins file -->
 <script src="framework/js/bootstrap.min.js"></script>
 <!-- Basic AngularJS -->
    <script src="framework/js/angular.min.js"></script>
 </body>
</html>