<?php require_once("partials.top" . ".ctemp.php"); ?>
<h1>Login</h1>
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
<div class="form-group  <?php echo $this->errors->has('password') ? 'has-error' : '' ?>">
<label for="password" class="control-label" id="password">Your password:</label>
<input type="password" name="password" class="form-control" id="password" value="">
<?php if($this->errors->has('password')): ?>
<span class="help-block"><?php echo $this->errors->get('password')->first() ?></span>
<?php endif; ?>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="remember"> Remember me
</label>
</div>
<input type="hidden" name="_token" value="<?php echo $this->token->generate('_token') ?>">
<div class="form-group">
<button type="submit" class="btn btn-default">Login</button>
</div>   
</form>
</div>
</div>
<?php require_once("partials.bot" . ".ctemp.php"); ?>
