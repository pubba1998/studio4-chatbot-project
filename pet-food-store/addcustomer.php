<?php
$servername = "localhost";
$username = "root";
$password = ""; //Your password here
$dbname = "pet-store-project";

$id = $_POST["customer_id"];
$name = $_POST["customer_name"];
$email = $_POST["customer_email"];
$number = $_POST["customer_phone"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$sql = "INSERT INTO customers (customer_id, customer_name, customer_email, customer_phone) VALUES (?,?, ?, ?, )";

if ($stmt = $conn->prepare($sql))
$stmt->bind_param("issi", $id, $name, $email, $number);
else
{
$error = $conn->errno . ' ' . $conn->error;
echo $error;
}
$stmt->execute();
echo "Customer has been successfully added!";
$conn->close();
header("Location:member.php");

?>
