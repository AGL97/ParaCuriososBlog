@extends('layouts.landing')

@section('title','New Article')

@section('content')
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <section class="form-container"> 
            <div class="forms">
                <div class="input-group">
                    <span class="input-group-text">Titulo:</span>
                    <input type="text" class="form-control" name="title" id="title" placeholder="El reino de este mundo" aria-describedby="title"> 
                </div>
                @error('title')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="forms">
                <div class="input-group">
                    <span class="input-group-text">Description:</span>
                    <textarea class=" form-control" name="description" id="description" aria-label="Description:" placeholder="En el reino de este mundo..."
                    rows="10" ></textarea>    
                </div>
                @error('description')
                        <p style="color:red;">{{$message}}</p>            
                @enderror
            </div>
            <div class="forms">
                <div class="input-group">
                    <label class="input-group-text" for="imageRoute">Foto:</label>   
                    <input class="form-control" type="file" name="imageRoute" id="imageRoute"/>         
                </div>
                @error('imageRoute')
                        <p style="color:red;">{{$message}}</p>            
                @enderror   
            </div>     
            <div class="forms">
                <div class="input-group">
                    <label class="input-group-text" for="articleImage">Categoria:</label>   
                    <input class="form-control" type="text" name="category" id="category" placeholder="Category" >                                                  
                </div>
                @error('category')
                        <p style="color:red;">{{$message}}</p>            
                @enderror   
            </div>         

            <button type="submit" class="btn btn-primary submit">Create</button>
        </section>
    </form>
        
        
@endsection
 
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/css/create.css')}}">
@endsection