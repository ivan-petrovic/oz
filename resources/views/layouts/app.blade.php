<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>OZ: @yield('title')</title>
  <meta name="description" content="Aplikacija za obracun zarada">
  <meta name="author" content="Ivan Petrovic">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/skeleton.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/mystyles.css') }}">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="{{ URL::asset('images/favicon.png') }}">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- @yield('navigation') -->
  @if (session()->has('izabranaFirma'))
    Izabrana firma: {{ session('izabranaFirma')->naziv }}
  @endif

  <div class="container">
    @yield('content')
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
