<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Pet World</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ url('css/custom.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  @yield('js')

  @yield('css')
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-custom">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Pet World</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href='{{ url("/home") }}'>Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href='{{ url("/cart") }}'>Cart</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Action
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ url('/color') }}">Add Color</a>
        <a class="dropdown-item" href="{{ url('/product') }}">Add Products</a>
        <a class="dropdown-item" href="{{ url('/pending') }}">Pending Orders</a>
      </div>
    </li>
  </ul>
</nav>
  @yield('jumbo')    
  @yield('navigation')
  @yield('content')
</div>

</body>
</html>
