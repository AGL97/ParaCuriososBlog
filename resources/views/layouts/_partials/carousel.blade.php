<div id="carouselCaptions" class="carousel slide">
    <div class="carousel-indicators">
        @if(!empty($cards))
            @for($i=0; $i<sizeof($cards);$i++)
                @component('components.carousel-caption')
                    @slot('slideTo',$i)
                    @slot('isActive',$i==0 ? "active" : "")
                    @slot('isCurrent',$i==0 ? "true" : "false")
                    @slot('label',$i)
                @endcomponent
            @endfor
        @endif
    </div>

    <div class="carousel-inner">
        @if(!@empty($cards))
            @for($i=0; $i<sizeof($cards);$i++)
                @component('components.carousel-item')
                    @slot('isActive',$i==0 ? "active" : "")
                    @slot('imageRoute',$cards[$i]->imageRoute)
                    @slot('title',$cards[$i]->title)
                    @slot('short_description',$cards[$i]->short_description)   
                    @slot('id',$card->id)         
                @endcomponent
            @endfor
        @endif
    </div>

    @if(!@empty($cards))
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>        
        </button>
    @endif
    
  </div>