<h1>Login</h1>

<?php

    if ($this->errors->hasError()) {
        foreach ($this->errors->allErrors() as $error) {
            echo $error, "<br>";
        }
    }

    if ($this->exists("info")) {
        echo $this->flash("info");
    }

?>

<form method="post" action="">

    Login: <input type="text" name="login"><br>
    Password: <input type="password" name="password"><br>
    Remember me: <input type="checkbox" name="remember"><br>
    <input type="hidden" name="_token" value="<?= $this->token->generate("_token") ?>">
    <input type="submit" value="Login">    

</form>