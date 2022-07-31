<?php
  // require auto load
  require __DIR__ . '/../../vendor/autoload.php';

  // require db connection file
  require __DIR__ . '/../models/db.php';
  
  // require user model
  require __DIR__ . '/../models/sign-in-user.php';

  if (isset($_POST["signIn"])) {
    // declare variables
    $username = $_POST["username"];
    $password = $_POST["password"];

    // "sanitizing" inputs
    MD5($password);
    htmlentities($username && $password);

    $sql = "UPDATE user_info SET user_password ='[value-6]' WHERE user_displayname = :username";
}
?>