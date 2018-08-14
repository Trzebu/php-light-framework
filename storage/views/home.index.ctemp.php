<?php require_once("partials.top" . ".ctemp.php"); ?>
<h1>Home page</h1>
<h3><?php echo $this->translate->get("home.change_language") ?>:</h3>
<div class="input-group">
<form method="post" action="<?php echo route('home.language') ?>">
<select name="lang" class="form-control">
<option selected><?php echo $this->translate->get("buttons.choose") ?>...</option>
<?php foreach($this->lang_list as $key => $value): ?>
<option value="<?php echo $key ?>"><?php echo $value[1] ?></option>
<?php endforeach; ?>
</select>
<div class="input-group-append">
<input type="submit" class="btn btn-outline-secondary" value="<?php echo $this->translate->get('buttons.change') ?>">
</div>
</form>
</div>
<ul class="list-group list-group-flush">
<?php if(!Auth()->check()): ?>
<li class="list-group-item"><a href="<?php echo route('auth.login') ?>">Login</a></li>
<li class="list-group-item"><a href="<?php echo route('auth.register') ?>">Register</a></li>
<?php else: ?>
<li class="list-group-item"><a href="<?php echo route('user.profiles') ?>">Users list</a></li>
<li class="list-group-item"><a href="<?php echo route('user.profile', ['userId' => Auth()->data()->id]) ?>">My profile</a></li>
<li class="list-group-item"><a href="<?php echo route('auth.logout') ?>">Logout</a></li>
<?php if(Auth()->permissions("admin") || Auth()->permissions("moderator")): ?>
<li class="list-group-item"><a href="<?php echo route('admin.index') ?>">Admin Panel</a></li>
<?php endif; ?>
<?php endif; ?>
</ul>
<?php if(Auth()->check()): ?>
Welcome <?php echo Auth()->data()->login ?>!<br>
You are logged in.<br>
You are <?php echo Auth()->permissions() ?>
<?php endif; ?>
<?php require_once("partials.bot" . ".ctemp.php"); ?>
