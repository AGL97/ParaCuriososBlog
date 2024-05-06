@extends('layouts.landing')

@section('title')
    {{__('show.navTitle',['Article'=>$card->title])}}
@endsection

@section('content')
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col">
                <h1 class="titulo">{{$card->title}}</h1>                
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="show-img" style="background-image: url({{asset('storage/images/'.$card->imageRoute)}});"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">                
                <p class="texto">{{$card->description}}</p>
            </div>
        </div>
    </div> 
@endsection


