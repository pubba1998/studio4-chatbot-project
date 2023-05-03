<style type="text/css">* {
        padding: 0;
        margin: 0;
    }

    div {
        padding: 4px 48px;
    }

    a {
        color: #2E5CD5;
        cursor: pointer;
        text-decoration: none
    }

    a:hover {
        text-decoration: underline;
    }

    body {
        background: #fff;
        font-family: "Century Gothic", "Microsoft yahei";
        color: #333;
        font-size: 18px;
    }

    h1 {
        font-size: 100px;
        font-weight: normal;
        margin-bottom: 12px;
    }

    p {
        line-height: 1.6em;
        font-size: 42px
    }</style>

<?php
include 'connection.php';

$order_id =$_GET['order_id'] ?? 0;
$upSql = 'UPDATE orders SET 
status=30
WHERE order_id=' . $order_id;
$status = $conn->query($upSql);

echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">del cart success, jumping....</a> </span></div>';


echo '<meta http-equiv = "refresh"  content = "3;url=./cart.php" >';
die;