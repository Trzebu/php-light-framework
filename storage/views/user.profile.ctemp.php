<?php require_once("partials.top" . ".ctemp.php"); ?>
<h1>Profile!</h1>
<?php if($this->data !== null): ?>
Username: <?php echo $this->data->login ?><br>
Name: <?php echo $this->data->name ?><br>
Last name: <?php echo $this->data->last_name ?><br>
Registered at: <?php echo $this->registered_at ?><br>
<?php else: ?>
This user is not exists.
<?php endif; ?>
<?php require_once("partials.bot" . ".ctemp.php"); ?>
