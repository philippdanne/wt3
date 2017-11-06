@extends('layouts.main')

@section('title')
Produkte hinzufügen, löschen oder bearbeiten
@endsection

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
                            <tr data-id="{{ $question->id }}" id="{{ $question->id }}">
                                <td id="titel{{ $question->id }}">{{ $question->titel }}</td>
                                <td id="mild{{ $question->id }}">{{ $question->mild }}</td>
                                <td id="suess{{ $question->id }}">{{ $question->suess }}</td>
                                <td id="wuerzig{{ $question->id }}">{{ $question->wuerzig }}</td>
                                <td id="fruchtig{{ $question->id }}">{{ $question->fruchtig }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <button class="btn btn-primary" type="button" id="add">Neuen Eintrag erstellen</button>
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

                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Produkt hinzufügen</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form class="modalform">
                            <div class="form-group">
                                <label for="titel" class="control-label">Titel</label>
                                <input class="form-control" name="titel" id="titel" type="text" value="" id="titel">
                            </div>

                            <div class="form-group numeric">
                                <label for="mild" class="control-label">mild</label>
                                <input class="form-control" name="mild" id="mild" type="number" value="0" id="mild">
                            </div>

                            <div class="form-group numeric">
                                <label for="suess" class="control-label">s&uuml;&szlig;</label>
                                <input class="form-control" name="suess" id="suess" type="number" value="0" id="suess">
                            </div>

                            <div class="form-group numeric">
                                <label for="wuerzig" class="control-label">w&uuml;rzig</label>
                                <input class="form-control" name="wuerzig" id="wuerzig" type="number" value="0" id="wuerzig">
                            </div>

                            <div class="form-group numeric">
                                <label for="fruchtig" class="control-label">fruchtig</label>
                                <input class="form-control" name="fruchtig" id="fruchtig" type="number" value="0" id="fruchtig">
                            </div>
                            
                            <input type="hidden" id="idInput">
                            
                            @if ( count( $errors ) > 0 )
                                @foreach($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                            @endif

                            <input class="btn btn-primary" type="submit" value="Speichern">
                            <input type="hidden" class="btn btn-danger" value="Löschen" id="deletePost">
                        </form>
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>

                    </div>
                  </div>
                </div>
                    <script>
                        $('#add').click(function(){
                            $('.modal-title').text('Produkt hinzufügen');
                            $('#myModal').modal('show');
                            $('.modalform').attr('id', 'createForm');
                            $('#titel').val(null);
                            $('#mild').val(0);
                            $('#suess').val(0);
                            $('#wuerzig').val(0);
                            $('#fruchtig').val(0);
                            $('#idInput').val(null);
                        });
                        $('tr').click(function(){
                            $('.modal-title').text('Produkt bearbeiten oder löschen');
                            $('#myModal').modal('show');
                            $('.modalform').attr('id', 'editForm');
                            $('#deletePost').attr('type', null);
                            var id = $(this).attr("data-id");
                            $('#titel').val($('#titel' + id).text());
                            $('#mild').val($('#mild' + id).text());
                            $('#suess').val($('#suess' + id).text());
                            $('#wuerzig').val($('#wuerzig' + id).text());
                            $('#fruchtig').val($('#fruchtig' + id).text());
                            $('#idInput').val(id);
                        });
                        $('#deletePost').click(function(){
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '/delete', //this is your uri
                                type: 'DELETE', //this is your method
                                data: {id:$('#idInput').val()},
                                success: function(data){
                                    $('#' + data.id).remove();
                                    $('#myModal').modal('hide');
                                },
                                error: function(data){
                                    console.log(data);
                                }
                            });
                        })
                        $(document).on('submit','#editForm',function(e){
                            e.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '/editold', //this is your uri
                                type: 'PUT', //this is your method
                                data: {id:$('#idInput').val(),titel: $('#titel').val(),mild: $('#mild').val(),suess: $('#suess').val(),wuerzig: $('#wuerzig').val(),fruchtig: $('#fruchtig').val()},
                                success: function(data){
                                    $('#titel' + data.id).text(data.titel);
                                    $('#mild' + data.id).text(data.mild);
                                    $('#suess' + data.id).text(data.suess);
                                    $('#wuerzig' + data.id).text(data.wuerzig);
                                    $('#fruchtig' + data.id).text(data.fruchtig);
                                $('#myModal').modal('hide');
                                },
                                error: function(data){
                                    var errors = data.responseJSON.errors;
                                    var parsedErrors = JSON.stringify(errors);
                                    console.log(parsedErrors);
                                }
                            });
                        });
                        $(document).on('submit','#createForm',function(e){
                            e.preventDefault();
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: '/setnew', //this is your uri
                                type: 'POST', //this is your method
                                data: {titel: $('#titel').val(),mild: $('#mild').val(),suess: $('#suess').val(),wuerzig: $('#wuerzig').val(),fruchtig: $('#fruchtig').val()},
                                success: function(data){
                                    $('tbody').append('<tr data-id=' + data.id + ' id=' + data.id + '><td id="titel' + data.id + '">' + data.titel + '</td><td id="mild' + data.id + '">' + data.mild + '</td><td id="suess' + data.id + '">' + data.suess + '</td><td id="wuerzig' + data.id + '">' + data.wuerzig + '</td><td id="fruchtig' + data.id + '">' + data.fruchtig + '</td></tr>'
                                );
                                $('#myModal').modal('hide');
                                },
                                error: function(data){
                                    var errors = data.responseJSON.errors;
                                    var parsedErrors = JSON.stringify(errors);
                                    console.log(parsedErrors);
                                }
                            });
                        });
                    </script>
@endif
@if(Auth::guest())
                <h2>Du musst dich anmelden, um diese Funktion nutzen zu können.</h2>
@endif
@endsection
