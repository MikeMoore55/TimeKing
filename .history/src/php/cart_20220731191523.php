<?php

// require auto load
require __DIR__ . '/../../vendor/autoload.php';

// require db connection file
require __DIR__ . '/../models/db.php';

// require user model
require __DIR__ . '/../models/selected-product.php';

if (isset($_POST["cart"])) {

    $username = $_POST["user-name"];
    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];

    $sql = "INSERT INTO cart_info (cart_user, cart_products, cart_total) VALUES (:userName, :productName, :productPrice)";

    try{
        /* db object */
        $database = new DB();
    
        /* connect to DB */
        $conn = $database->connect();
        
        /* prepared statement */
        $stmt = $conn->prepare($sql);
        
        /* binding parameters */
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);

         /* exucute prepared statement */
        $result = $stmt->execute();
        
        $database = null;
        /* when data is saved, take user to sign in page to sign user in */
        header("location: /checkout.html");

    }
    catch (PDOException $e){
        $error = array(
            "message" => $e->getMessage()
        );
        print_r($error)
/*         header("location: /product.html");
 */    }
}

?>