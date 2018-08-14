<h1>Register</h1>

@if ($this->errors->hasError()):
    
    @foreach ($this->errors->allErrors() as $error):
        {{ $error }}<br>
    @endforeach

@endif

@if ($this->exists("info")):
    {{ $this->flash("register_success") }}
@endif

<form method="post" action="">

    Login:<br><input type="text" name="login"><br>
    Password:<br><input type="password" name="password"><br>
    Password again:<br><input type="password" name="password_again"><br>
    Accept rule: <input type="checkbox" name="rule"><br>
    <input type="hidden" name="_token" value="{{ $this->token->generate('_token') }}">
    <input type="submit" value="Register">
</form>