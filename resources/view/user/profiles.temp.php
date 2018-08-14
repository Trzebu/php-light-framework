<h1>Registered users:</h1>

@if ($this->data !== null):
    <ol>
        @foreach ($this->data as $user):
            <li><a href="{{ route('user.profile', ['userId' => $user->id]) }}">{{ $user->login }}</a></li>
        @endforeach
    </ol>
@else
    <h3>Currently we haven't registered users.</h3>
@endif