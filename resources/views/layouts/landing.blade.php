<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('icons8-logo-16.png')}}" type="image/png"   sizes="16x16">
    <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.min.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('assets/css/landing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/menu.css')}}">
    @yield('styles')
   

    <title> @yield('title') </title>

</head>
<body>  
  
  @include('layouts._partials.menu')
  <main>
    @yield('content')    
  </main>  
  
  @include('layouts._partials.footer')

</body>

</html>
