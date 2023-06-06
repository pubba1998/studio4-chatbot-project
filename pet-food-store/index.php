<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff</title>

    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/chatbot.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-6uRpkzL3jSP4zwtsu3V0EmBDTGXhqW5PT5SzVcEhPvdnwwMF8GWW2yC9iOhpC1h2HsRrXnZVyt/fqSyUYbqR4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="aboutus.php">About Us</a>
        <a href="member.php">Login</a>
        <a href="cart.php">Shopping cart</a>
    </nav>
    <div>
        <h1>Pet Ruff</h1>
        <h2>Your pets' favourite place</h2>
    </div>
</header>

<section>
    <div class="container">
        <h3>Best place for all your pets needs</h3>
        <p>
            All your pet need from food to health care for every need we bring the best quality products and service to your fingertip.
        </p>
    </div>

    <div class="row">
        <div class="column">
            <div class="card">
                <h3>Cat Food</h3>
                <a href="catFood.php"><img src="images/cat_food.jpg" class="imgFood"></a>
                <p>10% all cat food items</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Dog Food</h3>
                <a href="dogFood.php"><img src="images/dog_food.jpg" class="imgFood"></a>
                <p>20% on selected items</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Bird Food</h3>
                <a href="birdFood.php"><img src="images/bird_food.jpg" class="imgFood"></a>
                <p>Buy one Pack and get one free</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <h3>Fish Food</h3>
                <a href="fishFood.php"><img src="images/fish_food.jpg" class="imgFood"></a>
                <p>Discounts over $20 purchases</p>
            </div>
        </div>
    </div>
</section>

<footer>
    <br>
    <p>Author: Pudubu Dasun<br>
        <a href="mailto:info@petruff.com">info@petruff.com</a></p>
</footer>

<div class="chatbot-container">
    <div class="chatbot-header">
        
    </div>
    <div class="chatbot-body">
        <!-- Chat messages will be displayed here -->
    </div>
    <div class="chat-input-container">
        <input type="text" id="chat-input" class="chat-input" placeholder="Type your message..." />
        <button id="send-button" class="send-button">Send</button>
    </div>
</div>

<script src="js/chatbot.js"></script>

</body>
</html>
