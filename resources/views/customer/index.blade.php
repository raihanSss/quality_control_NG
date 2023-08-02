@extends('layout.main')

@section('judul')
    Halaman Customer
@endsection

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Customer</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
    <button type="button" class="close" data-dismiss="alert">X</button>
        {{ session('success') }}
    </div>
    @endif

<div class="table-responsive col-lg-12">
    <a href="customer/create" class="btn btn-primary mb-3"><i class="bi bi-plus-square"></i> Tambah Data Customer</a>
    <table class="table table-striped" style="width: 50%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Customer</th>
                <th scope="col">Alamat Cutomer</th>
                <th scope="col">No Telp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customer->nama_customer}}</td>
                <td>{{ $customer->alamat_customer}}</td>
                <td>{{ $customer->no_telp_customer}}</td>
                <td>
                    <a href="/customer/{{ $customer->id }}/edit" class="btn btn-info ">Edit</a>
                     <form action="/customer/{{ $customer->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('Sure?')">
                            Delete</i>
                        </button>
                     </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection