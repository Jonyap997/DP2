<?php

    //setting header to json
    header('Content-Type: application/json');

    //database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    //get connection
    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

    // get sales data for sales report chart
    //if (isset($_POST['generate_sales_report'])) {
        
        //Get Values from form
        $year = 2019;//$_POST['report_year_select'];
        
        //To prevent sql injection
        $year = stripcslashes($year);

        $year = mysqli_real_escape_string($connection, $year);
        
        //query to get data from the table
        $result = mysqli_query($connection, "SELECT MONTH(datePurchased) as month, SUM(total) AS sales FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) GROUP BY MONTH(datePurchased)")
        or die("Error".mysqli_error($connection));

        $data = array();
        foreach ($result as $row) {
          $data[] = $row;
        }
        
        
        echo json_encode($data);
        
    //}

    
    ?>