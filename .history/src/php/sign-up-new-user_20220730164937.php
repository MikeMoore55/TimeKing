<?php

    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';
    // require user model
    require __DIR__ . '/../models/sign-in-user.php';

    if (isset($_POST["signUp"])) {
        $userName = $_POST["name"];
        $userSurname = $_POST["surname"];
        $userDisplayName = $_POST["displayName"];
        $userEmail = $_POST["email"];
        $userPassword = $_POST["password"];
    }
?>