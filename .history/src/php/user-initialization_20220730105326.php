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
    

        $sql = "SELECT * FROM user_info WHERE user_displayname = '$username' "; // SQL with parameters
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        if ($stmt->num_rows > 0) {

            while($row = $result) {
                // create variables from db        
                $user_verified_email = $row["user_email"];// db username
                $user_verified_password = password_hash($row["user_password"], PASSWORD_DEFAULT);// db user password
            }

        } 
        else {
            echo "error...cant find on database";
        }

        // check is username and password matches
        if ($username_input === $user_verified_name && password_verify($password_input, $user_verified_password)) {
            header("location: /home.html");
        }
        else{
            header("location /sign-in.html");
        }
    }


?>
