@extends('layouts.master')
@section('title', 'My Blog')
@section('content')

<div class="col-md-9 col-lg-8 col-xl-7">

  <h1>{{$post->title}}</h1>

  <p>{{$post->content}}</p>

</div>
@include('widgets.sidebar')
@endsection
