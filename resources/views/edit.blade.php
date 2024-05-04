@extends('layouts.landing')

@section('title')
    {{__('edit.navTitle')}}
@endsection

@section('content')
    <form action="{{route("post.update",$card->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')        
        <div class=" container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">{{__('edit.title')}}</span>
                        <input type="text" class="form-control" name="title" id="title" value="{{$card->title}}" aria-describedby="title">                    
                    </div>
                    @error('title')
                            <p style="color:red;">{{$message}}</p>            
                    @enderror
                </div>
            </div>            
            <div class="row mb-3">
                <div class="col-12 ">
                    <div class="input-group">
                        <span class="input-group-text">{{__('edit.description')}}</span>
                        <textarea class=" form-control" name="description" id="description" aria-label="Description:" rows="10">{{$card->description}}</textarea>           
                    </div>
                    @error('description')
                            <p style="color:red;">{{$message}}</p>            
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <div class="input-group">
                        <label class="input-group-text" for="imageRoute">{{__('edit.image')}}</label>   
                        <input class="form-control" type="file" name="imageRoute" id="imageRoute" value="{{$card->imageRoute}}" placeholder="{{__('edit.select')}}">                                                  
                    </div>
                    @error('imageRoute')
                            <p style="color:red;">{{$message}}</p>            
                    @enderror   
                </div>     
                <div class="col-3">
                    <div class="input-group">
                        <label class="input-group-text" for="articleImage">{{__('edit.category')}}</label>   
                        <input class="form-control" type="text" name="category" id="category" value="{{$card->category}}">                                                  
                    </div>
                    @error('category')
                            <p style="color:red;">{{$message}}</p>            
                    @enderror   
                </div>                 
            </div> 
            <div class="row mt-2">
                <div class="col-3">
                    <button type="submit" class="btn btn-success">{{__('edit.edit')}}</button>  
                </div>
            </div> 

           

        </div>     
    </form>
        
        
@endsection

@section('styles')
    
@endsection