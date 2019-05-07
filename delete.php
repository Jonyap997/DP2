<?php

if(isset($_POST["id"]))
{
    //$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');
    //$connect = new PDO('mysql:host=localhost;dbname=id9115199_salon', 'id9115199_salondemo', 'qwe121993');

    //Connect to database
    $dbHost="localhost";
    $dbUser="id9115199_salondemo";
    $dPassword="qwe121993";
    $db="id9115199_salon";

    $connection = mysqli_connect($dbHost, $dbUser, $dPassword, $db) or die(mysqli_error($connection));
    
    $query = "
    DELETE from events WHERE id=:id
    ";
    $statement = $connection->prepare($query);
    $statement->execute(
        array(
        ':id' => $_POST['id']
        )
    );
}

?>