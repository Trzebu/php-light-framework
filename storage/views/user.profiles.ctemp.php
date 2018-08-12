<h1>Registered users:</h1>
<?php if($this->data !== null): ?>
<ol>
<?php foreach($this->data as $user): ?>
<li><a href="<?php echo route('user.profile', ['userId' => $user->id]) ?>"><?php echo $user->login ?></a></li>
<?php endforeach; ?>
</ol>
<?php else: ?>
<h3>Currently we haven't registered users.</h3>
<?php endif; ?>
