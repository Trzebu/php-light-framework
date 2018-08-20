@include partials/top

<h1>Registered users:</h1>

@if ($this->data !== null):

    <table class="table">

        <tr>
            <th scope="col">Login</th>
            <th scope="col">Profile</th>
        </tr>

        @foreach ($this->data->results() as $user):

            <tr>
                <td scope="row">{{ $user->login }}</td>
                <td><a href="{{ route('user.profile', ['userId' => $user->id]) }}">View profile</a></td>
            </tr>
            
        @endforeach

    </table>

    {{ $this->data->paginateRender() }}

@else
    <h3>Currently we haven't registered users.</h3>
@endif

@include partials/bot