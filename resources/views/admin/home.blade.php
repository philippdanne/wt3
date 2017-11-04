@extends('layouts.main')

@section('content')
@if(Auth::check())
            <div class="col-8 admin">
            <h1>Produktauswahl bearbeiten</h1>
             @if(count($questions) > 1)
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Titel</th>
                        <th>mild</th>
                        <th>süß</th>
                        <th>würzig</th>
                        <th>fruchtig</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $question)      
                            <tr>
                                <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->titel }}</a></td>
                                <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->mild }}</a></td>
                                <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->suess }}</a></td>
                                <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->wuerzig }}</a></td>
                                <td><a href="{{ route('admin.edit', $question->id) }}">{{ $question->fruchtig }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <a href="admin/create"><button class="btn btn-primary" type="button">Neuen Eintrag erstellen</button></a>
                    @else
                    <section class="col-8 questions">
                        <h1>Es gab einen Fehler bei der Auswahl der Produkte. Sorry!</h1>
                    </section>
                    @endif
                </div>
                <div class="col-6 admin admin-info">
                    <h1>Du bist angemeldet als {{{ Auth::user()->name }}}.</h1>
                    <a href="/logout"><button class="btn btn-danger" type="button">Ausloggen</button></a>
                    
                </div>
@endif
@if(Auth::guest())
                <h2>Du musst dich anmelden, um diese Funktion nutzen zu können.</h2>
@endif
@endsection
