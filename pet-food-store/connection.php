<?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "1234"; //Your password here
    $dbname = "pet-store-project";
 
 $conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
?>
 