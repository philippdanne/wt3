@extends('layouts.main')
@section('title')
Analyse
@stop
@section('content')
<div class="container">
        @if(count($questions) > 1)
        {!! Form::open(['action' => 'TempUserController@calculate', 'method' => 'POST']) !!}
            @foreach($questions as $question)           
            <section class="col-8 questions">
                <h1>Frage {{ $question->id }} von {{ count($questions) }}</h1>
                <h2>{{ $question->titel }}</h2>
                <div class="container">
                    {{ Form::radio('rd' . $question->id, $question->id . '.1', false, ['id' => 'rd1' . $question->id]) }}
                    {{ Form::label('rd1' . $question->id, 'gefällt mir') }}<br>
                    {{ Form::radio('rd' . $question->id, $question->id . '.2', false, ['id' => 'rd2' . $question->id]) }}
                    {{ Form::label('rd2' . $question->id, 'neutral') }}<br>
                    {{ Form::radio('rd' . $question->id, $question->id . '.3', false, ['id' => 'rd3' . $question->id]) }}
                    {{ Form::label('rd3' . $question->id, 'gefällt mir nicht') }}
                </div>
            </section>
            @endforeach
        {{ Form::submit('Ergebnis') }}
        {!! Form::close() !!}
        @else
        <section class="col-8 questions">
            <h1>Es gab einen Fehler bei der Auswahl der Produkte. Sorry!</h1>
        </section>
        @endif
    </div>
@stop