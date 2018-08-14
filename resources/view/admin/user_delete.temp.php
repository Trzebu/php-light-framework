<style>

    table, th, td {
        border: 1px solid black;
        padding: 2px;
    }

</style>

<h1>User delete</h1>
<h3>Users list:</h3>

@if ($this->exists("user_delete_success")):
    {{ $this->flash("user_delete_success") }}
@endif

@if ($this->users_list !== null):
    <?php $token = $this->token->generate("user_delete_link") ?>

    <table><tr><th>id</th><th>Login</th><th>Delete</th></tr>
        @foreach ($this->users_list as $user):
            <tr><td>{{ $user->id }}</td><td>{{ $user->login }}</td><td><a href="{{ route('admin.user_delete.execute', ['userId' => $user->id, 'token' => $token]) }}">Delete</a></td></tr>
        @endforeach
    </table>
@else

@endif