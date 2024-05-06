@extends('layouts.landing')

@section('title')
    {{__('login.title')}}
@endsection


@section('content')    
    <div class="container-fluid">
        <div class="row row-login">
            <div class="col-3 login">                    
                    <form class="form-group login-form" action="{{route('user.verify')}}" method="POST" >
                        @csrf
                        <div class="input-group col-sm-4 col-8 mb-1">
                            <label for="username" class="input-group-text">{{__('login.user')}}:</label>
                            <input class="form-control" type="text" name="username" id="username" >
                        </div>
                        <div class="input-group col-sm-4 col-8 mb-1">
                            <label class="input-group-text" for="email" >{{__('login.email')}}:</label>
                            <input class="form-control" type="email" name="email" id="email" >
                        </div>
                        <div class="input-group col-sm-4 col-8 mb-1">
                            <label class="input-group-text" for="password" >{{__('login.password')}}:</label>
                            <input autocomplete="current-password" type="password" name="password" id="password" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit" >{{__('login.submit')}}</button>
                    </form>
                    @error('email')
                        <p class="error-message">{{$message}}</p>            
                    @enderror
            </div>
        </div>
    </div>
         
@endsection

