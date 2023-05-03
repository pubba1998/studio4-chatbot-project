<?php
include 'connection.php';
$customers_id = $_COOKIE['customers_id'] ?? 0;
$selectSql = 'select * from orders where status = 10 and customers_id = ' .$customers_id;
$res = $conn->query($selectSql);
$result = [];
if ($res) {
    while ($row = $res->fetch_assoc()) {
        $result[] = $row;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>shooping cart</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cart.css"/>
    <script type="text/javascript" src="js/cart.js"></script>
</head>

<body>
<nav>
    <a href="index.php">Home</a>
    <a href="aboutus.php">About Us</a>
    <a href="member.php">Login</a>
    <a href="cart.php">Shopping cart</a>
</nav>
<table id="cartTable">
    <thead>
    <tr>
        <th><label><input class="check-all check" type="checkbox"/>&nbsp;select all</label></th>
        <th>commodity</th>
        <th>Unit price</th>
        <th>amount</th>
        <th>Subtotal</th>
        <th>manipulate</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($result as $item) {
        ?>
        <tr>
            <td class="checkbox"><input class="check-one check" type="checkbox"/></td>
            <td class="goods"><img src="<?php echo $item['image_url']; ?>"
                                   alt=""/><span><?php echo $item['commodity']; ?></span></td>
            <td class="price"><?php echo $item['price']; ?></td>
            <td class="count">
                <span class="reduce"></span>
                <input class="count-input" type="text" value="1"/>
                <span class="add">+</span></td>
            <td class="subtotal"><?php echo $item['price']; ?></td>
            <td class="operation"><span class="delete"><a href="cartDel.php?order_id=<?php echo $item['order_id'];?>">del</a></span></td>
        </tr>
        <?php
    }
    ?>


    </tbody>
</table>

<div class="foot" id="foot">
    <label class="fl select-all"><input type="checkbox" class="check-all check"/>&nbsp;select all

    </label>
    <a class="fl delete" id="deleteAll" href="javascript:;">del</a>
    <div class="fr closing"><a href="pay.php">pay</a></div>
    <div class="fr total">count：$<span id="priceTotal">0.00</span></div>
    <div class="fr selected" id="selected">Selected Products
        <span id="selectedTotal">0</span>piece
        <span class="arrow up">︽</span>
        <span class="arrow down">︾</span>
    </div>
    <div class="selected-view">
        <div id="selectedViewList" class="clearfix">
            <!--<div><img src="images/1.jpg"><span></span></div>-->
        </div>
        <span class="arrow">◆<span>◆</span></span>
    </div>
</div>
</body>

</html>
