@extends('layout.main')

@section('judul')
    Halaman Mesin
@endsection

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Mesin</h1>
    </div>

<div class="table-responsive col-lg-8">
    <table class="table table-striped table-sm" style="width: 50%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Mesin</th>
                <th scope="col">Nomor Mesin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mesin as $mesin)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mesin->name }}</td>
                    <td>{{ $mesin->nomesin}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection