@extends('admin.master')
@section('heading', 'Adminler')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Adminler</h6>
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
                            <th>İsim</th>
                            <th>Kullanıcı Adı</th>
                            <th>Email</th>
                            <th>Durum</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr class="data-row">
                                <td class="">{{ $admin->fname }} {{ $admin->lname }}</td>
                                <td class="">{{ $admin->username }}</td>
                                <td class="">{{ $admin->email }}</td>
                                <td class="sdadsaf">
                                    <input class="statetoggle" adminId="{{ $admin->id }}" type="checkbox" data-toggle="toggle" data-on="Aktif" data-off="Pasif" @if($admin->durum=="Aktif") checked @endif data-onstyle="success" data-offstyle="danger">
                                </td>

                                <td>
                                    <ul class="list-inline m-0">
                                        <li class="list-inline-item">
                                            <a href="{{route('deleteadmin', $admin->id)}}" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
        $id = $(this)[0].getAttribute('adminId');
        $state = $(this).prop('checked');
        $.get("{{route('toggleadmin')}}", {id:$id, state:$state}, function(data, status){
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
