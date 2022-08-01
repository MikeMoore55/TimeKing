<?php
    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';

    if (isset($_POST["signUp"])) {

        /* backend form validation for extra security */

        /* check that there is no blank value */
        if (empty(trim($_POST["name"]))) {
            $userName = "";
            $error = "name error";
        }else{
            $userName = $_POST["name"];
            $error = "";
        }

        if (empty(trim($_POST["surname"]))) {
            $userSurname = "";
            $error = "surname error";
        } else {
            $userSurname = $_POST["surname"];
            $error = "";
        }

        if (empty(trim($_POST["displayName"]))) {
            $userDisplayName = "";
            $error = "display name error";
        } else {
            $userDisplayName = $_POST["displayName"];
            $error = "";
        }

        if (empty(trim($_POST["email"]))) {
            $userEmail = "";
            $error = "email error";
        } else {
            $userEmail = $_POST["email"];
            $error = "";
        }
        
        if (empty(trim($_POST["password"]))) {
            $userPassword= "";
            $error = "password error";
        } else {
            $userPassword = $_POST["password"];
            $error = "";
        }

        /* "sanitize" data */
        MD5($userPassword);
        htmlentities($userName && $userSurname && $userDisplayName);
        filter_var($userEmail, FILTER_SANITIZE_EMAIL);


        $sql = "INSERT INTO user_info(user_name, user_surname, user_displayname, user_email, user_password) VALUES (:userName, :userSurname, :userDisplayName, :userEmail, :userPassword);";
    
        try{

            if ($error = "") {
                /* db object */
                $database = new DB();
            
                /* connect to DB */
                $conn = $database->connect();
                
                /* prepared statement */
                $stmt = $conn->prepare($sql);
                
                /* binding parameters */
                $stmt->bindParam(':userName', $userName);
                $stmt->bindParam(':userSurname', $userSurname);
                $stmt->bindParam(':userDisplayName', $userDisplayName);
                $stmt->bindParam(':userEmail', $userEmail);
                $stmt->bindParam(':userPassword', $userPassword);

                /* exucute prepared statement */
                $result = $stmt->execute();
            
                $database = null;
                /* when data is saved, take user to sign in page to sign user in */
                header("location: /sign-in.html");
            }
            else{
                $database = null;
                header("location: /sign-in.html");
            }
        }
        catch (PDOException $e){
            $error = array(
                "message" => $e->getMessage()
            );
            header("location: /sign-up.html");
        }
    }
?>