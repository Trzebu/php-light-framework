<style>
table, th, td {
border: 1px solid black;
padding: 2px;
}
</style>
<h1>User delete</h1>
<h3>Users list:</h3>
<?php if($this->exists("user_delete_success")): ?>
<?php echo $this->flash("user_delete_success") ?>
<?php endif; ?>
<?php if($this->users_list !== null): ?>
<?php $token = $this->token->generate("user_delete_link") ?>
<table><tr><th>id</th><th>Login</th><th>Delete</th></tr>
<?php foreach($this->users_list as $user): ?>
<tr><td><?php echo $user->id ?></td><td><?php echo $user->login ?></td><td><a href="<?php echo route('admin.user_delete.execute', ['userId' => $user->id, 'token' => $token]) ?>">Delete</a></td></tr>
<?php endforeach; ?>
</table>
<?php else: ?>
<?php endif; ?>
