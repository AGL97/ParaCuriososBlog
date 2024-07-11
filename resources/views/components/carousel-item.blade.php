<div class="carousel-item {{$isActive}}">
      <img src="{{asset('storage/images/'.$imageRoute)}}" class="d-block w-100" alt="img-carousel">
      <div class="carousel-caption d-none d-md-block">
        <div class="d-flex welcome flex-column justify-content-center align-items-center">
            <h1>{{__('home.welcome')}}</h1>        
            <a class="btn btn-light latest" href="{{route('post.show',$id)}}">{{__('home.latest')}}</a>          
        </div> 
        <h5>{{$title}}</h5>
        <p>{{$short_description}}</p>
      </div>
</div>