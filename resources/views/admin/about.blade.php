@extends('admin.master')
@section('heading', 'Hakkımda')
@section('content')

    <textarea name="editor1"></textarea>
    <script>
            CKEDITOR.replace( 'editor1' );
    </script>


@endsection
