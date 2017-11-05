@extends('layouts.main')

@section('title')
Login
@endsection

@section('content')
<div class="col-md-8 admin">
    <h1>Login</h1>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Addresse</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label">Passwort</label>
            <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>
        <a href="{{ route('password.request') }}">
            <small class="form-text text-muted">Passwort vergessen?</small>
        </a>
        <button type="submit" class="btn btn-primary">
            Login
        </button>
        <br><br>
        <a href="{{ route('register') }}">
            <small class="form-text text-muted">Registrieren</small>
        </a>
    </form>
</div>
@endsection
