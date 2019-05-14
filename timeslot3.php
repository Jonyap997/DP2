<?php
session_start();
include("database.php");
if(!isset($_SESSION['user']))
{
    $_SESSION['user'] = "0001";
}
$uid = $_SESSION['user'];  // set your user id settings
$datetime_string = date('c',time());    
    
if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $start = mysqli_real_escape_string($connection,$_GET["start"]);
        $end = mysqli_real_escape_string($connection,$_GET["end"]);
        
        $result = mysqli_query($connection,"SELECT `id`, `start` ,`end` ,`title` FROM  `bookings` where (date(start) >= '$start' AND date(start) <= '$end') and uid='".$uid."'");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        echo json_encode($events); 
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang ="en" data-ng-app="">
<head>
<title>Smile and Style</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
   
   <!-- Media Queries-->
<link href="framework/css/mediaqueries.css" rel="stylesheet" />
    
    <!--Fullcalendar scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="framework/js/scriptCustomer3.js"></script>

    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >-->

    <link href="framework/css/fullcalendar.css" rel="stylesheet" />
    <link href="framework/css/fullcalendar.print.css" rel="stylesheet" media="print" />
    <script src="framework/js/moment.min.js"></script>
    <script src="framework/js/fullcalendar.js"></script>
    
</head>
<body>
    <div class="row">
            
        <div class="nav col-md-12 col-sm-12 col-xs-12">
            <ul>
                <li class="home_icon"><a href="index.php">Home</a></li>
                <li><a href="loginPage.php">Admin Sign In</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a class="active" href="timeslot.php">View Hairdressers' Schedule</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </div>
    </div>
   
   <div class="container">
       <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12">
               <h2 class="text-center">Time slots</h2>
               <div class="col-md-5 col-sm-5 col-xs-5" >
                   <p>These are the time slots available for hairdressers</p>
                   <p><span><strong class="booked_text">Light Blue</strong></span> - Time slot fully booked</p>
                   <p><span><strong class="grey_text">Grey</strong></span> - Non-business Hour</p>
                   <p>To make a booking, contact Smile &amp; Style at 082&#45;123456. Any questions or inquiries will be happily answered by our professional staff.</p>
               </div>
               <div class="col-md-2 col-sm-2 col-xs-2">
                   <p>_</p>
                   <p class="booked">Full Booked</p>
                   <p class="closed">Not available for booking</p>     
               </div>
               <div class="col-md-5 col-sm-5 col-xs-2 text-right">
                   <a href="hairdressers.php" class="btn btn-primary btn-info role=button active btn-sm">View our Hairdressers' info here >>></a>
               </div>
           
           </div>
       </div>
       <div class="space">
           
       </div>
       
       
        <!--Time slot program here.-->
          <div class="row">
                <div class="col-md-12">
                    <p>To make a booking, contact Smile &amp; Style at 082&#45;123456.</p>
                    <p>Any questions or inquiries will be happily answered by our talented staff.</p>
                    <div class="hairdresserChoice"> 
                        <p>
                            <a href="timeslot.php">Hairdresser 1</a>
                            <a href="timeslot2.php">Hairdresser 2</a>
                            <a href="timeslot3.php">Hairdresser 3</a>
                            <a href="timeslot4.php">Hairdresser 4</a>
                        </p>
                    </div> 
                    
                    <div id="calendar"></div>
                    
                    
                    
                </div>
            </div>
       </div>
       <div class="space"></div>
       


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
 <!--<script src="framework/js/jquery.min.js"></script>-->
<!--  All Bootstrap plug-ins file -->
 <script src="framework/js/bootstrap.min.js"></script>
 <!-- Basic AngularJS -->
    <script src="framework/js/angular.min.js"></script>
 </body>
</html>

