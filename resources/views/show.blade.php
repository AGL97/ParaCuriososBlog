@extends('layouts.landing')

@section('title','Explore')


@section('content')
    <div class="container-fluid"> 
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>{{$card->title}}</h1>
            <img src="{{asset('storage/images/'.$card->imageRoute)}}" width="500" alt="Image">
            <p style="color: #FFFFFF">{{$card->description}}</p>  
        </div>
    </div> 
@endsection



@section('styles')
    <link rel="stylesheet" href="{{asset('index.css')}}">
@endsection