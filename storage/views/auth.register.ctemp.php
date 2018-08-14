<?php require_once("partials.top" . ".ctemp.php"); ?>
<h1>Register</h1>
<div class="row">
<div class="col-lg-6">
<form class="form-vertical" role="form" method="post" action="">
<div class="form-group <?php echo $this->errors->has('login') ? 'has-error' : '' ?>">
<label for="login" class="control-label" id="login">Your login:</label>
<input type="text" name="login" class="form-control" id="login" value="<?php echo Libs\Http\Request::old('login') ?>">
<?php if($this->errors->has('login')): ?>
<span class="help-block"><?php echo $this->errors->get('login')->first() ?></span>
<?php endif; ?>
</div>
<div class="form-group <?php echo $this->errors->has('password') ? 'has-error' : '' ?>">
<label for="password" class="control-label">Choose a password</label>
<input type="password" name="password" class="form-control" id="password" value="">
<?php if($this->errors->has('password')): ?>
<span class="help-block"><?php echo $this->errors->get('password')->first() ?></span>
<?php endif; ?>
</div>
<div class="form-group <?php echo $this->errors->has('password_again') ? 'has-error' : '' ?>">
<label for="password_again" class="control-label">Choose a password</label>
<input type="password" name="password_again" class="form-control" id="password_again" value="">
<?php if($this->errors->has('password_again')): ?>
<span class="help-block"><?php echo $this->errors->get('password_again')->first() ?></span>
<?php endif; ?>
</div>
<div class="checkbox <?php echo $this->errors->has('rule') ? 'has-error' : '' ?>">
<label>
<input type="checkbox" name="rule"> Accept rule
</label>
<?php if($this->errors->has('rule')): ?>
<span class="help-block"><?php echo $this->errors->get('rule')->first() ?></span>
<?php endif; ?>
</div>
<input type="hidden" name="_token" value="<?php echo $this->token->generate('_token') ?>">
<input type="submit" value="Register">
</form>
</div>
</div>
<?php require_once("partials.bot" . ".ctemp.php"); ?>
