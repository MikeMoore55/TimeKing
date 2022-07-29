<!-- this is the page for when user whats to sign in to his/her library account -->

<!-- 
    >>> naming convention <<<

    - name-name === html, js, css
    - name_name === php, sql

-->

<?php

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
        }
   

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