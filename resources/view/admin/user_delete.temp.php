@include partials/top

<h1>User delete</h1>
<h3>Users list:</h3>

@if ($this->exists("user_delete_success")):
    {{ $this->flash("user_delete_success") }}
@endif

@if ($this->users_list !== null):
    <?php $token = $this->token->generate("user_delete_link") ?>

    <table class="table">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Login</th>
            <th scope="col">Delete</th>
        </tr>

        @foreach ($this->users_list as $user):
        
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>{{ $user->login }}</td>
                <td><a href="{{ route('admin.user_delete.execute', ['userId' => $user->id, 'token' => $token]) }}">Delete</a></td>
            </tr>

        @endforeach
    </table>
@else

@endif

@include partials/bot