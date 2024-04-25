<header>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">                  
          <a class="navbar-brand" href="{{ route('index') }}">    
            <img class="logo" src="{{asset('icons8-logo.svg')}}" alt="Logo" sizes="30">            
            <span style="font-size: 1.5em; font-weight:600; font-family:'Consolas'; color:white;"> ParaCuriososBlog</span>
          </a>        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav container-fluid justify-content-end">
                <style>
                    a{border-radius: 4px;margin-right:5px;}
                    a:hover{background-color: rgb(200, 204, 196);}
                </style>
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{route('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{route('about')}}">About</a>
                </li>
                @if(!Auth::check())
                  <li class="nav-item">
                    <a href="{{route('login')}}" class="btn btn-outline-light ">Log in</a>
                  </li> 
                @else
                  <li class="nav-item">
                    <a href="{{route('logout')}}" class="btn btn-outline-light ">Log out</a>
                  </li>
                @endif
            </ul>
        </div>        
    </nav>
</header>