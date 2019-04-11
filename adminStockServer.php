<?php
    session_start();
    //Initialise variable
    $id = 0;
    $name = "";
    $price = "";
    $amountRemaining = "";
    $description = "";
    $edit_state = false;

    //Connect to database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);


    //If save button is clicked
    if(isset($_POST['save'])) {

        //Get Values from form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $amountRemaining = $_POST['amountRemaining'];
        $description = $_POST['description'];

        //To prevent sql injection
        $name = stripcslashes($name);
        $price = stripcslashes($price);
        $amountRemaining = stripcslashes($amountRemaining);
        $description = stripcslashes($description);

        $name = mysqli_real_escape_string($connection, $name);
        $price = mysqli_real_escape_string($connection, $price);
        $amountRemaining = mysqli_real_escape_string($connection, $amountRemaining);
        $description = mysqli_real_escape_string($connection, $description);

        $query = "INSERT INTO inventories (name, price, amountRemaining, description) VALUES ('$name', '$price', '$amountRemaining', '$description')";
        mysqli_query($connection, $query);
        $_SESSION['msg'] = "Data Saved";
        header("Location: adminStockAndInventories.php");
    }

    //Update data
    if (isset($_POST['update'])) {
        
        //Get Values from form
        $name = $_POST['name'];
        $price = $_POST['price'];
        $amountRemaining = $_POST['amountRemaining'];
        $description = $_POST['description'];

        //To prevent sql injection
        $name = stripcslashes($name);
        $price = stripcslashes($price);
        $amountRemaining = stripcslashes($amountRemaining);
        $description = stripcslashes($description);
        
        $name = mysqli_real_escape_string($connection, $name);
        $price = mysqli_real_escape_string($connection, $price);
        $amountRemaining = mysqli_real_escape_string($connection, $amountRemaining);
        $description = mysqli_real_escape_string($connection, $description);
        
        mysqli_query($connection, "UPDATE inventories SET name='$name', price='$price', amountRemaining='$amountRemaining', description='$description' WHERE id='$id'");
        $_SESSION['msg'] = "Data Updated";
        header("Location: adminStockAndInventories.php");
    }
    
    //Delete data
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        mysqli_query($connection, "DELETE FROM inventories WHERE id=$id");
        $_SESSION['msg'] = "Data Deleted";
        header("Location: adminStockAndInventories.php");
    }

    //Retrieve data
    $results = mysqli_query($connection, "SELECT * FROM inventories");

?>