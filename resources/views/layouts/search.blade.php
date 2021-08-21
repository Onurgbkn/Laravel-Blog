@extends('layouts.master')
@section('content')

                <div class="col-md-9 col-lg-9 col-xl-7 float-left">
                    <!-- Post preview-->
                    @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('post', $post->slug)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{Str::limit($post->content, 100)}}</h3>
                        </a>
                        <p class="post-meta">
                            <a href="#!">{{$post->GetCategory->name}}</a>
                            on {{$post->created_at}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                  @endforeach
                  {{$posts->links("pagination::bootstrap-4")}}
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
@include('widgets.sidebar')
@endsection
