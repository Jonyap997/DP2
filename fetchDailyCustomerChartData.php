<?php

    //database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    //get connection
    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db);

    // get daily customer data for daily customer chart
    if (isset($_POST['daily_customer'])) {
        
        $monthsArray = array (31,28,31,30,31,30,31,31,30,31,30,31); 
        $result = [];
        
        //Get Values from form
        $year = $_POST['report_year_select'];
        $month = $_POST['report_month_select'];
        
        if ($year % 4 == 0)
            $monthsArray[1] = 29;

        //To prevent sql injection
        $year = stripcslashes($year);
        $month = stripcslashes($month);

        $year = mysqli_real_escape_string($connection, $year);
        $month = mysqli_real_escape_string($connection, $month);
        
        $dayInMonth = $monthsArray[$month - 1];
        
        //query to get data from the table
        for ($i = 0; $i < $dayInMonth-1; i++)
        {
            $day = $i + 1;
            $result[i] = mysqli_query($connection, "SELECT DAY(datePurchased) as day, COUNT(*) AS count FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) AND $month = MONTH(datePurchased) AND $day = DAY(datePurchased)")
            or die("Error".mysqli_error($connection));
        }
        
        $_SESSION['msg'] = "Data Updated";
        header("Location: fetchChartData.php");
        
        print json_encode($result);
        
    }

