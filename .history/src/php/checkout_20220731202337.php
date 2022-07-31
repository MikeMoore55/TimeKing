<?php

    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';



    if (isset($_POST["cart"])) {

        $username = $_POST["username"];

        $sql = "DELETE FROM cart_info WHERE cart_user = :username";
        
    }

?>