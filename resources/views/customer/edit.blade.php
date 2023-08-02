@extends('layout.main')

@section('isi')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Customer</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/customer/{{ $customer->id }}" class="mb-5">
            @method('put')
            @csrf
            <div class="col-md-6">
                <label for="nama_customer" class="form-label">Nama Customer</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ $customer->nama_customer }}" required>
            </div>
            <div class="col-md-6">
                <label for="alamat_customer" class="form-label">Alamat Customer</label>
                <input type="text" class="form-control"  id="alamat_customer" name="alamat_customer" value="{{ $customer->alamat_customer }}" required>
            </div>
            <div class="col-md-6">
                <label for="no_telp_customer" class="form-label">No Telp</label>
                <input type="text" class="form-control" id="no_telp_customer" name="no_telp_customer" value="{{ $customer->no_telp_customer }}" required>
            </div>
            <div class="col-lg-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
