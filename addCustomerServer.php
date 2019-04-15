<?php
    session_start();
    //Initialise variable
    $id = 0;
    $fullname = "";
    $gender = "";
    $dob = "";
    $countryCode = "";
    $phoneNumber = "";

    //Connect to database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);


    //If save button is clicked
    if(isset($_POST['add_customer_submit'])) {

        //Get Values from form
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $countryCode = $_POST['countryCode'];
        $phoneNumber = $_POST['phoneNumber'];

        //To prevent sql injection
        $fullname = stripcslashes($fullname);
        $gender = stripcslashes($gender);
        $dob = stripcslashes($dob);
        $countryCode = stripcslashes($countryCode);
        $phoneNumber = stripcslashes($phoneNumber);

        $fullname = mysqli_real_escape_string($connection, $fullname);
        $gender = mysqli_real_escape_string($connection, $gender);
        $dob = mysqli_real_escape_string($connection, $dob);
        $countryCode = mysqli_real_escape_string($connection, $countryCode);
        $phoneNumber = mysqli_real_escape_string($connection, $phoneNumber);

        $query = "INSERT INTO customers (fullname, gender, dob, countryCode, phoneNumber, dateRegistered) VALUES ('$fullname', '$gender', '$dob', '$countryCode', '$phoneNumber', CURRENT_DATE())";
        mysqli_query($connection, $query)
            or die("Error".mysqli_error($connection));
        $_SESSION['msg'] = "Customer Added";
        header("Location: addCustomer.php");
    }
?>