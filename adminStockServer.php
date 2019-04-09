<?php
    
session_start();

//Initialize variables
$id = 0;
$name = "";
$price = "";
$amountInStock = "";
$description = "";

//Connect to database
$dbHost="localhost";
$dbUser="id9115199_salondemo";
$dPassword="qwe121993";
$db="id9115199_salon";

$connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

//If save button is clicked
if(isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $amountInStock = $_POST['amountInStock'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO inventories (id, name, price, amountRemaining, desc) VALUES ('$id', '$name', '$price', '$amountInStock', '$description')";
    mysqli_query($connection, $query);
    header("Loaction: adminStockAndInventories.php");
}

?>