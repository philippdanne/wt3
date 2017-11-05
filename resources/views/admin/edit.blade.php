@extends('layouts.main')

@section('content')
@if(Auth::check())
    <div class="col-8 admin">
    <h1>Eintrag bearbeiten</h1>
    {!! Form::model($question, [
        'method' => 'PATCH',
        'route' => ['admin.update', $question->id]
    ]) !!}

    <div class="form-group">
        {!! Form::label('titel', 'Titel', ['class' => 'control-label']) !!}
        {!! Form::text('titel', $question->title, ['class' => 'form-control']) !!}
        {!! Form::text('titel', $question->titel, ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group numeric">
        {!! Form::label('mild', 'mild', ['class' => 'control-label']) !!}
        {!! Form::number('mild', $question->mild, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group numeric">
        {!! Form::label('suess', 'süß', ['class' => 'control-label']) !!}
        {!! Form::number('suess', $question->suess, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group numeric">
        {!! Form::label('wuerzig', 'würzig', ['class' => 'control-label']) !!}
        {!! Form::number('wuerzig', $question->wuerzig, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group numeric">
        {!! Form::label('fruchtig', 'fruchtig', ['class' => 'control-label']) !!}
        {!! Form::number('fruchtig', $question->fruchtig, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Speichern', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['admin.destroy', $question->id]
    ]) !!}
        {!! Form::submit('Löschen', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endif
@if(Auth::guest())
        <a href="/login"><button class="btn btn-outline-primary" type="button">Anmelden</button></a>
@endif
</div>
@endsection
