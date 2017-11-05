@extends('layouts.main')

@section('title')
Registrieren
@endsection

@section('content')
<div class="col-md-8 admin">
    <h1>Registrieren</h1>
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Addresse</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
        <div class="form-group">
            <label for="password-confirm" class="control-label">Passwort bestätigen</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary">
            Registrieren
        </button>
    </form>
</div>
@endsection
