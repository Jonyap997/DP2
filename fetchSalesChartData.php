<?php

    //database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    //get connection
    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

    // get sales data for sales report chart
    if (isset($_POST['sales_report'])) {
        
        $result = [];
        
        //Get Values from form
        $year = $_POST['report_year_select'];
        
        //To prevent sql injection
        $year = stripcslashes($year);

        $year = mysqli_real_escape_string($connection, $year);
        
        //query to get data from the table
        for ($i = 0; $i < 12; i++)
        {
            $month = $i + 1;
            $hairdresser_id = 1001 + $i;
            $result[i] = mysqli_query($connection, "SELECT SUM(total) AS sales, MONTH(datePurchased) as month FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) AND $month = MONTH(datePurchased)")
            or die("Error".mysqli_error($connection));
        }
        
        $_SESSION['msg'] = "Data Updated";
        header("Location: fetchChartData.php");
        
        print json_encode($result);
        
    }

    
    ?>