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

    //Fetch customer's purchase data
    if (isset($_GET['addPurchase'])) {
        $add_purchase_state = true;
        $id = $_GET['addPurchase'];
        $fullname = $_GET['addPurchase'];
        $purchaseResult = mysqli_query($connection, "SELECT * FROM customerPurchaseHistory WHERE id=$id");
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
                <li class="tab"><a href="editCustomer.php" class="vactive">Edit Customer Profile</a></li>
                <li class="tab"><a href="adminStockAndInventories.php">Stock &amp; Inventory</a></li>
                <li class="tab"><a href="hairdresserPerformance.php">View Hairdressers' Performance</a></li>
                <li><a href="salesReport.php">View Sales Report</a></li>
                <li id="vertical_nav_last_item" class="tab"><a href="dailyCustomerReport.php">View Daily Customer Count Report</a></li>
            </ul>
        </div>
        
        <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="pageContent">
            <div class="adminHeading">
                <h2>Edit Customer Profile</h2>
                <p>Edit a customer's profile</p>
            </div>
                     
            <!-- UPDATE STATE -->
            <?php if ($edit_state == false): ?>

            <?php else: ?>
                <form id="add_customer" class="add_customer" method="POST" action="editCustomerServer.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <fieldset>
                        <legend class="legendWhite">Personal Information</legend>
                        <div class="row">
                       <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="input-group">
                                <label for="fullname">Full Name</label>
                                    <input type="text" name="fullname" id="fullname" placeholder="Customer's Name" autofocus="autofocus" value="<?php echo $fullname; ?>" required="required"/>
                             </div>
                             <div class="input-group">
                                <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" autofocus="autofocus" value="<?php echo $dob; ?>" required="required"/>
                             </div>
                        </div>
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <div class="input-group">
                        <label for="gender">Gender</label>
                    <select id="gender" name="gender"  required="required">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    </div>
                    <div class="row input-group">
                       <label for="countryCode">Phone Number</label>
                        <input type="text" id="countryCode" name="countryCode" required="required" placeholder="Code" value="<?php echo $countryCode; ?>"/>
                        <p class="phoneDash">&mdash;</p>
                        <input type="text" id="phoneNumber" name="phoneNumber" required="required" placeholder="Number" value="<?php echo $phoneNumber; ?>"/></div>
                </div>
            </div>    
                    </fieldset>
                    <input type="submit" id="add_customer_update" name="add_customer_update" value="Update"/>
                    
                </form>
                
            <?php endif ?>
                 
            <!-- ADD PURCHASE STATE -->
            <?php if ($add_purchase_state == false): ?>

            <?php else: ?>
                <form id="add_purchase" class="add_purchase" method="POST" action="editCustomerServer.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <fieldset>
                        <legend class="legendWhite">Services</legend>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="input-group">
                                    <label for="hair_service">Hair Services</label>
                                        <select id="hair_service" name="hair_service">
                                            <option value="">None</option>
                                            <option value="HairCut(M)">HairCut(Men)</option>
                                            <option value="HairCut(F)">HairCut(Women)</option>
                                            <option value="HairWash(M)">HairWash(Men)</option>
                                            <option value="HairCut(F)">HairWash(Women)</option>
                                            <option value="Styling">Styling</option>
                                            <option value="Hair Colouring">Hair Colouring</option>
                                            <option value="Hair Treatment">Hair Treatment</option>
                                            <option value="Scalp Treatment">Scalp Treatment</option>
                                        </select>
                                </div>
                                <div class="input-group">
                                    <label for="massage">Massage</label>
                                        <select id="massage" name="massage">
                                            <option value="">None</option>
                                            <option value="Relaxation Massage(1/2hr)">Relaxation Massage(1/2hr)</option>
                                            <option value="Relaxation Massage(1hr)">Relaxation Massage(1hr)</option>
                                            <option value="Relaxation Massage(1 and 1/2hr)">Relaxation Massage(1 and 1/2hr)</option>
                                            <option value="Sports Therapy(1/2hr)">Sports Therapy(1/2hr)</option>
                                            <option value="Sports Therapy(1hr)">Sports Therapy(1hr)</option>
                                            <option value="Sports Therapy(1 and 1/2hr)">Sports Therapy(1 and 1/2hr)</option>
                                            <option value="Foot Reflexology(40 mins)">Foot Reflexology(40 mins)</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <div class="input-group">
                                    <label for="hairdresser">Hairdresser</label>
                                    <select id="hairdresser" name="hairdresser">
                                        <option value="">None
                                        </option>
                                        <option value="1001">
                                        Sum Ting Wong</option>
                                        <option value="1002">
                                        Noh Yu Mor</option>
                                        <option value="1003">
                                        Freddy Jupiter</option>
                                        <option value="1004">
                                        Ack Cher Lee</option>
                                        <option value="1005">
                                        Ek Zack Lee</option>
                                        <option value="1006">
                                        Tan Os</option>
                                    </select>
                                </div>
                                
                                <div class="input-group">
                                    <label for="body_wax">Body Wax</label>
                                        <select id="body_wax" name="body_wax">
                                            <option value="">None</option>
                                            <option value="Body Part(Bikini)">Body Part(Bikini)</option>
                                            <option value="Body Part(Brazilian)">Body Part(Brazilian)</option>
                                            <option value="Body Part(Full Face)">Body Part(Full Face)</option>
                                            <option value="Face(Eye Brown)">Face(Eye Brown)</option>
                                            <option value="Face(Sideburn)">Face(Sideburn)</option>
                                            <option value="Face(Neck)">Face(Neck)</option>
                                            <option value="Face(Chin)">Face(Chin)</option>
                                            <option value="Upper Body(Underarm)">Upper Body(Underarm)</option>
                                            <option value="Upper Body(Chest)">Upper Body(Chest)</option>
                                            <option value="Upper Body(Navel)">Upper Body(Navel)</option>
                                            <option value="Lower Body(Full Leg)">Lower Body(Full Leg)</option>
                                            <option value="Lower Body(Lower Back)">Lower Body(Lower Back)</option>
                                            <option value="Lower Body(Bums)">Lower Body(Bums)</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>

                    <fieldset>
                        <legend class="legendWhite">Products</legend>
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="input-group">
                                <label for="product_1">Product 1</label>
                        <select id="product_1" name="product_1">
                            <option value="">None</option>
                            <option value="Art Hairspray(420ml) x">Art Hairspray(420ml)</option>
                            <option value="L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x">L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml)</option>
                            <option value="Notel Spiky Clap (100ml) x">Notel Spiky Clap (100ml)</option>
                            <option value="Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x">Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g)</option>
                            <option value="Kerastase Elixir Ultime (100ml) x">Kerastase Elixir Ultime (100ml)</option>
                            <option value="Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x">Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml</option>
                            <option value="MNM Aromatic Hairspray (420ml) x">MNM Aromatic Hairspray (420ml)</option>
                            <option value="Schwarzkopf Osis+ Dust It Mattifying Powder 10g x">Schwarzkopf Osis+ Dust It Mattifying Powder 10g</option>
                            <option value="Ketastase Resistance Ciment Thermique (150ml) x">Ketastase Resistance Ciment Thermique (150ml)</option>
                            <option value="Elegance Plus Matte Hair Wax (140g) x">Elegance Plus Matte Hair Wax (140g)</option>
                            <option value="Arimino Spice Water Shining Straight x">Arimino Spice Water Shining Straight</option>
                            <option value="L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x">L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml)</option>
                        </select>
                            </div>
                            <div class="input-group">
                                <label for="product_2">Product 2</label>
                        <select id="product_2" name="product_2">
                            <option value="">None</option>
                            <option value="Art Hairspray(420ml) x">Art Hairspray(420ml)</option>
                            <option value="L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x">L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml)</option>
                            <option value="Notel Spiky Clap (100ml) x">Notel Spiky Clap (100ml)</option>
                            <option value="Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x">Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g)</option>
                            <option value="Kerastase Elixir Ultime (100ml) x">Kerastase Elixir Ultime (100ml)</option>
                            <option value="Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x">Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml</option>
                            <option value="MNM Aromatic Hairspray (420ml) x">MNM Aromatic Hairspray (420ml)</option>
                            <option value="Schwarzkopf Osis+ Dust It Mattifying Powder 10g x">Schwarzkopf Osis+ Dust It Mattifying Powder 10g</option>
                            <option value="Ketastase Resistance Ciment Thermique (150ml) x">Ketastase Resistance Ciment Thermique (150ml)</option>
                            <option value="Elegance Plus Matte Hair Wax (140g) x">Elegance Plus Matte Hair Wax (140g)</option>
                            <option value="Arimino Spice Water Shining Straight x">Arimino Spice Water Shining Straight</option>
                            <option value="L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x">L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml)</option>
                        </select>
                            </div>
                            <div class="input-group">
                                <label for="product_3">Product 3</label>
                        <select id="product_3" name="product_3">
                            <option value="">None</option>
                            <option value="Art Hairspray(420ml) x">Art Hairspray(420ml)</option>
                            <option value="L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x">L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml)</option>
                            <option value="Notel Spiky Clap (100ml) x">Notel Spiky Clap (100ml)</option>
                            <option value="Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x">Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g)</option>
                            <option value="Kerastase Elixir Ultime (100ml) x">Kerastase Elixir Ultime (100ml)</option>
                            <option value="Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x">Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml</option>
                            <option value="MNM Aromatic Hairspray (420ml) x">MNM Aromatic Hairspray (420ml)</option>
                            <option value="Schwarzkopf Osis+ Dust It Mattifying Powder 10g x">Schwarzkopf Osis+ Dust It Mattifying Powder 10g</option>
                            <option value="Ketastase Resistance Ciment Thermique (150ml) x">Ketastase Resistance Ciment Thermique (150ml)</option>
                            <option value="Elegance Plus Matte Hair Wax (140g) x">Elegance Plus Matte Hair Wax (140g)</option>
                            <option value="Arimino Spice Water Shining Straight x">Arimino Spice Water Shining Straight</option>
                            <option value="L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x">L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml)</option>
                        </select>
                            </div>
                            <div class="input-group">
                               <label for="product_4">Product 4</label>
                        <select id="product_4" name="product_4">
                            <option value="">None</option>
                            <option value="Art Hairspray(420ml) x">Art Hairspray(420ml)</option>
                            <option value="L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x">L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml)</option>
                            <option value="Notel Spiky Clap (100ml) x">Notel Spiky Clap (100ml)</option>
                            <option value="Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x">Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g)</option>
                            <option value="Kerastase Elixir Ultime (100ml) x">Kerastase Elixir Ultime (100ml)</option>
                            <option value="Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x">Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml</option>
                            <option value="MNM Aromatic Hairspray (420ml) x">MNM Aromatic Hairspray (420ml)</option>
                            <option value="Schwarzkopf Osis+ Dust It Mattifying Powder 10g x">Schwarzkopf Osis+ Dust It Mattifying Powder 10g</option>
                            <option value="Ketastase Resistance Ciment Thermique (150ml) x">Ketastase Resistance Ciment Thermique (150ml)</option>
                            <option value="Elegance Plus Matte Hair Wax (140g) x">Elegance Plus Matte Hair Wax (140g)</option>
                            <option value="Arimino Spice Water Shining Straight x">Arimino Spice Water Shining Straight</option>
                            <option value="L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x">L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml)</option>
                        </select> 
                            </div>
                            <div class="input-group">
                                <label for="product_5">Product 5</label>
                        <select id="product_5" name="product_5">
                            <option value="">None</option>
                            <option value="Art Hairspray(420ml) x">Art Hairspray(420ml)</option>
                            <option value="L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x">L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml)</option>
                            <option value="Notel Spiky Clap (100ml) x">Notel Spiky Clap (100ml)</option>
                            <option value="Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x">Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g)</option>
                            <option value="Kerastase Elixir Ultime (100ml) x">Kerastase Elixir Ultime (100ml)</option>
                            <option value="Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x">Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml</option>
                            <option value="MNM Aromatic Hairspray (420ml) x">MNM Aromatic Hairspray (420ml)</option>
                            <option value="Schwarzkopf Osis+ Dust It Mattifying Powder 10g x">Schwarzkopf Osis+ Dust It Mattifying Powder 10g</option>
                            <option value="Ketastase Resistance Ciment Thermique (150ml) x">Ketastase Resistance Ciment Thermique (150ml)</option>
                            <option value="Elegance Plus Matte Hair Wax (140g) x">Elegance Plus Matte Hair Wax (140g)</option>
                            <option value="Arimino Spice Water Shining Straight x">Arimino Spice Water Shining Straight</option>
                            <option value="L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x">L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml)</option>
                        </select>
                            </div>
                            <div class="input-group">
                                <label for="product_6">Product 6</label>
                        <select id="product_6" name="product_6">
                            <option value="">None</option>
                            <option value="Art Hairspray(420ml) x">Art Hairspray(420ml)</option>
                            <option value="L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x">L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml)</option>
                            <option value="Notel Spiky Clap (100ml) x">Notel Spiky Clap (100ml)</option>
                            <option value="Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x">Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g)</option>
                            <option value="Kerastase Elixir Ultime (100ml) x">Kerastase Elixir Ultime (100ml)</option>
                            <option value="Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x">Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml</option>
                            <option value="MNM Aromatic Hairspray (420ml) x">MNM Aromatic Hairspray (420ml)</option>
                            <option value="Schwarzkopf Osis+ Dust It Mattifying Powder 10g x">Schwarzkopf Osis+ Dust It Mattifying Powder 10g</option>
                            <option value="Ketastase Resistance Ciment Thermique (150ml) x">Ketastase Resistance Ciment Thermique (150ml)</option>
                            <option value="Elegance Plus Matte Hair Wax (140g) x">Elegance Plus Matte Hair Wax (140g)</option>
                            <option value="Arimino Spice Water Shining Straight x">Arimino Spice Water Shining Straight</option>
                            <option value="L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x">L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml)</option>
                        </select>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <div class="input-group">
                                <label for="p1_quantity">Quantity</label>
                        <input type="number" id="p1_quantity" name="p1_quantity"/>
                            </div>
                            <div class="input-group">
                                <label for="p2_quantity">Quantity</label>
                        <input type="number" id="p2_quantity" name="p2_quantity"/>
                            </div>
                            <div class="input-group">
                                <label for="p3_quantity">Quantity</label>
                        <input type="number" id="p3_quantity" name="p3_quantity"/>
                            </div>
                            <div class="input-group">
                                <label for="p4_quantity">Quantity</label>
                        <input type="number" id="p4_quantity" name="p4_quantity"/>
                            </div>
                            <div class="input-group">
                                <label for="p5_quantity">Quantity</label>
                        <input type="number" id="p5_quantity" name="p5_quantity"/>
                            </div>
                            <div class="input-group">
                                <label for="p6_quantity">Quantity</label>
                        <input type="number" id="p6_quantity" name="p6_quantity"/>
                            </div>
                        </div>
                       
                           <div class="input-group">
                               <label for="total">Total</label>
                        <input type="text" name="total" value="<?php echo $total; ?>" required="required"/>
                           </div>
                       
                    </fieldset>
                    
                    <input type="submit" id="add_purchase_submit" name="add_purchase_submit" value="Add Purchase"/>
                    
                </form> 
                
                <br />
                
                <div class="adminHeading">
                    <h2>Purchase History</h2>
                </div>
                
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Date Purchased</th>
                                <th>ID</th>
                                <th>Hair Services</th>
                                <th>Massage</th>
                                <th>Body Wax</th>
                                <th>Item Purchased</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php while ($row = mysqli_fetch_array($purchaseResult)) { ?>
                            <tr>
                                <td><?php echo $row["datePurchased"]; ?></td>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["hairServices"]; ?></td>
                                <td><?php echo $row["massage"]; ?></td>
                                <td><?php echo $row["bodyWax"]; ?></td>
                                <td><?php echo $row["itemPurchased"]; ?></td>
                                <td><?php echo $row["total"]; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            
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
                <table>
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
                                <input type="button" class="delete_btn" onclick="deleteCustomer()" name="Delete" value="Delete">
                            </td>
                            <td>
                                <a class="add_purchase_btn" href="editCustomer.php?addPurchase=<?php echo $row['id']; ?>">Add Purchase</a>
                            </td>
                        </tr>
                        
                        <script language="javascript">
                            function deleteCustomer()
                            {
                                if(confirm("Delete this customer?")){
                                    window.location.href="editCustomer.php?delete=<?php echo $row['id']; ?>";
                                    return true;
                                }
                            }
                        </script>
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
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