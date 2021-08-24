@extends('regular.master')
@section('title', 'Hakkımda')
@section('content')

          <div class="col-md-9 col-lg-8 col-xl-7">

              <div class="about">
                  {!! $owner->about !!}
              </div>

            <div class="card text-white bg-primary mb-3" style="max-width: 75rem;">
                <div class="card-header">İletişim Bilgileri</div>
                <div class="card-body">
                    <p class="card-text">Email: {{$owner->email}}</p>
                    <p class="card-text">Telefon: {{$owner->phone}}</p>
                    <p class="card-text">Adres: {{$owner->adress}}</p>
                </div>
            </div>

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
                    <h1>Bize Ulaşın</h1>
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
                      <label for="">Mesajiniz</label>
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
