@extends('layouts.master')
@section('title', 'My Blog')
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
                  @endforeach
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html"><h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2></a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 18, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Science has not yet mastered prophecy</h2>
                            <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next ten.</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on August 24, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Failure is not an option</h2>
                            <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to future generations.</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on July 8, 2021
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
@include('widgets.sidebar')
@endsection
