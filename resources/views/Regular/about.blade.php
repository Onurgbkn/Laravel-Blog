@extends('regular.master')
@section('title', 'Hakkımda')
@section('content')

          <div class="col-md-9 col-lg-8 col-xl-7">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>


              <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
              <div class="my-5">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                  @endif

                  <form method="post" action="{{route('contact')}}">
                    @csrf
                    <div class="form-group my-3">
                      <label for="">İsim</label>
                      <input class="form-control" value="{{old('isim')}}" type="text" name="isim" required>
                    </div>
                    <div class="form-group my-3">
                      <label for="">Email adresiniz</label>
                      <input type="email" class="form-control" value="{{old('email')}}" id="Email" name="email" required>
                    </div>
                    <div class="form-group my-3">
                      <label for="">Telefon numarasi</label>
                      <input class="form-control" value="{{old('tel')}}" type="text" name="tel">
                    </div>
                    <div class="form-group">
                      <label for="">Yorumunuz</label>
                      <textarea class="form-control" id="Textarea1" rows="3" value="{{old('mesaj')}}" name="mesaj" required></textarea>
                    </div>
                    <button type="submit"  class="btn btn-primary my-3">Gönder</button>
                  </form>

                  @if(session('back'))
                    <div class="alert alert-info" role="alert">
                      {{session('back')}}
                    </div>
                  @endif

              </div>
          </div>

@include('regular.layouts.sidebar')
@endsection
