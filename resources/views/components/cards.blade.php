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
      <a href="{{route('article.show',$id)}} " class="btn btn-success">
        Explorar
      </a> 
      @auth
        <a href="{{route("post.edit",$id)}} " class="btn btn-danger">
          Editar
        </a>
        <form class="delete" action="{{route('post.destroy',$id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-close"></button>
        </form>
      @endauth
    </div>
  </div>
</div>