<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Ruff - Fish Foods</title>

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
            <img src="images/fish_food.jpg" alt="Paris" class="centerImg">
            <br>
            
            
        <div class="row">
            <div class="column">
              <div class="card">
                <h3>Chi Fish Food</h3>
                <img src="images/foods/fish_food_one.jpg" class="imgFood">
                <p>Price $5</p>
                  <button class="button" onclick="addCart({'price': 5, 'commodity': 'Chi Fish Food', 'image_url':'images/foods/fish_food_one.jpg'})">
                    Add to Cart
                </button>
              </div>
            </div>
          
            <div class="column">
              <div class="card">
                <h3>Diomands</h3>
                <img src="images/foods/fish_food_two.jpg" class="imgFood">
                <p>Price $20</p>
                  <button class="button" onclick="addCart({'price': 20, 'commodity': 'Diomands', 'image_url':'images/foods/fish_food_two.jpg'})">
                    Add to Cart
                </button>
            </div>
            </div>
            

            <div class="column">
                <div class="card">
                  <h3>Tera Bits</h3>
                  <img src="images/foods/fish_food_three.jpg" class="imgFood">
                  <p>Price $20</p>
                    <button class="button" onclick="addCart({'price': 20, 'commodity': 'Tera Bits', 'image_url':'images/foods/fish_food_three.jpg'})">
                      Add to Cart
                  </button>
              </div>
              </div>

            <div class="column">
              <div class="card">
                <h3>Goald Fish</h3>
                <img src="images/foods/fish_food_four.jpg" class="imgFood">
                <p>Price $15</p>
                  <button class="button" onclick="addCart({'price': 15, 'commodity': 'Goald Fish', 'image_url':'images/foods/fish_food_four.jpg'})">
                    Add to Cart
                </button>
              </div>
            </div>
          </div>
        </section>
        <footer>
            <br>
            <p>Author: Pudubu Dasun<br>
            <a href="mailto:info@petruff.com">info@petruff.com</a></p>
         </footer>
        
     <script src="./js/addItem.js"></script>
    
</body>
</html>