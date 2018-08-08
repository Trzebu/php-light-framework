<h1>Home page</h1>

<ul>
    <li><a href="<?= route('auth.login') ?>">Login</a></li>
    <li><a href="<?= route('auth.register') ?>">Register</a></li>
    <?php if (Auth()->check()) { ?>
        <li><a href="<?= route('user.profiles') ?>">Users list</a></li>
        <li><a href="<?= route('user.profile', ["userId" => Auth()->data()->id]) ?>">My profile</a></li>
        <li><a href="<?= route('auth.logout') ?>">Logout</a></li>
        <?php if (Auth()->permissions("admin") || Auth()->permissions("moderator")) { ?>
            <li><a href="<?= route('admin.index') ?>">Admin Panel</a></li>
        <?php } ?>
    <?php } ?>
</ul>

<?php
    
    if (Auth()->check()) {
        echo "Welcome " . Auth()->data()->login . "!<br>You are logged in.<br>";
        echo "You are " . Auth()->permissions();
    }

?>
