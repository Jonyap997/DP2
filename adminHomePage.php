<!DOCTYPE html> 
<html lang="en" data-ng-app=""> 
    <head> 
    <title>Sprint 1 Salon</title> 
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!--HTML5shiv and Respond -->
        <script src="framework/js/html5shiv.js"></script>
        <script src="framework/js/respond.min.js"></script>
        <link href="framework/css/style.css" rel="stylesheet" />
        <!--Icons-->
        <link rel="stylesheet" type="text/css" href="outsource/css/ionicons.min.css">
        <!--Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Monsieur La Doulaise' rel='stylesheet'>
    </head> 
    <body class="loginPage"> 
        <form method="POST" action="process.php">
            <div class="login-box row">
                <div class="col-md-12">
                    <h1>ADMIN HOMEPAGE SAMPLE FOR TESTING!!!!</h1>
                    <div class="col-md-12 textbox">
                        <i class="ion-ios-person-outline icon"></i>
                        <input type="text" placeholder="Username" name="username" value="">
                    </div>
                    <div class="col-md-12 textbox">
                        <i class="ion-ios-locked-outline icon"></i>
                        <input type="password" placeholder="Password" name="password" value="">
                    </div>
                    <input class="btn" type="submit" name="login" value="Sign In">
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