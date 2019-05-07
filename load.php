<?php

//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
//$connect = new PDO('mysql:host=localhost;dbname=id9115199_salon', 'id9115199_salondemo', 'qwe121993');

//Connect to database
$dbHost="localhost";
$dbUser="id9115199_salondemo";
$dPassword="qwe121993";
$db="id9115199_salon";

$connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db) or die(mysqli_error($connection));


$data = array();

$query = "SELECT * FROM booking ORDER BY id";

$statement = $connection->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
    $data[] = array(
    'id'   => $row["id"],
    'title'   => $row["title"],
    'start'   => $row["start_event"],
    'end'   => $row["end_event"]
    );
}

echo json_encode($data);

?>