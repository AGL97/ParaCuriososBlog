@extends('layouts.landing')

@section('title')
    {{__('login.title')}}
@endsection


@section('content')    
        <div class="login d-flex justify-content-center" style="margin-top: 20vh">
            @error('email')
                <p style="color:red;">{{$message}}</p>            
            @enderror
            <form action="{{route('user.verify')}}" method="POST" class="form-group">
                @csrf
                <div class="input-group col-sm-4 col-8 mb-3">
                    <label for="username" class="input-group-text">{{__('login.user')}}:</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="input-group col-sm-4 col-8 mb-3">
                    <label for="email" class="input-group-text">{{__('login.email')}}:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="input-group col-sm-4 col-8 mb-3">
                    <label for="password" class="input-group-text">{{__('login.password')}}:</label>
                    <input autocomplete="current-password" type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">{{__('login.submit')}}</button>
            </form>
        </div>    
@endsection

@section('styles')
        <link rel="stylesheet" href="{{asset('login.css')}}">
@endsection