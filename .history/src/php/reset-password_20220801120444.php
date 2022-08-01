<?php
  // require auto load
  require __DIR__ . '/../../vendor/autoload.php';

  // require db connection file
  require __DIR__ . '/../models/db.php';
  
  if (isset($_POST["signIn"])) {
    // declare variables
    
    /* form validation for extra security */

    /* make sure there are no blank values */
    if (empty(trim($_POST["username"]))) {
        $username = "";
        $error = "display name error";
    } else {
        $username = $_POST["username"];
        $error = "";
    }

    if (empty(trim($_POST["new-password"]))) {
        $password= "";
        $error = "password error";
    } else {
        $password = $_POST["new-password"];
        $error = "";
    }

    // "sanitizing" inputs
    MD5($password);
    htmlentities($username && $password);

    $sql = "UPDATE user_info SET user_password = :password WHERE user_displayname = :username";

    try{
        /* db object */
        $database = new DB();
    
        /* connect to DB */
        $conn = $database->connect();
        
        /* prepared statement */
        $stmt = $conn->prepare($sql);
        
        /* binding parameters */
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);


        /* exucute prepared statement */
        $result = $stmt->execute();
    
        $database = null;
        /* when data is saved, take user to sign in page to sign user in */
        header("location: /sign-in.html");
    } catch (PDOException $e){
        $error = array(
            "message" => $e->getMessage()
        );
        header("location: /reset-password.html");
    }
}
?>