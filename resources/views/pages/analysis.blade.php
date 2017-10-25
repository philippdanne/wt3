@extends('layouts.main')
@section('title')
Analyse
@stop
@section('content')
<div class="container">
    <section class="col-8 questions">
        {!! Form::open(['action' => 'TempUserController@calculate', 'method' => 'POST']) !!}
            echo Form::radio('stimmeZu', '1');
            echo Form::radio('neutral', '2');
            echo Form::radio('stimmeNichtZu', '3');
        {!! Form::close() !!}
        <h1>Frage 1 von 10</h1>
        <h2>{{ $fragenTitel }}</h2>
        <div class="container">
            <a class="col-md-4 col-sm-12 answer" href="#">stimme zu</a>
            <a class="col-md-4 col-sm-12 answer" href="#">neutral</a>
            <a class="col-md-4 col-sm-12 answer" href="#">stimme nicht zu</a>
        </div>
    </section>
    </div>
@stop