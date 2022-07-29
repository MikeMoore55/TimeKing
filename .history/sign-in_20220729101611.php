<!-- this is the page for when user whats to sign in to his/her library account -->

<!-- 
    >>> naming convention <<<

    - name-name === html, js, css
    - name_name === php, sql

-->

<?php
    include "/MAMP/htdocs/TimeKings/src/models/db.php";
    
    session_start();

    /* -- session variables -- */

    // user signed in false as default
    $_SESSION["is-signed-in"] === FALSE;
    // define default user type as member 
    $_SESSION["is_librarian"] === FALSE;
    
     /* check if any errors, if there is will display helpers under input boxes */
     if ($_SESSION["error"] = TRUE) {
        echo '  <script>
                    document.querySelector("#error").style.display = "block";
                    document.querySelector("#error").style.color = "red"
                </script>';
    } 
    elseif ($_SESSION["error"] = FALSE){
        echo '  <script>
                    document.querySelector("#error").style.display = "none";
                </script>';
    }
    else{
        echo "error";
    }

    // connect to db
    $conn = connect();

    $username = $password = "";
    $username_error = $password_error = $sign_in_error = "";

    if($_SERVER["REQUEST_METHOD"]== "POST"){

        // validate username
        if (empty(trim($_POST["username"]))) {
            $username_error = "**Please enter a username.**";
            $username_input = "";
            $_SESSION["error"] = TRUE;
        } 
        elseif (!preg_match('/^[a-zA-Z0-9_]+$/',($_POST["username"]))) {
            $username_error = "**Username can only contain letters, numbers, and underscores.**";
            $username_input = "";
            $_SESSION["error"] = TRUE;
        } 
        else {
            $username_error = "";
            $username_input = $_POST["username"];
            $_SESSION["error"] = FALSE;
        }


        // validate password
        if (empty(trim($_POST["password"]))) {
            $password_error = "**Please enter a password.**";
            $password_input = "";
            $_SESSION["error"] = TRUE;
        } 
        elseif (strlen(trim($_POST["password"])) <= 6) {
            $password_error = "**Password must have at least 6 characters.**";
            $password_input = "";
            $_SESSION["error"] = TRUE;

        } 
        else {
            $password_input = trim($_POST["password"]);
            $password_error = "";
            $_SESSION["error"] = FALSE;

        }


        // get row where username is = the username input
        $sql = "SELECT * FROM user_info WHERE username = '$username_input'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                // create variables from db        
                $user_verified_name = $row["username"];// db username
                $user_verified_password = password_hash($row["user_password"], PASSWORD_DEFAULT);// db user password
                $user_verified_type = $row["user_type"];// db user type
            }

        } 
        else {
            echo "error...cant find on database";
        }

        // check is username and password matches
        if ($username_input === $user_verified_name && password_verify($password_input, $user_verified_password)) {
            echo "user identified, access granted!";
            $_SESSION["is-signed-in"] === TRUE;
            // if user librarian, send to "librarian page"
            if ($user_verified_type == "librarian") {
                $_SESSION["is_librarian"] === TRUE;
                $_SESSION["is-signed-in"] === TRUE;
                header("location: librarian"); 
                $_SESSION["error"] === FALSE;

            }
            else{
                header("location: member");
                $_SESSION["is_librarian"] === FALSE;
                $_SESSION["error"] === FALSE;
                $sign_in_error = "this username or password don't match, please try again";
            }
        }
        else{
            echo "error";
        }
    }

    // close connection
    $conn -> close();

?>

<main>
    <form class="sign-in-form form-control" method="POST">
        <h2>Sign In </h2>
        <label for="username" class="form-label">
            Username:
        </label>
        <input id="username" type="text" class="form-control" name="username">
        <div id="error" class="error">
            <?php echo $username_error?>
        </div>
        <label for="password" class="form-label">
            Password:
        </label>
        <input id="password" type="password" class="form-control" placeholder="*****" name="password">
        <div id="error" class="error">
            <?php echo $password_error?>
        </div>
        <p><a href="restPassword">Forgot Password?</a></p>
        <br>
        <input id="sign-in" type="submit" class="btn btn-primary mb-3 btn-override" name="signIn" value="Sign In">
        <p>Don't have an account? <a href="signUp">Create One!</a></p>
    </form>
</main>