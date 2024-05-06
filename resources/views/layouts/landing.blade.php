<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="icon" href="{{asset('icons8-logo-16.png')}}" type="image/png"   sizes="16x16"> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> @yield('title') </title>
</head>
<body> 
  
  @include('layouts._partials.menu')

  <main>
    @yield('content')    
  </main>  

  <p class="zoomable">
    Click me to zoom
  </p>
  
  <script type="module">
      $(document).ready(function(){
          $(".zoomable").click(function(){
              $(this).animate({
                  fontSize: "40px"
              }, 1000);
          });
      });
      $(document).
  </script>
  
  @include('layouts._partials.footer')

</body>

</html>
