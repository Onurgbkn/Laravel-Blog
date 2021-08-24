@extends('regular.master')
@section('title', $posts->first()->GetCategory->name)
@section('content')

                <div class="col-md-9 col-lg-9 col-xl-7 float-left">
                    <!-- Post preview-->
                    @foreach ($posts as $post)
                    <div class="post-preview">
                        <a href="{{route('post', $post->slug)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{!! Str::limit($post->content, 100) !!}</h3>
                        </a>
                        <p class="post-meta">
                            <a href="/categories/{{$post->GetCategory->slug}}">{{$post->GetCategory->name}}</a>
                            on {{$post->created_at}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                  @endforeach
                  {{$posts->links("pagination::bootstrap-4")}}
                    <!-- Pager-->
                </div>
@include('regular.layouts.sidebar')
@endsection
