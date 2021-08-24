@extends('admin.master')
@section('heading', 'Mesajlar')
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cevaplanmayan Mesajlar</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Mesaj</th>
                        <th>Tarih</th>
                        <th>Göster</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts1 as $contact)
                        <tr class="data-row">
                            <td class="contactname">{{ $contact->name }}</td>
                            <td class="contactemail">{{ $contact->email }}</td>
                            <td class="contactphone">{{ $contact->tel }}</td>
                            <td class="contactmessage">{{ Str::limit($contact->message, 100) }}</td>
                            <td class="contactdate">{{ $contact->created_at }}</td>
                            <td>
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                            <button class="show-item" data-contact-id="{{$contact->id}}" class="btn btn-info btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Göster"><i class="fa fa-comments"></i></button>
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

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cevaplanan Mesajlar</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>İsim</th>
                        <th>Mesaj</th>
                        <th>Cevap</th>
                        <th>Cevaplayan</th>
                        <th>Tarih</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts2 as $contact)
                        <tr class="data-row">
                            <td>{{ $contact->name }}</td>
                            <td>{{ Str::limit($contact->message, 200) }}</td>
                            <td>{!! strip_tags(Str::limit($contact->answer, 200)) !!}</td>
                            <td>{{ $contact->GetAdmin->username }}</td>
                            <td>{{ $contact->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.contacts.show')

@endsection
