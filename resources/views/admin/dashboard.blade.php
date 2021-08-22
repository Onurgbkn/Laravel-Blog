@extends('admin.master')
@section('heading', 'Admin Paneli')
@section('content')







                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4 ">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-dark">Son Yazilar</h6>
                                </div>
                                <div class="card-group">
                                @foreach ($posts as $post)

                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{$post->title}}</b></h5>
                                            <p class="card-text">{!! Str::limit($post->content, 400) !!}</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted">{{$post->created_at}}</small>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Son Yorumlar</h6>
                                </div>
                                @foreach ($comments as $comment)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{ $comment->name }}</b></h5>
                                            <p class="card-text">{{Str::limit($comment->text, 200)}}</p>
                                            <small class="text-muted">{{$comment->created_at}}</small>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Son Aramalar</h6>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($searches as $search)
                                            <li class="list-group-item">{{ $search->text }}<span class="float-right">{{$search->created_at}}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>




@endsection
