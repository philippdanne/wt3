<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
      <div class="container">
          @yield('content')
      </div>
    <!-- JavaScript & jQuery -->
    <script src="../js/app.js"></script>
  </body>
</html>