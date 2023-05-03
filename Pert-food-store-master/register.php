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
	font-family: Georgia, serif;}-->
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
            <form id="register" action="login.php" onsubmit="return  reg()" method="post">
                <h1>Sign up to be a Member.</h1>
                <!-- Input email and password -->
                <label>Name</label><br>
                <input type="text" name="name" id="nameR"><br><br>
                <label>Email</label><br>
                <input type="text" name="email" id="emailR"><br><br>
                <label>Password</label><br>
                <input type="password" name="password" id="passwordR"></label>
                <label>Phone Number</label><br>
                <input type="text" name="number" id="numberR"></label>
                <input type="text" hidden name="type" value="reg">
                <!-- Sign in  page -->
                <button  >Sign up</button>
            </form>
            <?php
        }
        ?>
    </div>


</header>


</body>
</html>

<script>
    function reg() {//validation part
        var numberR = document.getElementById('numberR').value;
        var emailR = document.getElementById('emailR').value;
        var passwordR = document.getElementById('passwordR').value;

        if (emailR.indexOf('@') == -1) {
            alert('email format err');
            return false;
        }else
        if (!CheckPassWord(passwordR)) {
            alert('password format err, Must include Letters and numbers');
            return false;
        }else
        if (isNaN(numberR)) {

            alert('phone format err');
            return false;
        } else {
            return true;
        }

    }


    function CheckPassWord(password) {
        var str = password;
        var reg = new RegExp(/^(?![^a-zA-Z]+$)(?!\D+$)/);
        if (reg.test(str)){
            return 1;
        }

        return 0;
    }

</script>

