<?php
    session_start();

    //setting header to json
    header('Content-Type: application/json');

    //database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    //get connection
    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

    // get daily customer data for daily customer chart
    //if (isset($_POST['generate_customer_report'])) {
        
        //Get Values from form
        $year = $_SESSION['daily_year'];
        $month = $_SESSION['daily_month'];

        //To prevent sql injection
        $year = stripcslashes($year);
        $month = stripcslashes($month);
        
        $year = mysqli_real_escape_string($connection, $year);
        $month = mysqli_real_escape_string($connection, $month);
        
        //query to get data from the table
            $result = mysqli_query($connection, "SELECT DAY(datePurchased) as day, COUNT(*) AS count FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) AND $month = MONTH(datePurchased) GROUP BY DAY(datePurchased)")
            or die("Error".mysqli_error($connection));
        
        $data = array();
        foreach ($result as $row) {
          $data[] = $row;
        }
        
        echo json_encode($data); 
        
    //}
?>

