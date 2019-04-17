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
                <li class="tab"><a href="booking.html">Make/Cancel Booking</a></li>
                <li class="tab"><a class="vactive" href="addCustomer.html">Add Customer Profile</a></li>
                <li class="tab"><a href="editCustomer.html">Edit Customer Profile</a></li>
                <li class="tab"><a href="stock.html">Stock &amp; Inventory</a></li>
                <li class="tab"><a href="hairdresserPerformance.html">View Hairdressers' Performance</a></li>
                <li><a href="salesReport.html">View Sales Report</a></li>
                <li id="vertical_nav_last_item" class="tab"><a href="dailyCustomerReport.html">View Daily Customer Count Report</a></li>
            </ul>
        </div>
        
        <div class="vertical_nav col-md-9 col-sm-9 col-xs-9">
            <div class="adminHeading">
                <h2>Add Customer Profile</h2>
                <p>Enter the profile of the new customer</p>
            </div>
            
            <form id="add_customer" class="add_customer" method="post">
                <fieldset>
                    <legend>Personal Information:</legend>
                    <label for="customer_name">Name:</label>
                    <input type="text" name="customer_name" id="customer_name" placeholder="Customer's Name" autofocus="autofocus" required="required"/>
                    <br/>
                    <label for="customer_gender">Gender:</label>
                    <select id="customer_gender" name="customer_gender" required="required">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <br/>
                    <label for="customer_dob">Date of Birth:</label>
                    <input type="date" name="customer_dob" id="customer_dob" required="required"/>
                </fieldset>
                
                <fieldset>
                    <legend>Contact Information:</legend>
                    <label for="customer_contactNo">Contact Number:</label>
                    <input type="tel" id="customer_contactNo" name="customer_contactNo" required="required" placeholder="012-3456789"/>
                </fieldset>
                
                <fieldset>
                    <legend>Other Information:</legend>
                    <label for="date_registered">Date Registered</label>
                    <input type="date" id="date_registered" name="date_registered" required="required" />
                </fieldset>
                
                <input type="submit" id="add_customer_submit" name="add_customer_submit" value="Submit"/>
                
                <input type="reset" id="add_customer_reset" name="add_customer_reset" value="Reset"/>
            </form>

        </div>
    </div>

    <div class="row footer">
        <div class="col-md-6 col-sm-6 col-xs-6"> 
            <ul>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="about.php">About Us</a></li>  
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