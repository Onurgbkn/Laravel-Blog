<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title', 'Blogum')</title>
        <link rel="icon" type="image/x-icon" href="{{asset('cleanblog/')}}/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('cleanblog/')}}/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand col-lg-2" href="{{route('index')}}">MyBlog</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav py-4 py-lg-0 col-sm-6">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('index')}}">Anasayfa</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('categories')}}">Kategoriler</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('about')}}">Hakkimda</a></li>
                    </ul>
                    <form class="d-flex col-lg-7" style="height: 40px" action="{{ url('/search') }}" method="GET">
                        <input class="form-control" type="search" placeholder="{{$weather}} ??" aria-label="Search" size="100" name="search" required>
                        <button class="btn btn-info" style="line-height: 5px" type="submit">Ara</button>
                    </form>
                </div>

            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
