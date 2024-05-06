@extends('layouts.landing')

@section('title')
  {{__('home.home')}}
@endsection

@section('content')  
<div class="container-fluid p-img">
    <div class="row">    
      <div  class="col col-latest-img">
        @if(!empty($card))
          <div class="d-flex welcome flex-column justify-content-center align-items-center" style="background-image: url({{asset('storage/images/'.$card->imageRoute)}});">
              <h1>{{__('home.welcome')}}</h1>        
              <a class="btn btn-light latest" href="{{route('post.show',$card->id)}}">{{__('home.latest')}}</a>          
          </div>    
        @endif
      </div>
    </div>
  
  <div class="row">
    <div class="col">
      <div class="d-flex p-3 justify-content-between">
        <div class="blogs d-flex  flex-column flex-sm-column flex-md-row  align-items-md-baseline ">
          <span class="textBlog">Blogs:</span>
          <a href="{{route('index')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >{{__('home.allTag')}}</a>
          @forelse ($tags as $tag)
            @component('components.tags')
              @slot('tagName',$tag) 
            @endcomponent
          @empty
              {{__('home.noTags')}}
          @endforelse
        </div>
        <form action="{{route('index.search')}}" method="GET" class="input-group search">
          <input type="search" class=" form-control" name='search' id="search" placeholder="{{__('home.search')}}"> 
          <button type="submit" class="btn btn-primary input-group-append">{{__('home.search')}}</button>   
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="cards">
        @forelse ($cards as $card)
          @component('components.cards')
            @slot('articleTitle',$card->title)
            @slot('shortArticleText', $card->short_description) 
            @slot('articleImage',$card->imageRoute)
            @slot('category',$card->category)
            @slot('id',$card->id)
          @endcomponent
        @empty
        <p class="noArticles"> {{__('home.noArticles')}} </p>
        @endforelse
      </div>
    </div>
  </div> 

</div> 
@endsection




