<style>

    table, th, td {
        border: 1px solid black;
        padding: 2px;
    }

</style>

<h1>User delete</h1>
<h3>Users list:</h3>
<?php

if ($this->users_list !== null) {

    if ($this->exists("user_delete_success")) {
        echo $this->flash("user_delete_success");
    }

    echo "<table><tr><th>id</th><th>Login</th><th>Delete</th></tr>";

    $token = $this->token->generate("user_delete_link");

    foreach ($this->users_list as $user) {
        echo "<tr><td>{$user->id}</td><td>{$user->login}</td><td><a href='" . route("admin.user_delete.execute", ["userId" => $user->id, "token" => $token]) . "'>Delete</a></td></tr>";
    }

    echo "</table>";

} else {
    echo "<h4>Currently you haven't registered users.</h4>";
}

?>