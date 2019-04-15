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

    //Retrieve data
    $results = mysqli_query($connection, "SELECT * FROM customers");

?>