<?php
    session_start();
    //Initialise variable
    $id = 0;
    $name = "";
    $brand = "";
    $amountRemaining = "";
    $volume = "";
    $price = "";
    $source = "";
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
        $brand = $_POST['brand'];
        $amountRemaining = $_POST['amountRemaining'];
        $volume = $_POST['volume'];
        $price = $_POST['price'];
        $source = $_POST['source'];
        $description = $_POST['description'];

        //To prevent sql injection
        $name = stripcslashes($name);
        $brand = stripcslashes($brand);
        $amountRemaining = stripcslashes($amountRemaining);
        $volume = stripcslashes($volume);
        $price = stripcslashes($price);
        $source = stripcslashes($source);
        $description = stripcslashes($description);

        $name = mysqli_real_escape_string($connection, $name);
        $brand = mysqli_real_escape_string($connection, $brand);
        $amountRemaining = mysqli_real_escape_string($connection, $amountRemaining);
        $volume = mysqli_real_escape_string($connection, $volume);
        $price = mysqli_real_escape_string($connection, $price);
        $source = mysqli_real_escape_string($connection, $source);
        $description = mysqli_real_escape_string($connection, $description);

        $query = "INSERT INTO inventories (name, brand, amountRemaining, volume, price, source, description) VALUES ('$name', '$brand', '$amountRemaining', '$volume', '$price', '$source', '$description')";
        mysqli_query($connection, $query)
            or die("Error".mysqli_error($connection));
        $_SESSION['msg'] = "Data Saved";
        header("Location: adminStockAndInventories.php");
    }

    //Update data
    if (isset($_POST['update'])) {
        
        //Get Values from form
        $id = $_POST['id'];
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $amountRemaining = $_POST['amountRemaining'];
        $volume = $_POST['volume'];
        $price = $_POST['price'];
        $source = $_POST['source'];
        $description = $_POST['description'];

        //To prevent sql injection
        $id = stripcslashes($id);
        $name = stripcslashes($name);
        $brand = stripcslashes($brand);
        $amountRemaining = stripcslashes($amountRemaining);
        $volume = stripcslashes($volume);
        $price = stripcslashes($price);
        $source = stripcslashes($source);
        $description = stripcslashes($description);

        $id = mysqli_real_escape_string($connection, $id);
        $name = mysqli_real_escape_string($connection, $name);
        $brand = mysqli_real_escape_string($connection, $brand);
        $amountRemaining = mysqli_real_escape_string($connection, $amountRemaining);
        $volume = mysqli_real_escape_string($connection, $volume);
        $price = mysqli_real_escape_string($connection, $price);
        $source = mysqli_real_escape_string($connection, $source);
        $description = mysqli_real_escape_string($connection, $description);
        
        mysqli_query($connection, "UPDATE inventories SET name='$name', brand='$brand', amountRemaining='$amountRemaining', volume='$volume', price='$price', source='$source', description='$description' WHERE id='$id'");
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