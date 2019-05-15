<?php
   session_start();
    //Initialise variable
    $id = 0;
    $fullname = "";
    $gender = "";
    $dob = "";
    $countryCode = "";
    $phoneNumber = "";
    $edit_state = false;
    $add_purchase_state = false;

    $hair_service = "";
    $massage = "";
    $body_wax = "";
    $product_1 = "";
    $product_2 = "";
    $product_3 = "";
    $product_4 = "";
    $product_5 = "";
    $product_6 = "";
    $p1_quantity = 0;
    $p2_quantity = 0;
    $p3_quantity = 0;
    $p4_quantity = 0;
    $p5_quantity = 0;
    $p6_quantity = 0;

    $product_1_price = 0;
    $product_2_price = 0;
    $product_3_price = 0;
    $product_4_price = 0;
    $product_5_price = 0;
    $product_6_price = 0;
    $total = 0;

    //Connect to database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

    //Update data
    if (isset($_POST['add_customer_update'])) {
        
        //Get Values from form
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $countryCode = $_POST['countryCode'];
        $phoneNumber = $_POST['phoneNumber'];

        //To prevent sql injection
        $id = stripcslashes($id);
        $fullname = stripcslashes($fullname);
        $gender = stripcslashes($gender);
        $dob = stripcslashes($dob);
        $countryCode = stripcslashes($countryCode);
        $phoneNumber = stripcslashes($phoneNumber);

        $id = mysqli_real_escape_string($connection, $id);
        $fullname = mysqli_real_escape_string($connection, $fullname);
        $gender = mysqli_real_escape_string($connection, $gender);
        $dob = mysqli_real_escape_string($connection, $dob);
        $countryCode = mysqli_real_escape_string($connection, $countryCode);
        $phoneNumber = mysqli_real_escape_string($connection, $phoneNumber);
        
        mysqli_query($connection, "UPDATE customers SET fullname='$fullname', gender='$gender', dob='$dob', countryCode='$countryCode', phoneNumber='$phoneNumber' WHERE id='$id'")
            or die("Error".mysqli_error($connection));
        $_SESSION['msg'] = "Data Updated";
        header("Location: editCustomer.php");
    }
    
    //Delete data
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($connection, "DELETE FROM customers WHERE id=$id");
        $_SESSION['msg'] = "Data Deleted";
        header("Location: editCustomer.php");
    }

    //If add purchase button is clicked
    if(isset($_POST['add_purchase_submit'])) {

        //Get Values from form
        $id = $_POST['id'];
        $hair_service = $_POST['hair_service'];
        $hairdresser = $_POST['hairdresser'];
        $massage = $_POST['massage'];
        $body_wax = $_POST['body_wax'];
        $product_1 = $_POST['product_1'];
        $product_2 = $_POST['product_2'];
        $product_3 = $_POST['product_3'];
        $product_4 = $_POST['product_4'];
        $product_5 = $_POST['product_5'];
        $product_6 = $_POST['product_6'];
        $p1_quantity = $_POST['p1_quantity'];
        $p2_quantity = $_POST['p2_quantity'];
        $p3_quantity = $_POST['p3_quantity'];
        $p4_quantity = $_POST['p4_quantity'];
        $p5_quantity = $_POST['p5_quantity'];
        $p6_quantity = $_POST['p6_quantity'];
        
        if ($product_1 == "Art Hairspray(420ml) x") {
            $product_1_price = 12;
        } else if ($product_1 == "L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x") {
            $product_1_price = 62;
        } else if ($product_1 == "Notel Spiky Clap (100ml) x") {
            $product_1_price = 25;
        } else if ($product_1 == "Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x") {
            $product_1_price = 200;
        } else if ($product_1 == "Kerastase Elixir Ultime (100ml) x") {
            $product_1_price = 120;
        } else if ($product_1 == "Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x") {
            $product_1_price = 230;
        } else if ($product_1 == "MNM Aromatic Hairspray (420ml) x") {
            $product_1_price = 12;
        } else if ($product_1 == "Schwarzkopf Osis+ Dust It Mattifying Powder 10g x") {
            $product_1_price = 30;
        } else if ($product_1 == "Ketastase Resistance Ciment Thermique (150ml) x") {
            $product_1_price = 50;
        } else if ($product_1 == "Elegance Plus Matte Hair Wax (140g) x") {
            $product_1_price = 90;
        } else if ($product_1 == "Arimino Spice Water Shining Straight x") {
            $product_1_price = 120;
        } else if ($product_1 == "L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x") {
            $product_1_price = 110;
        } else {
            
        }
        
        if ($product_2 == "Art Hairspray(420ml) x") {
            $product_1_price = 12;
        } else if ($product_2 == "L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x") {
            $product_2_price = 62;
        } else if ($product_2 == "Notel Spiky Clap (100ml) x") {
            $product_2_price = 25;
        } else if ($product_2 == "Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x") {
            $product_2_price = 200;
        } else if ($product_2 == "Kerastase Elixir Ultime (100ml) x") {
            $product_2_price = 120;
        } else if ($product_2 == "Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x") {
            $product_2_price = 230;
        } else if ($product_2 == "MNM Aromatic Hairspray (420ml) x") {
            $product_2_price = 12;
        } else if ($product_2 == "Schwarzkopf Osis+ Dust It Mattifying Powder 10g x") {
            $product_2_price = 30;
        } else if ($product_2 == "Ketastase Resistance Ciment Thermique (150ml) x") {
            $product_2_price = 50;
        } else if ($product_2 == "Elegance Plus Matte Hair Wax (140g) x") {
            $product_2_price = 90;
        } else if ($product_2 == "Arimino Spice Water Shining Straight x") {
            $product_2_price = 120;
        } else if ($product_2 == "L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x") {
            $product_2_price = 110;
        } else {
            
        }
        
        if ($product_3 == "Art Hairspray(420ml) x") {
            $product_3_price = 12;
        } else if ($product_3 == "L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x") {
            $product_3_price = 62;
        } else if ($product_3 == "Notel Spiky Clap (100ml) x") {
            $product_3_price = 25;
        } else if ($product_3 == "Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x") {
            $product_3_price = 200;
        } else if ($product_3 == "Kerastase Elixir Ultime (100ml) x") {
            $product_3_price = 120;
        } else if ($product_3 == "Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x") {
            $product_3_price = 230;
        } else if ($product_3 == "MNM Aromatic Hairspray (420ml) x") {
            $product_3_price = 12;
        } else if ($product_3 == "Schwarzkopf Osis+ Dust It Mattifying Powder 10g x") {
            $product_3_price = 30;
        } else if ($product_3 == "Ketastase Resistance Ciment Thermique (150ml) x") {
            $product_3_price = 50;
        } else if ($product_3 == "Elegance Plus Matte Hair Wax (140g) x") {
            $product_3_price = 90;
        } else if ($product_3 == "Arimino Spice Water Shining Straight x") {
            $product_3_price = 120;
        } else if ($product_3 == "L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x") {
            $product_3_price = 110;
        } else {
            
        }
        
        if ($product_4 == "Art Hairspray(420ml) x") {
            $product_4_price = 12;
        } else if ($product_4 == "L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x") {
            $product_4_price = 62;
        } else if ($product_4 == "Notel Spiky Clap (100ml) x") {
            $product_4_price = 25;
        } else if ($product_4 == "Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x") {
            $product_4_price = 200;
        } else if ($product_4 == "Kerastase Elixir Ultime (100ml) x") {
            $product_4_price = 120;
        } else if ($product_4 == "Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x") {
            $product_4_price = 230;
        } else if ($product_4 == "MNM Aromatic Hairspray (420ml) x") {
            $product_4_price = 12;
        } else if ($product_4 == "Schwarzkopf Osis+ Dust It Mattifying Powder 10g x") {
            $product_4_price = 30;
        } else if ($product_4 == "Ketastase Resistance Ciment Thermique (150ml) x") {
            $product_4_price = 50;
        } else if ($product_4 == "Elegance Plus Matte Hair Wax (140g) x") {
            $product_4_price = 90;
        } else if ($product_4 == "Arimino Spice Water Shining Straight x") {
            $product_4_price = 120;
        } else if ($product_4 == "L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x") {
            $product_4_price = 110;
        } else {
            
        }
        
        if ($product_5 == "Art Hairspray(420ml) x") {
            $product_5_price = 12;
        } else if ($product_5 == "L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x") {
            $product_5_price = 62;
        } else if ($product_5 == "Notel Spiky Clap (100ml) x") {
            $product_5_price = 25;
        } else if ($product_5 == "Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x") {
            $product_5_price = 200;
        } else if ($product_5 == "Kerastase Elixir Ultime (100ml) x") {
            $product_5_price = 120;
        } else if ($product_5 == "Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x") {
            $product_5_price = 230;
        } else if ($product_5 == "MNM Aromatic Hairspray (420ml) x") {
            $product_5_price = 12;
        } else if ($product_5 == "Schwarzkopf Osis+ Dust It Mattifying Powder 10g x") {
            $product_5_price = 30;
        } else if ($product_5 == "Ketastase Resistance Ciment Thermique (150ml) x") {
            $product_5_price = 50;
        } else if ($product_5 == "Elegance Plus Matte Hair Wax (140g) x") {
            $product_5_price = 90;
        } else if ($product_5 == "Arimino Spice Water Shining Straight x") {
            $product_5_price = 120;
        } else if ($product_5 == "L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x") {
            $product_5_price = 110;
        } else {
            
        }
        
        if ($product_6 == "Art Hairspray(420ml) x") {
            $product_6_price = 12;
        } else if ($product_6 == "L'Oreal Professional Hair SPA Detoxifying Shampoo(1500ml) x") {
            $product_6_price = 62;
        } else if ($product_6 == "Notel Spiky Clap (100ml) x") {
            $product_6_price = 25;
        } else if ($product_6 == "Shiseido Professional THC Aqua Intensive Treatment 1 Airy Feel Conditioner (1000g) x") {
            $product_6_price = 200;
        } else if ($product_6 == "Kerastase Elixir Ultime (100ml) x") {
            $product_6_price = 120;
        } else if ($product_6 == "Shiseido Professional THC Adenovital Advanced Scalp Essence 180ml x") {
            $product_6_price = 230;
        } else if ($product_6 == "MNM Aromatic Hairspray (420ml) x") {
            $product_6_price = 12;
        } else if ($product_6 == "Schwarzkopf Osis+ Dust It Mattifying Powder 10g x") {
            $product_6_price = 30;
        } else if ($product_6 == "Ketastase Resistance Ciment Thermique (150ml) x") {
            $product_6_price = 50;
        } else if ($product_6 == "Elegance Plus Matte Hair Wax (140g) x") {
            $product_6_price = 90;
        } else if ($product_6 == "Arimino Spice Water Shining Straight x") {
            $product_6_price = 120;
        } else if ($product_6 == "L'Oreal Professionnel Serioxyl Stemoxydine 5% Neohesperidin Denser Hair Treatment (90ml) x") {
            $product_6_price = 110;
        } else {
            
        }
        
        //$total = $_POST['total'];
        $total = (($product_1_price*$p1_quantity)+($product_2_price*$p2_quantity)+($product_3_price*$p3_quantity)+($product_4_price*$p4_quantity)+($product_5_price*$p5_quantity)+($product_6_price*$p6_quantity));

        //To prevent sql injection
        $id  = stripcslashes($id);
        $hair_service = stripcslashes($hair_service);
        $hairdresser = stripcslashes($hairdresser);
        $massage = stripcslashes($massage);
        $body_wax = stripcslashes($body_wax);
        $product_1 = stripcslashes($product_1);
        $product_2 = stripcslashes($product_2);
        $product_3 = stripcslashes($product_3);
        $product_4 = stripcslashes($product_4);
        $product_5 = stripcslashes($product_5);
        $product_6 = stripcslashes($product_6);
        $p1_quantity = stripcslashes($p1_quantity);
        $p2_quantity = stripcslashes($p2_quantity);
        $p3_quantity = stripcslashes($p3_quantity);
        $p4_quantity = stripcslashes($p4_quantity);
        $p5_quantity = stripcslashes($p5_quantity);
        $p6_quantity = stripcslashes($p6_quantity);
        $total = stripcslashes($total);

        $id = mysqli_real_escape_string($connection, $id);
        $hair_service = mysqli_real_escape_string($connection, $hair_service);
        $hairdresser = mysqli_real_escape_string($connection, $hairdresser);
        $massage = mysqli_real_escape_string($connection, $massage);
        $body_wax = mysqli_real_escape_string($connection, $body_wax);
        $product_1 = mysqli_real_escape_string($connection, $product_1);
        $product_2 = mysqli_real_escape_string($connection, $product_2);
        $product_3 = mysqli_real_escape_string($connection, $product_3);
        $product_4 = mysqli_real_escape_string($connection, $product_4);
        $product_5 = mysqli_real_escape_string($connection, $product_5);
        $product_6 = mysqli_real_escape_string($connection, $product_6);
        $p1_quantity = mysqli_real_escape_string($connection, $p1_quantity);
        $p2_quantity = mysqli_real_escape_string($connection, $p2_quantity);
        $p3_quantity = mysqli_real_escape_string($connection, $p3_quantity);
        $p4_quantity = mysqli_real_escape_string($connection, $p4_quantity);
        $p5_quantity = mysqli_real_escape_string($connection, $p5_quantity);
        $p6_quantity = mysqli_real_escape_string($connection, $p6_quantity);
        $total = mysqli_real_escape_string($connection, $total);

        $query = "INSERT INTO customerPurchaseHistory (datePurchased, id, hairServices, hairdresser_id, massage, bodyWax, itemPurchased, total) VALUES (CURRENT_DATE(), '$id', '$hair_service', '$hairdresser', '$massage', '$body_wax', CONCAT('$product_1', '$p1_quantity', ' ', '$product_2', '$p2_quantity', ' ', '$product_3', '$p3_quantity', ' ', '$product_4', '$p4_quantity', ' ', '$product_5', '$p5_quantity', ' ', '$product_6', '$p6_quantity'), '$total')";
        mysqli_query($connection, $query)
            or die("Error".mysqli_error($connection));
        $_SESSION['msg'] = "Purchase Added";
        header("Location: editCustomer.php");
    }

    //Retrieve data
    $results = mysqli_query($connection, "SELECT * FROM customers");

?>