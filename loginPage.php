<?php
session_start();

if(isset($_POST['login'])) {
    
    //Connect to database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

    //Get values from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //To prevent sql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    //Query the database for user
    $result = mysqli_query($connection, "select * from admin where username = '$username' and password = '$password'")
        or die("Failed to query database ".mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    if($row['username'] == $username && $row['password'] == $password) {
        header("Location: adminHomePage.php");
    } else {
        $error = true;
    }
} else {
    $error = false;
}

?>

<!DOCTYPE html> 
<html lang="en" data-ng-app=""> 
    <head> 
    <title>Smile and Style</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!--HTML5shiv and Respond -->
        <script src="framework/js/html5shiv.js"></script>
        <script src="framework/js/respond.min.js"></script>
        <link href="framework/css/styles.css" rel="stylesheet" />
        <!--Icons-->
        <link rel="stylesheet" type="text/css" href="outsource/css/ionicons.min.css">
        <!--Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Monsieur La Doulaise' rel='stylesheet'>
        <!-- Media Queries-->
        <link href="framework/css/mediaqueries.css" rel="stylesheet" />
    </head> 
    <body class="loginPage"> 
       
       <div class="row">
            <div class="nav col-md-12 col-sm-12 col-xs-12">
                <ul>
                    <li class="home_icon"><a href="index.php">Home</a></li>
                    <li><a class="active" href="loginPage.php">Admin Sign In</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="hairdressers.php">Our hairdressers</a></li>
                    <li><a href="timeslot.php">View Hairdressers' Schedule</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
        </div>
       
        <form method="POST" action="loginPage.php">
            <div class="login-box row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Login</h1>
                    <div class="col-md-12 col-sm-12 col-xs-12 textbox">
                        <i class="ion-ios-person-outline icon"></i>
                        <input type="text" placeholder="Username" name="username" value="" required>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 textbox">
                        <i class="ion-ios-locked-outline icon"></i>
                        <input type="password" placeholder="Password" name="password" value="" required>
                    </div>
                    <?php if( $error) echo "<p style='color:red;font-size:13px;'>Invalid Username or Password</p>" ?>
                    <input class="loginBtn" type="submit" name="login" value="Sign In">
                </div>
            </div>
        </form>
        
        <!--Jquery for bootstraps js plugins-->
        <script src="js/jquery-3.3.1.min.js"></script>
        <!--All bootstraps plugins files-->
        <script src="js/bootstrap.min.js"></script>
        <!--Basic AngularJS-->
        <script src="js/angular.min.js"></script>
    </body>
</html>