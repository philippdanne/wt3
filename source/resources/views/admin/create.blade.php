@extends('layouts.main')

@section('content')
@if(Auth::check())
    <div class="col-8 admin">
    <h1>Eintrag erstellen</h1>
    {!! Form::open([
        'route' => 'admin.store'
    ]) !!}

    <div class="form-group">
        {!! Form::label('titel', 'Titel', ['class' => 'control-label']) !!}
        {!! Form::text('titel', null, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group numeric">
        {!! Form::label('mild', 'mild', ['class' => 'control-label']) !!}
        {!! Form::number('mild', '0', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group numeric">
        {!! Form::label('suess', 'süß', ['class' => 'control-label']) !!}
        {!! Form::number('suess', '0', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group numeric">
        {!! Form::label('wuerzig', 'würzig', ['class' => 'control-label']) !!}
        {!! Form::number('wuerzig', '0', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group numeric">
        {!! Form::label('fruchtig', 'fruchtig', ['class' => 'control-label']) !!}
        {!! Form::number('fruchtig', '0', ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Erstellen', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@if ( count( $errors ) > 0 )
@foreach($errors->all() as $error)
{{ $error }}
@endforeach
@endif
@endif
@if(Auth::guest())
        <a href="/login"><button class="btn btn-outline-primary" type="button">Anmelden</button></a>
@endif
</div>
@endsection