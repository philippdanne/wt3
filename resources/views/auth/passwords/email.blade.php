@extends('layouts.main')

@section('content')
<div class="col-md-8 admin">
    <h1>Passwort zurücksetzen</h1>
        @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Addresse</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
        </div>
        <button type="submit" class="btn btn-primary">
        Link zum Zurücksetzen senden
        </button>
    </form>
</div>
@endsection
