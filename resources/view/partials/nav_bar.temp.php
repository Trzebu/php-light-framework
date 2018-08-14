<nav class="navbar navbar-default" role="navigation">

    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home.index') }}">TPLF Demo</a>            
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth()->check()):
                    <li><a href="{{ route('user.profiles') }}">Users list</a></li>
                    <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ route('auth.login') }}">Login</a></li>
                    <li><a href="{{ route('auth.register') }}">Register in</a></li>
                @endif
            </ul>
        </div>
    </div>
    
</nav>