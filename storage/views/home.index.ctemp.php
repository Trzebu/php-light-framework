<h1>Home page</h1>
<h3><?php echo $this->translate->get("home.change_language") ?>:</h3>
<form method="post" action="<?php echo route('home.language') ?>">
<select name="lang">
<?php foreach($this->lang_list as $key => $value): ?>
<option value="<?php echo $key ?>"><?php echo $value[1] ?></option>
<?php endforeach; ?>
</select><br>
<input type="submit" value="<?php echo $this->translate->get('buttons.change') ?>">
</form>
<ul>
<?php if(!Auth()->check()): ?>
<li><a href="<?php echo route('auth.login') ?>">Login</a></li>
<li><a href="<?php echo route('auth.register') ?>">Register</a></li>
<?php else: ?>
<li><a href="<?php echo route('user.profiles') ?>">Users list</a></li>
<li><a href="<?php echo route('user.profile', ['userId' => Auth()->data()->id]) ?>">My profile</a></li>
<li><a href="<?php echo route('auth.logout') ?>">Logout</a></li>
<?php if(Auth()->permissions("admin") || Auth()->permissions("moderator")): ?>
<li><a href="<?php echo route('admin.index') ?>">Admin Panel</a></li>
<?php endif; ?>
<?php endif; ?>
</ul>
<?php if(Auth()->check()): ?>
Welcome <?php echo Auth()->data()->login ?>!<br>
You are logged in.<br>
You are <?php echo Auth()->permissions() ?>
<?php endif; ?>
