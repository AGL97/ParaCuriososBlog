<div class="card mt-2" style="width:18rem;margin-left:10px">
  <img class="card-img-top" src="{{asset("assets/images/$articleImage")}}" style="height: 200px" alt="montaña.jpg">
  <div class="card-body bg-dark-subtle">
    <div class="card-title text-justify">
      <h4>{{$articleTitle}}</h4>
    </div>      
    <div class="card-text text-justify">
      <p>{{$shortArticleText}}</p>
    </div>
    <div style="display: flex; justify-content:space-between; align-items:center; bottom:0 ; left:0; right:0;">
      <p class="categoryCard">{{$category}}</p>
      <style>
        .categoryCard{
          background-color: #88928e;
          border-radius: 4px;
          box-shadow: 0px 0px 5px #000;
          margin: 0px;
          padding: 4px;
          color: #FFFFFF;
        }
      </style>
      <a href="{{route('post.show',$id)}} " class="btn btn-success" style="color: #FFFFFF;">
        Explorar
      </a> 
      @auth
        <a href="{{route("post.edit",$id)}} " class="btn btn-danger">
          Editar
        </a>
        <form action="{{route('post.destroy',$id)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-close"></button>
        </form>
      @endauth
    </div>
  </div>
</div>