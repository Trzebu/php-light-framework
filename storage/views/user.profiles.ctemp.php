<?php require_once("partials.top" . ".ctemp.php"); ?>
<h1>Registered users:</h1>
<?php if($this->data !== null): ?>
<table class="table">
<tr>
<th scope="col">Login</th>
<th scope="col">Profile</th>
</tr>
<?php foreach($this->data->results() as $user): ?>
<tr>
<td scope="row"><?php echo $user->login ?></td>
<td><a href="<?php echo route('user.profile', ['userId' => $user->id]) ?>">View profile</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php echo $this->data->paginateRender() ?>
<?php else: ?>
<h3>Currently we haven't registered users.</h3>
<?php endif; ?>
<?php require_once("partials.bot" . ".ctemp.php"); ?>
