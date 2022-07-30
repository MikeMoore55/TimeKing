<?php
    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';

    if (isset($_POST["signIn"])) {
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        MD5($password);
        htmlentities($username && $password);

    
        $database = new DB();
        // connect to DB
        $conn = $database->connect();
    

        $sql = "SELECT * FROM `user_info` WHERE `user_displayname` = '$username'; "; // SQL with parameters

        if ($stmt = $conn->query($sql)) {
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            $database = null; // clear db object


            while($result = $stmt)) {
                // create variables from db        
                $user_verified_username = $result["user_displayname"];// db username
                $user_verified_password = $result["user_password"];// db user password
            }

            var_dump($result);


        } 
        else {
            echo "error...cant find on database";
            print_r($stmt);
        }

        // check is username and password matches
        if ($username === $user_verified_username && password_verify($password, $user_verified_password)) {
            header("location: /home.html");
        }
        else{
            header("location /sign-in.html");
        }
    }


?>
