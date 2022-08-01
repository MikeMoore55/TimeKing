<?php

/* need to get this to work (--TO DO--)*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post('/customers-data/add', function (Request $request, Response $response, array $args){

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

    try{

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
    catch (PDOException $e){
        $error = array(
            "message" => $e->getMessage()
        );
        header("location: /sign-up.html");
    }
})

?>