@extends('layouts.landing')

@section('title','Home')

@section('content')
  <p>Admin View</p>
  <a class="btn btn-primary" href="{{route('logout')}}">Log Out</a>
@endsection