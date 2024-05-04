<div class="card mt-2" style="width:18rem;margin-left:10px">
  <img class="card-img-top" src="{{asset("storage/images/$articleImage")}}" style="height: 200px" alt="montaña.jpg">
  <div class="card-body bg-dark-subtle">
    <div class="card-title text-justify">
      <h4>{{$articleTitle}}</h4>
    </div>      
    <div class="card-text text-justify">
      <p>{{$shortArticleText}}</p>
    </div>
    <div style="display: flex; justify-content:start; align-items:center;flex-wrap:wrap;bottom:0px;">
      <p class="categoryCard">{{$category}}</p>
      <style>
        a{
          margin-right: 5px;
          margin-left: 5px;
        }
        .categoryCard{
          background-color: #88928e;
          border-radius: 4px;
          box-shadow: 0px 0px 5px #000;
          margin: 0px;
          padding: 4px;
          color: #FFFFFF;
        }
      </style>
      <a href="{{route('article.show',$id)}} " class="btn btn-success" style="color: #FFFFFF;">
        Explorar
      </a> 
      @auth
        <a href="{{route("post.edit",$id)}} " class="btn btn-danger">
          Editar
        </a>
        <form action="{{route('post.destroy',$id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-close" style="margin: 0px"></button>
        </form>
      @endauth
    </div>
  </div>
</div>