<h1>Register</h1>

<?php if ($this->errors->hasError()) { ?>

    <?php

        if ($this->errors->hasError()) {
            foreach ($this->errors->allErrors() as $error) {
                echo $error, "<br>";
            }
        }
    ?>

<?php } ?>

<form method="post" action="">

    Login:<br><input type="text" name="login"><br>
    Password:<br><input type="password" name="password"><br>
    Password again:<br><input type="password" name="password_again"><br>
    <input type="hidden" name="_token" value="<?= $this->token->generate("_token") ?>">
    <input type="submit" value="Register">
</form>