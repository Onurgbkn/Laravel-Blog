<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kayit Ol</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('adminpanel')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('adminpanel')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hesap Oluştur!</h1>
                                    </div>
                                    <form class="user" method="post" action="{{route('registerPost')}}">

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
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                    placeholder="Ad" name="fname" value="{{old('fname')}}">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                    placeholder="Soyad" name="lname" value="{{old('lname')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Email" name="email" value="{{old('email')}}">
                                            <span class="text-danger">@error ('email'){{$message}}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                                placeholder="Kullanici Adı" name="username" value="{{old('username')}}">
                                            <span class="text-danger">@error ('username'){{$message}}@enderror</span>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Şifre" name="password">
                                                <span class="text-danger">@error ('password'){{$message}}@enderror</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Şifreyi Onayla" name="password_confirmation">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="button">Kayıt Ol</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{asset('adminpanel')}}\forgot-password.html">Şifremi Unuttum!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('login')}}\">Hesabın var mı? Giriş Yap!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('adminpanel')}}\vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('adminpanel')}}\vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('adminpanel')}}\vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('adminpanel')}}\js/sb-admin-2.min.js"></script>

</body>

</html>
