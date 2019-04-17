<!DOCTYPE html>
<html lang ="en" data-ng-app="">
<head>
<title>Smile and Style</title>
<meta name="viewport" content="width=device-width, initialscale=1.0"/>
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

<script src="framework/js/navBarActive.js"></script>
    
</head>
<body>
    <div class="row">
            
        <div class="nav col-md-12 col-sm-12 col-xs-12">
            <ul>
                <div class="home_icon">
                    <li><a href="index.php">Home</a></li>
                </div>
                <li><a href="loginPage.php">Admin Sign In</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
            </ul>
            <hr/>
        </div>
    </div>
    
    <div class="row">
        <div class="vertical_nav col-md-3 col-sm-3 col-xs-3">
            <ul>
                <li class="tab"><a href="booking.php">Make/Cancel Booking</a></li>
                <li class="tab"><a href="addCustomer.php">Add Customer Profile</a></li>
                <li class="tab"><a href="editCustomer.php">Edit Customer Profile</a></li>
                <li class="tab"><a href="adminStockAndInventories.php">Stock &amp; Inventory</a></li>
                <li class="tab"><a href="hairdresserPerformance.php">View Hairdressers' Performance</a></li>
                <li><a href="salesReport.php">View Sales Report</a></li>
                <li id="vertical_nav_last_item" class="tab"><a class="vactive" href="dailyCustomerReport.php">View Daily Customer Count Report</a></li>
            </ul>
        </div>
        
        <div class="vertical_nav col-md-9 col-sm-9 col-xs-9">
            
            <div class="adminHeading">
                <h2>Daily Customer Count</h2>
                <p>The number of customers</p>
            </div>
            
            <div class="generate_report_button center">
                <button>Generate monthly report</button>
            </div>
            
            <table class="report">
                <thead>
                    <tr>
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Day</th>
                        <th colspan="2">No. of customers</th>
                    </tr>
                    <tr>
                        <th>Morning</th>
                        <th>Afternoon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2019-04-14</td>
                        <td>Sunday</td>
                        <td>10</td>
                        <td>20</td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>

    <div class="row">
        <div class="footer col-md-6 col-sm-6 col-xs-6"> 
            <ul>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="about.html">About Us</a></li>  
            </ul>
        </div>
        <div class="footer col-md-6 col-sm-6 col-xs-6"> 
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