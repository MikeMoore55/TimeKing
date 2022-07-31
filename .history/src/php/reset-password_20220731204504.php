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
    $password = $_POST["new-password"];

    // "sanitizing" inputs
    MD5($password);
    htmlentities($username && $password);

    $sql = "UPDATE user_info SET user_password = :password WHERE user_displayname = :username";
}
?>