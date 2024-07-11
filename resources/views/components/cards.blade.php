<div class="card">
  <img class="card-img-top" src="{{asset("storage/images/$articleImage")}}" alt="montaña.jpg">
  <div class="card-body bg-dark-subtle">
    <div class="card-title text-justify">
      <h4>{{$articleTitle}}</h4>
    </div>      
    <div class="card-text text-justify">
      <p>{{$shortArticleText}}</p>
    </div>
    <div class="buttons">

      <p class="categoryCard">{{$category}}</p>
      {{-- <a href="{{route('article.show', $id)}} " class="btn btn-success"> --}}

      <x-nav-link :route="'article.show'" :id="$id" :typeButton="'btn-primary'">         
        <x-slot:action>
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.25"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-asset"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 15m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" /><path d="M9 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14.218 17.975l6.619 -12.174" /><path d="M6.079 9.756l12.217 -6.631" /><path d="M9 15m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /></svg>
          {{__('home.explore')}}
        </x-slot> 
      </x-nav-link>
      
      <x-nav-link :route="'download.pdf'" :id="$id" :typeButton="'btn-success'" > 
        <x-slot:action>
          
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
          </svg>
          {{__('home.download')}}
        </x-slot> 
      </x-nav-link>

      <x-nav-link :route="'telegram.messagge'" :id="$id" :typeButton="'btn-info'" > 
        <x-slot:action>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-telegram" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09"/>
          </svg>
          {{__('home.telegramMessage')}}
        </x-slot> 
      </x-nav-link>

      
      
    
      {{-- @auth
        <a href="{{route("post.edit",$id)}} " class="btn btn-danger">
        <a href="#" class="btn btn-danger">
          Editar
        </a>
        <form class="delete" action="{{route('post.destroy',$id)}}" method="POST">
        <form class="delete" method="POST">

          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-close"></button>
        </form>
      @endauth --}}
    </div>
  </div>
</div>