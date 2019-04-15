<?php
    include("editCustomerServer.php");

    //Fetch the data to be updated
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        
        $edit_state = true;
        $reconnect = mysqli_query($connection, "SELECT * FROM customers WHERE id=$id");
        $record = mysqli_fetch_array($reconnect);
        $id = $record['id'];
        $fullname = $record['fullname'];
        $gender = $record['gender'];
        $dob = $record['dob'];
        $countryCode = $record['countryCode'];
        $phoneNumber = $record['phoneNumber'];
    }

?>

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
                    <li><a href="hairsalontemplate.html">Home</a></li>
                </div>
                <li><a href="sign_in.html">Admin Sign In</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="hairdressers.html">Our hairdressers</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="timeslot.html">View Hairdressers' Schedule</a></li>
            </ul>
            <hr/>
        </div>
    </div>
    
    <div class="row">
        <div class="vertical_nav col-md-3 col-sm-3 col-xs-3">
            <ul>
                <li class="tab"><a href="booking.html">Make/Cancel Booking</a></li>
                <li class="tab"><a href="addCustomer.html">Add Customer Profile</a></li>
                <li class="tab"><a href="editCustomer.html">Edit Customer Profile</a></li>
                <li class="tab"><a href="stock.html">Stock &amp; Inventory</a></li>
                <li class="tab"><a href="hairdresserPerformance.html">View Hairdressers' Performance</a></li>
                <li><a href="salesReport.html">View Sales Report</a></li>
                <li id="vertical_nav_last_item" class="tab"><a href="dailyCustomerReport.html">View Daily Customer Count Report</a></li>
            </ul>
        </div>
        
        <div class="vertical_nav col-md-9 col-sm-9 col-xs-9">

            <div class="adminHeading">
                <h2>Edit Custmer Profile</h2>
                <p>Edit a customer's profile</p>
            </div>
            
            <div class="center">
                <label for="customer_profile_search">Customer Name</label>
                <input type="search" autofocus="autofocus"/>
            </div>
            
            <?php if ($edit_state == false): ?>

            <?php else: ?>
                <form id="add_customer" class="add_customer" method="POST" action="editCustomerServer.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <fieldset>
                        <legend>Personal Information:</legend>
                        <label for="fullname">Full Name:</label>
                        <input type="text" name="fullname" id="fullname" placeholder="Customer's Name" autofocus="autofocus" value="<?php echo $fullname; ?>" required="required"/>
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender"  required="required">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                        <label for="dob">Date of Birth:</label>
                        <input type="text" name="dob" id="dob" placeholder="YYYY-MM-DD" autofocus="autofocus" value="<?php echo $dob; ?>" required="required"/>
                    </fieldset>

                    <fieldset>
                        <legend>Contact Information:</legend>
                        <label for="countryCode">Phone Number:</label>
                        <input type="text" id="countryCode" name="countryCode" required="required" placeholder="Code" value="<?php echo $countryCode; ?>"/>
                        <label for="phoneNumber">-</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" required="required" placeholder="Number" value="<?php echo $phoneNumber; ?>"/>
                    </fieldset>
                    
                    <input type="submit" id="add_customer_update" name="add_customer_update" value="Update"/>
                    
                </form>
                
            <?php endif ?>
            
            <div class="msg">
                <?php 
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </div>
            
            <div>
                <table class="table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Country Code</th>
                            <th>Phone Number</th>
                            <th>Date Registered</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["fullname"]; ?></td>
                            <td><?php echo $row["gender"]; ?></td>
                            <td><?php echo $row["dob"]; ?></td>
                            <td><?php echo $row["countryCode"]; ?></td>
                            <td><?php echo $row["phoneNumber"]; ?></td>
                            <td><?php echo $row["dateRegistered"]; ?></td>
                            <td>
                                <a class="edit_btn" href="editCustomer.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="delete_btn" href="editCustomer.php?delete=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
    <div class="row">
        <div class="footer col-md-6 col-sm-6 col-xs-6"> 
            <ul>
                <li><a href="timeslot.html">View Hairdressers' Schedule</a></li>
                <li><a href="products.html">Products</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="hairdressers.html">Our hairdressers</a></li>
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