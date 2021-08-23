@extends('admin.master')
@section('heading', 'Aramalar')
@section('content')










    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Aramalar</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Arama</th>
                            <th>Tarih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($searches as $search)
                            <tr class="data-row">
                                <td>{{ $search->text }}</td>
                                <td>{{ $search->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


















@endsection
