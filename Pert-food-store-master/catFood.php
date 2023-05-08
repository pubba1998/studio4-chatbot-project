<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff - Cat Foods</title>

    <link rel="stylesheet" href="css/itemPage.css">

</head>

<body>
<header>

    <nav>
            <a href="index.php">Home</a>
            <a href="aboutus.php ">About Us</a>
            <a href="login.php">Login</a>
            <a href="cart.php">Shopping cart</a>
    </nav>
</header>

<section>

    <br>
    <img src="images/cat_food.jpg" alt="Paris" class="centerImg">
    <br>

    <div class="row">
        <div class="column">
            <div class="card">
                <h3>Whiskas</h3>
                <img src="images/foods/cat_food_one.jpg" class="imgFood">
                <p>Price $30</p>
                <button class="button" onclick="addCart({'price':30, 'commodity': 'Whiskas', 'image_url':'images/foods/cat_food_one.jpg'})">
                    Add to Cart
                </button>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Drools</h3>
                <img src="images/foods/cat_food_two.jpg" class="imgFood">
                <p>Price $20</p>
                <button class="button" onclick="addCart({'price':20, 'commodity': 'Drools', 'image_url':'images/foods/cat_food_two.jpg'})">
                    Add to Cart
                </button>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Meow Mix</h3>
                <img src="images/foods/cat_food_three.jpg" class="imgFood">
                <p>Price $20</p>
                <button class="button" onclick="addCart({'price':20, 'commodity': 'Meow Mix', 'image_url':'images/foods/cat_food_three.jpg'})">
                    Add to Cart
                </button>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>One</h3>
                <img src="images/foods/cat_food_four.jpg" class="imgFood">
                <p>Price $25</p>
                <button class="button" onclick="addCart({'price':25, 'commodity': 'One', 'image_url':'images/foods/cat_food_four.jpg'})">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
</section>
<script src="./js/addItem.js"></script>

<footer>
    <br>
    <p>Author: Pudubu Dasun<br>
        <a href="mailto:info@petruff.com">info@petruff.com</a></p>
</footer>

</body>
</html>