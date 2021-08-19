@extends('layouts.master')
@section('title', 'Kategoriler')
@section('content')




<div class="col-md-9 col-lg-8 col-xl-7">

  <ul class="list-group">
    <div class="">
      Top 3 Kategori
    </div>
    @foreach ($categories as $category)
      <li class="list-group-item"><a href="{{route('categoryPosts', $category->slug)}}">{{$category->name}}</a><span class="badge bg-primary float-end">{{$category->count}}</span></li>
    @endforeach

  </ul>
</div>





@include('widgets.sidebar')
@endsection
