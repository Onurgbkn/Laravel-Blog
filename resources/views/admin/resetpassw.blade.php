@extends('admin.master')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-7 col-xl-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Şifreni Değiştir!</h1>
                            </div>
                            <form class="user" method="post" action="{{route('resetpasswPost')}}">

                                @csrf
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

                                <div class="col-md-12 m-2">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Eski Şifre" name="oldpassword">
                                    <span class="text-danger">@error ('password'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-12 m-2">
                                    <input type="password" class="form-control form-control-user"
                                        id="examplePassword" placeholder="Yeni Şifre" name="password">
                                </div>
                                <div class="col-md-12 m-2">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Yeni Şifreyi Doğrula" name="password_confirmation">
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="button">Gönder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
