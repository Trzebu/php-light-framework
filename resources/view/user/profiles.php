<h1>Registered users:</h1>
<?php if ($this->data !== null) { ?>

    <ol>
        <?php foreach ($this->data as $user) { ?>
            <li><a href="<?= route("user.profile", ["userId" => $user->id]) ?>"><?= $user->login ?></a></li>
        <?php } ?>
    </ol>

<?php } else { ?>

    <h3>Currently we haven't registered users.</h3>

<?php } ?>