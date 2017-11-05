<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-light bg-faded">
            <a class="navbar-brand" href="/">tastalyze</a>
            @if(Auth::check())
                <a href="{{ route('admin.index') }}"><button class="btn btn-primary" type="button">Admin</button></a>
            @endif
            @if(Auth::guest())
                <a href="{{ route('login') }}"><button class="btn btn-primary" type="button">Anmelden</button></a>
            @endif
    </nav>
    @yield('content')
      
      <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
    <!-- JavaScript & jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>