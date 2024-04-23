@extends('layouts.landing')

@section('title','New Article')

@section('content')
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class=" container-fluid">
            <div class="col-sm-4 col-8 mb-3">
                <div class="input-group">
                    <span class="input-group-text">Titulo:</span>
                    <input type="text" class="form-control" name="title" id="title" placeholder="El reino de este mundo" aria-describedby="title">                    
                </div>
                @error('title')
                        <p style="color:red;">{{$message}}</p>            
                 @enderror
            </div>
            <div class="col-4 mb-3">
                <div class="input-group">
                    <span class="input-group-text">Description:</span>
                    <textarea class=" form-control" name="description" id="description" aria-label="Description:" placeholder="En el reino de este mundo..." style="field-sizing:content" ></textarea>                    
                </div>
                @error('description')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="col-sm-4 col-8 mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="imageRoute">Foto:</label>   
                    <input class="form-control" type="text" name="imageRoute" id="imageRoute" placeholder="Ruta" >                                                  
                </div>
                @error('imageRoute')
                        <p style="color:red;">{{$message}}</p>            
                @enderror   
            </div>     
            <div class="col-sm-4 col-8 mb-3">
                <div class="input-group">
                    <label class="input-group-text" for="articleImage">Categoria:</label>   
                    <input class="form-control" type="text" name="category" id="category" placeholder="Category" >                                                  
                </div>
                @error('category')
                        <p style="color:red;">{{$message}}</p>            
                @enderror   
            </div>         

            <button type="submit" class="btn btn-primary">Create</button>

        </div>     
    </form>
        
        
@endsection

@section('styles')
    
@endsection