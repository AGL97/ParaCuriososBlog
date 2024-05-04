@extends('layouts.landing')

@section('title')
    {{__('create.navTitle')}}
@endsection

@section('content')
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="form-container"> 
            <div class="forms">
                <div class="input-group">
                    <span class="input-group-text">{{__('create.title')}}</span>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="title"> 
                </div>
                @error('title')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="forms">
                <div class="input-group">
                    <span class="input-group-text">{{__('create.description')}}</span>
                    <textarea class=" form-control" name="description" id="description" aria-label="Description:" rows="10" ></textarea>    
                </div>
                @error('description')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="input-group">
                        <label class="input-group-text" for="imageRoute">{{__('create.image')}}</label>   
                        <input class="form-control" type="file" name="imageRoute" id="imageRoute" placeholder="{{__('edit.select')}}">                                                  
                    </div>
                    @error('imageRoute')
                            <p style="color:red;">{{$message}}</p>            
                    @enderror   
                </div>     
                <div class="col-3">
                    <div class="input-group">
                        <label class="input-group-text" for="articleImage">{{__('create.category')}}</label>   
                        <input class="form-control" type="text" name="category" id="category">                                                  
                    </div>
                    @error('category')
                            <p style="color:red;">{{$message}}</p>            
                    @enderror   
                </div>                 
            </div>  
            <div class="row mt-2">
                <div class="col-3">
                    <button type="submit" class="btn btn-success">{{__('create.create')}}</button>  
                </div>
            </div>            
        </section>
    </form>
        
        
@endsection
 
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/create.css')}}">
@endsection