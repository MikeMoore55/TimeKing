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
    
        $sql = "SELECT * FROM user_info WHERE user_displayname = '$username' "; // SQL with parameters

        try{
             // Get DB Object
          $database = new DB();
      
          // connect to DB
          $conn = $database->connect();
      
          // query
          $stmt = $conn->query($sql);
          $userInfo = $stmt->fetchAll(PDO::FETCH_OBJ);
          $database = null;

          foreach ($userInfo as $user => $value) {
                $verified_username = $value -> user_displayname;
                $verified_password = $value -> user_password;
          }

          if ($username == $verified_username && $password == $verified_password) {
            header("location: /home.html")
          }
        }
        catch(PDOException $e){
            $error = array(
                "message" => $e->getMessage()  
            );
        }

    }


?>
