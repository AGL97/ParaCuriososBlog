@extends('layouts.landing')

@section('title')
  {{__('admin.navTitle')}}
@endsection

<?php 
  $id = 1;
?>

@section('content')
  <table class="table table-bordered table-dark table-hover table-responsive-sm table-responsive-md table-responsive-lg">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{__('admin.title')}}</th>
            <th>{{__('admin.category')}}</th>
            <th>{{__('admin.description')}}</th>
            <th>{{__('admin.image')}}</th>   
            <th></th>   
        </tr>        
    </thead>
    <tbody>
        @foreach ($cards as $card)
          <tr>
            <td><article><span class="text-center">{{$id++}}</span></article></td>            
            <td><article><span class="text-center">{{$card->title}}</span></article></td>
            <td><article><span>{{$card->category}}</span></article></td>
            <td class="text-justify"> {{$card->description}}</td>
            <td><article class="d-flex justify-content-center"><img src="{{asset('storage/images/'.$card->imageRoute)}}"alt="img" width="40" height="40"></article></td>
            <td><a href="{{route("post.edit",$card->id)}}" class="btn btn-success">{{__('admin.edit')}}</a></td>
          </tr>
        @endforeach        
    </tbody>
  </table>
@endsection

