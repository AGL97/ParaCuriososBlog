@extends('layouts.landing')

@section('title')
  {{__('home.home')}}
@endsection

@section('content')
  @if(!empty($card))
    <div class="d-flex welcome flex-column justify-content-center align-items-center" style="background-image: url('storage/images/{{$card->imageRoute}}');">
        <h1>{{__('home.welcome')}}</h1>        
        <a class="btn btn-light latest" href="{{route('post.show',$card->id)}}">{{__('home.latest')}}</a>          
    </div>    
  @endif
      
  <div class="d-flex m-3 justify-content-between">
    <div class="blogs d-flex  flex-column flex-sm-column flex-md-row  align-items-md-baseline ">
      <span class="textBlog" style="color: #fff; text-align:center">Blogs:</span>
      <a href="{{route('index')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >{{__('home.allTag')}}</a>
      @forelse ($tags as $tag)
        @component('components.tags')
          @slot('tagName',$tag) 
        @endcomponent
      @empty
          {{__('home.noTags')}}
      @endforelse
    </div>
    <form action="{{route('index.search')}}" method="GET" class="input-group" style="max-width: 300px;  min-width: 90px; max-height:38px">
      <input type="search" class=" form-control" name='search' id="search" placeholder="{{__('home.search')}}"> 
      <button type="submit" class="btn btn-primary input-group-append">{{__('home.search')}}</button>   
    </form>
  </div>

  <div class="container-fluid">
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
      {{__('home.noArticles')}}
      @endforelse
    </div>
  </div>
    
@endsection


@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
@endsection

