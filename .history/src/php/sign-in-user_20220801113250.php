<?php
  // require auto load
  require __DIR__ . '/../../vendor/autoload.php';

  // require db connection file
  require __DIR__ . '/../models/db.php';
  
  // require user model
  require __DIR__ . '/../models/sign-in-user.php';

    if (isset($_POST["signIn"])) {

      if (empty(trim($_POST["username"]))) {
        $username = "";
        $error = "display name error";
    } else {
      $username = $_POST["username"];
      $error = "";
    }

    if (empty(trim($_POST["password"]))) {
        $password= "";
        $error = "password error";
    } else {
        $password = $_POST["password"];
        $error = "";
    }

    // declare variables
    $username = $_POST["username"];
    $password = $_POST["password"];

    // "sanitizing" inputs
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

      // loop through to find the original info
      foreach ($userInfo as $user => $value) {
        $verified_username = $value -> user_displayname;
        $verified_password = $value -> user_password;
        $verified_email = $value -> user_email;
      }

      /* ensure the original matches with the inputs */
      if ($username == $verified_username && $password == $verified_password) {
        /* create new signed in user */
        $signedInUser = new SignedInUser(TRUE, $verified_email, $verified_password, $verified_username, 0);
        /* create json folder, so frontend can access necessary info */
        $json = json_encode($signedInUser);
        $file = file_put_contents("signedInUser.json", $json);
        /* if all is correct then user will be taken to home page */
        header("location: /home.html");
      }
      else{
        /* inputs dont match */
        echo "user not found";
      }
    }
    catch(PDOException $e){
      $error = array(
        "message" => $e->getMessage()  
      );
      /* if all is incorrect user will be taken back to sign in page */
      header("location: /sign-in.html");
    }

  }
?>
