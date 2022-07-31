<?php

    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';



    if (isset($_POST["cart"])) {

        $username = $_POST["username"];

        $sql = "DELETE FROM cart_info WHERE cart_user = :username";
     
        try{
            /* db object */
            $database = new DB();
        
            /* connect to DB */
            $conn = $database->connect();
            
            /* prepared statement */
            $stmt = $conn->prepare($sql);
            
            /* binding parameters */
            $stmt->bindParam(':username', $username);
    
            /* exucute prepared statement */
            $result = $stmt->execute();
            
            $database = null;
            /* when data is saved, take user to sign in page to sign user in */
            header("location: /confirm.html");
    
        }catch (PDOException $e){
            $error = array(
                "message" => $e->getMessage()
            );
            print_r($error);
            echo $userName;
            echo $productName;
            header("location: /cart.html");
        }
    }

?>