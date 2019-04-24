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
    $p1_quantity = "";
    $p2_quantity = "";
    $p3_quantity = "";
    $p4_quantity = "";
    $p5_quantity = "";
    $p6_quantity = "";
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
        header("Location: editCustomer.php");
    }

    //If add purchase button is clicked
    if(isset($_POST['add_purchase_submit'])) {

        //Get Values from form
        $id = $_POST['id'];
        $hair_service = $_POST['hair_service'];
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
        $total = $_POST['total'];

        //To prevent sql injection
        $id  = stripcslashes($id);
        $hair_service = stripcslashes($hair_service);
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

        $query = "INSERT INTO customerPurchaseHistory (datePurchased, id, hairServices, massage, bodyWax, itemPurchased, total) VALUES (CURRENT_DATE(), '$id', '$hair_service', '$massage', '$body_wax', CONCAT('$product_1', '$p1_quantity', ' ', '$product_2', '$p2_quantity', ' ', '$product_3', '$p3_quantity', ' ', '$product_4', '$p4_quantity', ' ', '$product_5', '$p5_quantity', ' ', '$product_6', '$p6_quantity'), '$total')";
        mysqli_query($connection, $query)
            or die("Error".mysqli_error($connection));
        $_SESSION['msg'] = "Purchase Added";
        header("Location: editCustomer.php");
    }

    //Retrieve data
    $results = mysqli_query($connection, "SELECT * FROM customers");

?>