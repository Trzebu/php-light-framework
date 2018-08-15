@include partials/top

<h1>Home page</h1>

<h3>{{ $this->translate->get("home.change_language") }}:</h3>

<div class="input-group">
    <form method="post" action="{{ route('home.language') }}">
        <select name="lang" class="form-control">
            <option selected>{{ $this->translate->get("buttons.choose") }}...</option>
            @foreach ($this->lang_list as $key => $value):

                <option value="{{ $key }}">{{ $value[1] }}</option>

            @endforeach

        </select>
        <div class="input-group-append">
            <input type="submit" class="btn btn-outline-secondary" value="{{ $this->translate->get('buttons.change') }}">
        </div>
    </form>
</div>

<ul class="list-group list-group-flush">
    @if (!Auth()->check()):
        <li class="list-group-item"><a href="{{ route('auth.login') }}">Login</a></li>
        <li class="list-group-item"><a href="{{ route('auth.register') }}">Register</a></li>
    @else
        <li class="list-group-item"><a href="{{ route('user.profiles') }}">Users list</a></li>
        <li class="list-group-item"><a href="{{ route('user.profile', ['userId' => Auth()->data()->id]) }}">My profile</a></li>
        <li class="list-group-item"><a href="{{ route('auth.logout') }}">Logout</a></li>
        @if (Auth()->permissions("admin") || Auth()->permissions("moderator")):
            <li class="list-group-item"><a href="{{ route('admin.index') }}">Admin Panel</a></li>
        @endif
    @endif
</ul>


@if (Auth()->check()):
    Welcome {{ Auth()->data()->login }}!<br>
    You are {{ Auth()->permissions() }}
@endif

@include partials/bot