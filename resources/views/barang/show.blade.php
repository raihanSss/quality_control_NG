@extends('layout.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Barang</h1>
    </div>

    <div>
        <p><strong>Kode Barang:</strong> {{ $barang->nobarang }}</p>
        <p><strong>Nama Barang:</strong> {{ $barang->name }}</p>
        <p><strong>Keterangan:</strong> {{ $barang->keterangan }}</p>
    </div>
@endsection
