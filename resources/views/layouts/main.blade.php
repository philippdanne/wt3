<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="/css/app.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-light bg-faded">
            <a class="navbar-brand" href="/">tastalyze</a>
            <button class="btn btn-outline-primary" type="button">Anmelden</button>
    </nav>
    @yield('content')
      
    <!-- JavaScript & jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/app.js"></script>
  </body>
</html>