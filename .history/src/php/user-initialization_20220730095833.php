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

        

        //Validate Password
        if(empty($data['password'])){
        $errors['password_err'] = 'Please enter password';
        }elseif (strlen($data['password']) < 6) {
        $errors['password_err'] = 'Please must be at least 6 characters';
        }

      

        $sql = "SELECT * FROM user_info WHERE user_email = $email "; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param();
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                // create variables from db        
                $user_verified_email = $row["email"];// db username
                $user_verified_password = password_hash($row["user_password"], PASSWORD_DEFAULT);// db user password
            }

        } 
        else {
            echo "error...cant find on database";
        }

    }


header("location: ../../home.html");
?>