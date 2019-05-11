<?php

//Connect to database
$dbHost="localhost";
$dbUser="id9115199_salondemo";
$dPassword="qwe121993";
$db="id9115199_salon";

$connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db) or die(mysqli_error($connection));
?>