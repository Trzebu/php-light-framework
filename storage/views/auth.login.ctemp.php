<h1>Login</h1>
<?php if($this->errors->hasError()): ?>
<?php foreach($this->errors->allErrors() as $error): ?>
<?php echo $error ?><br>
<?php endforeach; ?>
<?php endif; ?>
<?php if($this->exists("info")): ?>
<?php echo $this->flash("info") ?>
<?php endif; ?>
<form method="post" action="">
Login: <input type="text" name="login"><br>
Password: <input type="password" name="password"><br>
Remember me: <input type="checkbox" name="remember"><br>
<input type="hidden" name="_token" value="<?= $this->token->generate("_token") ?>">
<input type="submit" value="Login">    
</form>
