<?php
include 'connection.php';

$customers_id = $_COOKIE['customers_id']?? '';
$upSql = 'UPDATE orders SET 
status=20
WHERE customers_id='.$customers_id;
$status = $conn->query($upSql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style='background: url("./images/pay.jpg") no-repeat;'>
</body>
</html>
