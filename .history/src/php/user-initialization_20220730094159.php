<?php



// require auto load
require __DIR__ . '/../../vendor/autoload.php';

// require db connection file
require __DIR__ . '/../models/db.php';

if (isset($_POST["signIn"])) {
    
    $_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = $_POST;
        $errors = [];


}


header("location: ../../home.html");
?>