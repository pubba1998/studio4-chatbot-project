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

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? 0;
$number = $_POST['number'] ?? 0;
$type = $_POST['type'] ?? '';

if ($type == 'reg') {
    $selectSql = "select * from customers where customers_email='{$email}'";
    $res = $conn->query($selectSql);
    $result = [];
    
    if (!$res) {
        echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">reg err1,jumping...</a> </span></div>';
        echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';
        die;
    }
    while ($row = $res->fetch_assoc()) {
        $result = $row;
    }
    if ($result) {
        echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">account exists,jumping...</a> </span></div>';
        echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';
        die;
    }

    $addSql = "insert into customers(customers_name,customers_email,customers_phone,customers_password) VALUES ('{$name}', '{$email}', {$number},'{$password}')";
    
    $status = $conn->query($addSql);
    if ($status) {
        echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">reg success.jumping...</a> </span></div>';
        echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';
        die;
    }

}


if ($type == 'login') {
    $selectSql = "select * from customers where customers_email='{$email}' and customers_password='{$password}'";
    $res = $conn->query($selectSql);
    $result = [];
    if (!$res) {
        echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./register.php" target="yisu">login err,jumping... </a> </span></div>';
        echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';
        die;
    }
    while ($row = $res->fetch_assoc()) {
        $result = $row;
    }
    if ($result) {
        setcookie("customers_email", $email, time() + 3600);
        setcookie("customers_id", $result['customers_id'], time() + 3600);
        setcookie("customers_name", $result['customers_name'], time() + 3600);
        echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./index.php" target="yisu">login success. jumping...</a> </span></div>';
        echo '<meta http-equiv = "refresh"  content = "3;url=./index.php" >';
        die;
    }
    echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./member.php" target="yisu">password/name err.jumping...</a> </span></div>';

    echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';
    die;

}
echo '<div style="padding: 24px 48px;"> <h1>:) </h1><span style="font-size:25px;"><a href="./member.php" target="yisu">reg err,jumping... </a> </span></div>';

echo '<meta http-equiv = "refresh"  content = "3;url=./member.php" >';

