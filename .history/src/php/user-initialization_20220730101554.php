<?php



    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../models/db.php';

    if (isset($_POST["signIn"])) {
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        MD5($password);
        filter_var($email, FILTER_SANITIZE_EMAIL);
        htmlentities($email && $password);

    
        $database = new DB();
        // connect to DB
        $conn = $database->connect();
    

        $sql = "SELECT * FROM user_info WHERE user_email = ? "; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = $email;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            echo "success";
                            header("location: ../../home.html");

                        } 
                        else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                }
                else {
                    // Username doesn't exist, display a generic error message
                    header("location: ../../sign-in.html");
                }
            }
        }

    }


?>