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
            $result[i] = mysqli_query($connection, "SELECT COUNT(*) FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) AND $month = MONTH(datePurchased) AND $day = DAY(datePurchased)")
            or die("Error".mysqli_error($connection));
        }
        
        $_SESSION['msg'] = "Data Updated";
        header("Location: fetchChartData.php");
        
    }

    // get hairdresser performance data for hairdresser performance chart
    if (isset($_POST['hairdresser_performance'])) {
        
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
        
        $hairdresserCount = mysqli_query($connection, "SELECT COUNT(*) FROM hairdresser")
            or die("Error".mysqli_error($connection));
        
        //query to get data from the table
        for ($i = 0; $i < $hairdresserCount; i++)
        {
            $hairdresser_id = 1001 + $i;
            $result[i] = mysqli_query($connection, "SELECT COUNT(*) FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) AND $month = MONTH(datePurchased) AND hairdresser_id = $hairdresser_id")
            or die("Error".mysqli_error($connection));
        }
        
        $_SESSION['msg'] = "Data Updated";
        header("Location: fetchChartData.php");
        
    }

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
            $result[i] = mysqli_query($connection, "SELECT SUM(total) FROM customerPurchaseHistory WHERE $year = YEAR(datePurchased) AND $month = MONTH(datePurchased)")
            or die("Error".mysqli_error($connection));
        }
        
        $_SESSION['msg'] = "Data Updated";
        header("Location: fetchChartData.php");
        
    }
    ?>