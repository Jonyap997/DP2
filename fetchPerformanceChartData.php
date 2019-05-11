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

    // get hairdresser performance data for hairdresser performance chart
    //if (isset($_POST['generate_performance_report'])) {
        
        //Get Values from form
        $year = $_SESSION['performance_year'];
        $month = $_SESSION['performance_month'];

        //To prevent sql injection
        $year = stripcslashes($year);
        $month = stripcslashes($month);

        $year = mysqli_real_escape_string($connection, $year);
        $month = mysqli_real_escape_string($connection, $month);
        
        //query to get data from the table
        $result = mysqli_query($connection, "SELECT H.name as hairdressers, COUNT(*) AS customers FROM hairdresser H JOIN customerPurchaseHistory C
            ON H.hairdresser_id = C.hairdresser_id WHERE $year = YEAR(C.datePurchased) AND $month = MONTH(C.datePurchased) GROUP BY C.hairdresser_id")
        or die("Error".mysqli_error($connection));
        
        $data = array();
        foreach ($result as $row) {
          $data[] = $row;
        }
        
        echo json_encode($data);
    //}
?>