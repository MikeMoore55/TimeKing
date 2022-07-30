<?php



// require auto load
require __DIR__ . '/../../vendor/autoload.php';

// require db connection file
require __DIR__ . '/../models/db.php';

if (isset($_POST["signIn"])) {
    
    $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = $_POST;
    $errors = [];

     //Validate Email
    if(empty($data['email'])){
     $errors['email_err'] = 'Please enter email';
    }

    //Validate Name
    if(empty($data['name'])){
      $errors['name_err'] = 'Please enter name';
    }

    //Validate Password
    if(empty($data['password'])){
      $errors['password_err'] = 'Please enter password';
    }elseif (strlen($data['password']) < 6) {
      $errors['password_err'] = 'Please must be at least 6 characters';
    }

}


header("location: ../../home.html");
?>