@include partials/top

<h1>Register</h1>

<div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="">
            <div class="form-group {{ $this->errors->has('login') ? 'has-error' : '' }}">
                <label for="login" class="control-label" id="login">Your login:</label>
                <input type="text" name="login" class="form-control" id="login" value="">
                @if ($this->errors->has('login')):
                    <span class="help-block">{{ $this->errors->get('login')->first() }}</span>
                @endif
            </div>
            <div class="form-group {{ $this->errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="control-label">Choose a password</label>
                <input type="password" name="password" class="form-control" id="password" value="">
                @if ($this->errors->has('password')):
                    <span class="help-block">{{ $this->errors->get('password')->first() }}</span>
                @endif
            </div>
            <div class="form-group {{ $this->errors->has('password_again') ? 'has-error' : '' }}">
                <label for="password_again" class="control-label">Choose a password</label>
                <input type="password" name="password_again" class="form-control" id="password_again" value="">
                @if ($this->errors->has('password_again')):
                    <span class="help-block">{{ $this->errors->get('password_again')->first() }}</span>
                @endif
            </div>
            <div class="checkbox {{ $this->errors->has('rule') ? 'has-error' : '' }}">
                <label>
                    <input type="checkbox" name="rule"> Accept rule
                </label>
                @if ($this->errors->has('rule')):
                    <span class="help-block">{{ $this->errors->get('rule')->first() }}</span>
                @endif
            </div>
            <input type="hidden" name="_token" value="{{ $this->token->generate('_token') }}">
            <input type="submit" value="Register">
        </form>
    </div>
</div>

@include partials/bot