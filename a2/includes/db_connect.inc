<?php
//Check what server you are accessing
if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "petsvictoria";
} else {
    $servername = "talsprddb02.int.its.rmit.edu.au";
    $username = "s4094165";
    $password = "s4094165";
    $dbname = "s4094165";
}
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Print Message in console to verify mysql 

echo '<script>console.log("You are connected!"); </script>'; 
?>