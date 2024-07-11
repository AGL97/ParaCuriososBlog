@extends('layouts.landing')

@section('title')
  {{__('admin.navTitle')}}
@endsection

<?php 
  $id = 1;
?>

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col excel">
        <form action="{{route('admin.import')}}" method="post" enctype="multipart/form-data">
        @csrf
          <input type="file" name="document_csv" id="document_csv">
          <button type="submit" class="btn btn-primary">Import</button>
        </form> 
        <a href="{{route('admin.export')}}" class="btn btn-primary">Export</a> 
      </div>          
    </div>
  </div>

  <table class="table table-bordered table-dark table-hover table-responsive-sm table-responsive-md table-responsive-lg">
    <thead>
        <tr class="visually-hidden">
            <th>ID</th>
            <th>{{__('admin.title')}}</th>
            <th>{{__('admin.category')}}</th>
            <th>{{__('admin.description')}}</th>
            <th>{{__('admin.image')}}</th>   
            <th></th>
            <th></th>
        </tr>        
    </thead>
    <tbody class="tabla">
        {{-- @foreach ($cards as $card)
          <tr>
            <td><article><span class="text-center">{{$id++}}</span></article></td>            
            <td><article><span class="text-center">{{$card->title}}</span></article></td>
            <td><article><span>{{$card->category}}</span></article></td>
            <td class="text-justify"> {{$card->description}}</td>
            <td class="d-flex justify-content-center"><img src="{{asset('storage/images/'.$card->imageRoute)}}"alt="img" width="40" height="40"></td>
            <td><a href="{{route("post.edit",$card->id)}}" class="btn btn-success">{{__('admin.edit')}}</a></td>
          </tr>
        @endforeach         --}}
    </tbody>
  </table>


  
  

  

  <div class="loading d-flex  align-items-center justify-content-center">    
    <div class="loading loading-spinner spinner-border text-light " role="status"></div>
    <span class="loading loading-text text-light text-center ">Loading...</span>
  </div>

  <script>
       
    $(document).ready( function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
    type:'get',
    url: "{{route('get.all.cards')}}",
    data: true,
    cache:false,
    contentType: 'json',
    processData: false})
    .done((data) => {
    $('tr').removeClass('visually-hidden');
    let cards = data.cards;
    let id = 1;
    cards.forEach(card => {     
      const urlEdit = `{{route('post.edit',':id')}}`.replace(':id',card.id)
      const urlDelete = `{{route('post.destroy',':id')}}`.replace(':id',card.id)

      let tr = $(`
                <tr>
                  <td>${id++}</td>                
                  <td>${card.title}</td>
                  <td>${card.category}</td>
                  <td>${card.description}</td>  
                  <td class="text-center">
                  <img src="{{asset('storage/images/${card.imageRoute}')}}" width="50"/>
                  </td> 
                  <td><a href="${urlEdit}" class='btn btn-success'>{{__('admin.edit')}}</a></td>
                  <td>
                    <form class="delete" action="${urlDelete}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-close btn-close-white" aria-label="Close"></button>
                    </form> 
                  </td>
                </tr>`);
      $(".tabla").append(tr);
    });})
    .fail((data)=>{console.log('Error:', data);})
    .always(()=>{
      var loading = $('.loading');
      loading.remove();
    })

    });
    </script>

@endsection

