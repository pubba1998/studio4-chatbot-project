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

$customers_id = $_COOKIE['customers_id']?? '';
if (!$customers_id) {

    echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">please login.jumping...</a> </span></div>';

    echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';
    die;
}
$price = $_POST['price'];
$commodity = $_POST['commodity'];
$time = date('Y-m-t H:i:s');
$image_url = $_POST['image_url'];
$addSql = "insert into orders (customers_id,commodity,price,create_time,status,image_url)
values ({$customers_id},'{$commodity}',$price, '{$time}' ,10, '{$image_url}')";

$status = $conn->query($addSql);
if ($status) {
    echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">add cart success.jumping...</a> </span></div>';

    $url = getenv("HTTP_REFERER");
    echo '<meta http-equiv = "refresh"  content = "3;url='.$url.'" >';
    die;
}