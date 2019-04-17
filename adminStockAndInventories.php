<?php
    include("adminStockServer.php");

    //Fetch the data to be updated
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        
        $edit_state = true;
        $reconnect = mysqli_query($connection, "SELECT * FROM inventories WHERE id=$id");
        $record = mysqli_fetch_array($reconnect);
        $id = $record['id'];
        $name = $record['name'];
        $brand = $record['brand'];
        $amountRemaining = $record['amountRemaining'];
        $volume = $record['volume'];
        $price = $record['price'];
        $source = $record['source'];
        $description = $record['description'];
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
                <li><a href="loginPage.php">Log out</a></li>>
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
        <h2>Stock &amp; Inventory</h2>
            
            <form method="POST" action="adminStockServer.php" class="adminStockForm">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row">
               <div class="col-md-5 col-sm-5 col-xs-5">
                    <div class="input-group">
                        <label>Item Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="input-group">
                        <label>Brand</label>
                        <input type="text" name="brand" value="<?php echo $brand; ?>">
                    </div>
                    <div class="input-group">
                        <label>Quantity</label>
                        <input type="text" name="amountRemaining" value="<?php echo $amountRemaining; ?>">
                    </div>
                    <div class="input-group">
                        <label>Volume</label>
                        <input type="text" name="volume" value="<?php echo $volume; ?>">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-7">
                    <div class="input-group">
                        <label>Price</label>
                        <input type="text" name="price" value="<?php echo $price; ?>">
                    </div>
                    <div class="input-group">
                        <label>Source</label>
                        <input type="text" name="source" value="<?php echo $source; ?>">
                    </div>
                    <div class="input-group">
                        <label>Description</label>
                        <input type="text" name="description" value="<?php echo $description; ?>">
                    </div>
                    <div class="input-group">
                    <?php if ($edit_state == false): ?>
                        <button type="submit" name="save" class="adminStockBtn">Add New Item</button>
                    <?php else: ?>
                        <button type="submit" name="update" class="adminStockBtn">Update</button>
                    <?php endif ?>
                    </div>
                </div>
            </div>
            </form>
            
            <div class="msg">
                <?php 
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Brand</th>
                        <th>Quantity</th>
                        <th>Volume</th>
                        <th>Price</th>
                        <th>Source</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["brand"]; ?></td>
                            <td><?php echo $row["amountRemaining"]; ?></td>
                            <td><?php echo $row["volume"]; ?></td>
                            <td><?php echo $row["price"]; ?></td>
                            <td><?php echo $row["source"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td>
                                <a class="edit_btn" href="adminStockAndInventories.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="delete_btn" href="adminStockServer.php?delete=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
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