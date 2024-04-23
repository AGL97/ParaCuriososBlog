@extends('layouts.landing')

@section('title','Edit Article')

@section('content')
    <form action="{{route("post.update",$card->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class=" container-fluid">
            <div class=" col-sm-4 col-8 mb-3">
                <div class="input-group">
                    <span class="input-group-text">Titulo:</span>
                    <input type="text" class="form-control" name="title" id="title" value="{{$card->title}}" aria-describedby="title">                    
                </div>
                @error('title')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="col-12 mb-3">
                <div class="input-group">
                    <span class="input-group-text">Short description:</span>
                    <input class=" form-control" name="short_description" id="short_description" aria-label="Short description:" value="{{$card->short_description}}">                    
                </div>
                @error('short_description')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="col-12 mb-3">
                <div class="input-group">
                    <span class="input-group-text">Description:</span>
                    <input class=" form-control" name="description" id="description" aria-label="Description:" value="{{$card->description}}">                    
                </div>
                @error('description')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="col-sm-4 col-8 mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="imageRoute">Foto:</label>   
                    <input class="form-control" type="text" name="imageRoute" id="imageRoute" value="{{$card->imageRoute}}">                                                  
                </div>
                @error('imageRoute')
                        <p style="color:red;">{{$message}}</p>            
                @enderror   
            </div>     
            <div class="col-sm-4 col-8 mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="articleImage">Categoria:</label>   
                    <input class="form-control" type="text" name="category" id="category" value="{{$card->category}}">                                                  
                </div>
                @error('category')
                        <p style="color:red;">{{$message}}</p>            
                @enderror   
            </div>         

           <button type="submit" class="btn btn-success">Update</button>

        </div>     
    </form>
        
        
@endsection

@section('styles')
    
@endsection