<?php
    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';
    
    // require user model
    require __DIR__ . '/../models/sign-in-user.php';

    if (isset($_POST["view"])) {
        $selectedID = $_POST["selectedProductID"];

        $sql = "SELECT * FROM product_info WHERE watch_id = '$selectedID'"; // SQL with parameters

        try{
            // Get DB Object
            $database = new DB();
            
            // connect to DB
            $conn = $database->connect();
            
            // query
            $stmt = $conn->query($sql);
            $productInfo = $stmt->fetchAll(PDO::FETCH_OBJ);
            $database = null;

            // loop through to find the original info
            foreach ($productInfo as $watch => $value) {
                $productID = $value -> watch_id;
                $productName = $value -> watch_name;
                $productDesc = $value -> watch_desc;
                $productRating = $value -> watch_rating;
                $productQty = $value -> watch_qty;
                $productPicture = $value -> watch_pic;
                $productAvailable = $value -> watch_available

            }

        }
        catch(PDOException $e){
            $error = array(
              "message" => $e->getMessage()  
            );
            /* if all is incorrect user will be taken back to sign in page */
            header("location: /sign-in.html");
        }

    }
?>