@include partials/top

<h1>Login</h1>

<div class="row">
    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="">
            <div class="form-group {{ $this->errors->has('login') ? 'has-error' : '' }}">
                <label for="login" class="control-label" id="login">Your login:</label>
                <input type="text" name="login" class="form-control" id="login" value="{{ Libs\Http\Request::old('login') }}">
                @if ($this->errors->has('login')):
                    <span class="help-block">{{ $this->errors->get('login')->first() }}</span>
                @endif
            </div>
            <div class="form-group  {{ $this->errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="control-label" id="password">Your password:</label>
                <input type="password" name="password" class="form-control" id="password" value="">
                @if ($this->errors->has('password')):
                    <span class="help-block">{{ $this->errors->get('password')->first() }}</span>
                @endif
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <input type="hidden" name="_token" value="{{ $this->token->generate('_token') }}">
            <div class="form-group">
                <button type="submit" class="btn btn-default">Login</button>
            </div>   
        </form>
    </div>
</div>

@include partials/bot