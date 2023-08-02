@extends('layout.main')

@section('judul')
    Halaman Barang Not Good
@endsection

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Barang Not Good</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('success') }}
    </div>
    @endif

<div class="table-responsive col-lg-12">
    <a href="barang/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Tambah Data Barang Not Good</a>
    <table class="table table-striped" style="width: 100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Tanggal Produksi</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Kuantitas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nobarang}}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ date("d-m-Y", strtotime($item->tanggal)) }}</td>
                    <td>{{ $customers[$item->customer_id] }}</td>
                    <td>{{ $item->kuantitas}}</td>
                    <td>
                        <a href="/barang/{{ $item->id }}" class="btn btn-success"><span>Show</span></a>
                        <a href="/barang/{{ $item->id }}/edit" class="btn btn-info "><span>Edit</span></a>
                         <form action="/barang/{{ $item->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Sure?')">
                                <span>Delete</span>
                            </button>
                         </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection