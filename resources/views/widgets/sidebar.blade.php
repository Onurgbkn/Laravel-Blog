<div class="col-md-3">

  <ul class="list-group">
    <div class="">
      Top 3 Kategori
    </div>
    @foreach ($categories as $category)
      <li class="list-group-item fs-5"><a href="{{route('categoryPosts', $category->slug)}}">{{$category->name}}</a><span class="badge bg-primary float-end">{{$category->count}}</span></li>
    @endforeach

    <div class="">
      Son Yorumlar
    </div>
    @foreach ($comments as $comment)
      <li class="list-group-item fs-6"><b>{{$comment->name}}</b>: {{$comment->text}}</li>
    @endforeach

  </ul>
</div>
