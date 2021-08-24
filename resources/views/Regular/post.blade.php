@extends('regular.master')
@section('title', Str::limit($post->title, 15))
@section('content')

<div class="col-md-9 col-lg-8 col-xl-7">

  <h1>{{$post->title}}</h1>

  <p>{!! $post->content !!}</p>



  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if(session('back'))
    <div class="alert alert-info" role="alert">
      {{session('back')}}
    </div>
  @endif

<h2>Yorumlar</h2>
@foreach ($postcomments as $postcomment)
    <div class="card bg-light mb-1">
      <div class="card-body">
        <h4 class="card-title">{{$postcomment->name}}</h4>
        <p class="card-text">{{$postcomment->text}}</p>
      </div>
    </div>
@endforeach
{{$postcomments->links("pagination::bootstrap-4")}}


  <form method="post" action="{{route('makecomment', $post->slug)}}">
    @csrf
    <div class="form-group my-3">
      <label for="">İsim</label>
      <input class="form-control" value="{{old('isim')}}" type="text" name="isim" required>
    </div>
    <div class="form-group my-3">
      <label for="">Email adresiniz</label>
      <input type="email" class="form-control" value="{{old('email')}}" id="Email" name="email" required>
    </div>
    <div class="form-group">
      <label for="">Yorumunuz</label>
      <textarea class="form-control" id="Textarea1" rows="3" value="{{old('yorum')}}" name="yorum" required></textarea>
    </div>
    <input type="hidden" id="custId" name="postId" value="{{$post->id}}">
    <button type="submit"  class="btn btn-primary my-3">Gönder</button>
  </form>


</div>
@include('regular.layouts.sidebar')
@endsection
