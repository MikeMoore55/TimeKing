<!-- this is the page for when user whats to sign in to his/her library account -->

<!-- 
    >>> naming convention <<<

    - name-name === html, js, css
    - name_name === php, sql

-->

<?php
   

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