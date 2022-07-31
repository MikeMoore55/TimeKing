<?php
    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';
    
    // require user model
    require __DIR__ . '/../models/selected-product.php';

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
                $productPrice = $value -> watch_price;
                $productRating = $value -> watch_rating;
                $productQty = $value -> watch_qty;
                $productPicture = $value -> watch_pic;
                $productAvailable = $value -> watch_available;
            }

            if($selectedID == $productID){
                $selectedProduct = new SelectedProduct($productID, $productName, $productDesc, $productPrice, $productRating, $productQty, $productPicture, $productAvailable);

                $json = json_encode($selectedProduct);
                $file = file_put_contents("selectedProduct.json", $json);
                /* if all is correct then user will be taken to home page */
                header("location: /product.html");
            }
            else{
                echo "error";
            }

        }
        catch(PDOException $e){
            $error = array(
              "message" => $e->getMessage()  
            );
            /* if all is incorrect user will be taken back to sign in page */
            header("location: /home.html");
        }

    }
?>