@extends('layouts.main')
@section('title')
Ergebnis
@stop
@section('content')
    <div class="container">
        @foreach($ergebnisTest as $ergebnis)
            {{ $ergebnis }}
        @endforeach
    </div>
@stop