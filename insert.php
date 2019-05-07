<?php

//$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
//$connect = new PDO('mysql:host=localhost;dbname=id9115199_salon', 'id9115199_salondemo', 'qwe121993');

//Connect to database
$dbHost="localhost";
$dbUser="id9115199_salondemo";
$dPassword="qwe121993";
$db="id9115199_salon";

$connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db) or die(mysqli_error($connection));

if(isset($_POST["title"]))
{
    $query = "
    INSERT INTO events 
    (title, start_event, end_event) 
    VALUES (:title, :start_event, :end_event)
    ";
    $statement = $connection->prepare($query);
    $statement->execute(
        array(
        ':title'  => $_POST['title'],
        ':start_event' => $_POST['start'],
        ':end_event' => $_POST['end']
        )
    );
}


?>