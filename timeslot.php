<!DOCTYPE html>
<html lang ="en" data-ng-app="">
<head>
<title>Smile and Style</title>
<meta name="viewport" content="width=device-width, initialscale=1.0"/>
<!-- Bootstrap -->
<link href="framework/css/bootstrap.min.css" rel="stylesheet" />
<link href="framework/css/styles.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="outsource/css/ionicons.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet"/>
    
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
 <script src="framework/js/html5shiv.js"></script>
 <script src="framework/js/respond.min.js"></script>
 <![endif]-->
    
</head>
<body>
    <div class="row">
            
        <div class="nav col-md-12 col-sm-12 col-xs-12">
            <ul>
                <div class="home_icon">
                    <li><a href="hairsalontemplate.php">Home</a></li>
                </div>
                <li><a href="loginPage.php">Admin Sign In</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a class="active" href="timeslot.php">View Hairdressers' Schedule</a></li>
            <php
            <hr/>
        </div>
    </div>
   
   <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
           <h2>Time slots</h2>
           <div class="col-md-5 col-sm-5 col-xs-5" >
               <p>These are the time slots available for hairdressers</p>
           <p><span class="green_text"><strong>Green</strong></span> - Available for booking</p>
           <p><span class="red_text"><strong>Red</strong></span> - Time slot fully booked</p>
           <p><span class="grey_text"><strong>Grey</strong></span> - Time slot not available</p>
           </div>
           <div class="col-md-2 col-sm-2 col-xs-2">
               <p class="ava">Available</p>
               <p class="danger">Full Booked</p>
               <p class="not_ava">Not available for booking</p>     
           </div>
           
           </div>
       </div>
       <div class="space"></div>
       <div class="container">
<!--           Time slot program here.-->
          <div class="row">
                <div class="col-md-12">
                     
                    <div class="btn-group" role="group">
                        <button type="button" class="hairBtn btn-default" data-ng-click = "chrDisp = 'Hair Stylist 1'">Hair Stylist 1</button>
                        <button type="button" class="hairBtn btn-default" data-ng-click = "chrDisp = 'Hair Stylist 2'">Hair Stylist 2</button>
                        <button type="button" class="hairBtn btn-default" data-ng-click = "chrDisp = 'Hair Stylist 3'">Hair Stylist 3</button>
                        <button type="button" class="hairBtn btn-default" data-ng-click = "chrDisp = 'Hair Stylist 4'">Hair Stylist 4</button>
                    </div>
                    
                    <div data-ng-if="chrDisp == 'Hair Stylist 1'" data-ng-init="day = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']">
                        <h2>{{chrDisp}} time slot</h2>
                        <div class="space"></div>
                        <table class="table table-stripe small">
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                            <tr data-ng-repeat="d in day">
                                <td>{{d}}</td>
                                <td></td>
                                <td>{{d}}</td>
                                <td></td>
                            </tr>
                        </table>
                        
                    
                    </div>
                    
                    <div data-ng-if="chrDisp == 'Hair Stylist 2'" data-ng-init="day = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']">
                       <h2>{{chrDisp}} time slot</h2>
                       <div class="space"></div>
                        <table class="table table-stripe small">
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                            <tr data-ng-repeat="d in day">
                                <td>{{d}}</td>
                                <td></td>
                                <td>{{d}}</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    
                    <div data-ng-if="chrDisp == 'Hair Stylist 3'" data-ng-init="day = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']">
                        <h2>{{chrDisp}} time slot</h2>
                        <div class="space"></div>
                        <table class="table table-stripe small">
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                            <tr data-ng-repeat="d in day">
                                <td>{{d}}</td>
                                <td></td>
                                <td>{{d}}</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    
                    <div data-ng-if="chrDisp == 'Hair Stylist 4'" data-ng-init="day = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']">
                        <h2>{{chrDisp}} time slot</h2>
                        <div class="space"></div>
                        <table class="table table-stripe small">
                            <tr>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Day</th>
                                <th>Time</th>
                            </tr>
                            <tr data-ng-repeat="d in day">
                                <td>{{d}}</td>
                                <td></td>
                                <td>{{d}}</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    
                    
                </div>
            </div>
       </div>
       <div class="space"></div>
       


    <div class="row">
        <div class="footer col-md-6 col-sm-6 col-xs-6"> 
            <ul>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="about.php">About Us</a></li>  
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

