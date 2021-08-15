<div class="col-md-3">

  <ul class="list-group">
    <div class="">
      Top 3 Kategori
    </div>
    @foreach ($categories as $category)
      <li class="list-group-item"><a href="{{route('categoryPosts', $category->slug)}}">{{$category->name}}</a><span class="badge bg-primary float-end">{{$category->GetCount()}}</span></li>
    @endforeach

  </ul>
</div>
