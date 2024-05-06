<header>
    <nav class="background-menu navbar navbar-expand-md">
        <div class="container-fluid">                  
          <a class="navbar-brand" href="{{ route('index') }}">    
            <img class="logo" src="{{asset('icons8-logo.svg')}}" alt="Logo" sizes="30">            
            <span style="font-size: 1.5em; font-weight:600; font-family:'Consolas'; color:white;"> {{__('menu.title')}}</span>
          </a>        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav container-fluid justify-content-end">
                <style>
                    a{border-radius: 4px;margin-right:5px;}
                    a:hover{background-color: rgba(152, 156, 148, 0.219);}
                </style>
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{route('index')}}">{{__('menu.home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{route('contact')}}">{{__('menu.contact')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" aria-current="page" href="{{route('about')}}">{{__('menu.about')}}</a>
                </li>
                <li>
                  <div class="nav-item collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang == App::getLocale())
                            <a href="#" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              {{$language}}
                            </a>      
                          @endif
                        @endforeach
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li>  
                            @foreach (Config::get('languages') as $altLang => $altLanguage)
                              @if ($altLang != App::getLocale())                          
                                <a class="dropdown-item" href="{{route('lang',$altLang)}}" style="padding:4px 14px; width:90%;">{{$altLanguage}}</a>                                    
                              @endif
                            @endforeach
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </li>
                @if(!Auth::check())
                  <li class="nav-item">
                    <a href="{{route('login')}}" class="btn btn-outline-light ">{{__('menu.login')}}</a>
                  </li> 
                @else
                  <li class="nav-item">
                    <a href="{{route('logout')}}" class="btn btn-outline-light ">{{__('menu.login')}}</a>
                  </li>
                @endif
            </ul>
        </div>        
    </nav>
</header>

