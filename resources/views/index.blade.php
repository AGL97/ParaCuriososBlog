@extends('layouts.landing')

@section('title')
  {{__('home.home')}}
@endsection

{{-- @section('caroussel')
<section class="container-fluid">
  <div class="row">    
    <div  class="col col-latest-img">
      @if(!empty($card))
        <div class="d-flex welcome flex-column justify-content-center align-items-center" style="background-image: url({{asset('storage/images/'.$card->imageRoute)}});">
            <h1>{{__('home.welcome')}}</h1>        
            <a class="btn btn-light latest" href="{{route('post.show',$card->id)}}">{{__('home.latest')}}</a>          
        </div>    
      @endif
    </div>
  </div>
</section>    
@endsection --}}

@section('caroussel')

<div class="container-fluid">
  <div class="row">
    <div class="col col-carousel">
      @include('layouts._partials.carousel')
    </div>
  </div>   
</div>

@endsection




@section('content')  


<div class="container-fluid">
  <div class="row">
    <div class="col">
      <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>
    </div>
  </div>  
</div>


<section class="container-fluid">
  
  <div class="row">
    <div class="col">
      <div class="d-flex p-3 justify-content-between">
        <div class="blogs d-flex  flex-column flex-sm-column flex-md-row  align-items-md-baseline ">
          <span class="textBlog">Blogs:</span>
          <a href="{{route('index')}}" class="btn btn-primary mt-1 mt-sm-1 categories" >{{__('home.allTag')}}</a>
          @forelse ($tags as $tag)
            @component('components.tags')
              @slot('tagName',$tag) 
            @endcomponent
          @empty
              {{__('home.noTags')}}
          @endforelse
        </div>
        <form action="{{route('index.search')}}" method="GET" class="input-group search">
          <input type="search" class=" form-control" name='search' id="search" placeholder="{{__('home.search')}}"> 
          <button type="submit" class="btn btn-primary input-group-append">{{__('home.search')}}</button>   
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="cards">
        @forelse ($cards as $card)
          @component('components.cards')
            @slot('articleTitle',$card->title)
            @slot('shortArticleText', $card->short_description) 
            @slot('articleImage',$card->imageRoute)
            @slot('category',$card->category)
            @slot('id',$card->id)
          @endcomponent
        @empty
        <p class="noArticles"> {{__('home.noArticles')}} </p>
        @endforelse
      </div>
    </div>
  </div> 

  <div class="container">

  </div>
  
  <div class="row">
    <div class="col col-more-articles d-flex justify-content-center align-items-center">      
      <button class="btn btn-more-articles">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download more-articles" viewBox="0 0 16 16">
          <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
          <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
        </svg>
      </button>
    </div>
  </div>  

  <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x text-center mb-2">
    <x-toast>
      <x-slot:message>
        Nuevo Articulo creado
      </x-slot>
    </x-toast>
  </div>  


  @if (session('message'))
    <script>
      const toast = $('.toast');
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toast);
      toastBootstrap.show();
    </script>    
  @endif
  

  


</section> 

  <script>
    
  $(function () {

  const more = $('.btn-more-articles')

  const isEnabledMoreArticles = {{var_export($isEnabledMoreArticles)}};

  if(isEnabledMoreArticles==false)
  {
    more.attr('disabled', 'true');
  }

  let index = 3;  
  let max = {{$max}};

  let iteratorCaroussel = 3;


  $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

  function getCards(){
  return new Promise((resolve,reject)=>{
      {
          $.ajax({
          type:'get',
          url: `{{route('get.small.cards',':index')}}`.replace(':index',index),
          data: true,
          cache:false,
          contentType: 'json',
          processData: false})
          .done((data) => {
          let cards = data.cards;
          resolve(cards);
          })
          .fail((error)=>{
          reject(error);
          })
      }
  })
  }
  
  more.on('click', async () => {
  await getCards().then((cards) => {
  console.log(max)
  
  if(index < max)
  {
    index += 3; 

    if (index>max) {
      more.attr('disabled', 'true');
    };
  }
  
  console.log(index);

  cards.forEach(card => {
  let id = parseInt(card.id)
  let row = $(` 
                <x-cards>
                  <x-slot:articleTitle>
                    ${card.title}
                  </x-slot>
                  <x-slot:shortArticleText>
                    ${card.short_description}
                  </x-slot>
                  <x-slot:articleImage>
                    ${card.imageRoute}
                  </x-slot>
                  <x-slot:category>
                    ${card.category}
                  </x-slot>
                  <x-slot:id>
                    :toReplaceID
                  </x-slot>          
                </x-cards>
              `.replace(':toReplaceID',id));  

  $('.cards').append(row);

  let carouselIndicators = $(`
                          <x-carousel-caption>
                            <x-slot:slideTo>
                              ${iteratorCaroussel}
                            </x-slot>
                            <x-slot:isActive>
                              ${(iteratorCaroussel==0 ? "active" : "")}
                            </x-slot>
                            <x-slot:isCurrent>
                              ${(iteratorCaroussel==0 ? "true" : "false")}
                            </x-slot>
                            <x-slot:label>
                              ${iteratorCaroussel}
                            </x-slot>  
                          </x-carousel-caption>   
                          `);


  $('.carousel-indicators').append(carouselIndicators);

  let carouselItem = $(`
                          <x-carousel-item>
                            <x-slot:isActive>
                              ${(iteratorCaroussel==0 ? "active" : "")}
                            </x-slot>
                            <x-slot:imageRoute>
                              ${card.imageRoute}
                            </x-slot>
                            <x-slot:title>
                              ${card.title}
                            </x-slot>
                            <x-slot:short_description>
                              ${card.short_description}
                            </x-slot>    
                            <x-slot:id>
                              :toReplaceID
                            </x-slot>  
                          </x-carousel-item>
                          `.replace(':toReplaceID',id));
   
  $('.carousel-inner').append(carouselItem);  
  
  iteratorCaroussel++
  })


  }).catch((error) => {
  console.error(error);
  });
  });

  more.on( "mouseup", function() {      
  $( this ).css('background-color', '#00000000');
  } )

  more.on( "mousedown", function() {
  $( this ).css('background-color', '#3c7a66');
  } )
  more.on('mouseout',()=>{
    $( this ).css('background-color', '#00000000')
  });

  
  });




</script>



@endsection




