<?php
include 'connection.php';

$customers_name = $_COOKIE['customers_name'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@300;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="css/index.css">

</head>
<!-- <style>
    .button {
	background-color: gray;
	color: white;
	padding: 5px 45px;
	padding-left: 60px;
	padding-right: 60px;
    text-align: center;
	font-family: Georgia, serif;
}
</style> -->
<style type="text/css">

    input[type=text], input[type=password] {

        width: 340px;

        padding: 0 25px;

        height: 48px;

        border: 1px solid #f2f2f2;

        background: #f6f6f6;

        color: #202124;

        font-size: 14px;

        line-height: 48px;

        border-radius: 25px;

    }
</style>
<body>

<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="member.php">Login</a>
        <a href="cart.php">Shopping cart</a>
    </nav>
    <div>
        <?php

        if ($customers_name) {
             ?>
            <h1><?php echo 'HELLO:' . $customers_name?> <a href="./logout.php"> logout</a></h1>

            <?php
        } else {
            ?>
        <form method="post" action="login.php">
            <h1>Log in</h1>
            <!-- Input email and password -->
            <label>Email</label><br>
            <input type="text" name="email"><br><br>
            <label>Password</label><br>
            <input type="password" name="password"></label>
            <input type="text" hidden name="type" value="login">

            <br>
            <!-- Sign in  page -->
            <button  >Log in</button>
            <br>
        </form>
            <button onclick="document.location='register.php'">Become a member</button>
            <?php
        }
        ?>
    </div>

</header>

</body>
</html>
