@extends('admin.master')
@section('heading', 'Hakkımda')
@section('content')

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

<form action="{{route('updateabout')}}" method="post" enctype="multipart/form-data" id="edit-form">
@csrf
    <div class="form-group">
        <label for="exampleInput">Hakkımda</label>
    </div>
    <div class="form-group">
        <textarea name="editor1" id="editor1">{!! $owner->about !!}</textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
            CKEDITOR.config.height = 750;
        </script>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" value="{{$owner->email}}" name="email">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="tel" class="form-control" value="{{$owner->phone}}" name="phone">
    </div>
    <div class="form-group">
        <label>Adres</label>
        <textarea class="form-control" rows="3" name="adres">{{$owner->adress}}</textarea>
    </div>
    <button type="submit" class="btn btn-info">Güncelle</button>

</form>



@endsection
