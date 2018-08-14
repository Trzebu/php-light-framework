<?php require_once("partials.top" . ".ctemp.php"); ?>
<h1>User delete</h1>
<h3>Users list:</h3>
<?php if($this->exists("user_delete_success")): ?>
<?php echo $this->flash("user_delete_success") ?>
<?php endif; ?>
<?php if($this->users_list !== null): ?>
<?php $token = $this->token->generate("user_delete_link") ?>
<table class="table">
<tr>
<th scope="col">id</th>
<th scope="col">Login</th>
<th scope="col">Delete</th>
</tr>
<?php foreach($this->users_list as $user): ?>
<tr>
<td scope="row"><?php echo $user->id ?></td>
<td><?php echo $user->login ?></td>
<td><a href="<?php echo route('admin.user_delete.execute', ['userId' => $user->id, 'token' => $token]) ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<?php endif; ?>
<?php require_once("partials.bot" . ".ctemp.php"); ?>
