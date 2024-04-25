@extends('layouts.landing')

@section('title','Home')


@section('content')
  @if(!empty($card))
    <div class="d-flex welcome flex-column justify-content-center align-items-center">
        <h1>Bienvenido a nuestro blog</h1>
        <img src="{{asset('storage/images/$card->imageRoute')}}" alt="">  
        <a class="btn btn-light latest" href="{{route('post.show',$card->id)}}">Latest</a>          
    </div>    
  @endif
      
  <div class="d-flex m-3 justify-content-between">
    <div class="blogs d-flex  flex-column flex-sm-column flex-md-row  align-items-md-baseline">
      <span class="text-center">Blogs:</span>
      <a href="{{route('index')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >Todo</a>
      <a href="{{route('index.filter','Astronomia')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >Astronomia</a>
      <a href="{{route('index.filter','Arte')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >Arte</a>
      <a href="{{route('index.filter','Paisaje')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >Paisaje</a>
      <a href="{{route('index.filter','Anime')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >Anime</a>            
    </div>
    <form action="{{route('index.search')}}" method="GET" class="input-group" style="max-width: 300px;  min-width: 90px; max-height:38px">
      <input type="search" class=" form-control" name='search' id="search" placeholder="Buscar"> 
      <button type="submit" class="btn btn-primary input-group-append">Buscar</button>   
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
      'No hay articulos aun'
      @endforelse
    </div>
  </div>
    
    
    
    
    
    
   
    
@endsection



@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
@endsection