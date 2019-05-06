<?php

//make connection
$sql=mysqli_connect("localhost","id9115199_salondemo","qwe121993","id9115199_salon");

//check connection
if(mysqli_connect_errno())
{
    echo "Failed to connect to 000web: " . mysqli_connect_error();
}

$records=mysqli_query($sql,"SELECT * FROM inventories");

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
<link rel="stylesheet" type="text/css" href="outsource/css/ionicons.min.css"/>
   
<!-- Media Queries-->
<link href="framework/css/mediaqueries.css" rel="stylesheet" />
    
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
                <li class="home_icon"><a href="index.php">Home</a></li>
                <li><a href="loginPage.php">Admin Sign In</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="hairdressers.php">Our hairdressers</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a class="active" href="products.php">Products</a></li>
                <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
            </ul>
        </div>
    </div>
    <div class="space"></div>
    <div class="container">
            <h2 class="text-center">Products</h2>
      <div class="space"></div>
      <div class="row">                
                      <?php
                      
                      while($inventories=mysqli_fetch_assoc($records)){
                          
                            echo "<div class=\"col-md-3 col-sm-6 col-xs-6\">";
                                echo "<div class=\"row\">";
                                    echo "<div class=\"col-md-12 col-sm-12 col-xs-12\">";
                                        echo "<img class=\"product\" alt=\"product\" src=\"framework/resources/products/".$inventories['image_id']."\" />";
                                        echo "<p>".$inventories['name']."</p>";
                                        echo "<p>".$inventories['volume']."</p>";
                                        echo "<p>Brand: ".$inventories['brand']."</p>";
                                        echo "<p><strong>RM ".$inventories['price']."</strong></p>";
                                        echo "<p>In Stock: <strong>".$inventories['amountRemaining']."</strong></p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                          

                      }//end while
                      
                      ?>
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

