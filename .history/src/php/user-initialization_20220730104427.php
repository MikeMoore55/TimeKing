<?php



    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';

    if (isset($_POST["signIn"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        MD5($password);
        filter_var($email, FILTER_SANITIZE_EMAIL);
        htmlentities($email && $password);

    
        $database = new DB();
        // connect to DB
        $conn = $database->connect();
    

        $sql = "SELECT user_email, user_password FROM user_info WHERE user_email = ? "; // SQL with parameters
        $result = $conn->query($sql);
        $result -> execute();

        if ($result->num_rows > 0) {

            while($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
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
            header("location: home.html")
        }
    }


?>

<a href="/home.html"