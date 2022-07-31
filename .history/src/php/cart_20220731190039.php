<?php

// require auto load
require __DIR__ . '/../../vendor/autoload.php';

// require db connection file
require __DIR__ . '/../models/db.php';

// require user model
require __DIR__ . '/../models/selected-product.php';

if (isset($_POST["view"])) {

    $username = $_POST["user-name"];
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];

    $sql = "INSERT INTO cart_info  cart_user, cart_products, cart_total VALUES (:userName, :productName, :productPrice)";
}

?>