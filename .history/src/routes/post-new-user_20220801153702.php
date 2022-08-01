<?php

/* need to get this to work (--TO DO--)*/

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

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

}

?>