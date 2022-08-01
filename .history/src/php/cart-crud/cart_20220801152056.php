<?php

// require auto load
require __DIR__ . '/../../vendor/autoload.php';

// require db connection file
require __DIR__ . '/../models/db.php';

// require selected product model
require __DIR__ . '/../models/selected-product.php';

if (isset($_POST["cart"])) {

    $username = $_POST["user-name"];
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];

    $sql = "INSERT INTO cart_info (cart_user, cart_products, cart_total) VALUES (:username, :productName, :productPrice)";

    try{
        /* db object */
        $database = new DB();
    
        /* connect to DB */
        $conn = $database->connect();
        
        /* prepared statement */
        $stmt = $conn->prepare($sql);
        
        /* binding parameters */
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);

         /* exucute prepared statement */
        $result = $stmt->execute();
        
        $database = null;
        header("location: /checkout.html");

    }
    catch (PDOException $e){
        $error = array(
            "message" => $e->getMessage()
        );
        print_r($error);
        echo $userName;
        echo $productName;
        header("location: /product.html");
    }
}

?>