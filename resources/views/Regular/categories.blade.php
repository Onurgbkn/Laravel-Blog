@extends('regular.master')
@section('title', 'Kategoriler')
@section('content')




<div class="col-md-9 col-lg-8 col-xl-7">

  <ul class="list-group">
    <div class="">
      Kategoriler
    </div>
    @foreach ($allcategories as $allcategory)
      <li class="list-group-item"><a href="{{route('categoryPosts', $allcategory->slug)}}">{{$allcategory->name}}</a><span class="badge bg-primary float-end">{{$allcategory->count}}</span></li>
    @endforeach

  </ul>
</div>





@include('regular.layouts.sidebar')
@endsection
