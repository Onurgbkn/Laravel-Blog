@extends('admin.master')
@section('heading', 'Yazılar')
@section('content')


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Yazilar<a href="#" data-toggle="modal" data-target="#ModalCreate"><span class="float-right"> Yazi Ekle </span></a></h6>
    </div>
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Yazı Başlığı</th>
                        <th>Kategorisi</th>
                        <th>Yazar</th>
                        <th>Tarih</th>
                        <th>Düzenle</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="data-row">
                            <td class="posttitle">{{ $post->title }}</td>
                            <td class="postcategory">{{ $post->GetCategory->name }}</td>
                            <td>{{ $post->GetAdmin->username }}</td>
                            <td>{{ $post->created_at }}</td>
                            <input type="hidden" class="postcontent" name="postcontent" value="{{ $post->content }}">
                            <td>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                            <button id="edit-item" data-post-id="{{$post->id}}" class="btn btn-info btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                    </li>
                                    <li class="list-inline-item">
                                        <button id="delete-item" data-post-id="{{$post->id}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.posts.create')
@include('admin.posts.edit')
@include('admin.posts.delete')

@endsection
