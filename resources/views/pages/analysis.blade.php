@extends('layouts.main')
@section('title')
Geschmacksanalyse
@endsection
@section('content')
<div class="container">
        @if(count($questions) > 1)
        {!! Form::open(['action' => 'TempUserController@calculate', 'method' => 'POST']) !!}
            @for ($i = 0; $i < count($questions); $i++)
            <section class="col-8 questions">
                <h1>Frage {{ $i+1 }} von {{ count($questions) }}</h1>
                <h2>{{ $questions[$i]->titel }}</h2>
                <div class="container">
                    {{ Form::radio('rd' . $questions[$i]->id, $questions[$i]->id . '.1', false, ['id' => 'rd1' . $questions[$i]->id]) }}
                    {{ Form::label('rd1' . $questions[$i]->id, 'gefällt mir') }}<br>
                    {{ Form::radio('rd' . $questions[$i]->id, $questions[$i]->id . '.2', false, ['id' => 'rd2' . $questions[$i]->id]) }}
                    {{ Form::label('rd2' . $questions[$i]->id, 'neutral') }}<br>
                    {{ Form::radio('rd' . $questions[$i]->id, $questions[$i]->id . '.3', false, ['id' => 'rd3' . $questions[$i]->id]) }}
                    {{ Form::label('rd3' . $questions[$i]->id, 'gefällt mir nicht') }}
                </div>
            </section>
            @endfor
        <div class="btn-result">
            {!! Form::submit('Auswerten', ['class' => 'btn btn-primary btn-result']) !!}
        </div>
        {!! Form::close() !!}
        @else
        <section class="col-8 questions">
            <h1>Es gab einen Fehler bei der Auswahl der Produkte. Sorry!</h1>
        </section>
        @endif
    </div>
@endsection