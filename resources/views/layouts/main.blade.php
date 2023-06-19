<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library System</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 </head>
 <body>
  <div class="container">
    @include('layouts.navigation')
     @yield('main')
    </div>
    @stack('scripts')
 </body>

</html>
