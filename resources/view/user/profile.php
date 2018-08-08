<h1>Profile!</h1>
<?php if ($this->data !== null) { ?>

    Username: <?= $this->data->login ?><br>
    Name: <?= $this->data->name ?><br>
    Last name: <?= $this->data->last_name ?><br>
    Registered at: <?= $this->registered_at ?><br>

<?php } else { ?>

    This user is not exists.

<?php } ?>