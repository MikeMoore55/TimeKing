<?php

if($_SERVER["REQUEST_METHOD"]== "POST"){

    // name
    if (empty(trim($_POST["name"]))) {
        $name_error = "**Please enter a name.**";
        $name = "";
        $_SESSION["error"] = TRUE;
    } 
    elseif (!preg_match('/^[a-zA-Z0-9_]+$/',($_POST["name"]))) {
        $name_error = "**name can only contain letters, numbers, and underscores.**";
        $name = "";
        $_SESSION["error"] = TRUE;
    } else {
        $name_error = "";
        $name = $_POST["name"];
        $_SESSION["error"] = FALSE;
    }

    //surname
    if (empty(trim($_POST["surname"]))) {
        $surname_error = "**Please enter a surname.**";
        $surname = "";
        $_SESSION["error"] = TRUE;
    } 
    elseif (!preg_match('/^[a-zA-Z0-9_]+$/',($_POST["surname"]))) {
        $surname_error = "**name can only contain letters, numbers, and underscores.**";
        $surname = "";
        $_SESSION["error"] = TRUE;
    } else {
        $surname_error = "";
        $surname = $_POST["surname"];
        $_SESSION["error"] = FALSE;
    }

    //display name
    if (empty(trim($_POST["displayName"]))) {
        $displayName_error = "**Please enter a displayName.**";
        $displayName = "";
        $_SESSION["error"] = TRUE;
    } 
    elseif (!preg_match('/^[a-zA-Z0-9_]+$/',($_POST["displayName"]))) {
        $displayName_error = "**name can only contain letters, numbers, and underscores.**";
        $displayName = "";
        $_SESSION["error"] = TRUE;
    } else {
        $displayName_error = "";
        $displayName = $_POST["name"];
        $_SESSION["error"] = FALSE;
    }

    if (empty(trim($_POST["email"]))) {
        $email_error = "**Please enter an email.**";
        $email = "";
        $_SESSION["error"] = TRUE;
    }else {
        $email = trim($_POST["email"]);
        $email_error = "";
        $_SESSION["error"] = FALSE;
    };


    if (empty(trim($_POST["password"]))) {
        $password_error = "**Please enter a password.**";
        $password = "";
        $_SESSION["error"] = TRUE;
    } elseif (strlen(trim($_POST["password"])) <= 6) {
        $password_error = "**Password must have at least 6 characters.**";
        $password = "";
        $_SESSION["error"] = TRUE;
    } else {
        $password = trim($_POST["password"]);
        $password_error = "";
        $_SESSION["error"] = FALSE;
    };

  


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeKing</title>
    <link rel="icon" href="./src/images/watch.png">
</head>
<body>
    <main>
        <form method="POST" action="" class="sign-up-form">
            <p>Name:</p>
            <input type="text" name="name" class="input"/>
            <p>Surname:</p>
            <input type="text" name="surname" class="input"/>
            <p>Username:</p>
            <input type="text" name="displayName" class="input"/>
            <p>Email:</p>
            <input type="text" name="email" class="input"/>
            <p>Password:</p>
            <input type="text" name="password" class="input"/>
            <br>
            <br>
            <input type="submit" value="sign up" name="signUp" class="btn">
        </form>
    </main>
</body>
</html>