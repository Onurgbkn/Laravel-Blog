@extends('admin.master')
@section('heading', 'Yorumlar')
@section('content')




    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Yorumlar</h6>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
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
                            <th>Yorum</th>
                            <th>İsim</th>
                            <th>Email</th>
                            <th>Durum</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr class="data-row">
                                <td class="">{{ $comment->GetTitle->title }}</td>
                                <td class="">{{ $comment->text }}</td>
                                <td class="">{{ $comment->name }}</td>
                                <td class="">{{ $comment->email }}</td>
                                <td class="sdadsaf">
                                    <input class="statetoggle" commentId="{{ $comment->id }}" type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Pasif" @if($comment->state=="Aktif") checked @endif data-onstyle="success" data-offstyle="danger">
                                </td>



                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <button id="delete-item" data-category-id="{{$comment->id}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
  $(function() {
    $('.statetoggle').change(function() {
        $id = $(this)[0].getAttribute('commentId');
        $state = $(this).prop('checked');
        $.get("{{route('toggle')}}", {id:$id, state:$state}, function(data, status){
            console.log(data);
        });
      //alert('Toggle: ' + )
    })
  })
</script>
@endsection


@section('css')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@endsection
