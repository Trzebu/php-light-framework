<nav class="navbar navbar-default" role="navigation">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand" href="<?php echo route('home.index') ?>">TPLF Demo</a>            
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<?php if(Auth()->check()): ?>
<li><a href="<?php echo route('user.profiles') ?>">Users list</a></li>
<li><a href="<?php echo route('auth.logout') ?>">Logout</a></li>
<?php else: ?>
<li><a href="<?php echo route('auth.login') ?>">Login</a></li>
<li><a href="<?php echo route('auth.register') ?>">Register in</a></li>
<?php endif; ?>
</ul>
</div>
</div>
</nav>
